<?php
/**
 * Initializes theme. No more. No less.
 *
 * @package Modern_Basic
 */

namespace Modern_Basic\Functions {

	require_once get_theme_file_path( 'inc/core/class-init-theme.php' );

	use Modern_Basic\Inc\Core\Init_Theme;

	Init_Theme::init_theme();
}
