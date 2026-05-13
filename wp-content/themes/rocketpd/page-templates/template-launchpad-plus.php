<?php
/**
 * Template Name: RocketPD LaunchPad Plus
 * Description: ACF-powered RocketPD LaunchPad Plus page template.
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
	<main id="primary" class="rpd-site-main rpd-lpp-page">
		<?php
		get_template_part( 'template-parts/pages/launchpad-plus/hero' );
		get_template_part( 'template-parts/pages/launchpad-plus/problem' );
		get_template_part( 'template-parts/pages/launchpad-plus/platform' );
		get_template_part( 'template-parts/pages/launchpad-plus/pillars' );
		get_template_part( 'template-parts/pages/launchpad-plus/includes' );
		get_template_part( 'template-parts/pages/launchpad-plus/visibility' );
		get_template_part( 'template-parts/pages/launchpad-plus/implementation' );
		get_template_part( 'template-parts/pages/launchpad-plus/creators-package' );
		get_template_part( 'template-parts/pages/launchpad-plus/experiences' );
		get_template_part( 'template-parts/pages/launchpad-plus/comparison' );
		get_template_part( 'template-parts/pages/launchpad-plus/final-cta' );
		?>
	</main>
	<?php
}

get_footer();
