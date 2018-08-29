<?php
/**
 * The theme definitions.
 *
 * @package Modern_Basic
 */

/**
 * Enqueue theme styles and scripts
 *
 * @since 0.1.0
 **/
add_action(
	'wp_enqueue_scripts', function() {
		wp_enqueue_style( 'theme-style', get_theme_file_uri( 'assets/css/style.min.css' ), [], '0.1.0' );
		wp_enqueue_script( 'theme-script', get_theme_file_uri( 'assets/js/min/scripts.js' ), [], '0.1.0', false );
	}
);


/**
 * Add `defer` to the enqueued scripts.
 *
 * @since 0.1.0
 *
 * @param string $tag Tag name.
 * @param string $handle Handle name.
 * @return string
 */
add_filter(
	'script_loader_tag', function( $tag, $handle ) {
		$scripts_to_defer = [ 'theme-script' ];
		foreach ( $scripts_to_defer as $defer_script ) {
			if ( $defer_script === $handle ) {
				return str_replace( ' src', ' defer src', $tag );
			}
		}
		return $tag;
	}, 10, 2
);
