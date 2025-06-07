<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Carbon\Doctrine;

class DateTimeDefaultPrecision
{
    private static $precision = 6;

    /**
     * Change the default Doctrine datetime and datetime_immutable precision.
     *
     * @param int $precision
     */
    public static function set(int $precision): void
    {
        self::$precision = $precision;
    }

    /**
     * Get the default Doctrine datetime and datetime_immutable precision.
     *
     * @return int
     */
    public static function get(): int
    {
        return self::$precision;
    }
}
