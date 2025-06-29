<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Dotenv\Store\File;

/**
 * @internal
 */
final class Paths
{
    /**
     * This class is a singleton.
     *
     * @codeCoverageIgnore
     *
     * @return void
     */
    private function __construct()
    {
        //
    }

    /**
     * Returns the full paths to the files.
     *
     * @param string[] $paths
     * @param string[] $names
     *
     * @return string[]
     */
    public static function filePaths(array $paths, array $names)
    {
        $files = [];

        foreach ($paths as $path) {
            foreach ($names as $name) {
                $files[] = \rtrim($path, \DIRECTORY_SEPARATOR).\DIRECTORY_SEPARATOR.$name;
            }
        }

        return $files;
    }
}
