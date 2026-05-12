<?php
/**
 * ACF options pages.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register RocketPD ACF options pages when ACF Pro is available.
 */
function rocketpd_register_acf_options_pages() {
	if ( ! function_exists( 'acf_add_options_page' ) ) {
		return;
	}

	acf_add_options_page(
		array(
			'page_title' => __( 'RocketPD Global', 'rocketpd' ),
			'menu_title' => __( 'RocketPD Global', 'rocketpd' ),
			'menu_slug'  => 'rocketpd-global',
			'capability' => 'edit_posts',
			'redirect'   => true,
		)
	);

	$options_pages = array(
		'header'       => __( 'RocketPD Header', 'rocketpd' ),
		'footer'       => __( 'RocketPD Footer', 'rocketpd' ),
		'contact-ctas' => __( 'RocketPD Contact & CTAs', 'rocketpd' ),
		'social'       => __( 'RocketPD Social', 'rocketpd' ),
		'integrations' => __( 'RocketPD Integrations', 'rocketpd' ),
	);

	foreach ( $options_pages as $slug => $title ) {
		acf_add_options_sub_page(
			array(
				'page_title'  => $title,
				'menu_title'  => $title,
				'parent_slug' => 'rocketpd-global',
				'menu_slug'   => 'rocketpd-' . $slug,
			)
		);
	}
}
add_action( 'acf/init', 'rocketpd_register_acf_options_pages' );

