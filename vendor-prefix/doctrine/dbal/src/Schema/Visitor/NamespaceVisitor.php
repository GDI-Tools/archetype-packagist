<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Schema\Visitor;

/**
 * Visitor that can visit schema namespaces.
 *
 * @deprecated
 */
interface NamespaceVisitor
{
    /**
     * Accepts a schema namespace name.
     *
     * @param string $namespaceName The schema namespace name to accept.
     *
     * @return void
     */
    public function acceptNamespace($namespaceName);
}
