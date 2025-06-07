<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Analog\Handler;

/**
 * Store the log message in the specified key in a Redis database.
 * Uses the RPUSH command to store a list of elements in a single key.
 * Supports both the PHP Redis extension and Predis\Client clients.
 *
 * Usage:
 *
 *     $redis = new Redis ();
 *     $redis->connect ('localhost', '6379');
 *     $key = 'logs';
 *     Analog::handler (Archetype\Vendor\Analog\Handler\Redis::init ($redis, $key));
 */
class Redis {
	public static function init ($redis, $key) {
		return function ($info) use ($redis, $key) {
			$redis->rpush ($key, trim (vsprintf (\Archetype\Vendor\Analog\Analog::$format, $info)));
		};
	}
}