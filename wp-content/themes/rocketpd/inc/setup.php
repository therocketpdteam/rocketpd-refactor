<?php
/**
 * Theme setup.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Configure core theme support.
 */
function rocketpd_setup() {
	load_theme_textdomain( 'rocketpd', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form', 'script', 'style' ) );

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'rocketpd' ),
			'footer'  => esc_html__( 'Footer Menu', 'rocketpd' ),
		)
	);
}
add_action( 'after_setup_theme', 'rocketpd_setup' );
