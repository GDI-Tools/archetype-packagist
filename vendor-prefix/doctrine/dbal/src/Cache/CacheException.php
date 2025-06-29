<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Cache;

use Archetype\Vendor\Doctrine\DBAL\Exception;

class CacheException extends Exception
{
    /** @return CacheException */
    public static function noCacheKey()
    {
        return new self('No cache key was set.');
    }

    /** @return CacheException */
    public static function noResultDriverConfigured()
    {
        return new self('Trying to cache a query but no result driver is configured.');
    }
}
