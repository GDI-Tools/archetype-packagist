<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Events;

use Closure;

if (! function_exists('Archetype\Vendor\Illuminate\Events\queueable')) {
    /**
     * Create a new queued Closure event listener.
     *
     * @param  \Closure  $closure
     * @return \Archetype\Vendor\Illuminate\Events\QueuedClosure
     */
    function queueable(Closure $closure)
    {
        return new QueuedClosure($closure);
    }
}
