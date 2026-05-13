<?php
/**
 * RocketPD front page.
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
	<main id="primary" class="rpd-site-main rpd-home-page">
		<?php
		get_template_part( 'template-parts/pages/home/hero' );
		get_template_part( 'template-parts/pages/home/stats' );
		get_template_part( 'template-parts/pages/home/intro' );
		get_template_part( 'template-parts/pages/home/value-cards' );
		get_template_part( 'template-parts/pages/home/launchpad' );
		get_template_part( 'template-parts/pages/home/membership' );
		get_template_part( 'template-parts/pages/home/professional-development' );
		get_template_part( 'template-parts/pages/home/resources' );
		get_template_part( 'template-parts/pages/home/trust' );
		get_template_part( 'template-parts/pages/home/testimonials' );
		get_template_part( 'template-parts/pages/home/final-cta' );
		?>
	</main>
	<?php
}

get_footer();
