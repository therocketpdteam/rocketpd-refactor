<?php
/**
 * Navigation helpers.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render a theme menu when assigned.
 *
 * @param string $location Menu location.
 */
function rocketpd_nav_menu( $location = 'primary' ) {
	if ( ! has_nav_menu( $location ) ) {
		return;
	}

	wp_nav_menu(
		array(
			'theme_location' => $location,
			'container'      => false,
			'menu_class'     => 'rpd-menu rpd-menu--' . sanitize_html_class( $location ),
			'fallback_cb'    => false,
			'depth'          => 1,
		)
	);
}
