<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\SQL\Parser\Exception;

use Archetype\Vendor\Doctrine\DBAL\SQL\Parser\Exception;
use RuntimeException;

use function preg_last_error;
use function preg_last_error_msg;

class RegularExpressionError extends RuntimeException implements Exception
{
    public static function new(): self
    {
        return new self(preg_last_error_msg(), preg_last_error());
    }
}
