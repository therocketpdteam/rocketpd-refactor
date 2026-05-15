<?php
/**
 * Template Name: RocketPD Cohorts
 * Description: Live-virtual cohorts index and filterable gallery.
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
	<main id="primary" class="rpd-site-main rpd-cohorts-page">
		<?php
		get_template_part( 'template-parts/pages/cohorts/hero' );
		get_template_part( 'template-parts/pages/cohorts/why-cohorts' );
		get_template_part( 'template-parts/pages/cohorts/featured-cohorts' );
		get_template_part( 'template-parts/pages/cohorts/gallery' );
		get_template_part( 'template-parts/pages/cohorts/how-it-works' );
		get_template_part( 'template-parts/pages/cohorts/district-cta' );
		get_template_part( 'template-parts/pages/cohorts/testimonials' );
		get_template_part( 'template-parts/pages/cohorts/mid-cta' );
		get_template_part( 'template-parts/pages/cohorts/faq' );
		get_template_part( 'template-parts/pages/cohorts/final-cta' );
		?>
	</main>
	<?php
}

get_footer();
