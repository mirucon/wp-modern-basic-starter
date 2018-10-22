<?php
/**
 * Class file for Template_Helper
 *
 * @package Modern_Basic
 */

namespace Modern_Basic\Inc\Template;

/**
 * Class Template_Helper
 *
 * Helper functions for templating
 */
class Template_Helper {

	/**
	 * Get post title with custom HTML.
	 *
	 * @param string $heading_tag The heading element name (such as h1, h2, etc...).
	 *
	 * @return false|string
	 */
	public static function get_post_title( $heading_tag ) {
		ob_start();

		?>

		<<?php echo esc_html( $heading_tag ); ?> class="post-title">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</<?php echo esc_html( $heading_tag ); ?>>

		<?php

		return ob_get_clean();
	}

	/**
	 * Get post category with custom HTML.
	 *
	 * @param string $separator Separator used in category.
	 *
	 * @return false|string
	 */
	public static function get_post_category( $separator ) {
		ob_start();

		?>

		<div class="post_category">
			<!--<span class="fas fa-folder" aria-hidden="true"></span>-->
			<span class="screen-reader-text">
			<?php
			esc_html_e(
				'Categories:',
				'modern-basic'
			);
			?>
					</span>
			<?php the_category( $separator ); ?>
		</div>

		<?php

		return ob_get_clean();
	}

	/**
	 * Get comment count with
	 *
	 * @param array $labels The labels for zero, one, and more.
	 *
	 * @example $labels = [
	 *              'zero' => esc_html__( 'Comments: 0', 'modern-basic' ),
	 *              'one'  => esc_html__( 'Comment: 1', 'modern-basic' ),
	 *              'more' => esc_html__( 'Comments: %', 'modern-basic' ),
	 *          ];
	 *
	 * @return false|string
	 */
	public static function get_comment_count( array $labels = [] ) {
		ob_start();

		if ( ! comments_open() ) {
			return false;
		}

		?>

		<div class="post-comment">
			<!--<span class="far fa-comment" aria-hidden="true"></span>-->
			<?php
			comments_popup_link(
				array_key_exists( 'zero', $labels ) ? $labels['zero'] : false,
				array_key_exists( 'one', $labels ) ? $labels['one'] : false,
				array_key_exists( 'more', $labels ) ? $labels['more'] : false
			);
			?>
		</div>

		<?php

		return ob_get_clean();
	}

	/**
	 * Get posts navigation.
	 *
	 * @param array $custom_args Custom args.
	 *
	 * @return string
	 */
	public static function get_posts_navigation( array $custom_args = [] ): string {
		$nav = get_the_posts_navigation(
			array_merge(
				[
					'type'              => 'list',
					'end_size'          => '2',
					'mid_size'          => '3',
					'total'             => $GLOBALS['wp_query']->max_num_pages,
					'prev_text'         => '&laquo;',
					'next_text'         => '&raquo;',
					'after_page_number' => '',
				],
				$custom_args
			)
		);

		return $nav;
	}
}
