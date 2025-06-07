<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Dotenv\Parser;

use Archetype\Vendor\PhpOption\Option;

final class Entry
{
    /**
     * The entry name.
     *
     * @var string
     */
    private $name;

    /**
     * The entry value.
     *
     * @var \Archetype\Vendor\Dotenv\Parser\Value|null
     */
    private $value;

    /**
     * Create a new entry instance.
     *
     * @param string                    $name
     * @param \Archetype\Vendor\Dotenv\Parser\Value|null $value
     *
     * @return void
     */
    public function __construct(string $name, ?Value $value = null)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Get the entry name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the entry value.
     *
     * @return \Archetype\Vendor\PhpOption\Option<\Dotenv\Parser\Value>
     */
    public function getValue()
    {
        /** @var \Archetype\Vendor\PhpOption\Option<\Dotenv\Parser\Value> */
        return Option::fromValue($this->value);
    }
}
