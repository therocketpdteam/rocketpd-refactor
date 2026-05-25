<?php
/**
 * Topic detail breadcrumb.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topic = $args['topic'] ?? array();

$title = $topic['title'] ?? get_the_title();

if ( function_exists( 'rocketpd_render_breadcrumbs' ) ) {
	rocketpd_render_breadcrumbs(
		array(
			array(
				'label' => __( 'RocketPD', 'rocketpd' ),
				'url'   => home_url( '/' ),
			),
			array(
				'label' => __( 'Topics', 'rocketpd' ),
				'url'   => home_url( '/topics/' ),
			),
			array(
				'label'   => $title,
				'current' => true,
			),
		)
	);
}
