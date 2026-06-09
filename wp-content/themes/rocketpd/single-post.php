<?php
/**
 * Single post template.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="rpd-site-main rpd-post">
	<?php
	while ( have_posts() ) {
		the_post();

		get_template_part( 'template-parts/posts/breadcrumb' );
		get_template_part( 'template-parts/posts/hero' );
		?>
		<section class="rpd-post-main" aria-label="<?php esc_attr_e( 'Article content', 'rocketpd' ); ?>">
			<div class="rpd-post-container">
				<div class="rpd-post-grid">
					<?php
					get_template_part( 'template-parts/posts/content' );
					get_template_part( 'template-parts/posts/sidebar' );
					?>
				</div>
			</div>
		</section>
		<?php
		get_template_part( 'template-parts/posts/related-learning' );
		get_template_part( 'template-parts/posts/faq' );
		get_template_part( 'template-parts/posts/cta-band' );
		get_template_part( 'template-parts/posts/schema' );
	}
	?>
</main>

<?php
get_footer();
