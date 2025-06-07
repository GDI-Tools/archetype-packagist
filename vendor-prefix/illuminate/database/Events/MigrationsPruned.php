<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Events;

use Archetype\Vendor\Illuminate\Database\Connection;

class MigrationsPruned
{
    /**
     * The database connection instance.
     *
     * @var \Archetype\Vendor\Illuminate\Database\Connection
     */
    public $connection;

    /**
     * The database connection name.
     *
     * @var string|null
     */
    public $connectionName;

    /**
     * The path to the directory where migrations were pruned.
     *
     * @var string
     */
    public $path;

    /**
     * Create a new event instance.
     *
     * @param  \Archetype\Vendor\Illuminate\Database\Connection  $connection
     * @param  string  $path
     */
    public function __construct(Connection $connection, string $path)
    {
        $this->connection = $connection;
        $this->connectionName = $connection->getName();
        $this->path = $path;
    }
}
