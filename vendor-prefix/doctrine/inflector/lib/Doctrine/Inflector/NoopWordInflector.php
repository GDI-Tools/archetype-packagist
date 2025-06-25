<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\Inflector;

class NoopWordInflector implements WordInflector
{
    public function inflect(string $word): string
    {
        return $word;
    }
}
