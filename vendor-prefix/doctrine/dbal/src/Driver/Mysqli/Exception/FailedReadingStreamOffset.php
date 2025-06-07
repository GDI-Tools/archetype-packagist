<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Driver\Mysqli\Exception;

use Archetype\Vendor\Doctrine\DBAL\Driver\AbstractException;

use function sprintf;

/** @internal */
final class FailedReadingStreamOffset extends AbstractException
{
    public static function new(int $parameter): self
    {
        return new self(sprintf('Failed reading the stream resource for parameter #%d.', $parameter));
    }
}
