<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Dotenv\Parser;

use Archetype\Vendor\Dotenv\Util\Str;

final class Value
{
    /**
     * The string representation of the parsed value.
     *
     * @var string
     */
    private $chars;

    /**
     * The locations of the variables in the value.
     *
     * @var int[]
     */
    private $vars;

    /**
     * Internal constructor for a value.
     *
     * @param string $chars
     * @param int[]  $vars
     *
     * @return void
     */
    private function __construct(string $chars, array $vars)
    {
        $this->chars = $chars;
        $this->vars = $vars;
    }

    /**
     * Create an empty value instance.
     *
     * @return \Archetype\Vendor\Dotenv\Parser\Value
     */
    public static function blank()
    {
        return new self('', []);
    }

    /**
     * Create a new value instance, appending the characters.
     *
     * @param string $chars
     * @param bool   $var
     *
     * @return \Archetype\Vendor\Dotenv\Parser\Value
     */
    public function append(string $chars, bool $var)
    {
        return new self(
            $this->chars.$chars,
            $var ? \array_merge($this->vars, [Str::len($this->chars)]) : $this->vars
        );
    }

    /**
     * Get the string representation of the parsed value.
     *
     * @return string
     */
    public function getChars()
    {
        return $this->chars;
    }

    /**
     * Get the locations of the variables in the value.
     *
     * @return int[]
     */
    public function getVars()
    {
        $vars = $this->vars;

        \rsort($vars);

        return $vars;
    }
}
