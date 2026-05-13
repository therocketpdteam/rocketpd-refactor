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

	$enqueue_page_style = function ( $handle, $relative_path, $dependencies = array( 'rocketpd-07-footer' ) ) use ( $theme_version ) {
		$asset_path = get_template_directory() . $relative_path;

		wp_enqueue_style(
			$handle,
			get_template_directory_uri() . $relative_path,
			$dependencies,
			file_exists( $asset_path ) ? filemtime( $asset_path ) : $theme_version
		);
	};

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
		$enqueue_page_style( 'rocketpd-about', '/assets/css/pages/about.css' );
	}

	if ( is_page_template( 'page-templates/template-community.php' ) ) {
		$enqueue_page_style( 'rocketpd-community', '/assets/css/pages/community.css' );
	}

	if ( is_page_template( 'page-templates/template-contact.php' ) ) {
		$enqueue_page_style( 'rocketpd-contact', '/assets/css/pages/contact.css' );
	}

	if ( is_page_template( 'page-templates/template-launchpad.php' ) ) {
		$enqueue_page_style( 'rocketpd-launchpad', '/assets/css/pages/launchpad.css' );
	}

	if ( is_page_template( 'page-templates/template-launchpad-plus.php' ) ) {
		$enqueue_page_style( 'rocketpd-launchpad-plus', '/assets/css/pages/launchpad-plus.css' );
	}

	if ( is_page_template( 'page-templates/template-lead-magnet.php' ) ) {
		$enqueue_page_style( 'rocketpd-lead-magnet', '/assets/css/pages/lead-magnet.css' );
	}

	if ( is_page_template( 'page-templates/template-trust-cycle-guide.php' ) ) {
		$enqueue_page_style( 'rocketpd-trust-cycle-guide', '/assets/css/pages/trust-cycle-guide.css' );
	}

	if ( is_front_page() ) {
		$enqueue_page_style( 'rocketpd-home', '/assets/css/pages/home.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'rocketpd_enqueue_assets' );
