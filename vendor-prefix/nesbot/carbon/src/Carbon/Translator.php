<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Archetype\Vendor\Carbon;

use ReflectionMethod;
use Archetype\Vendor\Symfony\Component\Translation;
use Archetype\Vendor\Symfony\Contracts\Translation\TranslatorInterface;

$transMethod = new ReflectionMethod(
    class_exists(TranslatorInterface::class)
        ? TranslatorInterface::class
        : Translation\Translator::class,
    'trans',
);

require $transMethod->hasReturnType()
    ? __DIR__.'/../../lazy/Carbon/TranslatorStrongType.php'
    : __DIR__.'/../../lazy/Carbon/TranslatorWeakType.php';

class Translator extends LazyTranslator
{
    // Proxy dynamically loaded LazyTranslator in a static way
}
