<?php
/**
 * Instructor detail breadcrumb.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$instructor = function_exists( 'rocketpd_get_current_instructor_detail' ) ? rocketpd_get_current_instructor_detail() : array();
$name       = $instructor['name'] ?? get_the_title();

if ( function_exists( 'rocketpd_render_breadcrumbs' ) ) {
	rocketpd_render_breadcrumbs(
		array(
			array(
				'label' => __( 'RocketPD', 'rocketpd' ),
				'url'   => home_url( '/' ),
			),
			array(
				'label' => __( 'Instructors', 'rocketpd' ),
				'url'   => home_url( '/instructor/' ),
			),
			array(
				'label'   => $name,
				'current' => true,
			),
		)
	);
}
