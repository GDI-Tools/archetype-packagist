<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Events;

use Archetype\Vendor\Illuminate\Contracts\Database\Events\MigrationEvent;

class NoPendingMigrations implements MigrationEvent
{
    /**
     * Create a new event instance.
     *
     * @param  string  $method  The migration method that was called.
     */
    public function __construct(
        public $method,
    ) {
    }
}
