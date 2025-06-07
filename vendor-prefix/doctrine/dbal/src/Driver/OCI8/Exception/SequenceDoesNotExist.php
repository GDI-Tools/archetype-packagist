<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Driver\OCI8\Exception;

use Archetype\Vendor\Doctrine\DBAL\Driver\AbstractException;

/** @internal */
final class SequenceDoesNotExist extends AbstractException
{
    public static function new(): self
    {
        return new self('lastInsertId failed: Query was executed but no result was returned.');
    }
}
