<?php
/**
 * Theme index page template.
 *
 * @package Modern_Basic
 */

namespace Modern_Basic\Index {

	use Modern_Basic\Inc\Template\Template_Helper;
	use Modern_Basic\Inc\Template_Parts\Content_Loop;

	get_header(); ?>

	<main id="main" class="home" role="main">

		<div class="container">

			<?php $modern_basic_class_status = have_posts() ? 'status__has_posts' : 'status__no_posts'; ?>

			<div class="content__inner <?php echo esc_attr( $modern_basic_class_status ); ?>">

				<?php
				if ( have_posts() ) :
					$modern_basic_count = 0;
					while ( have_posts() ) :
						$modern_basic_count ++;
						the_post();

						// Call content part.
						echo Content_Loop::view(); // WPCS: XSS OK.

					endwhile;

					echo Template_Helper::get_posts_navigation(); // WPCS: XSS OK.

				else :
					?>

					<div class="error_message no_posts">
						<h2><?php esc_html_e( 'Posts Not Found!', 'modern-basic' ); ?></h2>
					</div>

				<?php endif; ?>

			</div>

			<?php get_sidebar(); ?>

		</div>

	</main>

	<?php get_footer(); ?>

	<?php

}


