<?php
/**
 * Course detail page shell.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php
$hero_mode       = rocketpd_get_field( 'rpd_course_hero_mode', 'custom' );
$instructor_mode = rocketpd_get_field( 'rpd_course_instructor_mode', 'custom' );
$outcomes_mode   = rocketpd_get_field( 'rpd_course_outcomes_mode', 'custom' );
$included_mode   = rocketpd_get_field( 'rpd_course_included_mode', 'custom' );
$resources_mode  = rocketpd_get_field( 'rpd_course_resources_mode', 'custom' );
$pricing_mode    = rocketpd_get_field( 'rpd_course_pricing_mode', 'custom' );
$related_mode    = rocketpd_get_field( 'rpd_course_related_mode', 'custom' );
$faq_mode        = rocketpd_get_field( 'rpd_course_faq_mode', 'custom' );
?>
<main id="primary" class="rpd-site-main rpd-course-detail-page">
	<?php
	get_template_part( 'template-parts/pages/course-detail/breadcrumb' );

	if ( 'hidden' !== $hero_mode ) {
		get_template_part( 'template-parts/pages/course-detail/hero' );
	}
	if ( 'hidden' !== $outcomes_mode ) {
		get_template_part( 'template-parts/pages/course-detail/outcomes' );
		get_template_part( 'template-parts/pages/course-detail/audience' );
	}
	if ( 'hidden' !== $included_mode ) {
		get_template_part( 'template-parts/pages/course-detail/included' );
	}
	if ( 'hidden' !== $instructor_mode ) {
		get_template_part( 'template-parts/pages/course-detail/instructor' );
	}
	if ( 'hidden' !== $resources_mode ) {
		get_template_part( 'template-parts/pages/course-detail/resources' );
	}
	if ( 'hidden' !== $pricing_mode ) {
		get_template_part( 'template-parts/pages/course-detail/pricing' );
	}
	if ( 'hidden' !== $related_mode ) {
		get_template_part( 'template-parts/pages/course-detail/related' );
	}
	if ( 'hidden' !== $faq_mode ) {
		get_template_part( 'template-parts/pages/course-detail/faq' );
		get_template_part( 'template-parts/pages/course-detail/final-cta' );
	}
	?>
</main>
