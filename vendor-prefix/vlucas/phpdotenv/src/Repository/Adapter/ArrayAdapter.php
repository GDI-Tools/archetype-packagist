<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Dotenv\Repository\Adapter;

use Archetype\Vendor\PhpOption\Option;
use Archetype\Vendor\PhpOption\Some;

final class ArrayAdapter implements AdapterInterface
{
    /**
     * The variables and their values.
     *
     * @var array<string, string>
     */
    private $variables;

    /**
     * Create a new array adapter instance.
     *
     * @return void
     */
    private function __construct()
    {
        $this->variables = [];
    }

    /**
     * Create a new instance of the adapter, if it is available.
     *
     * @return \Archetype\Vendor\PhpOption\Option<\Dotenv\Repository\Adapter\AdapterInterface>
     */
    public static function create()
    {
        /** @var \Archetype\Vendor\PhpOption\Option<AdapterInterface> */
        return Some::create(new self());
    }

    /**
     * Read an environment variable, if it exists.
     *
     * @param non-empty-string $name
     *
     * @return \Archetype\Vendor\PhpOption\Option<string>
     */
    public function read(string $name)
    {
        return Option::fromArraysValue($this->variables, $name);
    }

    /**
     * Write to an environment variable, if possible.
     *
     * @param non-empty-string $name
     * @param string           $value
     *
     * @return bool
     */
    public function write(string $name, string $value)
    {
        $this->variables[$name] = $value;

        return true;
    }

    /**
     * Delete an environment variable, if possible.
     *
     * @param non-empty-string $name
     *
     * @return bool
     */
    public function delete(string $name)
    {
        unset($this->variables[$name]);

        return true;
    }
}
