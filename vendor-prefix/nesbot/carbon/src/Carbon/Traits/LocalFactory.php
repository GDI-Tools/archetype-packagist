<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Archetype\Vendor\Carbon\Traits;

use Archetype\Vendor\Carbon\Factory;
use Archetype\Vendor\Carbon\FactoryImmutable;
use Archetype\Vendor\Carbon\WrapperClock;
use Closure;

/**
 * Remember the factory that was the current at the creation of the object.
 */
trait LocalFactory
{
    /**
     * The clock that generated the current instance (or FactoryImmutable::getDefaultInstance() if none)
     */
    private ?WrapperClock $clock = null;

    public function getClock(): ?WrapperClock
    {
        return $this->clock;
    }

    private function initLocalFactory(): void
    {
        $this->clock = FactoryImmutable::getCurrentClock();
    }

    /**
     * Trigger the given action using the local factory of the object, so it will be transmitted
     * to any object also using this trait and calling initLocalFactory() in its constructor.
     *
     * @template T
     *
     * @param Closure(): T $action
     *
     * @return T
     */
    private function transmitFactory(Closure $action): mixed
    {
        $previousClock = FactoryImmutable::getCurrentClock();
        FactoryImmutable::setCurrentClock($this->clock);

        try {
            return $action();
        } finally {
            FactoryImmutable::setCurrentClock($previousClock);
        }
    }

    private function getFactory(): Factory
    {
        return $this->getClock()?->getFactory() ?? FactoryImmutable::getDefaultInstance();
    }
}
