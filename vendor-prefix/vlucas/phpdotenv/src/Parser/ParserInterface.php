<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Dotenv\Parser;

interface ParserInterface
{
    /**
     * Parse content into an entry array.
     *
     * @param string $content
     *
     * @throws \Archetype\Vendor\Dotenv\Exception\InvalidFileException
     *
     * @return \Archetype\Vendor\Dotenv\Parser\Entry[]
     */
    public function parse(string $content);
}
