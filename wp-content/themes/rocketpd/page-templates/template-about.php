<?php
/**
 * Template Name: RocketPD About
 * Description: ACF-powered RocketPD About page template.
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
	<main id="primary" class="rpd-site-main rpd-about-page">
		<?php
		get_template_part( 'template-parts/pages/about/hero' );
		get_template_part( 'template-parts/pages/about/intro' );
		get_template_part( 'template-parts/pages/about/focus' );
		get_template_part( 'template-parts/pages/about/checklist' );
		get_template_part( 'template-parts/pages/about/district-leaders' );
		get_template_part( 'template-parts/pages/about/community-platform' );
		get_template_part( 'template-parts/pages/about/founders' );
		get_template_part( 'template-parts/pages/about/team' );
		get_template_part( 'template-parts/pages/about/board' );
		get_template_part( 'template-parts/pages/about/final-cta' );
		?>
	</main>
	<?php
}

get_footer();
