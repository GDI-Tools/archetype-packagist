<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Events;

class DatabaseBusy
{
    /**
     * Create a new event instance.
     *
     * @param  string  $connectionName  The database connection name.
     * @param  int  $connections  The number of open connections.
     */
    public function __construct(
        public $connectionName,
        public $connections,
    ) {
    }
}
