<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Analog\Handler;

/**
 * Sends messages to one or more of the other handlers based on its
 * log level.
 *
 * Usage:
 *
 *		Analog::handler( Archetype\Vendor\Analog\Handler\Multi::init( array(
 *			// anything error or worse goes to this
 *			Analog::ERROR => array(
 *				Analog\Handler\Mail::init( $to, $subject, $from ),
 *				Analog\Handler\Stderr::init()
 *			),
 *
 *			// Warnings are sent here
 *			Analog::WARNING => Archetype\Vendor\Analog\Handler\File::init( 'logs/warnings.log' ),
 *
 *			// Debug and info messages sent here
 *			Analog::DEBUG   => Archetype\Vendor\Analog\Handler\Ignore::init() // do nothing
 *		) ) );
 *     
 *     // will be ignored
 *     Analog::log ('Ignore me', Analog::DEBUG);
 *
 *     // will be written to logs/warnings.log
 *     Analog::log ('Log me', Analog::WARNING);
 *
 *     // will trigger an email notice
 *     Analog::log ('Uh oh...', Analog::ERROR);
 */
class Multi {
	public static function init ($handlers) {
		return new Multi ($handlers);
	}

	/**
	 * For use as a class instance
	 */
	private $_handlers;

	public function __construct ($handlers) {
		$this->_handlers = $handlers;
	}

	public function log ($info) {
		$level = is_numeric ($info['level']) ? $info['level'] : 3;
		while ($level <= 7) {
			if (isset ($this->_handlers[$level])) {
				if (! is_array ($this->_handlers[$level])) {
					$this->_handlers[$level] = array ($this->_handlers[$level]);
				}

				foreach ($this->_handlers[$level] as $handler) {
					$handler ($info);
				}
			}
			$level++;
		}
	}
}