<?php
/**
 * Class file for Template_Meta.
 *
 * @package Modern_Basic
 */

namespace Modern_Basic\Inc\Template;

/**
 * Meta things for templating.
 *
 * @package Modern_Basic
 */
class Template_Meta {

	/**
	 * Template_Meta constructor.
	 */
	public function __construct() {
		add_filter( 'post_class', [ $this, 'custom_post_class' ] );
	}

	/**
	 * Add `post_container` to post classes.
	 *
	 * @param array $classes Post classes.
	 *
	 * @return array
	 */
	public function custom_post_class( array $classes ): array {
		$classes[] = 'post__container';

		return $classes;
	}
}
