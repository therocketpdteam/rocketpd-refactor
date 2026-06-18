<?php
/**
 * Post breadcrumb.
 *
 * Trail: Home → Blog → [Post Title]
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( function_exists( 'rocketpd_render_breadcrumbs' ) ) {
	rocketpd_render_breadcrumbs(
		array(
			array(
				'label' => __( 'Home', 'rocketpd' ),
				'url'   => home_url( '/' ),
			),
			array(
				'label' => __( 'Blog', 'rocketpd' ),
				'url'   => home_url( '/blog/' ),
			),
			array(
				'label'   => get_the_title(),
				'current' => true,
			),
		)
	);
}
