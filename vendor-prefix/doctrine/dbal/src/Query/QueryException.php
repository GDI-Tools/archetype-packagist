<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Query;

use Archetype\Vendor\Doctrine\DBAL\Exception;

use function implode;

class QueryException extends Exception
{
    /**
     * @param string   $alias
     * @param string[] $registeredAliases
     *
     * @return QueryException
     */
    public static function unknownAlias($alias, $registeredAliases)
    {
        return new self("The given alias '" . $alias . "' is not part of " .
            'any FROM or JOIN clause table. The currently registered ' .
            'aliases are: ' . implode(', ', $registeredAliases) . '.');
    }

    /**
     * @param string   $alias
     * @param string[] $registeredAliases
     *
     * @return QueryException
     */
    public static function nonUniqueAlias($alias, $registeredAliases)
    {
        return new self("The given alias '" . $alias . "' is not unique " .
            'in FROM and JOIN clause table. The currently registered ' .
            'aliases are: ' . implode(', ', $registeredAliases) . '.');
    }
}
