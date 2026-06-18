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

		<?php $sidebar_mode = rocketpd_get_field( 'rpd_post_sidebar_cta_mode', 'hidden' ); ?>
		<div class="rpd-post-body rpd-container<?php echo 'hidden' === $sidebar_mode ? ' rpd-post-body--no-sidebar' : ''; ?>">
			<div class="rpd-post-body__main">
				<?php get_template_part( 'template-parts/posts/content' ); ?>
				<?php get_template_part( 'template-parts/posts/faq' ); ?>
			</div>
			<?php if ( 'hidden' !== $sidebar_mode ) : ?>
				<aside class="rpd-post-body__sidebar">
					<?php get_template_part( 'template-parts/posts/sidebar' ); ?>
				</aside>
			<?php endif; ?>
		</div>

		<?php get_template_part( 'template-parts/posts/related-learning' ); ?>
		<?php get_template_part( 'template-parts/posts/cta-band' ); ?>
	</main>
	<?php
}

get_footer();
