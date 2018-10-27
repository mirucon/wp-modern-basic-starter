<?php
/**
 * Class file for Template_Header_Helper
 *
 * @package Modern_Basic
 */

namespace Modern_Basic\Inc\Template;

/**
 * Class Template_Header_Helper
 *
 * Helper functions for templating header.
 */
class Template_Header_Helper {

	/**
	 * Get <head> part.
	 *
	 * @return false|string
	 */
	public static function get_head_part() {
		ob_start();

		?>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php wp_head(); ?>

		<?php

		return ob_get_clean();
	}

	/**
	 * Get skip link for accessibility.
	 *
	 * @return false|string
	 */
	public static function get_skip_link() {
		ob_start();

		?>

		<a class="skip-link screen-reader-text noscroll" href="#content">
			<?php esc_html_e( 'Skip to content', 'modern-basic' ); ?>
		</a>

		<?php

		return ob_get_clean();
	}

	/**
	 * Get site title with custom HTML.
	 *
	 * @return string
	 */
	protected static function get_site_title(): string {
		$hide_title = false;

		$html = '<a href="' . esc_url( home_url() )
				. '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '">';

		if ( has_custom_logo() ) {
			$image      = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
			$html      .= '<div class="site__logo">';
			$html      .= '<img src="' . esc_url( $image[0] )
							. '" width="' . absint( $image[1] )
							. '" height="' . absint( $image[2] )
							. '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" />'; // Empty alt attribute because it's inside block-level link.
			$html      .= '</div>';
			$hide_title = true; // Make the site title to only visible to screen readers.
		}

		if ( is_front_page() ) {
			$title_el = 'h1';
		} else {
			$title_el = 'h2';
		}
		$title_classes = $hide_title ? ' screen-reader-text' : '';

		$html .= "<${title_el} class=\"site__title" . $title_classes . '">'
				. esc_html( get_bloginfo( 'name' ) )
				. "</${title_el}>";

		$html .= '</a>';

		return $html;
	}

	/**
	 * Get site description with custom HTML.
	 *
	 * @return false|string
	 */
	protected static function get_site_description() {
		ob_start();

		?>

		<p class="site__description">
			<?php bloginfo( 'description' ); ?>
		</p>

		<?php

		return ob_get_clean();
	}

	/**
	 * Get header part.
	 *
	 * @return false|string
	 */
	public static function get_header_part() {
		ob_start();

		?>

		<header id="header" class="header" role="banner">

			<div class="header__container container">

				<div class="site__info">

					<?php echo static::get_site_title(); // WPCS: XSS OK. ?>

					<?php echo static::get_site_description(); // WPCS: XSS OK. ?>

				</div>

			</div>

		</header>

		<?php

		return ob_get_clean();
	}
}
