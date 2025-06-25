<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Types;

use Archetype\Vendor\Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * Type that maps an SQL VARCHAR to a PHP string.
 */
class StringType extends Type
{
    /**
     * {@inheritDoc}
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        return $platform->getStringTypeDeclarationSQL($column);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return Types::STRING;
    }
}
