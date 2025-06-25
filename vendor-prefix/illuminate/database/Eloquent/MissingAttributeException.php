<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database\Eloquent;

use OutOfBoundsException;

class MissingAttributeException extends OutOfBoundsException
{
    /**
     * Create a new missing attribute exception instance.
     *
     * @param  \Archetype\Vendor\Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     */
    public function __construct($model, $key)
    {
        parent::__construct(sprintf(
            'The attribute [%s] either does not exist or was not retrieved for model [%s].',
            $key, get_class($model)
        ));
    }
}
