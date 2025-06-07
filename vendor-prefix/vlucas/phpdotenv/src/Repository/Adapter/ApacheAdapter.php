<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Dotenv\Repository\Adapter;

use Archetype\Vendor\PhpOption\None;
use Archetype\Vendor\PhpOption\Option;
use Archetype\Vendor\PhpOption\Some;

final class ApacheAdapter implements AdapterInterface
{
    /**
     * Create a new apache adapter instance.
     *
     * @return void
     */
    private function __construct()
    {
        //
    }

    /**
     * Create a new instance of the adapter, if it is available.
     *
     * @return \Archetype\Vendor\PhpOption\Option<\Dotenv\Repository\Adapter\AdapterInterface>
     */
    public static function create()
    {
        if (self::isSupported()) {
            /** @var \Archetype\Vendor\PhpOption\Option<AdapterInterface> */
            return Some::create(new self());
        }

        return None::create();
    }

    /**
     * Determines if the adapter is supported.
     *
     * This happens if PHP is running as an Apache module.
     *
     * @return bool
     */
    private static function isSupported()
    {
        return \function_exists('apache_getenv') && \function_exists('apache_setenv');
    }

    /**
     * Read an environment variable, if it exists.
     *
     * @param non-empty-string $name
     *
     * @return \Archetype\Vendor\PhpOption\Option<string>
     */
    public function read(string $name)
    {
        /** @var \Archetype\Vendor\PhpOption\Option<string> */
        return Option::fromValue(apache_getenv($name))->filter(static function ($value) {
            return \is_string($value) && $value !== '';
        });
    }

    /**
     * Write to an environment variable, if possible.
     *
     * @param non-empty-string $name
     * @param string           $value
     *
     * @return bool
     */
    public function write(string $name, string $value)
    {
        return apache_setenv($name, $value);
    }

    /**
     * Delete an environment variable, if possible.
     *
     * @param non-empty-string $name
     *
     * @return bool
     */
    public function delete(string $name)
    {
        return apache_setenv($name, '');
    }
}
