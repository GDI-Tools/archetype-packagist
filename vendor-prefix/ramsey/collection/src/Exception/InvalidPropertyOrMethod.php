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

use RuntimeException;

/**
 * Thrown when attempting to evaluate a property, method, or array key
 * that doesn't exist on an element or cannot otherwise be evaluated in the
 * current context.
 */
class InvalidPropertyOrMethod extends RuntimeException implements CollectionException
{
}
