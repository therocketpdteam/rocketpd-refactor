<?php
/**
 * Course detail breadcrumb.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course = function_exists( 'rocketpd_get_current_course_detail' ) ? rocketpd_get_current_course_detail() : array();
$title  = $course['title'] ?? get_the_title();
?>

<nav class="rpd-course-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rocketpd' ); ?>">
	<div class="rpd-container">
		<ol>
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'RocketPD', 'rocketpd' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/launchpad/courses/' ) ); ?>"><?php esc_html_e( 'Courses', 'rocketpd' ); ?></a></li>
			<li aria-current="page"><?php echo esc_html( $title ); ?></li>
		</ol>
	</div>
</nav>
