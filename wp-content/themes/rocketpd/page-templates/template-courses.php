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
	?>
	<main id="primary" class="rpd-site-main rpd-courses-page">
		<?php
		get_template_part( 'template-parts/pages/courses/hero' );
		get_template_part( 'template-parts/pages/courses/formats' );
		get_template_part( 'template-parts/pages/courses/gallery' );
		get_template_part( 'template-parts/pages/courses/decision-guide' );
		get_template_part( 'template-parts/pages/courses/district-cta' );
		?>
	</main>
	<?php
}

get_footer();
