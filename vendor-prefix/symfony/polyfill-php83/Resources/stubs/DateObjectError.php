<?php

namespace Archetype\Vendor;

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
if (\PHP_VERSION_ID < 80300) {
    class DateObjectError extends \DateError
    {
    }
    \class_alias('Archetype\Vendor\DateObjectError', 'DateObjectError', \false);
}
