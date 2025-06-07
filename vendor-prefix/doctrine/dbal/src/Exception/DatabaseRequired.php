<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Exception;

use Archetype\Vendor\Doctrine\DBAL\Exception;

use function sprintf;

class DatabaseRequired extends Exception
{
    public static function new(string $methodName): self
    {
        return new self(sprintf('A database is required for the method: %s.', $methodName));
    }
}
