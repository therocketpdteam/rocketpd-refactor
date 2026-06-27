<?php
/**
 * Flexible page — HTML Block layout.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$html     = $args['html_content'] ?? '';
$constrain = isset( $args['constrain_width'] ) ? (bool) $args['constrain_width'] : true;

if ( ! $html ) {
	return;
}

rpd_flex_section_open( 'html-block', $args );

if ( $constrain ) {
	echo '<div class="rpd-flex-container rpd-flex-html">';
} else {
	echo '<div class="rpd-flex-html">';
}

echo $html;

echo '</div>';

rpd_flex_section_close();
