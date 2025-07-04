<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Doctrine\DBAL\Event;

use Archetype\Vendor\Doctrine\Common\EventArgs;

/**
 * Base class for schema related events.
 *
 * @deprecated
 */
class SchemaEventArgs extends EventArgs
{
    private bool $preventDefault = false;

    /** @return SchemaEventArgs */
    public function preventDefault()
    {
        $this->preventDefault = true;

        return $this;
    }

    /** @return bool */
    public function isDefaultPrevented()
    {
        return $this->preventDefault;
    }
}
