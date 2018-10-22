<?php
/**
 * Class file for Init_Theme.
 *
 * @package Modern_Basic
 */

namespace Modern_Basic\Inc\Core;

require_once get_theme_file_path( 'inc/core/class-autoloader.php' );

/**
 * Class Init_Theme
 *
 * @package Modern_Basic
 */
class Init_Theme {

	/**
	 * Initializes theme.
	 */
	public static function init_theme(): void {
		Autoloader::autoload();
		Autoloader::load_autoloader();
	}
}
