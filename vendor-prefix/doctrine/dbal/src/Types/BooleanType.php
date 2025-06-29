<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Types;

use Archetype\Vendor\Doctrine\DBAL\ParameterType;
use Archetype\Vendor\Doctrine\DBAL\Platforms\AbstractPlatform;
use Archetype\Vendor\Doctrine\DBAL\Platforms\DB2Platform;
use Archetype\Vendor\Doctrine\Deprecations\Deprecation;

/**
 * Type that maps an SQL boolean to a PHP boolean.
 */
class BooleanType extends Type
{
    /**
     * {@inheritDoc}
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        return $platform->getBooleanTypeDeclarationSQL($column);
    }

    /**
     * {@inheritDoc}
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $platform->convertBooleansToDatabaseValue($value);
    }

    /**
     * {@inheritDoc}
     *
     * @param T $value
     *
     * @return (T is null ? null : bool)
     *
     * @template T
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return $platform->convertFromBoolean($value);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return Types::BOOLEAN;
    }

    /**
     * {@inheritDoc}
     */
    public function getBindingType()
    {
        return ParameterType::BOOLEAN;
    }

    /**
     * @deprecated
     *
     * @return bool
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        Deprecation::triggerIfCalledFromOutside(
            'doctrine/dbal',
            'https://github.com/doctrine/dbal/pull/5509',
            '%s is deprecated.',
            __METHOD__,
        );

        // We require a commented boolean type in order to distinguish between
        // boolean and smallint as both (have to) map to the same native type.
        return $platform instanceof DB2Platform;
    }
}
