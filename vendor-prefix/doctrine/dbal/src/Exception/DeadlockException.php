<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Exception;

/**
 * Exception for a deadlock error of a transaction detected in the driver.
 */
class DeadlockException extends ServerException implements RetryableException
{
}
