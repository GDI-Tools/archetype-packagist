<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Dotenv\Store;

interface StoreInterface
{
    /**
     * Read the content of the environment file(s).
     *
     * @throws \Archetype\Vendor\Dotenv\Exception\InvalidEncodingException|\Archetype\Vendor\Dotenv\Exception\InvalidPathException
     *
     * @return string
     */
    public function read();
}
