<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Analog\Handler;

/**
 * Send the output to STDERR.
 *
 * Usage:
 *
 *     Analog::handler (Archetype\Vendor\Analog\Handler\Stderr::init ());
 *     
 *     Analog::log ('Log me');
 *
 * Note: Uses Analog::$format for the appending format.
 */
class Stderr {
	public static function init () {
		return function ($info, $buffered = false) {
			file_put_contents ('php://stderr', ($buffered)
				? $info
				: vsprintf (\Archetype\Vendor\Analog\Analog::$format, $info));
		};
	}
}