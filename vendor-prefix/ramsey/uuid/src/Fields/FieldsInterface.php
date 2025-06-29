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

namespace Archetype\Vendor\Ramsey\Uuid\Fields;

use Serializable;

/**
 * UUIDs consist of unsigned integers, the bytes of which are separated into fields and arranged in a particular layout
 * defined by the specification for the variant
 *
 * @immutable
 */
interface FieldsInterface extends Serializable
{
    /**
     * Returns the bytes that comprise the fields
     */
    public function getBytes(): string;
}
