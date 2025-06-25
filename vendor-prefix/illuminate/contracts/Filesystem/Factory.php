<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Contracts\Filesystem;

interface Factory
{
    /**
     * Get a filesystem implementation.
     *
     * @param  string|null  $name
     * @return \Archetype\Vendor\Illuminate\Contracts\Filesystem\Filesystem
     */
    public function disk($name = null);
}
