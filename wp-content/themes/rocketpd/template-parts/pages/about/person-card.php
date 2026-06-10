<?php
/**
 * About person card.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$person = isset( $args['person'] ) && is_array( $args['person'] ) ? $args['person'] : array();

get_template_part( 'template-parts/components/member-card', null, array( 'member' => $person ) );
