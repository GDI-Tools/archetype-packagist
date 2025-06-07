<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Platforms;

use Archetype\Vendor\Doctrine\DBAL\Schema\Index;
use Archetype\Vendor\Doctrine\DBAL\Schema\TableDiff;

/**
 * Provides the behavior, features and SQL dialect of the MariaDB 10.5 database platform.
 */
class MariaDb1052Platform extends MariaDb1043Platform
{
    /**
     * {@inheritDoc}
     */
    protected function getPreAlterTableRenameIndexForeignKeySQL(TableDiff $diff)
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    protected function getPostAlterTableRenameIndexForeignKeySQL(TableDiff $diff)
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    protected function getRenameIndexSQL($oldIndexName, Index $index, $tableName)
    {
        return ['ALTER TABLE ' . $tableName . ' RENAME INDEX ' . $oldIndexName . ' TO ' . $index->getQuotedName($this)];
    }
}
