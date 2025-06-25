<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Types;

use Archetype\Vendor\Doctrine\DBAL\Platforms\AbstractPlatform;

use function is_resource;
use function stream_get_contents;

/**
 * Type that maps an SQL CLOB to a PHP string.
 */
class TextType extends Type
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
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return is_resource($value) ? stream_get_contents($value) : $value;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return Types::TEXT;
    }
}
