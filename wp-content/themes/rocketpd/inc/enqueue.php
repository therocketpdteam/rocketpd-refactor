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

	foreach ( $css_files as $css_file ) {
		wp_enqueue_style(
			'rocketpd-' . $css_file,
			get_template_directory_uri() . '/assets/css/' . $css_file . '.css',
			array(),
			$theme_version
		);
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
}
add_action( 'wp_enqueue_scripts', 'rocketpd_enqueue_assets' );

