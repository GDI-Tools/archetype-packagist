<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\SQL\Builder;

use Archetype\Vendor\Doctrine\DBAL\Exception;
use Archetype\Vendor\Doctrine\DBAL\Platforms\AbstractPlatform;
use Archetype\Vendor\Doctrine\DBAL\Schema\Schema;
use Archetype\Vendor\Doctrine\DBAL\Schema\Sequence;
use Archetype\Vendor\Doctrine\DBAL\Schema\Table;

use function array_merge;

final class CreateSchemaObjectsSQLBuilder
{
    private AbstractPlatform $platform;

    public function __construct(AbstractPlatform $platform)
    {
        $this->platform = $platform;
    }

    /**
     * @return list<string>
     *
     * @throws Exception
     */
    public function buildSQL(Schema $schema): array
    {
        return array_merge(
            $this->buildNamespaceStatements($schema->getNamespaces()),
            $this->buildSequenceStatements($schema->getSequences()),
            $this->buildTableStatements($schema->getTables()),
        );
    }

    /**
     * @param string[] $namespaces
     *
     * @return list<string>
     *
     * @throws Exception
     */
    private function buildNamespaceStatements(array $namespaces): array
    {
        $statements = [];

        if ($this->platform->supportsSchemas()) {
            foreach ($namespaces as $namespace) {
                $statements[] = $this->platform->getCreateSchemaSQL($namespace);
            }
        }

        return $statements;
    }

    /**
     * @param Table[] $tables
     *
     * @return list<string>
     *
     * @throws Exception
     */
    private function buildTableStatements(array $tables): array
    {
        return $this->platform->getCreateTablesSQL($tables);
    }

    /**
     * @param Sequence[] $sequences
     *
     * @return list<string>
     *
     * @throws Exception
     */
    private function buildSequenceStatements(array $sequences): array
    {
        $statements = [];

        foreach ($sequences as $sequence) {
            $statements[] = $this->platform->getCreateSequenceSQL($sequence);
        }

        return $statements;
    }
}
