<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Support\Testing\Fakes;

use Archetype\Vendor\Illuminate\Bus\PendingBatch;
use Archetype\Vendor\Illuminate\Support\Collection;

class PendingBatchFake extends PendingBatch
{
    /**
     * The fake bus instance.
     *
     * @var \Archetype\Vendor\Illuminate\Support\Testing\Fakes\BusFake
     */
    protected $bus;

    /**
     * Create a new pending batch instance.
     *
     * @param  \Archetype\Vendor\Illuminate\Support\Testing\Fakes\BusFake  $bus
     * @param  \Archetype\Vendor\Illuminate\Support\Collection  $jobs
     */
    public function __construct(BusFake $bus, Collection $jobs)
    {
        $this->bus = $bus;
        $this->jobs = $jobs;
    }

    /**
     * Dispatch the batch.
     *
     * @return \Archetype\Vendor\Illuminate\Bus\Batch
     */
    public function dispatch()
    {
        return $this->bus->recordPendingBatch($this);
    }

    /**
     * Dispatch the batch after the response is sent to the browser.
     *
     * @return \Archetype\Vendor\Illuminate\Bus\Batch
     */
    public function dispatchAfterResponse()
    {
        return $this->bus->recordPendingBatch($this);
    }
}
