<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Contracts\Support;

interface MessageProvider
{
    /**
     * Get the messages for the instance.
     *
     * @return \Archetype\Vendor\Illuminate\Contracts\Support\MessageBag
     */
    public function getMessageBag();
}
