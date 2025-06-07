<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Schema;

use Archetype\Vendor\Doctrine\DBAL\Connection;

/**
 * Creates a schema manager for the given connection.
 *
 * This interface is an extension point for applications that need to override schema managers.
 */
interface SchemaManagerFactory
{
    public function createSchemaManager(Connection $connection): AbstractSchemaManager;
}
