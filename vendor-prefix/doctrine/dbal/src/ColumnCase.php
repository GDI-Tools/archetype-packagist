<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL;

/**
 * Contains portable column case conversions.
 */
final class ColumnCase
{
    /**
     * Convert column names to upper case.
     */
    public const UPPER = 1;

    /**
     * Convert column names to lower case.
     */
    public const LOWER = 2;

    /**
     * This class cannot be instantiated.
     *
     * @codeCoverageIgnore
     */
    private function __construct()
    {
    }
}
