<?php

/**
 * Register a very simple autoloader for the pre-built handlers
 * based on the current working directory.
 *
 * @license MIT
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */
spl_autoload_register (function ($class) {
	$file = str_replace ('\\', DIRECTORY_SEPARATOR, ltrim ($class, '\\')) . '.php';
	if (file_exists (__DIR__ . DIRECTORY_SEPARATOR . $file)) {
		require_once $file;
		return true;
	}
	return false;
});

/**
 * We simply alias extend the main class so that Analog is
 * available as a global class. This saves us adding
 * `use \Archetype\Vendor\Analog\Analog` at the top of every file,
 * or worse, typeing `\Analog\Analog::log()` everywhere.
 */
class_alias ('\Archetype\Vendor\Analog\Analog', 'Archetype\Vendor\Analog');