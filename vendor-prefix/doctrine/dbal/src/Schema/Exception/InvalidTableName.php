<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Schema\Exception;

use Archetype\Vendor\Doctrine\DBAL\Schema\SchemaException;

use function sprintf;

final class InvalidTableName extends SchemaException
{
    public static function new(string $tableName): self
    {
        return new self(sprintf('Invalid table name specified "%s".', $tableName));
    }
}
