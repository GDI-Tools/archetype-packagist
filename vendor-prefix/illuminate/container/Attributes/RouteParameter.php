<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Container\Attributes;

use Attribute;
use Archetype\Vendor\Illuminate\Contracts\Container\Container;
use Archetype\Vendor\Illuminate\Contracts\Container\ContextualAttribute;

#[Attribute(Attribute::TARGET_PARAMETER)]
class RouteParameter implements ContextualAttribute
{
    /**
     * Create a new class instance.
     */
    public function __construct(public string $parameter)
    {
    }

    /**
     * Resolve the route parameter.
     *
     * @param  self  $attribute
     * @param  \Archetype\Vendor\Illuminate\Contracts\Container\Container  $container
     * @return mixed
     */
    public static function resolve(self $attribute, Container $container)
    {
        return $container->make('request')->route($attribute->parameter);
    }
}
