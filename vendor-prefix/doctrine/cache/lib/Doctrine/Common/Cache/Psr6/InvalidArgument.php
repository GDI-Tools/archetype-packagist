<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\Common\Cache\Psr6;

use InvalidArgumentException;
use Archetype\Vendor\Psr\Cache\InvalidArgumentException as PsrInvalidArgumentException;

/**
 * @internal
 */
final class InvalidArgument extends InvalidArgumentException implements PsrInvalidArgumentException
{
}
