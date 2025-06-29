<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\Inflector;

class CachedWordInflector implements WordInflector
{
    /** @var WordInflector */
    private $wordInflector;

    /** @var string[] */
    private $cache = [];

    public function __construct(WordInflector $wordInflector)
    {
        $this->wordInflector = $wordInflector;
    }

    public function inflect(string $word): string
    {
        return $this->cache[$word] ?? $this->cache[$word] = $this->wordInflector->inflect($word);
    }
}
