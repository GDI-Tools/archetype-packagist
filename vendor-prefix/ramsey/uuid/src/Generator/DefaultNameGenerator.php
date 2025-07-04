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

namespace Archetype\Vendor\Ramsey\Uuid\Generator;

use Archetype\Vendor\Ramsey\Uuid\Exception\NameException;
use Archetype\Vendor\Ramsey\Uuid\UuidInterface;
use ValueError;

use function hash;

/**
 * DefaultNameGenerator generates strings of binary data based on a namespace, name, and hashing algorithm
 */
class DefaultNameGenerator implements NameGeneratorInterface
{
    public function generate(UuidInterface $ns, string $name, string $hashAlgorithm): string
    {
        try {
            return hash($hashAlgorithm, $ns->getBytes() . $name, true);
        } catch (ValueError $e) {
            throw new NameException(
                message: sprintf('Unable to hash namespace and name with algorithm \'%s\'', $hashAlgorithm),
                previous: $e,
            );
        }
    }
}
