<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL;

/**
 * Legacy Class that keeps BC for using the legacy APIs fetch()/fetchAll().
 *
 * @deprecated Use the dedicated fetch*() methods for the desired fetch mode instead.
 */
class FetchMode
{
    /** @link PDO::FETCH_ASSOC */
    public const ASSOCIATIVE = 2;

    /** @link PDO::FETCH_NUM */
    public const NUMERIC = 3;

    /** @link PDO::FETCH_COLUMN */
    public const COLUMN = 7;
}
