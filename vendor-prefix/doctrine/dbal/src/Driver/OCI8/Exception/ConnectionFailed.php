<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Driver\OCI8\Exception;

use Archetype\Vendor\Doctrine\DBAL\Driver\AbstractException;

use function assert;
use function oci_error;

/** @internal */
final class ConnectionFailed extends AbstractException
{
    public static function new(): self
    {
        $error = oci_error();
        assert($error !== false);

        return new self($error['message'], null, $error['code']);
    }
}
