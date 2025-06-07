<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Platforms\MySQL;

/** @internal */
interface CollationMetadataProvider
{
    public function getCollationCharset(string $collation): ?string;
}
