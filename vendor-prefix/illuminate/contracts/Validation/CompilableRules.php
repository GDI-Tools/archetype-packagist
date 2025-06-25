<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Contracts\Validation;

interface CompilableRules
{
    /**
     * Compile the object into usable rules.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  mixed  $data
     * @param  mixed  $context
     * @return \stdClass
     */
    public function compile($attribute, $value, $data = null, $context = null);
}
