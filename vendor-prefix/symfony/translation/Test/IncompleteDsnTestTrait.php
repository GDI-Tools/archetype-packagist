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

namespace Archetype\Vendor\Symfony\Component\Translation\Test;

use PHPUnit\Framework\Attributes\DataProvider;
use Archetype\Vendor\Symfony\Component\Translation\Exception\IncompleteDsnException;
use Archetype\Vendor\Symfony\Component\Translation\Provider\Dsn;

trait IncompleteDsnTestTrait
{
    /**
     * @return iterable<array{0: string, 1?: string|null}>
     */
    abstract public static function incompleteDsnProvider(): iterable;

    /**
     * @dataProvider incompleteDsnProvider
     */
    #[DataProvider('incompleteDsnProvider')]
    public function testIncompleteDsnException(string $dsn, ?string $message = null)
    {
        $factory = $this->createFactory();

        $dsn = new Dsn($dsn);

        $this->expectException(IncompleteDsnException::class);
        if (null !== $message) {
            $this->expectExceptionMessage($message);
        }

        $factory->create($dsn);
    }
}
