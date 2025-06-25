<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Platforms;

final class TrimMode
{
    public const UNSPECIFIED = 0;

    public const LEADING = 1;

    public const TRAILING = 2;

    public const BOTH = 3;

    /** @codeCoverageIgnore */
    private function __construct()
    {
    }
}
