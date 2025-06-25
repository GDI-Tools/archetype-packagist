<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Exception;

use InvalidArgumentException;

class MalformedDsnException extends InvalidArgumentException
{
    public static function new(): self
    {
        return new self('Malformed database connection URL');
    }
}
