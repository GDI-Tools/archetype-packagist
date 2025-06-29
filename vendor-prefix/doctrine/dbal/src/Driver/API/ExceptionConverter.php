<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Driver\API;

use Archetype\Vendor\Doctrine\DBAL\Driver\Exception;
use Archetype\Vendor\Doctrine\DBAL\Exception\DriverException;
use Archetype\Vendor\Doctrine\DBAL\Query;

interface ExceptionConverter
{
    /**
     * Converts a given driver-level exception into a DBAL-level driver exception.
     *
     * Implementors should use the vendor-specific error code and SQLSTATE of the exception
     * and instantiate the most appropriate specialized {@see DriverException} subclass.
     *
     * @param Exception  $exception The driver exception to convert.
     * @param Query|null $query     The SQL query that triggered the exception, if any.
     *
     * @return DriverException An instance of {@see DriverException} or one of its subclasses.
     */
    public function convert(Exception $exception, ?Query $query): DriverException;
}
