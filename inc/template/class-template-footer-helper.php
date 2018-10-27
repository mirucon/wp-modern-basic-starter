<?php
/**
 * Class file for Template_Footer_Helper
 *
 * @package Modern_Basic
 */

namespace Modern_Basic\Inc\Template;

/**
 * Class Template_Footer_Helper
 */
class Template_Footer_Helper {

	/**
	 * Get footer copyright
	 *
	 * @return false|string
	 */
	protected static function get_footer_copyright() {
		ob_start();

		?>

		<div class="copyright copyright--footer">

			<?php
			printf(
				/* Translators: Footer copyright text. 1: Current year, 2: Site name. */
				esc_html__( '© %1$s %2$s', 'modern-basic' ),
				date( 'Y' ),
				get_bloginfo( 'name' )
			); // WPCS: XSS OK.
			?>

		</div>

		<?php

		return ob_get_clean();
	}

	/**
	 * Get footer part.
	 *
	 * @return false|string
	 */
	public static function get_footer_part() {
		ob_start();

		?>

		<footer id="footer" class="footer" role="contentinfo">

			<div class="footer__container container">

				<?php echo static::get_footer_copyright(); // WPCS: XSS OK. ?>

			</div>

		</footer>

		<?php

		return ob_get_clean();
	}
}
