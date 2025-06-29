<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Event;

use Archetype\Vendor\Doctrine\DBAL\Platforms\AbstractPlatform;
use Archetype\Vendor\Doctrine\DBAL\Schema\Table;

/**
 * Event Arguments used when the SQL query for dropping tables are generated inside {@see AbstractPlatform}.
 *
 * @deprecated
 */
class SchemaDropTableEventArgs extends SchemaEventArgs
{
    /** @var string|Table */
    private $table;

    private AbstractPlatform $platform;

    /** @var string|null */
    private $sql;

    /** @param string|Table $table */
    public function __construct($table, AbstractPlatform $platform)
    {
        $this->table    = $table;
        $this->platform = $platform;
    }

    /** @return string|Table */
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
     * @param string $sql
     *
     * @return SchemaDropTableEventArgs
     */
    public function setSql($sql)
    {
        $this->sql = $sql;

        return $this;
    }

    /** @return string|null */
    public function getSql()
    {
        return $this->sql;
    }
}
