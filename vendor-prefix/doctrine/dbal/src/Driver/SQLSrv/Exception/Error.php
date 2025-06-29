<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Driver\SQLSrv\Exception;

use Archetype\Vendor\Doctrine\DBAL\Driver\AbstractException;

use function rtrim;
use function sqlsrv_errors;

use const SQLSRV_ERR_ERRORS;

/** @internal */
final class Error extends AbstractException
{
    public static function new(): self
    {
        $message  = '';
        $sqlState = null;
        $code     = 0;

        foreach ((array) sqlsrv_errors(SQLSRV_ERR_ERRORS) as $error) {
            $message   .= 'SQLSTATE [' . $error['SQLSTATE'] . ', ' . $error['code'] . ']: ' . $error['message'] . "\n";
            $sqlState ??= $error['SQLSTATE'];

            if ($code !== 0) {
                continue;
            }

            $code = $error['code'];
        }

        if ($message === '') {
            $message = 'SQL Server error occurred but no error message was retrieved from driver.';
        }

        return new self(rtrim($message), $sqlState, $code);
    }
}
