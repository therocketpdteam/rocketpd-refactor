<?php
/**
 * ACF local JSON configuration.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Set the ACF local JSON save path.
 *
 * @return string
 */
function rocketpd_acf_save_json_path() {
	return get_template_directory() . '/acf-json';
}

/**
 * Add the theme ACF local JSON load path.
 *
 * @param array $paths Existing load paths.
 * @return array
 */
function rocketpd_acf_load_json_paths( $paths ) {
	$theme_path = get_template_directory() . '/acf-json';

	if ( ! in_array( $theme_path, $paths, true ) ) {
		$paths[] = $theme_path;
	}

	return $paths;
}

add_filter( 'acf/settings/save_json', 'rocketpd_acf_save_json_path' );
add_filter( 'acf/settings/load_json', 'rocketpd_acf_load_json_paths' );
