<?php
/**
 * Template tag helpers.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Print an escaped RocketPD button.
 *
 * @param array $args Button arguments.
 */
function rocketpd_button( $args = array() ) {
	$defaults = array(
		'label'          => '',
		'url'            => '',
		'style'          => 'purple',
		'opens_new_tab' => false,
	);

	$args = wp_parse_args( $args, $defaults );

	if ( empty( $args['label'] ) || empty( $args['url'] ) ) {
		return;
	}

	$target = $args['opens_new_tab'] ? ' target="_blank" rel="noopener"' : '';
	printf(
		'<a class="rpd-btn rpd-btn--%1$s" href="%2$s"%3$s>%4$s</a>',
		esc_attr( sanitize_html_class( $args['style'] ) ),
		esc_url( $args['url'] ),
		$target, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		esc_html( $args['label'] )
	);
}

