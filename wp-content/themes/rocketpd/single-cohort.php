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

	$cohort = function_exists( 'rocketpd_get_current_cohort_detail' ) ? rocketpd_get_current_cohort_detail() : array();
	$modes  = $cohort['_modes'] ?? array();
	?>
	<main id="primary" class="rpd-site-main rpd-cohort-detail-page">
		<?php
		get_template_part( 'template-parts/pages/cohort-detail/breadcrumb' );

		if ( 'hidden' !== ( $modes['basics'] ?? 'custom' ) ) {
			get_template_part( 'template-parts/pages/cohort-detail/hero' );
			get_template_part( 'template-parts/pages/cohort-detail/snapshot-bar' );
			get_template_part( 'template-parts/pages/cohort-detail/about' );
		}

		if ( 'hidden' !== ( $modes['cards'] ?? 'custom' ) ) {
			get_template_part( 'template-parts/pages/cohort-detail/outcomes' );
		}
		if ( 'hidden' !== ( $modes['schedule'] ?? 'custom' ) ) {
			get_template_part( 'template-parts/pages/cohort-detail/schedule' );
		}
		if ( 'hidden' !== ( $modes['instructor'] ?? 'custom' ) ) {
			get_template_part( 'template-parts/pages/cohort-detail/instructor' );
		}
		if ( 'hidden' !== ( $modes['cards'] ?? 'custom' ) ) {
			get_template_part( 'template-parts/pages/cohort-detail/included' );
		}
		if ( 'hidden' !== ( $modes['sponsor'] ?? 'custom' ) ) {
			get_template_part( 'template-parts/pages/cohort-detail/sponsor' );
		}
		if ( 'hidden' !== ( $modes['pricing'] ?? 'custom' ) ) {
			get_template_part( 'template-parts/pages/cohort-detail/pricing' );
		}
		if ( 'hidden' !== ( $modes['social'] ?? 'custom' ) ) {
			get_template_part( 'template-parts/pages/cohort-detail/resources' );
			get_template_part( 'template-parts/pages/cohort-detail/testimonials' );
			get_template_part( 'template-parts/pages/cohort-detail/faq' );
		}
		if ( 'hidden' !== ( $modes['cta'] ?? 'custom' ) ) {
			get_template_part( 'template-parts/pages/cohort-detail/final-cta' );
		}
		?>
	</main>
	<?php
}

get_footer();
