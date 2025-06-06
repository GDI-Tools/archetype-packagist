<?php

namespace Archetype\Vendor\Illuminate\Database\Events;

class ModelPruningStarting
{
    /**
     * Create a new event instance.
     *
     * @param  array<class-string>  $models  The class names of the models that will be pruned.
     */
    public function __construct(public $models)
    {
    }
}
