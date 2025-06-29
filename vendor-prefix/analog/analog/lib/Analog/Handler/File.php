<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Analog\Handler;

/**
 * Append to the specified log file. Does the same thing as the default
 * handling.
 *
 * Usage:
 *
 *     $log_file = 'log.txt';
 *     Analog::handler (Archetype\Vendor\Analog\Handler\File::init ($log_file));
 *     
 *     Analog::log ('Log me');
 *
 * Note: Uses Analog::$format for the appending format.
 */
class File {
	public static function init ($file) {
		return function ($info, $buffered = false) use ($file) {
			static $f = null;
			
			if ($f == null) {
				$f = fopen ($file, 'a+');
				
				if (! $f) {
					throw new \LogicException ('Could not open file for writing');
				}
				
				register_shutdown_function (function () use ($f) {
					if ($f != null) {
						fclose ($f);
						$f = null;
					}
				});
			}
	
			if (! flock ($f, LOCK_EX)) {
				throw new \RuntimeException ('Could not lock file');
			}
	
			fwrite ($f, ($buffered)
				? $info
				: vsprintf (\Archetype\Vendor\Analog\Analog::$format, $info));
			flock ($f, LOCK_UN);
		};
	}
}
