<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Contracts\Broadcasting;

interface Factory
{
    /**
     * Get a broadcaster implementation by name.
     *
     * @param  string|null  $name
     * @return \Archetype\Vendor\Illuminate\Contracts\Broadcasting\Broadcaster
     */
    public function connection($name = null);
}
