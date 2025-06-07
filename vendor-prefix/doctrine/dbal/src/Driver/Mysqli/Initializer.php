<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Driver\Mysqli;

use Archetype\Vendor\Doctrine\DBAL\Driver\Exception;
use mysqli;

interface Initializer
{
    /** @throws Exception */
    public function initialize(mysqli $connection): void;
}
