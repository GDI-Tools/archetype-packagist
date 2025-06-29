<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Types;

use Archetype\Vendor\Doctrine\DBAL\Platforms\AbstractPlatform;
use Archetype\Vendor\Doctrine\Deprecations\Deprecation;

use function is_resource;
use function restore_error_handler;
use function serialize;
use function set_error_handler;
use function stream_get_contents;
use function unserialize;

use const E_DEPRECATED;
use const E_USER_DEPRECATED;

/**
 * Type that maps a PHP array to a clob SQL type.
 *
 * @deprecated Use {@link JsonType} instead.
 */
class ArrayType extends Type
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
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        // @todo 3.0 - $value === null check to save real NULL in database
        return serialize($value);
    }

    /**
     * {@inheritDoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return null;
        }

        $value = is_resource($value) ? stream_get_contents($value) : $value;

        set_error_handler(function (int $code, string $message): bool {
            if ($code === E_DEPRECATED || $code === E_USER_DEPRECATED) {
                return false;
            }

            throw ConversionException::conversionFailedUnserialization($this->getName(), $message);
        });

        try {
            return unserialize($value);
        } finally {
            restore_error_handler();
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return Types::ARRAY;
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
