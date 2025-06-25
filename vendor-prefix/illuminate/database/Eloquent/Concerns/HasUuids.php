<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Eloquent\Concerns;

use Archetype\Vendor\Illuminate\Support\Str;

trait HasUuids
{
    use HasUniqueStringIds;

    /**
     * Generate a new unique key for the model.
     *
     * @return string
     */
    public function newUniqueId()
    {
        return (string) Str::uuid7();
    }

    /**
     * Determine if given key is valid.
     *
     * @param  mixed  $value
     * @return bool
     */
    protected function isValidUniqueId($value): bool
    {
        return Str::isUuid($value);
    }
}
