<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Events;

class ModelsPruned
{
    /**
     * Create a new event instance.
     *
     * @param  string  $model  The class name of the model that was pruned.
     * @param  int  $count  The number of pruned records.
     */
    public function __construct(
        public $model,
        public $count,
    ) {
    }
}
