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

/**
 * Return an ACF field value for the current post when ACF is available.
 *
 * @param string $field_name ACF field name.
 * @param mixed  $fallback Fallback value.
 * @param int    $post_id   Optional post ID.
 * @return mixed
 */
function rocketpd_get_field( $field_name, $fallback = '', $post_id = 0 ) {
	if ( function_exists( 'get_field' ) ) {
		$value = get_field( $field_name, $post_id ?: false );

		// null or false = field never saved — use fallback.
		// Any other value (including '', [], 0) = intentional editor input — use as-is.
		if ( null !== $value && false !== $value ) {
			return $value;
		}
	}

	return $fallback;
}

/**
 * Return non-empty ACF repeater rows, with fallback rows for blank editor state.
 *
 * @param string $field_name    ACF repeater field name.
 * @param array  $fallback      Fallback rows.
 * @param array  $required_keys Keys that indicate a meaningful row.
 * @param int    $post_id       Optional post ID.
 * @return array
 */
function rocketpd_get_repeater_rows( $field_name, $fallback = array(), $required_keys = array(), $post_id = 0 ) {
	$rows = rocketpd_get_field( $field_name, null, $post_id );

	// ACF field has never been saved — use PHP fallback.
	if ( null === $rows ) {
		return $fallback;
	}

	// ACF returned false — field exists but was cleared by editor.
	if ( false === $rows ) {
		return array();
	}

	if ( ! is_array( $rows ) ) {
		return $fallback;
	}

	// ACF field exists but has no rows — editor intentionally cleared it.
	if ( empty( $rows ) ) {
		return array();
	}

	$filtered = array();

	foreach ( $rows as $row ) {
		if ( ! is_array( $row ) ) {
			continue;
		}

		$keys_to_check = $required_keys ?: array_keys( $row );

		foreach ( $keys_to_check as $key ) {
			if ( isset( $row[ $key ] ) && '' !== trim( (string) $row[ $key ] ) ) {
				$filtered[] = $row;
				break;
			}
		}
	}

	// Rows exist in ACF but all were blank — treat as intentionally empty.
	return $filtered ?: array();
}

/**
 * Return image markup for an ACF image value that may be an ID, array, or URL.
 *
 * @param mixed  $image Image value.
 * @param string $class CSS class.
 * @param string $alt   Fallback alt text.
 * @return string
 */
function rocketpd_get_image_markup( $image, $class = '', $alt = '' ) {
	if ( is_numeric( $image ) ) {
		return wp_get_attachment_image(
			(int) $image,
			'full',
			false,
			array(
				'class' => $class,
				'alt'   => $alt,
			)
		);
	}

	if ( is_array( $image ) && ! empty( $image['url'] ) ) {
		$image_alt = ! empty( $image['alt'] ) ? $image['alt'] : $alt;

		return sprintf(
			'<img class="%1$s" src="%2$s" alt="%3$s">',
			esc_attr( $class ),
			esc_url( $image['url'] ),
			esc_attr( $image_alt )
		);
	}

	if ( is_string( $image ) && $image ) {
		return sprintf(
			'<img class="%1$s" src="%2$s" alt="%3$s">',
			esc_attr( $class ),
			esc_url( $image ),
			esc_attr( $alt )
		);
	}

	return '';
}
