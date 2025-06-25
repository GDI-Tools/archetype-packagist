<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Bus\Events;

use Archetype\Vendor\Illuminate\Bus\Batch;

class BatchDispatched
{
    /**
     * Create a new event instance.
     *
     * @param  \Archetype\Vendor\Illuminate\Bus\Batch  $batch  The batch instance.
     */
    public function __construct(
        public Batch $batch,
    ) {
    }
}
