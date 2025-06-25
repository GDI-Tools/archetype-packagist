<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Schema;

use Archetype\Vendor\Illuminate\Support\Stringable;

class ForeignIdColumnDefinition extends ColumnDefinition
{
    /**
     * The schema builder blueprint instance.
     *
     * @var \Archetype\Vendor\Illuminate\Database\Schema\Blueprint
     */
    protected $blueprint;

    /**
     * Create a new foreign ID column definition.
     *
     * @param  \Archetype\Vendor\Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  array  $attributes
     */
    public function __construct(Blueprint $blueprint, $attributes = [])
    {
        parent::__construct($attributes);

        $this->blueprint = $blueprint;
    }

    /**
     * Create a foreign key constraint on this column referencing the "id" column of the conventionally related table.
     *
     * @param  string|null  $table
     * @param  string|null  $column
     * @param  string|null  $indexName
     * @return \Archetype\Vendor\Illuminate\Database\Schema\ForeignKeyDefinition
     */
    public function constrained($table = null, $column = null, $indexName = null)
    {
        $table ??= $this->table;
        $column ??= $this->referencesModelColumn ?? 'id';

        return $this->references($column, $indexName)->on($table ?? (new Stringable($this->name))->beforeLast('_'.$column)->plural());
    }

    /**
     * Specify which column this foreign ID references on another table.
     *
     * @param  string  $column
     * @param  string  $indexName
     * @return \Archetype\Vendor\Illuminate\Database\Schema\ForeignKeyDefinition
     */
    public function references($column, $indexName = null)
    {
        return $this->blueprint->foreign($this->name, $indexName)->references($column);
    }
}
