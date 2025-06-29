<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Driver\PgSQL\Exception;

use Archetype\Vendor\Doctrine\DBAL\Driver\Exception;
use UnexpectedValueException;

use function sprintf;

final class UnexpectedValue extends UnexpectedValueException implements Exception
{
    public static function new(string $value, string $type): self
    {
        return new self(sprintf(
            'Unexpected value "%s" of type "%s" returned by Postgres',
            $value,
            $type,
        ));
    }

    /** @return null */
    public function getSQLState()
    {
        return null;
    }
}
