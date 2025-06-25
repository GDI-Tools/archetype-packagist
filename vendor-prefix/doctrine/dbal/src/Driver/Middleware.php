<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Driver;

use Archetype\Vendor\Doctrine\DBAL\Driver;

interface Middleware
{
    public function wrap(Driver $driver): Driver;
}
