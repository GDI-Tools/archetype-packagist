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

final class NamespaceAlreadyExists extends SchemaException
{
    public static function new(string $namespaceName): self
    {
        return new self(
            sprintf('The namespace with name "%s" already exists.', $namespaceName),
            self::NAMESPACE_ALREADY_EXISTS,
        );
    }
}
