<?php
/**
 * Template Name: RocketPD Empowered Educator Experience
 * Description: Empowered Educator Experience landing page.
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
	<main id="primary" class="rpd-site-main rpd-ee">
		<?php
		get_template_part( 'template-parts/pages/empowered-educator/hero' );
		get_template_part( 'template-parts/pages/empowered-educator/challenge-solution' );
		get_template_part( 'template-parts/pages/empowered-educator/pillars' );
		get_template_part( 'template-parts/pages/empowered-educator/infographic' );
		get_template_part( 'template-parts/pages/empowered-educator/costs' );
		get_template_part( 'template-parts/pages/empowered-educator/pricing' );
		get_template_part( 'template-parts/pages/empowered-educator/final-cta' );
		?>
	</main>
	<?php
}

get_footer();
