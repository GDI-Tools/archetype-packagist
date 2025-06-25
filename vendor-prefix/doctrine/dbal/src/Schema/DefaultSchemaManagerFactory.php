<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Schema;

use Archetype\Vendor\Doctrine\DBAL\Connection;
use Archetype\Vendor\Doctrine\DBAL\Exception;

/**
 * A schema manager factory that returns the default schema manager for the given platform.
 */
final class DefaultSchemaManagerFactory implements SchemaManagerFactory
{
    /** @throws Exception If the platform does not support creating schema managers yet. */
    public function createSchemaManager(Connection $connection): AbstractSchemaManager
    {
        return $connection->getDatabasePlatform()->createSchemaManager($connection);
    }
}
