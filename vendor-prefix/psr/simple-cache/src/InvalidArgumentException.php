<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Psr\SimpleCache;

/**
 * Exception interface for invalid cache arguments.
 *
 * When an invalid argument is passed it must throw an exception which implements
 * this interface
 */
interface InvalidArgumentException extends CacheException
{
}
