<?php
/**
 * Cohort detail breadcrumb.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohort = function_exists( 'rocketpd_get_current_cohort_detail' ) ? rocketpd_get_current_cohort_detail() : array();

$title = $cohort['title'] ?? get_the_title();

if ( function_exists( 'rocketpd_render_breadcrumbs' ) ) {
	rocketpd_render_breadcrumbs(
		array(
			array(
				'label' => __( 'RocketPD', 'rocketpd' ),
				'url'   => home_url( '/' ),
			),
			array(
				'label' => __( 'Cohorts', 'rocketpd' ),
				'url'   => home_url( '/cohorts/' ),
			),
			array(
				'label'   => $title,
				'current' => true,
			),
		)
	);
}
