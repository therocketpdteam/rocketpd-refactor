<?php
/**
 * Template Name: RocketPD Lead Magnet
 * Description: ACF-powered RocketPD Lead Magnet page template.
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
	<main id="primary" class="rpd-site-main rpd-lead-page">
		<?php
		get_template_part( 'template-parts/pages/lead-magnet/hero' );
		get_template_part( 'template-parts/pages/lead-magnet/problem' );
		get_template_part( 'template-parts/pages/lead-magnet/shift' );
		get_template_part( 'template-parts/pages/lead-magnet/learn' );
		get_template_part( 'template-parts/pages/lead-magnet/impact' );
		get_template_part( 'template-parts/pages/lead-magnet/proof' );
		get_template_part( 'template-parts/pages/lead-magnet/download' );
		get_template_part( 'template-parts/pages/lead-magnet/deeper' );
		get_template_part( 'template-parts/pages/lead-magnet/final-cta' );
		?>
	</main>
	<?php
}

get_footer();
