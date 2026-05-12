<?php
/**
 * General helper functions.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return a global ACF option value when ACF is available.
 *
 * @param string $field_name ACF field name.
 * @param mixed  $fallback Fallback value.
 * @return mixed
 */
function rocketpd_get_option( $field_name, $fallback = '' ) {
	if ( function_exists( 'get_field' ) ) {
		$value = get_field( $field_name, 'option' );

		if ( null !== $value && '' !== $value ) {
			return $value;
		}
	}

	return $fallback;
}

