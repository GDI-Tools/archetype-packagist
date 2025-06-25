<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Analog\Handler;

/**
 * Ignores anything sent to it so you can disable logging.
 *
 * Usage:
 *
 *     Analog::handler (Archetype\Vendor\Analog\Handler\Ignore::init ());
 *     
 *     Analog::log ('Log me');
 */
class Ignore {
	public static function init () {
		return function ($info) {
			// do nothing
		};
	}
}