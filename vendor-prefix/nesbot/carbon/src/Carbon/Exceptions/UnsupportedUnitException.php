<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Archetype\Vendor\Carbon\Exceptions;

use Exception;

/**
 * @codeCoverageIgnore
 */
class UnsupportedUnitException extends UnitException
{
    public function __construct(string $unit, int $code = 0, ?Exception $previous = null)
    {
        parent::__construct("Unsupported unit '$unit'", $code, $previous);
    }
}
