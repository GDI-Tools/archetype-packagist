<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Driver\IBMDB2\Exception;

use Archetype\Vendor\Doctrine\DBAL\Driver\AbstractException;

/** @internal */
final class CannotCreateTemporaryFile extends AbstractException
{
    /** @param array{message: string}|null $error */
    public static function new(?array $error): self
    {
        $message = 'Could not create temporary file';

        if ($error !== null) {
            $message .= ': ' . $error['message'];
        }

        return new self($message);
    }
}
