<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database;

use InvalidArgumentException;

class SQLiteDatabaseDoesNotExistException extends InvalidArgumentException
{
    /**
     * The path to the database.
     *
     * @var string
     */
    public $path;

    /**
     * Create a new exception instance.
     *
     * @param  string  $path
     */
    public function __construct($path)
    {
        parent::__construct("Database file at path [{$path}] does not exist. Ensure this is an absolute path to the database.");

        $this->path = $path;
    }
}
