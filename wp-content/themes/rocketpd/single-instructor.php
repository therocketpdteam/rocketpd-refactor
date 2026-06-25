<?php
/**
 * Single Instructor template.
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
	<?php
	$hero_mode      = rocketpd_get_field( 'rpd_instructor_hero_mode', 'custom' );
	$authority_mode = rocketpd_get_field( 'rpd_instructor_authority_mode', 'custom' );
	$resources_mode = rocketpd_get_field( 'rpd_instructor_resources_mode', 'custom' );
	$learning_mode  = rocketpd_get_field( 'rpd_instructor_learning_mode', 'custom' );
	$trust_mode     = rocketpd_get_field( 'rpd_instructor_trust_mode', 'custom' );
	$related_mode   = rocketpd_get_field( 'rpd_instructor_related_mode', 'custom' );
	$faq_mode       = rocketpd_get_field( 'rpd_instructor_faq_mode', 'custom' );
	$final_cta_mode = rocketpd_get_field( 'rpd_instructor_final_cta_mode', 'custom' );
	?>
	<main id="primary" class="rpd-site-main rpd-instructor-detail-page">
		<?php
		get_template_part( 'template-parts/pages/instructor-detail/breadcrumb' );

		if ( 'hidden' !== $hero_mode ) {
			get_template_part( 'template-parts/pages/instructor-detail/hero' );
		}
		if ( 'hidden' !== $authority_mode ) {
			get_template_part( 'template-parts/pages/instructor-detail/authority' );
		}
		if ( 'hidden' !== $resources_mode ) {
			get_template_part( 'template-parts/pages/instructor-detail/free-resources' );
		}
		if ( 'hidden' !== $learning_mode ) {
			get_template_part( 'template-parts/pages/instructor-detail/professional-learning' );
		}
		if ( 'hidden' !== $trust_mode ) {
			get_template_part( 'template-parts/pages/instructor-detail/trust' );
		}
		if ( 'hidden' !== $related_mode ) {
			get_template_part( 'template-parts/pages/instructor-detail/related-experts' );
		}
		if ( 'hidden' !== $faq_mode ) {
			get_template_part( 'template-parts/pages/instructor-detail/faq' );
		}
		if ( 'hidden' !== $final_cta_mode ) {
			get_template_part( 'template-parts/pages/instructor-detail/final-cta' );
		}
		?>
	</main>
	<?php
}

get_footer();
