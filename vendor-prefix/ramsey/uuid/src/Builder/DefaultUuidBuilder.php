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

namespace Archetype\Vendor\Ramsey\Uuid\Builder;

use Archetype\Vendor\Ramsey\Uuid\Rfc4122\UuidBuilder as Rfc4122UuidBuilder;

/**
 * @deprecated Please transition to {@see Rfc4122UuidBuilder}.
 *
 * @immutable
 */
class DefaultUuidBuilder extends Rfc4122UuidBuilder
{
}
