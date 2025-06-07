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

final class IndexNameInvalid extends SchemaException
{
    public static function new(string $indexName): self
    {
        return new self(
            sprintf('Invalid index name "%s" given, has to be [a-zA-Z0-9_].', $indexName),
            self::INDEX_INVALID_NAME,
        );
    }
}
