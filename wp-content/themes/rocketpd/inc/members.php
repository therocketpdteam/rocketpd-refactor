<?php
/**
 * Member helpers.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return supported member type keys.
 *
 * @return array
 */
function rocketpd_get_member_types() {
	return array( 'founder', 'team', 'board' );
}

/**
 * Return initials from a display name.
 *
 * @param string $name Display name.
 * @return string
 */
function rocketpd_get_member_initials_from_name( $name ) {
	$words    = preg_split( '/\s+/', trim( wp_strip_all_tags( (string) $name ) ) );
	$initials = '';

	foreach ( (array) $words as $word ) {
		if ( '' === $word || in_array( strtolower( $word ), array( 'dr.', 'dr', 'mr.', 'mr', 'mrs.', 'mrs', 'ms.', 'ms' ), true ) ) {
			continue;
		}

		$initials .= strtoupper( substr( $word, 0, 1 ) );

		if ( 2 === strlen( $initials ) ) {
			break;
		}
	}

	return $initials;
}

/**
 * Return a member image value from ACF or featured image.
 *
 * @param int $post_id Member post ID.
 * @return mixed
 */
function rocketpd_get_member_headshot( $post_id ) {
	$headshot = function_exists( 'get_field' ) ? get_field( 'member_headshot', $post_id ) : '';

	if ( ! $headshot && has_post_thumbnail( $post_id ) ) {
		$headshot = get_post_thumbnail_id( $post_id );
	}

	return $headshot;
}

/**
 * Normalize one member post into card data.
 *
 * @param WP_Post|int $member Member post object or ID.
 * @return array
 */
function rocketpd_get_member_card_data( $member ) {
	$post_id = is_object( $member ) ? absint( $member->ID ) : absint( $member );

	if ( ! $post_id ) {
		return array();
	}

	$name      = get_the_title( $post_id );
	$type      = function_exists( 'get_field' ) ? get_field( 'member_type', $post_id ) : get_post_meta( $post_id, 'member_type', true );
	$role      = function_exists( 'get_field' ) ? get_field( 'member_role', $post_id ) : get_post_meta( $post_id, 'member_role', true );
	$bio       = function_exists( 'get_field' ) ? get_field( 'member_bio', $post_id ) : get_post_meta( $post_id, 'member_bio', true );
	$initials  = function_exists( 'get_field' ) ? get_field( 'member_initials', $post_id ) : get_post_meta( $post_id, 'member_initials', true );
	$gradient  = function_exists( 'get_field' ) ? get_field( 'member_card_gradient', $post_id ) : get_post_meta( $post_id, 'member_card_gradient', true );
	$linkedin  = function_exists( 'get_field' ) ? get_field( 'member_linkedin_url', $post_id ) : get_post_meta( $post_id, 'member_linkedin_url', true );
	$website   = function_exists( 'get_field' ) ? get_field( 'member_website_url', $post_id ) : get_post_meta( $post_id, 'member_website_url', true );
	$email     = function_exists( 'get_field' ) ? get_field( 'member_email', $post_id ) : get_post_meta( $post_id, 'member_email', true );
	$sort      = function_exists( 'get_field' ) ? get_field( 'member_sort_order', $post_id ) : get_post_meta( $post_id, 'member_sort_order', true );
	$headshot  = rocketpd_get_member_headshot( $post_id );
	$links     = array();

	if ( $linkedin ) {
		$links['linkedin'] = $linkedin;
	}

	if ( $website ) {
		$links['website'] = $website;
	}

	if ( $email ) {
		$sanitized_email = sanitize_email( $email );

		if ( $sanitized_email ) {
			$links['email'] = 'mailto:' . $sanitized_email;
		}
	}

	return array(
		'id'         => $post_id,
		'name'       => $name,
		'role'       => $role,
		'bio'        => $bio,
		'initials'   => $initials ? $initials : rocketpd_get_member_initials_from_name( $name ),
		'type'       => $type,
		'headshot'   => $headshot,
		'image'      => $headshot,
		'links'      => $links,
		'gradient'   => $gradient ? sanitize_key( $gradient ) : 'purple',
		'accent'     => $gradient ? sanitize_key( $gradient ) : 'purple',
		'sort_order' => is_numeric( $sort ) ? (int) $sort : PHP_INT_MAX,
		'menu_order' => (int) get_post_field( 'menu_order', $post_id ),
	);
}

/**
 * Query normalized member cards by type.
 *
 * @param string $type Member type.
 * @return array
 */
function rocketpd_get_members_by_type( $type ) {
	$type = sanitize_key( $type );

	if ( ! in_array( $type, rocketpd_get_member_types(), true ) ) {
		return array();
	}

	$posts = get_posts(
		array(
			'post_type'      => 'member',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'meta_query'     => array(
				array(
					'key'   => 'member_type',
					'value' => $type,
				),
			),
			'orderby'        => array(
				'menu_order' => 'ASC',
				'title'      => 'ASC',
			),
			'order'          => 'ASC',
		)
	);

	$members = array_values( array_filter( array_map( 'rocketpd_get_member_card_data', $posts ) ) );

	usort(
		$members,
		function ( $a, $b ) {
			if ( $a['sort_order'] !== $b['sort_order'] ) {
				return $a['sort_order'] <=> $b['sort_order'];
			}

			if ( $a['menu_order'] !== $b['menu_order'] ) {
				return $a['menu_order'] <=> $b['menu_order'];
			}

			return strcasecmp( $a['name'] ?? '', $b['name'] ?? '' );
		}
	);

	return $members;
}
