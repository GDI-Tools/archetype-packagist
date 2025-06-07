<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Analog\Handler;

/**
 * Append the log info to a variable passed in as a reference.
 *
 * Usage:
 *
 *     $my_log = '';
 *     Analog::handler (Archetype\Vendor\Analog\Handler\Variable::init ($my_log));
 *     
 *     Analog::log ('Log me');
 *     echo $my_log;
 *
 * Note: Uses Analog::$format for the appending format.
 */
class Variable {
	public static function init (&$log) {
		return function ($info, $buffered = false) use (&$log) {
			$log .= ($buffered)
				? $info
				: vsprintf (\Archetype\Vendor\Analog\Analog::$format, $info);
		};
	}
}