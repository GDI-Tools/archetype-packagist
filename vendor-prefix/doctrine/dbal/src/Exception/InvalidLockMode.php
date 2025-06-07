<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Exception;

use Archetype\Vendor\Doctrine\DBAL\Exception;

use function sprintf;

class InvalidLockMode extends Exception
{
    public static function fromLockMode(int $lockMode): self
    {
        return new self(
            sprintf(
                'Lock mode %d is invalid. The valid values are LockMode::NONE, LockMode::OPTIMISTIC'
                    . ', LockMode::PESSIMISTIC_READ and LockMode::PESSIMISTIC_WRITE',
                $lockMode,
            ),
        );
    }
}
