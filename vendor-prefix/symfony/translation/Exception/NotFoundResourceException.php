<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Symfony\Component\Translation\Exception;

/**
 * Thrown when a resource does not exist.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class NotFoundResourceException extends \InvalidArgumentException implements ExceptionInterface
{
}
