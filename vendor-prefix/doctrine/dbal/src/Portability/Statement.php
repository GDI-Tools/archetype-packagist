<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Portability;

use Archetype\Vendor\Doctrine\DBAL\Driver\Middleware\AbstractStatementMiddleware;
use Archetype\Vendor\Doctrine\DBAL\Driver\Result as ResultInterface;
use Archetype\Vendor\Doctrine\DBAL\Driver\Statement as DriverStatement;

/**
 * Portability wrapper for a Statement.
 */
final class Statement extends AbstractStatementMiddleware
{
    private Converter $converter;

    /**
     * Wraps <tt>Statement</tt> and applies portability measures.
     */
    public function __construct(DriverStatement $stmt, Converter $converter)
    {
        parent::__construct($stmt);

        $this->converter = $converter;
    }

    /**
     * {@inheritDoc}
     */
    public function execute($params = null): ResultInterface
    {
        return new Result(
            parent::execute($params),
            $this->converter,
        );
    }
}
