<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Exception;

use Throwable;

/**
 * Marker interface for all exceptions where retrying the transaction makes sense.
 */
interface RetryableException extends Throwable
{
}
