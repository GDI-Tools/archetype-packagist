<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Platforms\SQLServer;

use Archetype\Vendor\Doctrine\DBAL\Platforms\SQLServerPlatform;
use Archetype\Vendor\Doctrine\DBAL\Schema\Comparator as BaseComparator;
use Archetype\Vendor\Doctrine\DBAL\Schema\Table;
use Archetype\Vendor\Doctrine\DBAL\Schema\TableDiff;

/**
 * Compares schemas in the context of SQL Server platform.
 *
 * @link https://docs.microsoft.com/en-us/sql/t-sql/statements/collations?view=sql-server-ver15
 */
class Comparator extends BaseComparator
{
    private string $databaseCollation;

    /** @internal The comparator can be only instantiated by a schema manager. */
    public function __construct(SQLServerPlatform $platform, string $databaseCollation)
    {
        parent::__construct($platform);

        $this->databaseCollation = $databaseCollation;
    }

    public function compareTables(Table $fromTable, Table $toTable): TableDiff
    {
        return parent::compareTables(
            $this->normalizeColumns($fromTable),
            $this->normalizeColumns($toTable),
        );
    }

    /**
     * {@inheritDoc}
     */
    public function diffTable(Table $fromTable, Table $toTable)
    {
        return parent::diffTable(
            $this->normalizeColumns($fromTable),
            $this->normalizeColumns($toTable),
        );
    }

    private function normalizeColumns(Table $table): Table
    {
        $table = clone $table;

        foreach ($table->getColumns() as $column) {
            $options = $column->getPlatformOptions();

            if (! isset($options['collation']) || $options['collation'] !== $this->databaseCollation) {
                continue;
            }

            unset($options['collation']);
            $column->setPlatformOptions($options);
        }

        return $table;
    }
}
