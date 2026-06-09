<?php
/**
 * Blog post template helpers.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return a post enhancement field, preferring the RocketPD-prefixed field name.
 *
 * @param string $name     Unprefixed field name.
 * @param mixed  $fallback Fallback value.
 * @param int    $post_id  Optional post ID.
 * @return mixed
 */
function rocketpd_post_field( $name, $fallback = '', $post_id = 0 ) {
	$post_id = $post_id ?: get_the_ID();
	$fields  = array( 'rpd_post_' . $name, $name );

	foreach ( $fields as $field_name ) {
		if ( ! function_exists( 'get_field' ) ) {
			break;
		}

		$value = get_field( $field_name, $post_id );

		if ( null !== $value && '' !== $value ) {
			return $value;
		}
	}

	return $fallback;
}

/**
 * Return the primary learning topic term for a post.
 *
 * @param int $post_id Optional post ID.
 * @return WP_Term|null
 */
function rocketpd_post_get_topic( $post_id = 0 ) {
	$post_id = $post_id ?: get_the_ID();

	if ( taxonomy_exists( 'learning_topic' ) ) {
		$terms = get_the_terms( $post_id, 'learning_topic' );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			return array_shift( $terms );
		}
	}

	return null;
}

/**
 * Calculate article reading time.
 *
 * @param int $post_id Optional post ID.
 * @return string
 */
function rocketpd_post_get_reading_time( $post_id = 0 ) {
	$post_id  = $post_id ?: get_the_ID();
	$override = rocketpd_post_field( 'reading_time_override', '', $post_id );

	if ( $override ) {
		return $override;
	}

	$content = get_post_field( 'post_content', $post_id );
	$words   = str_word_count( wp_strip_all_tags( strip_shortcodes( $content ) ) );
	$minutes = max( 1, (int) ceil( $words / 220 ) );

	return sprintf(
		/* translators: %d: number of minutes. */
		_n( '%d min read', '%d min read', $minutes, 'rocketpd' ),
		$minutes
	);
}

/**
 * Return hero image metadata.
 *
 * @param int $post_id Optional post ID.
 * @return array
 */
function rocketpd_post_get_hero_image( $post_id = 0 ) {
	$post_id = $post_id ?: get_the_ID();
	$image   = rocketpd_post_field( 'hero_image_override', '', $post_id );

	if ( empty( $image ) && has_post_thumbnail( $post_id ) ) {
		$image = get_post_thumbnail_id( $post_id );
	}

	if ( is_numeric( $image ) ) {
		return array(
			'html' => wp_get_attachment_image(
				(int) $image,
				'large',
				false,
				array(
					'class' => 'rpd-post-hero__image',
					'alt'   => get_the_title( $post_id ),
				)
			),
			'url'  => wp_get_attachment_image_url( (int) $image, 'full' ),
		);
	}

	if ( is_array( $image ) && ! empty( $image['url'] ) ) {
		$alt = ! empty( $image['alt'] ) ? $image['alt'] : get_the_title( $post_id );

		return array(
			'html' => sprintf(
				'<img class="rpd-post-hero__image" src="%1$s" alt="%2$s">',
				esc_url( $image['url'] ),
				esc_attr( $alt )
			),
			'url'  => $image['url'],
		);
	}

	if ( is_string( $image ) && $image ) {
		return array(
			'html' => sprintf(
				'<img class="rpd-post-hero__image" src="%1$s" alt="%2$s">',
				esc_url( $image ),
				esc_attr( get_the_title( $post_id ) )
			),
			'url'  => $image,
		);
	}

	return array(
		'html' => '',
		'url'  => '',
	);
}

/**
 * Normalize ACF relationship values to post objects.
 *
 * @param mixed $items Relationship value.
 * @return WP_Post[]
 */
function rocketpd_post_normalize_related( $items ) {
	if ( empty( $items ) || ! is_array( $items ) ) {
		return array();
	}

	$posts = array();

	foreach ( $items as $item ) {
		$post = is_numeric( $item ) ? get_post( (int) $item ) : $item;

		if ( $post instanceof WP_Post && 'publish' === get_post_status( $post ) ) {
			$posts[] = $post;
		}
	}

	return $posts;
}

/**
 * Return related resources for a post.
 *
 * @param int $limit   Max items.
 * @param int $post_id Optional post ID.
 * @return WP_Post[]
 */
function rocketpd_post_get_related_resources( $limit = 3, $post_id = 0 ) {
	$post_id = $post_id ?: get_the_ID();
	$manual  = rocketpd_post_normalize_related( rocketpd_post_field( 'related_resources', array(), $post_id ) );

	if ( ! empty( $manual ) ) {
		return array_slice( $manual, 0, $limit );
	}

	$topic = rocketpd_post_get_topic( $post_id );

	if ( ! $topic ) {
		return array();
	}

	$candidates = array( 'post', 'guide', 'webinar', 'course', 'cohort', 'resource', 'podcast', 'playbook' );
	$post_types = array_values( array_intersect( $candidates, get_post_types( array( 'public' => true ), 'names' ) ) );

	if ( empty( $post_types ) ) {
		return array();
	}

	$query = new WP_Query(
		array(
			'post_type'           => $post_types,
			'posts_per_page'      => $limit,
			'post__not_in'        => array( $post_id ),
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
			'tax_query'           => array(
				array(
					'taxonomy' => 'learning_topic',
					'field'    => 'term_id',
					'terms'    => array( $topic->term_id ),
				),
			),
		)
	);

	return $query->posts;
}

/**
 * Return related resource display data.
 *
 * @param WP_Post $post Post object.
 * @return array
 */
function rocketpd_post_get_resource_card( $post ) {
	$type   = get_post_type( $post );
	$object = get_post_type_object( $type );
	$labels = array(
		'post'        => __( 'Article', 'rocketpd' ),
		'guide'       => __( 'Guide', 'rocketpd' ),
		'webinar'     => __( 'Webinar', 'rocketpd' ),
		'course'      => __( 'Course', 'rocketpd' ),
		'cohort'      => __( 'Cohort', 'rocketpd' ),
		'resource'    => __( 'Resource', 'rocketpd' ),
		'podcast'     => __( 'Podcast', 'rocketpd' ),
		'playbook'    => __( 'Playbook', 'rocketpd' ),
		'lead_magnet' => __( 'Guide', 'rocketpd' ),
	);
	$colors = array(
		'post'        => '#5552b1',
		'guide'       => '#fdb933',
		'webinar'     => '#3b82f6',
		'course'      => '#5552b1',
		'cohort'      => '#a154a1',
		'resource'    => '#5552b1',
		'podcast'     => '#a154a1',
		'playbook'    => '#fdb933',
		'lead_magnet' => '#fdb933',
	);

	return array(
		'type'    => isset( $labels[ $type ] ) ? $labels[ $type ] : ( $object ? $object->labels->singular_name : __( 'Resource', 'rocketpd' ) ),
		'color'   => isset( $colors[ $type ] ) ? $colors[ $type ] : '#5552b1',
		'title'   => get_the_title( $post ),
		'url'     => get_permalink( $post ),
		'excerpt' => get_the_excerpt( $post ),
		'meta'    => $object ? $object->labels->singular_name : __( 'Resource', 'rocketpd' ),
	);
}

/**
 * Return default community URL.
 *
 * @return string
 */
function rocketpd_post_get_community_url() {
	return rocketpd_get_option( 'community_cta_url', rocketpd_get_option( 'rpd_community_cta_url', home_url( '/community/' ) ) );
}

/**
 * Return FAQ rows.
 *
 * @param int $post_id Optional post ID.
 * @return array
 */
function rocketpd_post_get_faq_items( $post_id = 0 ) {
	$post_id = $post_id ?: get_the_ID();

	if ( ! rocketpd_post_field( 'faq_enabled', false, $post_id ) ) {
		return array();
	}

	$rows = rocketpd_post_field( 'faq_items', array(), $post_id );

	if ( empty( $rows ) || ! is_array( $rows ) ) {
		return array();
	}

	return array_values(
		array_filter(
			$rows,
			function ( $row ) {
				return is_array( $row ) && ! empty( $row['question'] ) && ! empty( $row['answer'] );
			}
		)
	);
}
