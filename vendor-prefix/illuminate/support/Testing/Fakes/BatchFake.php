<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Support\Testing\Fakes;

use Archetype\Vendor\Carbon\CarbonImmutable;
use Archetype\Vendor\Illuminate\Bus\Batch;
use Archetype\Vendor\Illuminate\Bus\UpdatedBatchJobCounts;
use Archetype\Vendor\Illuminate\Support\Carbon;
use Archetype\Vendor\Illuminate\Support\Collection;

class BatchFake extends Batch
{
    /**
     * The jobs that have been added to the batch.
     *
     * @var array
     */
    public $added = [];

    /**
     * Indicates if the batch has been deleted.
     *
     * @var bool
     */
    public $deleted = false;

    /**
     * Create a new batch instance.
     *
     * @param  string  $id
     * @param  string  $name
     * @param  int  $totalJobs
     * @param  int  $pendingJobs
     * @param  int  $failedJobs
     * @param  array  $failedJobIds
     * @param  array  $options
     * @param  \Archetype\Vendor\Carbon\CarbonImmutable  $createdAt
     * @param  \Archetype\Vendor\Carbon\CarbonImmutable|null  $cancelledAt
     * @param  \Archetype\Vendor\Carbon\CarbonImmutable|null  $finishedAt
     */
    public function __construct(
        string $id,
        string $name,
        int $totalJobs,
        int $pendingJobs,
        int $failedJobs,
        array $failedJobIds,
        array $options,
        CarbonImmutable $createdAt,
        ?CarbonImmutable $cancelledAt = null,
        ?CarbonImmutable $finishedAt = null,
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->totalJobs = $totalJobs;
        $this->pendingJobs = $pendingJobs;
        $this->failedJobs = $failedJobs;
        $this->failedJobIds = $failedJobIds;
        $this->options = $options;
        $this->createdAt = $createdAt;
        $this->cancelledAt = $cancelledAt;
        $this->finishedAt = $finishedAt;
    }

    /**
     * Get a fresh instance of the batch represented by this ID.
     *
     * @return self
     */
    public function fresh()
    {
        return $this;
    }

    /**
     * Add additional jobs to the batch.
     *
     * @param  \Archetype\Vendor\Illuminate\Support\Enumerable|object|array  $jobs
     * @return self
     */
    public function add($jobs)
    {
        $jobs = Collection::wrap($jobs);

        foreach ($jobs as $job) {
            $this->added[] = $job;
        }

        $this->totalJobs += $jobs->count();

        return $this;
    }

    /**
     * Record that a job within the batch finished successfully, executing any callbacks if necessary.
     *
     * @param  string  $jobId
     * @return void
     */
    public function recordSuccessfulJob(string $jobId)
    {
        //
    }

    /**
     * Decrement the pending jobs for the batch.
     *
     * @param  string  $jobId
     * @return void
     */
    public function decrementPendingJobs(string $jobId)
    {
        //
    }

    /**
     * Record that a job within the batch failed to finish successfully, executing any callbacks if necessary.
     *
     * @param  string  $jobId
     * @param  \Throwable  $e
     * @return void
     */
    public function recordFailedJob(string $jobId, $e)
    {
        //
    }

    /**
     * Increment the failed jobs for the batch.
     *
     * @param  string  $jobId
     * @return \Archetype\Vendor\Illuminate\Bus\UpdatedBatchJobCounts
     */
    public function incrementFailedJobs(string $jobId)
    {
        return new UpdatedBatchJobCounts;
    }

    /**
     * Cancel the batch.
     *
     * @return void
     */
    public function cancel()
    {
        $this->cancelledAt = Carbon::now();
    }

    /**
     * Delete the batch from storage.
     *
     * @return void
     */
    public function delete()
    {
        $this->deleted = true;
    }

    /**
     * Determine if the batch has been deleted.
     *
     * @return bool
     */
    public function deleted()
    {
        return $this->deleted;
    }
}
