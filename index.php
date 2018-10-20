<?php
/**
 * Theme index page template.
 *
 * @package Modern_Basic
 */

get_header(); ?>

<main id="main" class="home" role="main">

	<div class="container">

		<?php $modern_basic_class_status = have_posts() ? 'status__has_posts' : 'status__no_posts'; ?>

		<div class="content__inner <?php echo esc_attr( $modern_basic_class_status ); ?>">

			<?php
			if ( have_posts() ) :
				$modern_basic_count = 0;
				while ( have_posts() ) :
					$modern_basic_count++;
					the_post();
					?>

					// Call content part.

				<?php endwhile; ?>

			<?php else : ?>

				<div class="error_message no_result">
					<h2><?php esc_html_e( 'Posts Not Found!', 'modern-basic' ); ?></h2>
				</div>

			<?php endif; ?>

		</div>

		<?php get_sidebar(); ?>

	</div>

</main>

<?php get_footer(); ?>
