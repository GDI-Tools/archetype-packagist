<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Platforms;

final class DateIntervalUnit
{
    public const SECOND = 'SECOND';

    public const MINUTE = 'MINUTE';

    public const HOUR = 'HOUR';

    public const DAY = 'DAY';

    public const WEEK = 'WEEK';

    public const MONTH = 'MONTH';

    public const QUARTER = 'QUARTER';

    public const YEAR = 'YEAR';

    /** @codeCoverageIgnore */
    private function __construct()
    {
    }
}
