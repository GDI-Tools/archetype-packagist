<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Contracts\Database\Query;

use Archetype\Vendor\Illuminate\Database\Grammar;

interface Expression
{
    /**
     * Get the value of the expression.
     *
     * @param  \Archetype\Vendor\Illuminate\Database\Grammar  $grammar
     * @return string|int|float
     */
    public function getValue(Grammar $grammar);
}
