<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Contracts\Concurrency;

use Closure;
use Archetype\Vendor\Illuminate\Support\Defer\DeferredCallback;

interface Driver
{
    /**
     * Run the given tasks concurrently and return an array containing the results.
     */
    public function run(Closure|array $tasks): array;

    /**
     * Defer the execution of the given tasks.
     */
    public function defer(Closure|array $tasks): DeferredCallback;
}
