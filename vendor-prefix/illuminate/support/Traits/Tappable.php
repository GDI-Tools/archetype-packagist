<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Support\Traits;

trait Tappable
{
    /**
     * Call the given Closure with this instance then return the instance.
     *
     * @param  (callable($this): mixed)|null  $callback
     * @return ($callback is null ? \Archetype\Vendor\Illuminate\Support\HigherOrderTapProxy : $this)
     */
    public function tap($callback = null)
    {
        return tap($this, $callback);
    }
}
