<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Driver\Mysqli\Exception;

use Archetype\Vendor\Doctrine\DBAL\Driver\AbstractException;

use function sprintf;

/** @internal */
final class NonStreamResourceUsedAsLargeObject extends AbstractException
{
    public static function new(int $parameter): self
    {
        return new self(
            sprintf('The resource passed as a LARGE_OBJECT parameter #%d must be of type "stream"', $parameter),
        );
    }
}
