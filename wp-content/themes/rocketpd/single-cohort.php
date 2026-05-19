<?php
/**
 * Single Cohort template.
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
	<main id="primary" class="rpd-site-main rpd-cohort-detail-page">
		<?php
		get_template_part( 'template-parts/pages/cohort-detail/breadcrumb' );
		get_template_part( 'template-parts/pages/cohort-detail/hero' );
		get_template_part( 'template-parts/pages/cohort-detail/snapshot-bar' );
		get_template_part( 'template-parts/pages/cohort-detail/about' );
		get_template_part( 'template-parts/pages/cohort-detail/outcomes' );
		get_template_part( 'template-parts/pages/cohort-detail/schedule' );
		get_template_part( 'template-parts/pages/cohort-detail/instructor' );
		get_template_part( 'template-parts/pages/cohort-detail/included' );
		get_template_part( 'template-parts/pages/cohort-detail/sponsor' );
		get_template_part( 'template-parts/pages/cohort-detail/pricing' );
		get_template_part( 'template-parts/pages/cohort-detail/resources' );
		get_template_part( 'template-parts/pages/cohort-detail/testimonials' );
		get_template_part( 'template-parts/pages/cohort-detail/faq' );
		get_template_part( 'template-parts/pages/cohort-detail/final-cta' );
		?>
	</main>
	<?php
}

get_footer();
