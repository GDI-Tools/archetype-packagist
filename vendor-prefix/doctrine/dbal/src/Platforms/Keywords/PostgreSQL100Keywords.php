<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Platforms\Keywords;

use Archetype\Vendor\Doctrine\Deprecations\Deprecation;

/**
 * PostgreSQL 10.0 reserved keywords list.
 *
 * @deprecated Use {@link PostgreSQLKeywords} instead.
 */
class PostgreSQL100Keywords extends PostgreSQL94Keywords
{
    /** @deprecated */
    public function getName(): string
    {
        Deprecation::triggerIfCalledFromOutside(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/5433',
            'PostgreSQL100Keywords::getName() is deprecated.',
        );

        return 'PostgreSQL100';
    }
}
