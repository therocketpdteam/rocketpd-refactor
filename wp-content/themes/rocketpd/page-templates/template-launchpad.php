<?php
/**
 * Template Name: RocketPD LaunchPad
 * Description: ACF-powered RocketPD LaunchPad page template.
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
	<main id="primary" class="rpd-site-main rpd-launchpad-page">
		<?php
		get_template_part( 'template-parts/pages/launchpad/hero' );
		get_template_part( 'template-parts/pages/launchpad/trust' );
		get_template_part( 'template-parts/pages/launchpad/intro' );
		get_template_part( 'template-parts/pages/launchpad/evolution' );
		get_template_part( 'template-parts/pages/launchpad/product' );
		get_template_part( 'template-parts/pages/launchpad/districts' );
		get_template_part( 'template-parts/pages/launchpad/implementation' );
		get_template_part( 'template-parts/pages/launchpad/why' );
		get_template_part( 'template-parts/pages/launchpad/testimonials' );
		get_template_part( 'template-parts/pages/launchpad/community' );
		get_template_part( 'template-parts/pages/launchpad/instructors' );
		get_template_part( 'template-parts/pages/launchpad/transition' );
		get_template_part( 'template-parts/pages/launchpad/bridge' );
		get_template_part( 'template-parts/pages/launchpad/partners' );
		get_template_part( 'template-parts/pages/launchpad/final-cta' );
		?>
	</main>
	<?php
}

get_footer();
