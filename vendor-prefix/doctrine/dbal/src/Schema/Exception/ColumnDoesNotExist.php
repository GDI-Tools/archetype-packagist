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

final class ColumnDoesNotExist extends SchemaException
{
    public static function new(string $columnName, string $table): self
    {
        return new self(
            sprintf('There is no column with name "%s" on table "%s".', $columnName, $table),
            self::COLUMN_DOESNT_EXIST,
        );
    }
}
