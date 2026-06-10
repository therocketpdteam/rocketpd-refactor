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
 * SVG path data for each supported icon.
 * All icons use a 24x24 viewBox, stroke="currentColor",
 * stroke-width="2", stroke-linecap="round", stroke-linejoin="round",
 * fill="none" unless noted.
 */
function rocketpd_get_icon_paths() {
	return array(
		'book'            => '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>',
		'book-open'       => '<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>',
		'phone'           => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.1 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3 1.18h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.09 8.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21 16z"/>',
		'mail'            => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
		'calendar'        => '<path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/>',
		'graduation-cap'  => '<path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>',
		'building-2'      => '<path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/>',
		'life-buoy'       => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="4"/><path d="m4.93 4.93 4.24 4.24"/><path d="m14.83 14.83 4.24 4.24"/><path d="m14.83 9.17 4.24-4.24"/><path d="m4.93 19.07 4.24-4.24"/>',
		'map-pin'         => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
		'clock'           => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
		'users'           => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
		'sparkles'        => '<path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/>',
		'send'            => '<path d="m22 2-7 20-4-9-9-4 20-7z"/><path d="M22 2 11 13"/>',
		'arrow-right'     => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
		'check'           => '<path d="M20 6 9 17l-5-5"/>',
		'message-circle'  => '<path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/>',
	);
}

/**
 * Return an inline SVG for the given icon name.
 *
 * @param string $name      Icon key (e.g. 'phone', 'mail').
 * @param int    $size      Width/height in pixels. Default 20.
 * @param string $class     Additional CSS classes.
 * @return string           SVG markup, or empty string if icon not found.
 */
function rocketpd_get_icon( $name, $size = 20, $class = '' ) {
	$paths = rocketpd_get_icon_paths();

	if ( ! isset( $paths[ $name ] ) ) {
		return '';
	}

	$classes = trim( 'rpd-svg-icon rpd-svg-icon--' . sanitize_html_class( $name ) . ( $class ? ' ' . $class : '' ) );

	return sprintf(
		'<svg xmlns="http://www.w3.org/2000/svg" width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="%2$s" aria-hidden="true">%3$s</svg>',
		(int) $size,
		esc_attr( $classes ),
		$paths[ $name ] // SVG internals — trusted, defined in this file only.
	);
}

if ( ! function_exists( 'rocketpd_get_instructor_icon' ) ) {
	/**
	 * Return an inline SVG for Instructor Index templates.
	 *
	 * This keeps deployed Instructor Index template parts compatible with the
	 * shared icon helper while supporting page-specific icon aliases.
	 *
	 * @param string $name  Icon key.
	 * @param string $class Additional CSS classes.
	 * @return string SVG markup, or empty string if the icon is not supported.
	 */
	function rocketpd_get_instructor_icon( $name, $class = '' ) {
		$name = sanitize_key( $name );

		if ( ! $name ) {
			return '';
		}

		$class_tokens = preg_split( '/\s+/', (string) $class );
		$class_tokens = array_filter(
			array_map(
				'sanitize_html_class',
				is_array( $class_tokens ) ? $class_tokens : array()
			)
		);
		$class        = implode( ' ', $class_tokens );
		$shared_paths = function_exists( 'rocketpd_get_icon_paths' ) ? rocketpd_get_icon_paths() : array();

		if ( isset( $shared_paths[ $name ] ) && function_exists( 'rocketpd_get_icon' ) ) {
			return rocketpd_get_icon( $name, 20, $class );
		}

		$paths = array(
			'audio'       => '<path d="M2 10v3"/><path d="M6 6v11"/><path d="M10 3v18"/><path d="M14 8v7"/><path d="M18 5v13"/><path d="M22 10v3"/>',
			'board'       => '<path d="M2 3h20"/><path d="M21 3v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V3"/><path d="m7 21 5-5 5 5"/>',
			'compass'     => '<circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/>',
			'group'       => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
			'headphones'  => '<path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"/>',
			'play'        => '<circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8" fill="currentColor" stroke="none"/>',
			'play-circle' => '<circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8" fill="currentColor" stroke="none"/>',
			'search'      => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
			'video'       => '<path d="m22 8-6 4 6 4V8Z"/><rect width="14" height="12" x="2" y="6" rx="2" ry="2"/>',
		);

		if ( ! isset( $paths[ $name ] ) ) {
			return '';
		}

		$classes = trim( 'rpd-svg-icon rpd-svg-icon--' . sanitize_html_class( $name ) . ( $class ? ' ' . $class : '' ) );

		return sprintf(
			'<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="%1$s" aria-hidden="true">%2$s</svg>',
			esc_attr( $classes ),
			$paths[ $name ] // SVG internals are trusted, defined in this helper only.
		);
	}
}

/**
 * Return an inline SVG for a social media brand icon.
 *
 * @param string $name  Icon key: 'linkedin', 'x', 'facebook'.
 * @param int    $size  Width/height in pixels. Default 16.
 * @return string       SVG markup, or empty string if icon not found.
 */
function rocketpd_get_social_icon( $name, $size = 16 ) {
	$icons = array(
		'linkedin' => '<path fill="currentColor" d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>',
		'x'        => '<path fill="currentColor" d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.746l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>',
		'facebook' => '<g transform="scale(1.15) translate(-1.5, -2.5)"><path fill="currentColor" d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.53 3.667H14.576v7.98H9.101z"/></g>',
	);

	if ( ! isset( $icons[ $name ] ) ) {
		return '';
	}

	$class = 'rpd-svg-icon rpd-svg-icon--' . sanitize_html_class( $name );

	return sprintf(
		'<svg xmlns="http://www.w3.org/2000/svg" width="%1$d" height="%1$d" viewBox="0 0 24 24" class="%2$s" aria-hidden="true">%3$s</svg>',
		(int) $size,
		esc_attr( $class ),
		$icons[ $name ] // SVG internals — trusted, defined in this file only.
	);
}

