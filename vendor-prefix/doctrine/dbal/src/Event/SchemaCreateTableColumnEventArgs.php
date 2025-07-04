<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Event;

use Archetype\Vendor\Doctrine\DBAL\Platforms\AbstractPlatform;
use Archetype\Vendor\Doctrine\DBAL\Schema\Column;
use Archetype\Vendor\Doctrine\DBAL\Schema\Table;

use function array_merge;
use function func_get_args;
use function is_array;

/**
 * Event Arguments used when SQL queries for creating table columns are generated inside {@see AbstractPlatform}.
 *
 * @deprecated
 */
class SchemaCreateTableColumnEventArgs extends SchemaEventArgs
{
    private Column $column;
    private Table $table;
    private AbstractPlatform $platform;

    /** @var string[] */
    private array $sql = [];

    public function __construct(Column $column, Table $table, AbstractPlatform $platform)
    {
        $this->column   = $column;
        $this->table    = $table;
        $this->platform = $platform;
    }

    /** @return Column */
    public function getColumn()
    {
        return $this->column;
    }

    /** @return Table */
    public function getTable()
    {
        return $this->table;
    }

    /** @return AbstractPlatform */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * Passing multiple SQL statements as an array is deprecated. Pass each statement as an individual argument instead.
     *
     * @param string|string[] $sql
     *
     * @return SchemaCreateTableColumnEventArgs
     */
    public function addSql($sql)
    {
        $this->sql = array_merge($this->sql, is_array($sql) ? $sql : func_get_args());

        return $this;
    }

    /** @return string[] */
    public function getSql()
    {
        return $this->sql;
    }
}
