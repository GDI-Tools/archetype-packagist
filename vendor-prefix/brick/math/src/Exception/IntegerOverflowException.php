<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Brick\Math\Exception;

use Archetype\Vendor\Brick\Math\BigInteger;

/**
 * Exception thrown when an integer overflow occurs.
 */
class IntegerOverflowException extends MathException
{
    /**
     * @psalm-pure
     */
    public static function toIntOverflow(BigInteger $value) : IntegerOverflowException
    {
        $message = '%s is out of range %d to %d and cannot be represented as an integer.';

        return new self(\sprintf($message, (string) $value, PHP_INT_MIN, PHP_INT_MAX));
    }
}
