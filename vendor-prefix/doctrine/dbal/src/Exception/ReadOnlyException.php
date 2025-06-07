<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Exception;

/**
 * Exception for a write operation attempt on a read-only database element detected in the driver.
 */
class ReadOnlyException extends ServerException
{
}
