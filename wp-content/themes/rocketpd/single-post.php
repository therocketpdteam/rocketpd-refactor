<?php
/**
 * Single Post template.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) {
	the_post();
	?>
	<main id="primary" class="rpd-site-main rpd-post-page">
		<?php get_template_part( 'template-parts/posts/breadcrumb' ); ?>
		<?php get_template_part( 'template-parts/posts/hero' ); ?>

		<div class="rpd-post-body rpd-container">
			<div class="rpd-post-body__main">
				<?php get_template_part( 'template-parts/posts/content' ); ?>
				<?php get_template_part( 'template-parts/posts/faq' ); ?>
			</div>
			<aside class="rpd-post-body__sidebar">
				<?php get_template_part( 'template-parts/posts/sidebar' ); ?>
			</aside>
		</div>

		<?php get_template_part( 'template-parts/posts/related-learning' ); ?>
		<?php get_template_part( 'template-parts/posts/cta-band' ); ?>
	</main>
	<?php
}

get_footer();
