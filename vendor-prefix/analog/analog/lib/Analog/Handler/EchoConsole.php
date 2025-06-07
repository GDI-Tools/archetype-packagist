<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Analog\Handler;

/**
 * Echo output directly to the console.
 *
 * Usage:
 *
 *     Analog::handler (Archetype\Vendor\Analog\Handler\EchoConsole::init ());
 *     
 *     Analog::log ('Log me');
 *
 * Note: Uses Analog::$format for the output format.
 */
class EchoConsole {
	public static function init () {
		return function ($info) {
			vprintf (\Archetype\Vendor\Analog\Analog::$format, $info);
		};
	}
}
