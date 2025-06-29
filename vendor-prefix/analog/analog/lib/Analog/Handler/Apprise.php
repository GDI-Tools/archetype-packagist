<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Analog\Handler;

/**
 * Send the output to the apprise command line tool (https://github.com/caronc/apprise).
 *
 * Usage:
 *
 *     $command = '/usr/local/bin/apprise';
 *     $service = 'slack://tokenA/tokenB/tokenC/#slack-channel';
 *     Analog::handler (Archetype\Vendor\Analog\Handler\Apprise::init ($command, $service));
 *     
 *     Analog::log ('Log me');
 *
 * Notes:
 *
 * - $service may also be an array of services.
 * - Uses Analog::$format for the appending format.
 */
class Apprise {
	public static function init ($command, $service) {
		return function ($info) use ($command, $service) {
			if (is_array ($service)) {
				$service = array_map ('escapeshellarg', $service);
				$service = join (' ', $service);
			} else {
				$service = escapeshellarg ($service);
			}

			exec (
				sprintf ('%s -b %s %s',
					$command,
					escapeshellarg (vsprintf (\Archetype\Vendor\Analog\Analog::$format, $info)),
					$service
				)
			);
		};
	}
}