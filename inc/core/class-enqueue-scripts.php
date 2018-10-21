<?php
/**
 * Class file for Enqueue_Scripts.
 *
 * @package Modern_Basic
 */

namespace Modern_Basic\Inc\Core;

/**
 * Class Enqueue_Scripts
 *
 * @package Modern_Basic
 */
class Enqueue_Scripts {

	/**
	 * Enqueue_Scripts constructor.
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_filter( 'script_loader_tag', [ $this, 'defer_scripts' ], 10, 2 );
	}

	/**
	 * Enqueue theme styles and scripts
	 *
	 * @since 0.1.0
	 **/
	public function enqueue_scripts(): void {
		wp_enqueue_style(
			'theme-style',
			get_theme_file_uri( 'public/css/style.css' ),
			[],
			'0.1.0'
		);
		wp_enqueue_script(
			'theme-script',
			get_theme_file_uri( 'public/js/script.js' ),
			[],
			'0.1.0',
			false
		);
	}

	/**
	 * Add `defer` to the enqueued scripts.
	 *
	 * @since 0.1.0
	 *
	 * @param string $tag    Tag name.
	 * @param string $handle Handle name.
	 *
	 * @return string
	 */
	public function defer_scripts( $tag, $handle ): string {
		$scripts_to_defer = [ 'theme-script' ];
		foreach ( $scripts_to_defer as $defer_script ) {
			if ( $defer_script === $handle ) {
				return str_replace( ' src', ' defer src', $tag );
			}
		}

		return $tag;
	}

}
