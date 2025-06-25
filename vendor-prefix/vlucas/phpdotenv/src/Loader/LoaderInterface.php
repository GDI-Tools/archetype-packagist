<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Dotenv\Loader;

use Archetype\Vendor\Dotenv\Repository\RepositoryInterface;

interface LoaderInterface
{
    /**
     * Load the given entries into the repository.
     *
     * @param \Archetype\Vendor\Dotenv\Repository\RepositoryInterface $repository
     * @param \Archetype\Vendor\Dotenv\Parser\Entry[]                 $entries
     *
     * @return array<string, string|null>
     */
    public function load(RepositoryInterface $repository, array $entries);
}
