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
			'menu_title' => __( 'RocketPD Settings', 'rocketpd' ),
			'menu_slug'  => 'rocketpd-global',
			'capability' => 'edit_posts',
			'redirect'   => true,
			'position'   => 58,
			'icon_url'   => 'dashicons-admin-generic',
		)
	);

	$options_pages = array(
		'header'       => array(
			'page_title' => __( 'RocketPD Header', 'rocketpd' ),
			'menu_title' => __( 'Header', 'rocketpd' ),
		),
		'footer'       => array(
			'page_title' => __( 'RocketPD Footer', 'rocketpd' ),
			'menu_title' => __( 'Footer', 'rocketpd' ),
		),
		'contact-ctas' => array(
			'page_title' => __( 'RocketPD Contact & CTAs', 'rocketpd' ),
			'menu_title' => __( 'Contact & CTAs', 'rocketpd' ),
		),
		'social'       => array(
			'page_title' => __( 'RocketPD Social', 'rocketpd' ),
			'menu_title' => __( 'Social', 'rocketpd' ),
		),
		'integrations' => array(
			'page_title' => __( 'RocketPD Integrations', 'rocketpd' ),
			'menu_title' => __( 'Integrations', 'rocketpd' ),
		),
	);

	foreach ( $options_pages as $slug => $page ) {
		acf_add_options_sub_page(
			array(
				'page_title'  => $page['page_title'],
				'menu_title'  => $page['menu_title'],
				'parent_slug' => 'rocketpd-global',
				'menu_slug'   => 'rocketpd-' . $slug,
			)
		);
	}
}

if ( function_exists( 'acf_add_options_page' ) ) {
	add_action( 'acf/init', 'rocketpd_register_acf_options_pages' );
}
