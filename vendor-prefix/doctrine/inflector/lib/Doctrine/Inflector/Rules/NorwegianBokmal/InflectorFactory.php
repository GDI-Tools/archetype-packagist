<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\Inflector\Rules\NorwegianBokmal;

use Archetype\Vendor\Doctrine\Inflector\GenericLanguageInflectorFactory;
use Archetype\Vendor\Doctrine\Inflector\Rules\Ruleset;

final class InflectorFactory extends GenericLanguageInflectorFactory
{
    protected function getSingularRuleset(): Ruleset
    {
        return Rules::getSingularRuleset();
    }

    protected function getPluralRuleset(): Ruleset
    {
        return Rules::getPluralRuleset();
    }
}
