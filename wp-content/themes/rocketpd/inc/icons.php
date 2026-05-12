<?php
/**
 * Icon helpers.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render a decorative icon placeholder.
 *
 * @param string $name Icon name.
 * @return string
 */
function rocketpd_get_icon( $name ) {
	$name = sanitize_html_class( $name );

	return '<span class="rpd-icon rpd-icon--' . esc_attr( $name ) . '" aria-hidden="true"></span>';
}

