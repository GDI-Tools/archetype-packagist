<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Platforms;

use Archetype\Vendor\Doctrine\DBAL\Platforms\Keywords\PostgreSQL100Keywords;
use Archetype\Vendor\Doctrine\DBAL\SQL\Builder\SelectSQLBuilder;
use Archetype\Vendor\Doctrine\Deprecations\Deprecation;

/**
 * Provides the behavior, features and SQL dialect of the PostgreSQL 10.0 database platform.
 *
 * @deprecated This class will be merged with {@see PostgreSQLPlatform} in 4.0 because support for Postgres
 *             releases prior to 10.0 will be dropped.
 */
class PostgreSQL100Platform extends PostgreSQL94Platform
{
    /** @deprecated Implement {@see createReservedKeywordsList()} instead. */
    protected function getReservedKeywordsClass(): string
    {
        Deprecation::triggerIfCalledFromOutside(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/issues/4510',
            'PostgreSQL100Platform::getReservedKeywordsClass() is deprecated,'
                . ' use PostgreSQL100Platform::createReservedKeywordsList() instead.',
        );

        return PostgreSQL100Keywords::class;
    }

    public function createSelectSQLBuilder(): SelectSQLBuilder
    {
        return AbstractPlatform::createSelectSQLBuilder();
    }
}
