<?php
/**
 * Template Name: LaunchPad Legacy Compatibility
 * Description: Compatibility layer for legacy LaunchPad child page assignments.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * Temporary compatibility for the legacy template assignment on the Kim
 * Marshall course page. Remove this once the page is assigned to
 * "RocketPD Course Detail" in WP Admin.
 */
if ( function_exists( 'rocketpd_is_course_detail_context' ) && rocketpd_is_course_detail_context() ) {
	get_template_part( 'page-templates/template-course-detail' );
	return;
}

get_header();
?>

<main id="primary" class="rpd-site-main">
	<div class="rpd-container rpd-section">
		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', 'page' );
		}
		?>
	</div>
</main>

<?php
get_footer();
