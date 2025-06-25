<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Contracts\Support;

interface HasOnceHash
{
    /**
     * Compute the hash that should be used to represent the object when given to a function using "once".
     *
     * @return string
     */
    public function onceHash();
}
