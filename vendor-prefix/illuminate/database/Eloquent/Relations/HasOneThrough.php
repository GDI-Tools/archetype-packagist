<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Eloquent\Relations;

use Archetype\Vendor\Illuminate\Contracts\Database\Eloquent\SupportsPartialRelations;
use Archetype\Vendor\Illuminate\Database\Eloquent\Builder;
use Archetype\Vendor\Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Archetype\Vendor\Illuminate\Database\Eloquent\Model;
use Archetype\Vendor\Illuminate\Database\Eloquent\Relations\Concerns\CanBeOneOfMany;
use Archetype\Vendor\Illuminate\Database\Eloquent\Relations\Concerns\ComparesRelatedModels;
use Archetype\Vendor\Illuminate\Database\Eloquent\Relations\Concerns\InteractsWithDictionary;
use Archetype\Vendor\Illuminate\Database\Eloquent\Relations\Concerns\SupportsDefaultModels;
use Archetype\Vendor\Illuminate\Database\Query\JoinClause;

/**
 * @template TRelatedModel of \Illuminate\Database\Eloquent\Model
 * @template TIntermediateModel of \Illuminate\Database\Eloquent\Model
 * @template TDeclaringModel of \Illuminate\Database\Eloquent\Model
 *
 * @extends \Archetype\Vendor\Illuminate\Database\Eloquent\Relations\HasOneOrManyThrough<TRelatedModel, TIntermediateModel, TDeclaringModel, ?TRelatedModel>
 */
class HasOneThrough extends HasOneOrManyThrough implements SupportsPartialRelations
{
    use ComparesRelatedModels, CanBeOneOfMany, InteractsWithDictionary, SupportsDefaultModels;

    /** @inheritDoc */
    public function getResults()
    {
        if (is_null($this->getParentKey())) {
            return $this->getDefaultFor($this->farParent);
        }

        return $this->first() ?: $this->getDefaultFor($this->farParent);
    }

    /** @inheritDoc */
    public function initRelation(array $models, $relation)
    {
        foreach ($models as $model) {
            $model->setRelation($relation, $this->getDefaultFor($model));
        }

        return $models;
    }

    /** @inheritDoc */
    public function match(array $models, EloquentCollection $results, $relation)
    {
        $dictionary = $this->buildDictionary($results);

        // Once we have the dictionary we can simply spin through the parent models to
        // link them up with their children using the keyed dictionary to make the
        // matching very convenient and easy work. Then we'll just return them.
        foreach ($models as $model) {
            if (isset($dictionary[$key = $this->getDictionaryKey($model->getAttribute($this->localKey))])) {
                $value = $dictionary[$key];
                $model->setRelation(
                    $relation, reset($value)
                );
            }
        }

        return $models;
    }

    /** @inheritDoc */
    public function getRelationExistenceQuery(Builder $query, Builder $parentQuery, $columns = ['*'])
    {
        if ($this->isOneOfMany()) {
            $this->mergeOneOfManyJoinsTo($query);
        }

        return parent::getRelationExistenceQuery($query, $parentQuery, $columns);
    }

    /** @inheritDoc */
    public function addOneOfManySubQueryConstraints(Builder $query, $column = null, $aggregate = null)
    {
        $query->addSelect([$this->getQualifiedFirstKeyName()]);

        // We need to join subqueries that aren't the inner-most subquery which is joined in the CanBeOneOfMany::ofMany method...
        if ($this->getOneOfManySubQuery() !== null) {
            $this->performJoin($query);
        }
    }

    /** @inheritDoc */
    public function getOneOfManySubQuerySelectColumns()
    {
        return [$this->getQualifiedFirstKeyName()];
    }

    /** @inheritDoc */
    public function addOneOfManyJoinSubQueryConstraints(JoinClause $join)
    {
        $join->on($this->qualifySubSelectColumn($this->firstKey), '=', $this->getQualifiedFirstKeyName());
    }

    /**
     * Make a new related instance for the given model.
     *
     * @param  TDeclaringModel  $parent
     * @return TRelatedModel
     */
    public function newRelatedInstanceFor(Model $parent)
    {
        return $this->related->newInstance();
    }

    /** @inheritDoc */
    protected function getRelatedKeyFrom(Model $model)
    {
        return $model->getAttribute($this->getForeignKeyName());
    }

    /** @inheritDoc */
    public function getParentKey()
    {
        return $this->farParent->getAttribute($this->localKey);
    }
}
