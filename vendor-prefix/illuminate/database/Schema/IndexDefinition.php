<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Schema;

use Archetype\Vendor\Illuminate\Support\Fluent;

/**
 * @method $this algorithm(string $algorithm) Specify an algorithm for the index (MySQL/PostgreSQL)
 * @method $this language(string $language) Specify a language for the full text index (PostgreSQL)
 * @method $this deferrable(bool $value = true) Specify that the unique index is deferrable (PostgreSQL)
 * @method $this initiallyImmediate(bool $value = true) Specify the default time to check the unique index constraint (PostgreSQL)
 * @method $this nullsNotDistinct(bool $value = true) Specify that the null values should not be treated as distinct (PostgreSQL)
 */
class IndexDefinition extends Fluent
{
    //
}
