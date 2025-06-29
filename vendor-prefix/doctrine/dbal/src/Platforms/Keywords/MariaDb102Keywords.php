<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Platforms\Keywords;

use Archetype\Vendor\Doctrine\Deprecations\Deprecation;

/**
 * MariaDb reserved keywords list.
 *
 * @deprecated Use {@link MariaDBKeywords} instead.
 *
 * @link https://mariadb.com/kb/en/the-mariadb-library/reserved-words/
 */
final class MariaDb102Keywords extends MariaDBKeywords
{
    /** @deprecated */
    public function getName(): string
    {
        Deprecation::triggerIfCalledFromOutside(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/5433',
            'MariaDb102Keywords::getName() is deprecated.',
        );

        return 'MariaDb102';
    }
}
