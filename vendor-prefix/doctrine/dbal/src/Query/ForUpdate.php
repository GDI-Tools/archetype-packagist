<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Query;

/** @internal */
final class ForUpdate
{
    private int $conflictResolutionMode;

    public function __construct(int $conflictResolutionMode)
    {
        $this->conflictResolutionMode = $conflictResolutionMode;
    }

    public function getConflictResolutionMode(): int
    {
        return $this->conflictResolutionMode;
    }
}
