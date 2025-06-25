<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Logging;

use Archetype\Vendor\Doctrine\DBAL\Driver as DriverInterface;
use Archetype\Vendor\Doctrine\DBAL\Driver\Middleware as MiddlewareInterface;
use Archetype\Vendor\Psr\Log\LoggerInterface;

final class Middleware implements MiddlewareInterface
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function wrap(DriverInterface $driver): DriverInterface
    {
        return new Driver($driver, $this->logger);
    }
}
