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
class Give implements ContextualAttribute
{
    /**
     * Provide a concrete class implementation for dependency injection.
     *
     * @template T
     *
     * @param  class-string<T>  $class
     * @param  array|null  $params
     */
    public function __construct(
        public string $class,
        public array $params = []
    ) {
    }

    /**
     * Resolve the dependency.
     *
     * @param  self  $attribute
     * @param  \Archetype\Vendor\Illuminate\Contracts\Container\Container  $container
     * @return mixed
     */
    public static function resolve(self $attribute, Container $container): mixed
    {
        return $container->make($attribute->class, $attribute->params);
    }
}
