<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Eloquent\Factories;

use Archetype\Vendor\Illuminate\Database\Eloquent\Model;
use Archetype\Vendor\Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Archetype\Vendor\Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Archetype\Vendor\Illuminate\Database\Eloquent\Relations\MorphOneOrMany;

class Relationship
{
    /**
     * The related factory instance.
     *
     * @var \Archetype\Vendor\Illuminate\Database\Eloquent\Factories\Factory
     */
    protected $factory;

    /**
     * The relationship name.
     *
     * @var string
     */
    protected $relationship;

    /**
     * Create a new child relationship instance.
     *
     * @param  \Archetype\Vendor\Illuminate\Database\Eloquent\Factories\Factory  $factory
     * @param  string  $relationship
     */
    public function __construct(Factory $factory, $relationship)
    {
        $this->factory = $factory;
        $this->relationship = $relationship;
    }

    /**
     * Create the child relationship for the given parent model.
     *
     * @param  \Archetype\Vendor\Illuminate\Database\Eloquent\Model  $parent
     * @return void
     */
    public function createFor(Model $parent)
    {
        $relationship = $parent->{$this->relationship}();

        if ($relationship instanceof MorphOneOrMany) {
            $this->factory->state([
                $relationship->getMorphType() => $relationship->getMorphClass(),
                $relationship->getForeignKeyName() => $relationship->getParentKey(),
            ])->prependState($relationship->getQuery()->pendingAttributes)->create([], $parent);
        } elseif ($relationship instanceof HasOneOrMany) {
            $this->factory->state([
                $relationship->getForeignKeyName() => $relationship->getParentKey(),
            ])->prependState($relationship->getQuery()->pendingAttributes)->create([], $parent);
        } elseif ($relationship instanceof BelongsToMany) {
            $relationship->attach(
                $this->factory->prependState($relationship->getQuery()->pendingAttributes)->create([], $parent)
            );
        }
    }

    /**
     * Specify the model instances to always use when creating relationships.
     *
     * @param  \Archetype\Vendor\Illuminate\Support\Collection  $recycle
     * @return $this
     */
    public function recycle($recycle)
    {
        $this->factory = $this->factory->recycle($recycle);

        return $this;
    }
}
