<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Schema;

use Archetype\Vendor\Illuminate\Database\Connection;
use Archetype\Vendor\Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

abstract class SchemaState
{
    /**
     * The connection instance.
     *
     * @var \Archetype\Vendor\Illuminate\Database\Connection
     */
    protected $connection;

    /**
     * The filesystem instance.
     *
     * @var \Archetype\Vendor\Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * The name of the application's migration table.
     *
     * @var string
     */
    protected $migrationTable = 'migrations';

    /**
     * The process factory callback.
     *
     * @var callable
     */
    protected $processFactory;

    /**
     * The output callable instance.
     *
     * @var callable
     */
    protected $output;

    /**
     * Create a new dumper instance.
     *
     * @param  \Archetype\Vendor\Illuminate\Database\Connection  $connection
     * @param  \Archetype\Vendor\Illuminate\Filesystem\Filesystem|null  $files
     * @param  callable|null  $processFactory
     */
    public function __construct(Connection $connection, ?Filesystem $files = null, ?callable $processFactory = null)
    {
        $this->connection = $connection;

        $this->files = $files ?: new Filesystem;

        $this->processFactory = $processFactory ?: function (...$arguments) {
            return Process::fromShellCommandline(...$arguments)->setTimeout(null);
        };

        $this->handleOutputUsing(function () {
            //
        });
    }

    /**
     * Dump the database's schema into a file.
     *
     * @param  \Archetype\Vendor\Illuminate\Database\Connection  $connection
     * @param  string  $path
     * @return void
     */
    abstract public function dump(Connection $connection, $path);

    /**
     * Load the given schema file into the database.
     *
     * @param  string  $path
     * @return void
     */
    abstract public function load($path);

    /**
     * Create a new process instance.
     *
     * @param  mixed  ...$arguments
     * @return \Symfony\Component\Process\Process
     */
    public function makeProcess(...$arguments)
    {
        return call_user_func($this->processFactory, ...$arguments);
    }

    /**
     * Determine if the current connection has a migration table.
     *
     * @return bool
     */
    public function hasMigrationTable(): bool
    {
        return $this->connection->getSchemaBuilder()->hasTable($this->migrationTable);
    }

    /**
     * Get the name of the application's migration table.
     *
     * @return string
     */
    protected function getMigrationTable(): string
    {
        return $this->connection->getTablePrefix().$this->migrationTable;
    }

    /**
     * Specify the name of the application's migration table.
     *
     * @param  string  $table
     * @return $this
     */
    public function withMigrationTable(string $table)
    {
        $this->migrationTable = $table;

        return $this;
    }

    /**
     * Specify the callback that should be used to handle process output.
     *
     * @param  callable  $output
     * @return $this
     */
    public function handleOutputUsing(callable $output)
    {
        $this->output = $output;

        return $this;
    }
}
