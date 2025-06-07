<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Migrations;

enum MigrationResult: int
{
    case Success = 1;
    case Failure = 2;
    case Skipped = 3;
}
