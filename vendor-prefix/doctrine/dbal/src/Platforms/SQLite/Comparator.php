<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Platforms\SQLite;

use Archetype\Vendor\Doctrine\DBAL\Platforms\SqlitePlatform;
use Archetype\Vendor\Doctrine\DBAL\Schema\Comparator as BaseComparator;
use Archetype\Vendor\Doctrine\DBAL\Schema\Table;
use Archetype\Vendor\Doctrine\DBAL\Schema\TableDiff;

use function strcasecmp;

/**
 * Compares schemas in the context of SQLite platform.
 *
 * BINARY is the default column collation and should be ignored if specified explicitly.
 */
class Comparator extends BaseComparator
{
    /** @internal The comparator can be only instantiated by a schema manager. */
    public function __construct(SqlitePlatform $platform)
    {
        parent::__construct($platform);
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

            if (! isset($options['collation']) || strcasecmp($options['collation'], 'binary') !== 0) {
                continue;
            }

            unset($options['collation']);
            $column->setPlatformOptions($options);
        }

        return $table;
    }
}
