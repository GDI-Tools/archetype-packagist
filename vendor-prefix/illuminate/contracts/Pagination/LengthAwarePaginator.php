<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Contracts\Pagination;

/**
 * @template TKey of array-key
 *
 * @template-covariant TValue
 *
 * @extends Paginator<TKey, TValue>
 */
interface LengthAwarePaginator extends Paginator
{
    /**
     * Create a range of pagination URLs.
     *
     * @param  int  $start
     * @param  int  $end
     * @return array
     */
    public function getUrlRange($start, $end);

    /**
     * Determine the total number of items in the data store.
     *
     * @return int
     */
    public function total();

    /**
     * Get the page number of the last available page.
     *
     * @return int
     */
    public function lastPage();
}
