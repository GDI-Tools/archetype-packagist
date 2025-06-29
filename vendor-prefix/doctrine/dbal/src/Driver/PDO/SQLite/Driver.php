<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Driver\PDO\SQLite;

use Archetype\Vendor\Doctrine\DBAL\Driver\AbstractSQLiteDriver;
use Archetype\Vendor\Doctrine\DBAL\Driver\API\SQLite\UserDefinedFunctions;
use Archetype\Vendor\Doctrine\DBAL\Driver\PDO\Connection;
use Archetype\Vendor\Doctrine\DBAL\Driver\PDO\Exception;
use Archetype\Vendor\Doctrine\Deprecations\Deprecation;
use PDO;
use PDOException;
use SensitiveParameter;

use function array_intersect_key;

final class Driver extends AbstractSQLiteDriver
{
    /**
     * {@inheritDoc}
     *
     * @return Connection
     */
    public function connect(
        #[SensitiveParameter]
        array $params
    ) {
        $driverOptions        = $params['driverOptions'] ?? [];
        $userDefinedFunctions = [];

        if (isset($driverOptions['userDefinedFunctions'])) {
            Deprecation::trigger(
                'doctrine/dbal',
                'https://github.com/doctrine/dbal/pull/5742',
                'The SQLite-specific driver option "userDefinedFunctions" is deprecated.'
                    . ' Register function directly on the native connection instead.',
            );

            $userDefinedFunctions = $driverOptions['userDefinedFunctions'];
            unset($driverOptions['userDefinedFunctions']);
        }

        try {
            $pdo = new PDO(
                $this->constructPdoDsn(array_intersect_key($params, ['path' => true, 'memory' => true])),
                $params['user'] ?? '',
                $params['password'] ?? '',
                $driverOptions,
            );
        } catch (PDOException $exception) {
            throw Exception::new($exception);
        }

        UserDefinedFunctions::register(
            [$pdo, 'sqliteCreateFunction'],
            $userDefinedFunctions,
        );

        return new Connection($pdo);
    }

    /**
     * Constructs the Sqlite PDO DSN.
     *
     * @param array<string, mixed> $params
     */
    private function constructPdoDsn(array $params): string
    {
        $dsn = 'sqlite:';
        if (isset($params['path'])) {
            $dsn .= $params['path'];
        } elseif (isset($params['memory'])) {
            $dsn .= ':memory:';
        }

        return $dsn;
    }
}
