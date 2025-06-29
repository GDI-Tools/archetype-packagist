<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Logging;

use Archetype\Vendor\Doctrine\Deprecations\Deprecation;

/**
 * Chains multiple SQLLogger.
 *
 * @deprecated
 */
class LoggerChain implements SQLLogger
{
    /** @var iterable<SQLLogger> */
    private iterable $loggers;

    /** @param iterable<SQLLogger> $loggers */
    public function __construct(iterable $loggers = [])
    {
        Deprecation::trigger(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/4967',
            'LoggerChain is deprecated',
        );

        $this->loggers = $loggers;
    }

    /**
     * {@inheritDoc}
     */
    public function startQuery($sql, ?array $params = null, ?array $types = null)
    {
        foreach ($this->loggers as $logger) {
            $logger->startQuery($sql, $params, $types);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function stopQuery()
    {
        foreach ($this->loggers as $logger) {
            $logger->stopQuery();
        }
    }
}
