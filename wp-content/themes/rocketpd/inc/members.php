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
 * Return one member field from ACF or post meta.
 *
 * @param string $name    Field name.
 * @param int    $post_id Member post ID.
 * @return mixed
 */
function rocketpd_get_member_field( $name, $post_id ) {
	if ( function_exists( 'get_field' ) ) {
		return get_field( $name, $post_id );
	}

	return get_post_meta( $post_id, $name, true );
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

	$name        = get_the_title( $post_id );
	$type        = rocketpd_get_member_field( 'member_type', $post_id );
	$title       = rocketpd_get_member_field( 'member_title', $post_id );
	$legacy_role = rocketpd_get_member_field( 'member_role', $post_id );
	$tagline     = rocketpd_get_member_field( 'member_tagline', $post_id );
	$bio         = rocketpd_get_member_field( 'member_bio', $post_id );
	$association = rocketpd_get_member_field( 'member_association', $post_id );
	$initials    = rocketpd_get_member_field( 'member_initials', $post_id );
	$gradient    = rocketpd_get_member_field( 'member_card_gradient', $post_id );
	$linkedin    = rocketpd_get_member_field( 'member_linkedin_url', $post_id );
	$website     = rocketpd_get_member_field( 'member_website_url', $post_id );
	$email       = rocketpd_get_member_field( 'member_email', $post_id );
	$sort        = rocketpd_get_member_field( 'member_sort_order', $post_id );
	$headshot    = rocketpd_get_member_headshot( $post_id );
	$links       = array();

	if ( ( ! $title || 0 === strcasecmp( trim( (string) $title ), trim( (string) $name ) ) ) && $legacy_role ) {
		$title = $legacy_role;
	}

	if ( 'founder' === $type && ! $tagline ) {
		$tagline = rocketpd_get_member_field( 'member_role_line', $post_id );
	}

	if ( 'board' === $type && ! $association ) {
		$association = rocketpd_get_member_field( 'member_org', $post_id );
	}

	if ( 'board' === $type && ! $association && $bio ) {
		$association = $bio;
	}

	if ( 'board' === $type && $association && ( ! $title || 0 === strcasecmp( trim( (string) $title ), trim( (string) $name ) ) ) ) {
		$association_parts = array_map( 'trim', explode( ',', (string) $association, 2 ) );

		if ( ! empty( $association_parts[0] ) && ! empty( $association_parts[1] ) ) {
			$title       = $association_parts[0];
			$association = $association_parts[1];
		}
	}

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
		'id'          => $post_id,
		'name'        => $name,
		'type'        => $type,
		'title'       => $title,
		'role'        => $title,
		'tagline'     => $tagline,
		'bio'         => 'founder' === $type ? $bio : '',
		'association' => $association,
		'initials'    => $initials ? $initials : rocketpd_get_member_initials_from_name( $name ),
		'headshot'    => $headshot,
		'image'       => $headshot,
		'links'       => $links,
		'gradient'    => $gradient ? sanitize_key( $gradient ) : 'purple',
		'accent'      => $gradient ? sanitize_key( $gradient ) : 'purple',
		'sort_order'  => is_numeric( $sort ) ? (int) $sort : PHP_INT_MAX,
		'menu_order'  => (int) get_post_field( 'menu_order', $post_id ),
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
