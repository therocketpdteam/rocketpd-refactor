<?php
/**
 * Asset loading.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue global theme assets.
 */
function rocketpd_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );
	$css_files     = array(
		'00-tokens',
		'01-base',
		'02-typography',
		'03-layout',
		'04-components',
		'05-forms',
		'06-header',
		'07-footer',
	);

	$dependency = array();

	foreach ( $css_files as $css_file ) {
		$handle = 'rocketpd-' . $css_file;

		wp_enqueue_style(
			$handle,
			get_template_directory_uri() . '/assets/css/' . $css_file . '.css',
			$dependency,
			$theme_version
		);

		$dependency = array( $handle );
	}

	wp_enqueue_script(
		'rocketpd-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		$theme_version,
		true
	);

	wp_enqueue_script(
		'rocketpd-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array( 'rocketpd-main' ),
		$theme_version,
		true
	);

	if ( is_page_template( 'page-templates/template-contact.php' ) ) {
		wp_enqueue_style(
			'rocketpd-contact',
			get_template_directory_uri() . '/assets/css/pages/contact.css',
			array( 'rocketpd-07-footer' ),
			$theme_version
		);
	}

	if ( is_page_template( 'page-templates/template-lead-magnet.php' ) ) {
		$lead_magnet_css = get_template_directory() . '/assets/css/pages/lead-magnet.css';

		wp_enqueue_style(
			'rocketpd-lead-magnet',
			get_template_directory_uri() . '/assets/css/pages/lead-magnet.css',
			array( 'rocketpd-07-footer' ),
			file_exists( $lead_magnet_css ) ? filemtime( $lead_magnet_css ) : $theme_version
		);
	}

	if ( is_front_page() ) {
		wp_enqueue_style(
			'rocketpd-home',
			get_template_directory_uri() . '/assets/css/pages/home.css',
			array( 'rocketpd-07-footer' ),
			$theme_version
		);
	}
}
add_action( 'wp_enqueue_scripts', 'rocketpd_enqueue_assets' );
