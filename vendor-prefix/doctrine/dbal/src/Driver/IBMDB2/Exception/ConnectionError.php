<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Driver\IBMDB2\Exception;

use Archetype\Vendor\Doctrine\DBAL\Driver\AbstractException;

use function db2_conn_error;
use function db2_conn_errormsg;

/** @internal */
final class ConnectionError extends AbstractException
{
    /** @param resource $connection */
    public static function new($connection): self
    {
        $message  = db2_conn_errormsg($connection);
        $sqlState = db2_conn_error($connection);

        return Factory::create($message, static function (int $code) use ($message, $sqlState): self {
            return new self($message, $sqlState, $code);
        });
    }
}
