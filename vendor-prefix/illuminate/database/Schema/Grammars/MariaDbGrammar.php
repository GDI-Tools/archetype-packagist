<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Schema\Grammars;

use Archetype\Vendor\Illuminate\Database\Schema\Blueprint;
use Archetype\Vendor\Illuminate\Support\Fluent;

class MariaDbGrammar extends MySqlGrammar
{
    /** @inheritDoc */
    public function compileRenameColumn(Blueprint $blueprint, Fluent $command)
    {
        if (version_compare($this->connection->getServerVersion(), '10.5.2', '<')) {
            return $this->compileLegacyRenameColumn($blueprint, $command);
        }

        return parent::compileRenameColumn($blueprint, $command);
    }

    /**
     * Create the column definition for a uuid type.
     *
     * @param  \Archetype\Vendor\Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeUuid(Fluent $column)
    {
        if (version_compare($this->connection->getServerVersion(), '10.7.0', '<')) {
            return 'char(36)';
        }

        return 'uuid';
    }

    /**
     * Create the column definition for a spatial Geometry type.
     *
     * @param  \Archetype\Vendor\Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeGeometry(Fluent $column)
    {
        $subtype = $column->subtype ? strtolower($column->subtype) : null;

        if (! in_array($subtype, ['point', 'linestring', 'polygon', 'geometrycollection', 'multipoint', 'multilinestring', 'multipolygon'])) {
            $subtype = null;
        }

        return sprintf('%s%s',
            $subtype ?? 'geometry',
            $column->srid ? ' ref_system_id='.$column->srid : ''
        );
    }
}
