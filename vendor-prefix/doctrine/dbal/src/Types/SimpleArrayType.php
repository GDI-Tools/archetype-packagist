<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Types;

use Archetype\Vendor\Doctrine\DBAL\Platforms\AbstractPlatform;
use Archetype\Vendor\Doctrine\Deprecations\Deprecation;

use function count;
use function explode;
use function implode;
use function is_array;
use function is_resource;
use function stream_get_contents;

/**
 * Array Type which can be used for simple values.
 *
 * Only use this type if you are sure that your values cannot contain a ",".
 */
class SimpleArrayType extends Type
{
    /**
     * {@inheritDoc}
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        return $platform->getClobTypeDeclarationSQL($column);
    }

    /**
     * {@inheritDoc}
     *
     * @param mixed $value
     *
     * @return string|null
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (! is_array($value) || count($value) === 0) {
            return null;
        }

        return implode(',', $value);
    }

    /**
     * {@inheritDoc}
     *
     * @param mixed $value
     *
     * @return list<string>
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return [];
        }

        $value = is_resource($value) ? stream_get_contents($value) : $value;

        return explode(',', $value);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return Types::SIMPLE_ARRAY;
    }

    /**
     * {@inheritDoc}
     *
     * @deprecated
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        Deprecation::triggerIfCalledFromOutside(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/5509',
            '%s is deprecated.',
            __METHOD__,
        );

        return true;
    }
}
