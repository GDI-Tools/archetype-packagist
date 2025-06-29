<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Types;

use Archetype\Vendor\Doctrine\DBAL\Platforms\AbstractPlatform;

class FloatType extends Type
{
    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return Types::FLOAT;
    }

    /**
     * {@inheritDoc}
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        return $platform->getFloatDeclarationSQL($column);
    }

    /**
     * {@inheritDoc}
     *
     * @param T $value
     *
     * @return (T is null ? null : float)
     *
     * @template T
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return $value === null ? null : (float) $value;
    }
}
