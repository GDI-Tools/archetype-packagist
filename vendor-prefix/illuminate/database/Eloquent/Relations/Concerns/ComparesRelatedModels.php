<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Eloquent\Relations\Concerns;

use Archetype\Vendor\Illuminate\Contracts\Database\Eloquent\SupportsPartialRelations;
use Archetype\Vendor\Illuminate\Database\Eloquent\Model;

trait ComparesRelatedModels
{
    /**
     * Determine if the model is the related instance of the relationship.
     *
     * @param  \Archetype\Vendor\Illuminate\Database\Eloquent\Model|null  $model
     * @return bool
     */
    public function is($model)
    {
        $match = ! is_null($model) &&
               $this->compareKeys($this->getParentKey(), $this->getRelatedKeyFrom($model)) &&
               $this->related->getTable() === $model->getTable() &&
               $this->related->getConnectionName() === $model->getConnectionName();

        if ($match && $this instanceof SupportsPartialRelations && $this->isOneOfMany()) {
            return $this->query
                ->whereKey($model->getKey())
                ->exists();
        }

        return $match;
    }

    /**
     * Determine if the model is not the related instance of the relationship.
     *
     * @param  \Archetype\Vendor\Illuminate\Database\Eloquent\Model|null  $model
     * @return bool
     */
    public function isNot($model)
    {
        return ! $this->is($model);
    }

    /**
     * Get the value of the parent model's key.
     *
     * @return mixed
     */
    abstract public function getParentKey();

    /**
     * Get the value of the model's related key.
     *
     * @param  \Archetype\Vendor\Illuminate\Database\Eloquent\Model  $model
     * @return mixed
     */
    abstract protected function getRelatedKeyFrom(Model $model);

    /**
     * Compare the parent key with the related key.
     *
     * @param  mixed  $parentKey
     * @param  mixed  $relatedKey
     * @return bool
     */
    protected function compareKeys($parentKey, $relatedKey)
    {
        if (empty($parentKey) || empty($relatedKey)) {
            return false;
        }

        if (is_int($parentKey) || is_int($relatedKey)) {
            return (int) $parentKey === (int) $relatedKey;
        }

        return $parentKey === $relatedKey;
    }
}
