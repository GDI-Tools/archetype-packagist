<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Exception;

use Archetype\Vendor\Doctrine\DBAL\Exception;

use function sprintf;

/** @internal */
final class NoKeyValue extends Exception
{
    public static function fromColumnCount(int $columnCount): self
    {
        return new self(
            sprintf(
                'Fetching as key-value pairs requires the result to contain at least 2 columns, %d given.',
                $columnCount,
            ),
        );
    }
}
