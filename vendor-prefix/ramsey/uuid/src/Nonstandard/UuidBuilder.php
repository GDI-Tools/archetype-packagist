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

namespace Archetype\Vendor\Ramsey\Uuid\Nonstandard;

use Archetype\Vendor\Ramsey\Uuid\Builder\UuidBuilderInterface;
use Archetype\Vendor\Ramsey\Uuid\Codec\CodecInterface;
use Archetype\Vendor\Ramsey\Uuid\Converter\NumberConverterInterface;
use Archetype\Vendor\Ramsey\Uuid\Converter\TimeConverterInterface;
use Archetype\Vendor\Ramsey\Uuid\Exception\UnableToBuildUuidException;
use Archetype\Vendor\Ramsey\Uuid\UuidInterface;
use Throwable;

/**
 * Nonstandard\UuidBuilder builds instances of Nonstandard\Uuid
 *
 * @immutable
 */
class UuidBuilder implements UuidBuilderInterface
{
    /**
     * @param NumberConverterInterface $numberConverter The number converter to use when constructing the Nonstandard\Uuid
     * @param TimeConverterInterface $timeConverter The time converter to use for converting timestamps extracted from a
     *     UUID to Unix timestamps
     */
    public function __construct(
        private NumberConverterInterface $numberConverter,
        private TimeConverterInterface $timeConverter,
    ) {
    }

    /**
     * Builds and returns a Nonstandard\Uuid
     *
     * @param CodecInterface $codec The codec to use for building this instance
     * @param string $bytes The byte string from which to construct a UUID
     *
     * @return Uuid The Nonstandard\UuidBuilder returns an instance of Nonstandard\Uuid
     */
    public function build(CodecInterface $codec, string $bytes): UuidInterface
    {
        try {
            return new Uuid($this->buildFields($bytes), $this->numberConverter, $codec, $this->timeConverter);
        } catch (Throwable $e) {
            throw new UnableToBuildUuidException($e->getMessage(), (int) $e->getCode(), $e);
        }
    }

    /**
     * Proxy method to allow injecting a mock for testing
     */
    protected function buildFields(string $bytes): Fields
    {
        return new Fields($bytes);
    }
}
