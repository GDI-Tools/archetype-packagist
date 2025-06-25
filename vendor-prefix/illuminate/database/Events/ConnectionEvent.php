<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Events;

abstract class ConnectionEvent
{
    /**
     * The name of the connection.
     *
     * @var string
     */
    public $connectionName;

    /**
     * The database connection instance.
     *
     * @var \Archetype\Vendor\Illuminate\Database\Connection
     */
    public $connection;

    /**
     * Create a new event instance.
     *
     * @param  \Archetype\Vendor\Illuminate\Database\Connection  $connection
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->connectionName = $connection->getName();
    }
}
