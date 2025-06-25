<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Brick\Math\Exception;

/**
 * Exception thrown when a division by zero occurs.
 */
class DivisionByZeroException extends MathException
{
    /**
     * @psalm-pure
     */
    public static function divisionByZero() : DivisionByZeroException
    {
        return new self('Division by zero.');
    }

    /**
     * @psalm-pure
     */
    public static function modulusMustNotBeZero() : DivisionByZeroException
    {
        return new self('The modulus must not be zero.');
    }

    /**
     * @psalm-pure
     */
    public static function denominatorMustNotBeZero() : DivisionByZeroException
    {
        return new self('The denominator of a rational number cannot be zero.');
    }
}
