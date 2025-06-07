<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Driver\OCI8\Exception;

use Archetype\Vendor\Doctrine\DBAL\Driver\AbstractException;

use function sprintf;

/** @internal */
final class NonTerminatedStringLiteral extends AbstractException
{
    public static function new(int $offset): self
    {
        return new self(
            sprintf(
                'The statement contains non-terminated string literal starting at offset %d.',
                $offset,
            ),
        );
    }
}
