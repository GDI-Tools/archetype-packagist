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

namespace Archetype\Vendor\Ramsey\Uuid\Type;

/**
 * NumberInterface ensures consistency in numeric values returned by ramsey/uuid
 *
 * @immutable
 */
interface NumberInterface extends TypeInterface
{
    /**
     * Returns true if this number is less than zero
     */
    public function isNegative(): bool;
}
