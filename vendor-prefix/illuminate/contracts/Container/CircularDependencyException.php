<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Contracts\Container;

use Exception;
use Archetype\Vendor\Psr\Container\ContainerExceptionInterface;

class CircularDependencyException extends Exception implements ContainerExceptionInterface
{
    //
}
