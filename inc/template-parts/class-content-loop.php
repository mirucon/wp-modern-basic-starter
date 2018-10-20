<?php
/**
 * Class file for Content_Loop.
 *
 * @package Modern_Basic
 */

namespace Modern_Basic\Inc\Template_Parts;

use Modern_Basic\Inc\Template\Template_Helper;

/**
 * Class Content_Loop
 *
 * @package Modern_Basic
 */
class Content_Loop {

	/**
	 * The HTML content of view part.
	 *
	 * @var string $view .
	 */
	protected static $view;

	/**
	 * View part of Content_Loop.
	 */
	public static function view() {
		ob_start();

		?>

		<article id="post_<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="post__header">
				<?php
				echo Template_Helper::get_post_title( 'h2' ); // WPCS: XSS OK.
				echo Template_Helper::get_post_category( ' / ' ); // WPCS: XSS OK.
				echo Template_Helper::get_comment_count(); // WPCS:XSS OK.
				?>
			</header>

		</article>

		<?php

		self::$view = ob_get_clean();

		return self::$view;
	}
}
