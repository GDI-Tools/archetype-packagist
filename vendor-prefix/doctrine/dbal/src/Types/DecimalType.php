<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Types;

use Archetype\Vendor\Doctrine\DBAL\Platforms\AbstractPlatform;
use Archetype\Vendor\Doctrine\DBAL\Platforms\SqlitePlatform;

use function is_float;
use function is_int;

use const PHP_VERSION_ID;

/**
 * Type that maps an SQL DECIMAL to a PHP string.
 */
class DecimalType extends Type
{
    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return Types::DECIMAL;
    }

    /**
     * {@inheritDoc}
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        return $platform->getDecimalTypeDeclarationSQL($column);
    }

    /**
     * {@inheritDoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        // Some drivers starting from PHP 8.1 can represent decimals as float/int
        // See also: https://github.com/doctrine/dbal/pull/4818
        if ((PHP_VERSION_ID >= 80100 || $platform instanceof SqlitePlatform) && (is_float($value) || is_int($value))) {
            return (string) $value;
        }

        return $value;
    }
}
