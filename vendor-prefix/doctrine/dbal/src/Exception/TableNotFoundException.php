<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Exception;

/**
 * Exception for an unknown table referenced in a statement detected in the driver.
 */
class TableNotFoundException extends DatabaseObjectNotFoundException
{
}
