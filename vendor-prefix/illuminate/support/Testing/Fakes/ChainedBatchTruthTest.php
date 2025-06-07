<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Support\Testing\Fakes;

use Closure;

class ChainedBatchTruthTest
{
    /**
     * The underlying truth test.
     *
     * @var \Closure
     */
    protected $callback;

    /**
     * Create a new truth test instance.
     *
     * @param  \Closure  $callback
     */
    public function __construct(Closure $callback)
    {
        $this->callback = $callback;
    }

    /**
     * Invoke the truth test with the given pending batch.
     *
     * @param  \Archetype\Vendor\Illuminate\Bus\PendingBatch  $pendingBatch
     * @return bool
     */
    public function __invoke($pendingBatch)
    {
        return call_user_func($this->callback, $pendingBatch);
    }
}
