<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Query;

final class Limit
{
    private ?int $maxResults;
    private int $firstResult;

    public function __construct(?int $maxResults, int $firstResult)
    {
        $this->maxResults  = $maxResults;
        $this->firstResult = $firstResult;
    }

    public function isDefined(): bool
    {
        return $this->maxResults !== null || $this->firstResult !== 0;
    }

    public function getMaxResults(): ?int
    {
        return $this->maxResults;
    }

    public function getFirstResult(): int
    {
        return $this->firstResult;
    }
}
