<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\Inflector\Rules;

use function array_map;
use function implode;
use function preg_match;

class Patterns
{
    /** @var Pattern[] */
    private $patterns;

    /** @var string */
    private $regex;

    public function __construct(Pattern ...$patterns)
    {
        $this->patterns = $patterns;

        $patterns = array_map(static function (Pattern $pattern): string {
            return $pattern->getPattern();
        }, $this->patterns);

        $this->regex = '/^(?:' . implode('|', $patterns) . ')$/i';
    }

    public function matches(string $word): bool
    {
        return preg_match($this->regex, $word, $regs) === 1;
    }
}
