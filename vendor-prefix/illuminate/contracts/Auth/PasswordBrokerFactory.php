<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Contracts\Auth;

interface PasswordBrokerFactory
{
    /**
     * Get a password broker instance by name.
     *
     * @param  string|null  $name
     * @return \Archetype\Vendor\Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker($name = null);
}
