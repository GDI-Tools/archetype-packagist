<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL;

use Archetype\Vendor\Doctrine\Common\Cache\Cache;
use Archetype\Vendor\Doctrine\Common\Cache\Psr6\CacheAdapter;
use Archetype\Vendor\Doctrine\Common\Cache\Psr6\DoctrineProvider;
use Archetype\Vendor\Doctrine\DBAL\Driver\Middleware;
use Archetype\Vendor\Doctrine\DBAL\Logging\SQLLogger;
use Archetype\Vendor\Doctrine\DBAL\Schema\SchemaManagerFactory;
use Archetype\Vendor\Doctrine\Deprecations\Deprecation;
use Archetype\Vendor\Psr\Cache\CacheItemPoolInterface;

use function func_num_args;

/**
 * Configuration container for the Doctrine DBAL.
 */
class Configuration
{
    /** @var Middleware[] */
    private array $middlewares = [];

    /**
     * The SQL logger in use. If null, SQL logging is disabled.
     *
     * @var SQLLogger|null
     */
    protected $sqlLogger;

    /**
     * The cache driver implementation that is used for query result caching.
     */
    private ?CacheItemPoolInterface $resultCache = null;

    /**
     * The cache driver implementation that is used for query result caching.
     *
     * @deprecated Use {@see $resultCache} instead.
     *
     * @var Cache|null
     */
    protected $resultCacheImpl;

    /**
     * The callable to use to filter schema assets.
     *
     * @var callable|null
     */
    protected $schemaAssetsFilter;

    /**
     * The default auto-commit mode for connections.
     *
     * @var bool
     */
    protected $autoCommit = true;

    /**
     * Whether type comments should be disabled to provide the same DB schema than
     * will be obtained with DBAL 4.x. This is useful when relying only on the
     * platform-aware schema comparison (which does not need those type comments)
     * rather than the deprecated legacy tooling.
     */
    private bool $disableTypeComments = false;

    private ?SchemaManagerFactory $schemaManagerFactory = null;

    public function __construct()
    {
        $this->schemaAssetsFilter = static function (): bool {
            return true;
        };
    }

    /**
     * Sets the SQL logger to use. Defaults to NULL which means SQL logging is disabled.
     *
     * @deprecated Use {@see setMiddlewares()} and {@see \Doctrine\DBAL\Logging\Middleware} instead.
     */
    public function setSQLLogger(?SQLLogger $logger = null): void
    {
        Deprecation::trigger(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/4967',
            '%s is deprecated, use setMiddlewares() and Logging\\Middleware instead.',
            __METHOD__,
        );

        $this->sqlLogger = $logger;
    }

    /**
     * Gets the SQL logger that is used.
     *
     * @deprecated
     */
    public function getSQLLogger(): ?SQLLogger
    {
        Deprecation::triggerIfCalledFromOutside(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/4967',
            '%s is deprecated.',
            __METHOD__,
        );

        return $this->sqlLogger;
    }

    /**
     * Gets the cache driver implementation that is used for query result caching.
     */
    public function getResultCache(): ?CacheItemPoolInterface
    {
        return $this->resultCache;
    }

    /**
     * Gets the cache driver implementation that is used for query result caching.
     *
     * @deprecated Use {@see getResultCache()} instead.
     */
    public function getResultCacheImpl(): ?Cache
    {
        Deprecation::trigger(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/4620',
            '%s is deprecated, call getResultCache() instead.',
            __METHOD__,
        );

        return $this->resultCacheImpl;
    }

    /**
     * Sets the cache driver implementation that is used for query result caching.
     */
    public function setResultCache(CacheItemPoolInterface $cache): void
    {
        $this->resultCacheImpl = DoctrineProvider::wrap($cache);
        $this->resultCache     = $cache;
    }

    /**
     * Sets the cache driver implementation that is used for query result caching.
     *
     * @deprecated Use {@see setResultCache()} instead.
     */
    public function setResultCacheImpl(Cache $cacheImpl): void
    {
        Deprecation::trigger(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/4620',
            '%s is deprecated, call setResultCache() instead.',
            __METHOD__,
        );

        $this->resultCacheImpl = $cacheImpl;
        $this->resultCache     = CacheAdapter::wrap($cacheImpl);
    }

    /**
     * Sets the callable to use to filter schema assets.
     */
    public function setSchemaAssetsFilter(?callable $callable = null): void
    {
        if (func_num_args() < 1) {
            Deprecation::trigger(
                'doctrine/dbal',
                'https://github.com/doctrine/dbal/pull/5483',
                'Not passing an argument to %s is deprecated.',
                __METHOD__,
            );
        } elseif ($callable === null) {
            Deprecation::trigger(
                'doctrine/dbal',
                'https://github.com/doctrine/dbal/pull/5483',
                'Using NULL as a schema asset filter is deprecated.'
                    . ' Use a callable that always returns true instead.',
            );
        }

        $this->schemaAssetsFilter = $callable;
    }

    /**
     * Returns the callable to use to filter schema assets.
     */
    public function getSchemaAssetsFilter(): ?callable
    {
        return $this->schemaAssetsFilter;
    }

    /**
     * Sets the default auto-commit mode for connections.
     *
     * If a connection is in auto-commit mode, then all its SQL statements will be executed and committed as individual
     * transactions. Otherwise, its SQL statements are grouped into transactions that are terminated by a call to either
     * the method commit or the method rollback. By default, new connections are in auto-commit mode.
     *
     * @see   getAutoCommit
     *
     * @param bool $autoCommit True to enable auto-commit mode; false to disable it
     */
    public function setAutoCommit(bool $autoCommit): void
    {
        $this->autoCommit = $autoCommit;
    }

    /**
     * Returns the default auto-commit mode for connections.
     *
     * @see    setAutoCommit
     *
     * @return bool True if auto-commit mode is enabled by default for connections, false otherwise.
     */
    public function getAutoCommit(): bool
    {
        return $this->autoCommit;
    }

    /**
     * @param Middleware[] $middlewares
     *
     * @return $this
     */
    public function setMiddlewares(array $middlewares): self
    {
        $this->middlewares = $middlewares;

        return $this;
    }

    /** @return Middleware[] */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }

    public function getSchemaManagerFactory(): ?SchemaManagerFactory
    {
        return $this->schemaManagerFactory;
    }

    /** @return $this */
    public function setSchemaManagerFactory(SchemaManagerFactory $schemaManagerFactory): self
    {
        $this->schemaManagerFactory = $schemaManagerFactory;

        return $this;
    }

    public function getDisableTypeComments(): bool
    {
        return $this->disableTypeComments;
    }

    /** @return $this */
    public function setDisableTypeComments(bool $disableTypeComments): self
    {
        $this->disableTypeComments = $disableTypeComments;

        return $this;
    }
}
