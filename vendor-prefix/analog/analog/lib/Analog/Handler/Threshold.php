<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Analog\Handler;

/**
 * Only writes log messages above a certain threshold
 *
 *
 * Usage:
 *
 *     Analog::handler (Archetype\Vendor\Analog\Handler\Threshold::init (
 *         Analog\Handler\File::init ($file),
 *         Analog::ERROR
 *     ));
 *     
 *     // Only message three will be logged
 *     Analog::log ('Message one', Analog::DEBUG);
 *     Analog::log ('Message two', Analog::WARNING);
 *     Analog::log ('Message three', Analog::URGENT);
 *
 * Note: Uses Analog::$format to format the messages as they're appended
 * to the buffer.
 */
class Threshold {

	/**
	 * Accepts another handler function to be used on close().
	 * $until_level defaults to ERROR.
	 */
	public static function init ($handler, $until_level = 3) {
		return new Threshold ($handler, $until_level);
	}

	/**
	 * For use as a class instance
	 */
	private $_handler;
	private $_until_level = 3;

	public function __construct ($handler, $until_level = 3) {
		$this->_handler = $handler;
		$this->_until_level = $until_level;
	}

	public function log ($info) {
		if ($info['level'] <= $this->_until_level) {
			call_user_func ($this->_handler, $info);
		}
	}
}