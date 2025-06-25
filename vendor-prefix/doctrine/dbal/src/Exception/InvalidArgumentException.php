<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Exception;

use Archetype\Vendor\Doctrine\DBAL\Exception;

/**
 * Exception to be thrown when invalid arguments are passed to any DBAL API
 */
class InvalidArgumentException extends Exception
{
    /** @return self */
    public static function fromEmptyCriteria()
    {
        return new self('Empty criteria was used, expected non-empty criteria');
    }
}
