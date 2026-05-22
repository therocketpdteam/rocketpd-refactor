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

if ( function_exists( 'rocketpd_render_breadcrumbs' ) ) {
	rocketpd_render_breadcrumbs(
		array(
			array(
				'label' => __( 'RocketPD', 'rocketpd' ),
				'url'   => home_url( '/' ),
			),
			array(
				'label' => __( 'Courses', 'rocketpd' ),
				'url'   => home_url( '/launchpad/courses/' ),
			),
			array(
				'label'   => $title,
				'current' => true,
			),
		)
	);
}
