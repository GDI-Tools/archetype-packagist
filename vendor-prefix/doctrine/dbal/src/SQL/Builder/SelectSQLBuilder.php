<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\SQL\Builder;

use Archetype\Vendor\Doctrine\DBAL\Exception;
use Archetype\Vendor\Doctrine\DBAL\Query\SelectQuery;

interface SelectSQLBuilder
{
    /** @throws Exception */
    public function buildSQL(SelectQuery $query): string;
}
