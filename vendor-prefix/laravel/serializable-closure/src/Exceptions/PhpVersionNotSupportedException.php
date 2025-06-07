<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Laravel\SerializableClosure\Exceptions;

use Exception;

class PhpVersionNotSupportedException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @param  string  $message
     * @return void
     */
    public function __construct($message = 'PHP 7.3 is not supported.')
    {
        parent::__construct($message);
    }
}
