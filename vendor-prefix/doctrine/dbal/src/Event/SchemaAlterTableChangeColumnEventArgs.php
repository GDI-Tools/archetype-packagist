<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Event;

use Archetype\Vendor\Doctrine\DBAL\Platforms\AbstractPlatform;
use Archetype\Vendor\Doctrine\DBAL\Schema\ColumnDiff;
use Archetype\Vendor\Doctrine\DBAL\Schema\TableDiff;

use function array_merge;
use function func_get_args;
use function is_array;

/**
 * Event Arguments used when SQL queries for changing table columns are generated inside {@see AbstractPlatform}.
 *
 * @deprecated
 */
class SchemaAlterTableChangeColumnEventArgs extends SchemaEventArgs
{
    private ColumnDiff $columnDiff;
    private TableDiff $tableDiff;
    private AbstractPlatform $platform;

    /** @var string[] */
    private array $sql = [];

    public function __construct(ColumnDiff $columnDiff, TableDiff $tableDiff, AbstractPlatform $platform)
    {
        $this->columnDiff = $columnDiff;
        $this->tableDiff  = $tableDiff;
        $this->platform   = $platform;
    }

    /** @return ColumnDiff */
    public function getColumnDiff()
    {
        return $this->columnDiff;
    }

    /** @return TableDiff */
    public function getTableDiff()
    {
        return $this->tableDiff;
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
     * @return SchemaAlterTableChangeColumnEventArgs
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
