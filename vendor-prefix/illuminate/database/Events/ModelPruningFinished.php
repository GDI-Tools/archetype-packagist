<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Events;

class ModelPruningFinished
{
    /**
     * Create a new event instance.
     *
     * @param  array<class-string>  $models  The class names of the models that were pruned.
     */
    public function __construct(
        public $models,
    ) {
    }
}
