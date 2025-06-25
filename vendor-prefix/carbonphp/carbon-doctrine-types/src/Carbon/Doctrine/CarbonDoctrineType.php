<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Carbon\Doctrine;

use Archetype\Vendor\Doctrine\DBAL\Platforms\AbstractPlatform;

interface CarbonDoctrineType
{
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform);

    public function convertToPHPValue($value, AbstractPlatform $platform);

    public function convertToDatabaseValue($value, AbstractPlatform $platform);
}
