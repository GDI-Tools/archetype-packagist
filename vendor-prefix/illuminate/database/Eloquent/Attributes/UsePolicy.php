<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Eloquent\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class UsePolicy
{
    /**
     * Create a new attribute instance.
     *
     * @param  class-string<*>  $class
     */
    public function __construct(public string $class)
    {
    }
}
