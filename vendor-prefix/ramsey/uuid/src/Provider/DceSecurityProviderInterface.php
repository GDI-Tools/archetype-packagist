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

namespace Archetype\Vendor\Ramsey\Uuid\Provider;

use Archetype\Vendor\Ramsey\Uuid\Rfc4122\UuidV2;
use Archetype\Vendor\Ramsey\Uuid\Type\Integer as IntegerObject;

/**
 * A DCE provider provides access to local domain identifiers for version 2, DCE Security, UUIDs
 *
 * @see UuidV2
 */
interface DceSecurityProviderInterface
{
    /**
     * Returns a user identifier for the system
     *
     * @link https://en.wikipedia.org/wiki/User_identifier User identifier
     */
    public function getUid(): IntegerObject;

    /**
     * Returns a group identifier for the system
     *
     * @link https://en.wikipedia.org/wiki/Group_identifier Group identifier
     */
    public function getGid(): IntegerObject;
}
