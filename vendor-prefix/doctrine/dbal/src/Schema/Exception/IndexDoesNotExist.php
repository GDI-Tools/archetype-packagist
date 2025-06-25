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

final class IndexDoesNotExist extends SchemaException
{
    public static function new(string $indexName, string $table): self
    {
        return new self(
            sprintf('Index "%s" does not exist on table "%s".', $indexName, $table),
            self::INDEX_DOESNT_EXIST,
        );
    }
}
