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

final class ForeignKeyDoesNotExist extends SchemaException
{
    public static function new(string $foreignKeyName, string $table): self
    {
        return new self(
            sprintf('There exists no foreign key with the name "%s" on table "%s".', $foreignKeyName, $table),
            self::FOREIGNKEY_DOESNT_EXIST,
        );
    }
}
