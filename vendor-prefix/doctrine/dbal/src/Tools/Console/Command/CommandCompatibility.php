<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Tools\Console\Command;

use ReflectionMethod;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

if ((new ReflectionMethod(Command::class, 'execute'))->hasReturnType()) {
    /** @internal */
    trait CommandCompatibility
    {
        protected function execute(InputInterface $input, OutputInterface $output): int
        {
            return $this->doExecute($input, $output);
        }
    }
} else {
    /** @internal */
    trait CommandCompatibility
    {
        /**
         * {@inheritDoc}
         *
         * @return int
         */
        protected function execute(InputInterface $input, OutputInterface $output)
        {
            return $this->doExecute($input, $output);
        }
    }
}
