<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Driver;

use Throwable;

interface Exception extends Throwable
{
    /**
     * Returns the SQLSTATE the driver was in at the time the error occurred.
     *
     * Returns null if the driver does not provide a SQLSTATE for the error occurred.
     *
     * @return string|null
     */
    public function getSQLState();
}
