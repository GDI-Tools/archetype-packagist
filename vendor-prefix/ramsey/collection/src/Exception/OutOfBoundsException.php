<?php

/**
 * This file is part of the ramsey/collection library
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

namespace Archetype\Vendor\Ramsey\Collection\Exception;

use OutOfBoundsException as PhpOutOfBoundsException;

/**
 * Thrown when attempting to access an element out of the range of the collection.
 */
class OutOfBoundsException extends PhpOutOfBoundsException implements CollectionException
{
}
