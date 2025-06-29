<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Driver\PDO;

use Archetype\Vendor\Doctrine\DBAL\Driver\Exception\UnknownParameterType;
use Archetype\Vendor\Doctrine\DBAL\ParameterType;
use PDO;

/** @internal */
final class ParameterTypeMap
{
    private const PARAM_TYPE_MAP = [
        ParameterType::NULL => PDO::PARAM_NULL,
        ParameterType::INTEGER => PDO::PARAM_INT,
        ParameterType::STRING => PDO::PARAM_STR,
        ParameterType::ASCII => PDO::PARAM_STR,
        ParameterType::BINARY => PDO::PARAM_LOB,
        ParameterType::LARGE_OBJECT => PDO::PARAM_LOB,
        ParameterType::BOOLEAN => PDO::PARAM_BOOL,
    ];

    /**
     * Converts DBAL parameter type to PDO parameter type
     *
     * @phpstan-return PDO::PARAM_*
     *
     * @throws UnknownParameterType
     *
     * @phpstan-assert ParameterType::* $type
     */
    public static function convertParamType(int $type): int
    {
        if (! isset(self::PARAM_TYPE_MAP[$type])) {
            throw UnknownParameterType::new($type);
        }

        return self::PARAM_TYPE_MAP[$type];
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }
}
