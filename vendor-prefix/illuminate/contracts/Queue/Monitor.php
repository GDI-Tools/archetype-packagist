<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Contracts\Queue;

interface Monitor
{
    /**
     * Register a callback to be executed on every iteration through the queue loop.
     *
     * @param  mixed  $callback
     * @return void
     */
    public function looping($callback);

    /**
     * Register a callback to be executed when a job fails after the maximum number of retries.
     *
     * @param  mixed  $callback
     * @return void
     */
    public function failing($callback);

    /**
     * Register a callback to be executed when a daemon queue is stopping.
     *
     * @param  mixed  $callback
     * @return void
     */
    public function stopping($callback);
}
