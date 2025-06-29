<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Schema\Exception;

use Archetype\Vendor\Doctrine\DBAL\Schema\SchemaException;

use function sprintf;

final class ColumnAlreadyExists extends SchemaException
{
    public static function new(string $tableName, string $columnName): self
    {
        return new self(
            sprintf('The column "%s" on table "%s" already exists.', $columnName, $tableName),
            self::COLUMN_ALREADY_EXISTS,
        );
    }
}
