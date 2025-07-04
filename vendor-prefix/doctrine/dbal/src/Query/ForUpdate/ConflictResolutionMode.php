<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Query\ForUpdate;

final class ConflictResolutionMode
{
    /**
     * Wait for the row to be unlocked
     */
    public const ORDINARY = 0;

    /**
     * Skip the row if it is locked
     */
    public const SKIP_LOCKED = 1;

    /**
     * This class cannot be instantiated.
     *
     * @codeCoverageIgnore
     */
    private function __construct()
    {
    }
}
