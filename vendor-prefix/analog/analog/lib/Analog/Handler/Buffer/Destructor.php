<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Analog\Handler\Buffer;

/**
 * A destructor object to call close() for us at the end of the request.
 */
class Destructor {
	public function __destruct () {
		\Archetype\Vendor\Analog\Handler\Buffer::close ();
	}
}