<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL;

/**
 * Contains all DBAL LockModes.
 */
class LockMode
{
    public const NONE              = 0;
    public const OPTIMISTIC        = 1;
    public const PESSIMISTIC_READ  = 2;
    public const PESSIMISTIC_WRITE = 4;

    /**
     * Private constructor. This class cannot be instantiated.
     *
     * @codeCoverageIgnore
     */
    final private function __construct()
    {
    }
}
