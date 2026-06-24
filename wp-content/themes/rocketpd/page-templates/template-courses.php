<?php
/**
 * Template Name: RocketPD Courses
 * Description: Course Index and learning experiences gallery.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) {
	the_post();

	$hero_mode    = rocketpd_get_field( 'rpd_courses_hero_mode', 'defaults' );
	$formats_mode = rocketpd_get_field( 'rpd_courses_formats_mode', 'defaults' );
	$gallery_mode = rocketpd_get_field( 'rpd_courses_gallery_mode', 'defaults' );
	$guide_mode   = rocketpd_get_field( 'rpd_courses_guide_mode', 'defaults' );
	$cta_mode     = rocketpd_get_field( 'rpd_courses_cta_mode', 'defaults' );
	?>
	<main id="primary" class="rpd-site-main rpd-courses-page">
		<?php
		if ( 'hidden' !== $hero_mode ) {
			get_template_part( 'template-parts/pages/courses/hero' );
		}
		if ( 'hidden' !== $formats_mode ) {
			get_template_part( 'template-parts/pages/courses/formats' );
		}
		if ( 'hidden' !== $gallery_mode ) {
			get_template_part( 'template-parts/pages/courses/gallery' );
		}
		if ( 'hidden' !== $guide_mode ) {
			get_template_part( 'template-parts/pages/courses/decision-guide' );
		}
		if ( 'hidden' !== $cta_mode ) {
			get_template_part( 'template-parts/pages/courses/district-cta' );
		}
		?>
	</main>
	<?php
}

get_footer();
