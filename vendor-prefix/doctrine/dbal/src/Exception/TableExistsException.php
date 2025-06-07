<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Exception;

/**
 * Exception for an already existing table referenced in a statement detected in the driver.
 */
class TableExistsException extends DatabaseObjectExistsException
{
}
