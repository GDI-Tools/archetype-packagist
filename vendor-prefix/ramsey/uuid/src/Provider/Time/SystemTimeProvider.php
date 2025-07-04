<?php

/**
 * This file is part of the ramsey/uuid library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Ramsey\Uuid\Provider\Time;

use Archetype\Vendor\Ramsey\Uuid\Provider\TimeProviderInterface;
use Archetype\Vendor\Ramsey\Uuid\Type\Time;

use function gettimeofday;

/**
 * SystemTimeProvider retrieves the current time using built-in PHP functions
 */
class SystemTimeProvider implements TimeProviderInterface
{
    public function getTime(): Time
    {
        $time = gettimeofday();

        return new Time($time['sec'], $time['usec']);
    }
}
