<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Driver\Mysqli\Exception;

use Archetype\Vendor\Doctrine\DBAL\Driver\AbstractException;

use function sprintf;

/** @internal */
final class InvalidOption extends AbstractException
{
    /** @param mixed $value */
    public static function fromOption(int $option, $value): self
    {
        return new self(
            sprintf('Failed to set option %d with value "%s"', $option, $value),
        );
    }
}
