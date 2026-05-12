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
		$handle   = 'rocketpd-' . $css_file;
		$css_path = get_template_directory() . '/assets/css/' . $css_file . '.css';

		wp_enqueue_style(
			$handle,
			get_template_directory_uri() . '/assets/css/' . $css_file . '.css',
			$dependency,
			file_exists( $css_path ) ? filemtime( $css_path ) : $theme_version
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

	if ( is_page_template( 'page-templates/template-about.php' ) ) {
		$about_css_path = get_template_directory() . '/assets/css/pages/about.css';

		wp_enqueue_style(
			'rocketpd-about',
			get_template_directory_uri() . '/assets/css/pages/about.css',
			array( 'rocketpd-07-footer' ),
			file_exists( $about_css_path ) ? filemtime( $about_css_path ) : $theme_version
		);
	}
}
add_action( 'wp_enqueue_scripts', 'rocketpd_enqueue_assets' );
