<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Platforms;

use Archetype\Vendor\Doctrine\DBAL\SQL\Builder\SelectSQLBuilder;

/**
 * Provides the behavior, features and SQL dialect of the MariaDB 10.6 database platform.
 */
class MariaDb1060Platform extends MariaDb1052Platform
{
    public function createSelectSQLBuilder(): SelectSQLBuilder
    {
        return AbstractPlatform::createSelectSQLBuilder();
    }
}
