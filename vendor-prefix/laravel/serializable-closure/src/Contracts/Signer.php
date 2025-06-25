<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Laravel\SerializableClosure\Contracts;

interface Signer
{
    /**
     * Sign the given serializable.
     *
     * @param  string  $serializable
     * @return array
     */
    public function sign($serializable);

    /**
     * Verify the given signature.
     *
     * @param  array  $signature
     * @return bool
     */
    public function verify($signature);
}
