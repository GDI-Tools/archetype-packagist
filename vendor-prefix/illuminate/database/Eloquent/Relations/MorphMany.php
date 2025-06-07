<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Eloquent\Relations;

use Archetype\Vendor\Illuminate\Database\Eloquent\Collection as EloquentCollection;

/**
 * @template TRelatedModel of \Illuminate\Database\Eloquent\Model
 * @template TDeclaringModel of \Illuminate\Database\Eloquent\Model
 *
 * @extends \Archetype\Vendor\Illuminate\Database\Eloquent\Relations\MorphOneOrMany<TRelatedModel, TDeclaringModel, \Archetype\Vendor\Illuminate\Database\Eloquent\Collection<int, TRelatedModel>>
 */
class MorphMany extends MorphOneOrMany
{
    /**
     * Convert the relationship to a "morph one" relationship.
     *
     * @return \Archetype\Vendor\Illuminate\Database\Eloquent\Relations\MorphOne<TRelatedModel, TDeclaringModel>
     */
    public function one()
    {
        return MorphOne::noConstraints(fn () => tap(
            new MorphOne(
                $this->getQuery(),
                $this->getParent(),
                $this->morphType,
                $this->foreignKey,
                $this->localKey
            ),
            function ($morphOne) {
                if ($inverse = $this->getInverseRelationship()) {
                    $morphOne->inverse($inverse);
                }
            }
        ));
    }

    /** @inheritDoc */
    public function getResults()
    {
        return ! is_null($this->getParentKey())
            ? $this->query->get()
            : $this->related->newCollection();
    }

    /** @inheritDoc */
    public function initRelation(array $models, $relation)
    {
        foreach ($models as $model) {
            $model->setRelation($relation, $this->related->newCollection());
        }

        return $models;
    }

    /** @inheritDoc */
    public function match(array $models, EloquentCollection $results, $relation)
    {
        return $this->matchMany($models, $results, $relation);
    }

    /** @inheritDoc */
    public function forceCreate(array $attributes = [])
    {
        $attributes[$this->getMorphType()] = $this->morphClass;

        return parent::forceCreate($attributes);
    }
}
