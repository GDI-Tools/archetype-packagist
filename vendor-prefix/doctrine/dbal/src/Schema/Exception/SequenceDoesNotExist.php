<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Schema\Exception;

use Archetype\Vendor\Doctrine\DBAL\Schema\SchemaException;

use function sprintf;

final class SequenceDoesNotExist extends SchemaException
{
    public static function new(string $sequenceName): self
    {
        return new self(
            sprintf('There exists no sequence with the name "%s".', $sequenceName),
            self::SEQUENCE_DOENST_EXIST,
        );
    }
}
