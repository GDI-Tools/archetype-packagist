<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Query\Grammars;

use Archetype\Vendor\Illuminate\Database\Query\Builder;
use Archetype\Vendor\Illuminate\Database\Query\JoinLateralClause;
use RuntimeException;

class MariaDbGrammar extends MySqlGrammar
{
    /**
     * Compile a "lateral join" clause.
     *
     * @param  \Archetype\Vendor\Illuminate\Database\Query\JoinLateralClause  $join
     * @param  string  $expression
     * @return string
     *
     * @throws \RuntimeException
     */
    public function compileJoinLateral(JoinLateralClause $join, string $expression): string
    {
        throw new RuntimeException('This database engine does not support lateral joins.');
    }

    /**
     * Compile a "JSON value cast" statement into SQL.
     *
     * @param  string  $value
     * @return string
     */
    public function compileJsonValueCast($value)
    {
        return "json_query({$value}, '$')";
    }

    /**
     * Compile a query to get the number of open connections for a database.
     *
     * @return string
     */
    public function compileThreadCount()
    {
        return 'select variable_value as `Value` from information_schema.global_status where variable_name = \'THREADS_CONNECTED\'';
    }

    /**
     * Determine whether to use a legacy group limit clause for MySQL < 8.0.
     *
     * @param  \Archetype\Vendor\Illuminate\Database\Query\Builder  $query
     * @return bool
     */
    public function useLegacyGroupLimit(Builder $query)
    {
        return false;
    }
}
