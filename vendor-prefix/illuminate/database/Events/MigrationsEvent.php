<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Events;

use Archetype\Vendor\Illuminate\Contracts\Database\Events\MigrationEvent as MigrationEventContract;

abstract class MigrationsEvent implements MigrationEventContract
{
    /**
     * Create a new event instance.
     *
     * @param  string  $method  The migration method that was invoked.
     * @param  array<string, mixed>  $options  The options provided when the migration method was invoked.
     */
    public function __construct(
        public $method,
        public array $options = [],
    ) {
    }
}
