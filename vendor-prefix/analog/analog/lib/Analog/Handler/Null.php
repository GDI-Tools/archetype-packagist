<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Analog\Handler;

/**
 * Note: Deprecated because Null is a reserved word in PHP7.
 * Please use Archetype\Vendor\Analog\Handler\Ignore instead.
 *
 * Ignores anything sent to it so you can disable logging.
 *
 * Usage:
 *
 *     Analog::handler (Archetype\Vendor\Analog\Handler\Null::init ());
 *     
 *     Analog::log ('Log me');
 */
class Null {
	public static function init () {
		return function ($info) {
			// do nothing
		};
	}
}