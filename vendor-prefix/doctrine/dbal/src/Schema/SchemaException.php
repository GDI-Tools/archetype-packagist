<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Schema;

use Archetype\Vendor\Doctrine\DBAL\Exception;
use Archetype\Vendor\Doctrine\DBAL\Schema\Exception\ColumnAlreadyExists;
use Archetype\Vendor\Doctrine\DBAL\Schema\Exception\ColumnDoesNotExist;
use Archetype\Vendor\Doctrine\DBAL\Schema\Exception\ForeignKeyDoesNotExist;
use Archetype\Vendor\Doctrine\DBAL\Schema\Exception\IndexAlreadyExists;
use Archetype\Vendor\Doctrine\DBAL\Schema\Exception\IndexDoesNotExist;
use Archetype\Vendor\Doctrine\DBAL\Schema\Exception\IndexNameInvalid;
use Archetype\Vendor\Doctrine\DBAL\Schema\Exception\NamedForeignKeyRequired;
use Archetype\Vendor\Doctrine\DBAL\Schema\Exception\NamespaceAlreadyExists;
use Archetype\Vendor\Doctrine\DBAL\Schema\Exception\SequenceAlreadyExists;
use Archetype\Vendor\Doctrine\DBAL\Schema\Exception\SequenceDoesNotExist;
use Archetype\Vendor\Doctrine\DBAL\Schema\Exception\TableAlreadyExists;
use Archetype\Vendor\Doctrine\DBAL\Schema\Exception\TableDoesNotExist;
use Archetype\Vendor\Doctrine\DBAL\Schema\Exception\UniqueConstraintDoesNotExist;

use function sprintf;

class SchemaException extends Exception
{
    /** @deprecated Use {@see TableDoesNotExist} instead. */
    public const TABLE_DOESNT_EXIST = 10;

    /** @deprecated Use {@see TableAlreadyExists} instead. */
    public const TABLE_ALREADY_EXISTS = 20;

    /** @deprecated Use {@see ColumnDoesNotExist} instead. */
    public const COLUMN_DOESNT_EXIST = 30;

    /** @deprecated Use {@see ColumnAlreadyExists} instead. */
    public const COLUMN_ALREADY_EXISTS = 40;

    /** @deprecated Use {@see IndexDoesNotExist} instead. */
    public const INDEX_DOESNT_EXIST = 50;

    /** @deprecated Use {@see IndexAlreadyExists} instead. */
    public const INDEX_ALREADY_EXISTS = 60;

    /** @deprecated Use {@see SequenceDoesNotExist} instead. */
    public const SEQUENCE_DOENST_EXIST = 70;

    /** @deprecated Use {@see SequenceAlreadyExists} instead. */
    public const SEQUENCE_ALREADY_EXISTS = 80;

    /** @deprecated Use {@see IndexNameInvalid} instead. */
    public const INDEX_INVALID_NAME = 90;

    /** @deprecated Use {@see ForeignKeyDoesNotExist} instead. */
    public const FOREIGNKEY_DOESNT_EXIST = 100;

    /** @deprecated Use {@see UniqueConstraintDoesNotExist} instead. */
    public const CONSTRAINT_DOESNT_EXIST = 110;

    /** @deprecated Use {@see NamespaceAlreadyExists} instead. */
    public const NAMESPACE_ALREADY_EXISTS = 120;

    /**
     * @param string $tableName
     *
     * @return SchemaException
     */
    public static function tableDoesNotExist($tableName)
    {
        return TableDoesNotExist::new($tableName);
    }

    /**
     * @param string $indexName
     *
     * @return SchemaException
     */
    public static function indexNameInvalid($indexName)
    {
        return IndexNameInvalid::new($indexName);
    }

    /**
     * @param string $indexName
     * @param string $table
     *
     * @return SchemaException
     */
    public static function indexDoesNotExist($indexName, $table)
    {
        return IndexDoesNotExist::new($indexName, $table);
    }

    /**
     * @param string $indexName
     * @param string $table
     *
     * @return SchemaException
     */
    public static function indexAlreadyExists($indexName, $table)
    {
        return IndexAlreadyExists::new($indexName, $table);
    }

    /**
     * @param string $columnName
     * @param string $table
     *
     * @return SchemaException
     */
    public static function columnDoesNotExist($columnName, $table)
    {
        return ColumnDoesNotExist::new($columnName, $table);
    }

    /**
     * @param string $namespaceName
     *
     * @return SchemaException
     */
    public static function namespaceAlreadyExists($namespaceName)
    {
        return NamespaceAlreadyExists::new($namespaceName);
    }

    /**
     * @param string $tableName
     *
     * @return SchemaException
     */
    public static function tableAlreadyExists($tableName)
    {
        return TableAlreadyExists::new($tableName);
    }

    /**
     * @param string $tableName
     * @param string $columnName
     *
     * @return SchemaException
     */
    public static function columnAlreadyExists($tableName, $columnName)
    {
        return ColumnAlreadyExists::new($tableName, $columnName);
    }

    /**
     * @param string $name
     *
     * @return SchemaException
     */
    public static function sequenceAlreadyExists($name)
    {
        return SequenceAlreadyExists::new($name);
    }

    /**
     * @param string $name
     *
     * @return SchemaException
     */
    public static function sequenceDoesNotExist($name)
    {
        return SequenceDoesNotExist::new($name);
    }

    /**
     * @param string $constraintName
     * @param string $table
     *
     * @return SchemaException
     */
    public static function uniqueConstraintDoesNotExist($constraintName, $table)
    {
        return UniqueConstraintDoesNotExist::new($constraintName, $table);
    }

    /**
     * @param string $fkName
     * @param string $table
     *
     * @return SchemaException
     */
    public static function foreignKeyDoesNotExist($fkName, $table)
    {
        return ForeignKeyDoesNotExist::new($fkName, $table);
    }

    /** @return SchemaException */
    public static function namedForeignKeyRequired(Table $localTable, ForeignKeyConstraint $foreignKey)
    {
        return NamedForeignKeyRequired::new($localTable, $foreignKey);
    }

    /**
     * @param string $changeName
     *
     * @return SchemaException
     */
    public static function alterTableChangeNotSupported($changeName)
    {
        return new self(
            sprintf("Alter table change not supported, given '%s'", $changeName),
        );
    }
}
