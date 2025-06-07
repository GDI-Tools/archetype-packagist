<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\ArrayParameters\Exception;

use Archetype\Vendor\Doctrine\DBAL\ArrayParameters\Exception;
use LogicException;

use function sprintf;

/** @internal */
class MissingPositionalParameter extends LogicException implements Exception
{
    public static function new(int $index): self
    {
        return new self(
            sprintf('Positional parameter at index %d does not have a bound value.', $index),
        );
    }
}
