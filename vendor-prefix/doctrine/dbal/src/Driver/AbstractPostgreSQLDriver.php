<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Driver;

use Archetype\Vendor\Doctrine\DBAL\Connection;
use Archetype\Vendor\Doctrine\DBAL\Driver\API\ExceptionConverter;
use Archetype\Vendor\Doctrine\DBAL\Driver\API\PostgreSQL;
use Archetype\Vendor\Doctrine\DBAL\Exception;
use Archetype\Vendor\Doctrine\DBAL\Platforms\AbstractPlatform;
use Archetype\Vendor\Doctrine\DBAL\Platforms\PostgreSQL100Platform;
use Archetype\Vendor\Doctrine\DBAL\Platforms\PostgreSQL120Platform;
use Archetype\Vendor\Doctrine\DBAL\Platforms\PostgreSQL94Platform;
use Archetype\Vendor\Doctrine\DBAL\Platforms\PostgreSQLPlatform;
use Archetype\Vendor\Doctrine\DBAL\Schema\PostgreSQLSchemaManager;
use Archetype\Vendor\Doctrine\DBAL\VersionAwarePlatformDriver;
use Archetype\Vendor\Doctrine\Deprecations\Deprecation;

use function assert;
use function preg_match;
use function version_compare;

/**
 * Abstract base implementation of the {@see Driver} interface for PostgreSQL based drivers.
 */
abstract class AbstractPostgreSQLDriver implements VersionAwarePlatformDriver
{
    /**
     * {@inheritDoc}
     */
    public function createDatabasePlatformForVersion($version)
    {
        if (preg_match('/^(?P<major>\d+)(?:\.(?P<minor>\d+)(?:\.(?P<patch>\d+))?)?/', $version, $versionParts) !== 1) {
            throw Exception::invalidPlatformVersionSpecified(
                $version,
                '<major_version>.<minor_version>.<patch_version>',
            );
        }

        $majorVersion = $versionParts['major'];
        $minorVersion = $versionParts['minor'] ?? 0;
        $patchVersion = $versionParts['patch'] ?? 0;
        $version      = $majorVersion . '.' . $minorVersion . '.' . $patchVersion;

        if (version_compare($version, '12.0', '>=')) {
            return new PostgreSQL120Platform();
        }

        if (version_compare($version, '10.0', '>=')) {
            return new PostgreSQL100Platform();
        }

        Deprecation::trigger(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/5060',
            'PostgreSQL 9 support is deprecated and will be removed in DBAL 4.'
                . ' Consider upgrading to Postgres 10 or later.',
        );

        return new PostgreSQL94Platform();
    }

    /**
     * {@inheritDoc}
     */
    public function getDatabasePlatform()
    {
        return new PostgreSQL94Platform();
    }

    /**
     * {@inheritDoc}
     *
     * @deprecated Use {@link PostgreSQLPlatform::createSchemaManager()} instead.
     */
    public function getSchemaManager(Connection $conn, AbstractPlatform $platform)
    {
        Deprecation::triggerIfCalledFromOutside(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/5458',
            'AbstractPostgreSQLDriver::getSchemaManager() is deprecated.'
                . ' Use PostgreSQLPlatform::createSchemaManager() instead.',
        );

        assert($platform instanceof PostgreSQLPlatform);

        return new PostgreSQLSchemaManager($conn, $platform);
    }

    public function getExceptionConverter(): ExceptionConverter
    {
        return new PostgreSQL\ExceptionConverter();
    }
}
