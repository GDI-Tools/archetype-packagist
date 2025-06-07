<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Database;

use RuntimeException;

class ClassMorphViolationException extends RuntimeException
{
    /**
     * The name of the affected Eloquent model.
     *
     * @var string
     */
    public $model;

    /**
     * Create a new exception instance.
     *
     * @param  object  $model
     */
    public function __construct($model)
    {
        $class = get_class($model);

        parent::__construct("No morph map defined for model [{$class}].");

        $this->model = $class;
    }
}
