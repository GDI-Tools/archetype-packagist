<?php

/**
 * This file is part of the ramsey/uuid library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Ramsey\Uuid\Converter\Time;

use Archetype\Vendor\Ramsey\Uuid\Converter\TimeConverterInterface;
use Archetype\Vendor\Ramsey\Uuid\Math\CalculatorInterface;
use Archetype\Vendor\Ramsey\Uuid\Math\RoundingMode;
use Archetype\Vendor\Ramsey\Uuid\Type\Hexadecimal;
use Archetype\Vendor\Ramsey\Uuid\Type\Integer as IntegerObject;
use Archetype\Vendor\Ramsey\Uuid\Type\Time;

use function explode;
use function str_pad;

use const STR_PAD_LEFT;

/**
 * UnixTimeConverter converts Unix Epoch timestamps to/from hexadecimal values consisting of milliseconds elapsed since
 * the Unix Epoch
 *
 * @immutable
 */
class UnixTimeConverter implements TimeConverterInterface
{
    private const MILLISECONDS = 1000;

    public function __construct(private CalculatorInterface $calculator)
    {
    }

    public function calculateTime(string $seconds, string $microseconds): Hexadecimal
    {
        $timestamp = new Time($seconds, $microseconds);

        // Convert the seconds into milliseconds.
        $sec = $this->calculator->multiply($timestamp->getSeconds(), new IntegerObject(self::MILLISECONDS));

        // Convert the microseconds into milliseconds; the scale is zero because we need to discard the fractional part.
        $usec = $this->calculator->divide(
            RoundingMode::DOWN, // Always round down to stay in the previous millisecond.
            0,
            $timestamp->getMicroseconds(),
            new IntegerObject(self::MILLISECONDS),
        );

        /** @var IntegerObject $unixTime */
        $unixTime = $this->calculator->add($sec, $usec);

        return new Hexadecimal(str_pad($this->calculator->toHexadecimal($unixTime)->toString(), 12, '0', STR_PAD_LEFT));
    }

    public function convertTime(Hexadecimal $uuidTimestamp): Time
    {
        $milliseconds = $this->calculator->toInteger($uuidTimestamp);

        $unixTimestamp = $this->calculator->divide(
            RoundingMode::HALF_UP,
            6,
            $milliseconds,
            new IntegerObject(self::MILLISECONDS),
        );

        $split = explode('.', (string) $unixTimestamp, 2);

        return new Time($split[0], $split[1] ?? '0');
    }
}
