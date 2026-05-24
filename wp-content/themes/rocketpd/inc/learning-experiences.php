<?php
/**
 * Shared learning-experience card adapters.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return display metadata for a learning-experience format.
 *
 * @param string $format Format key.
 * @return array
 */
function rocketpd_get_learning_experience_format_meta( $format ) {
	$format = sanitize_key( $format ?: 'self-paced' );

	if ( function_exists( 'rocketpd_get_course_format_meta' ) ) {
		$formats = rocketpd_get_course_format_meta();

		if ( isset( $formats[ $format ] ) ) {
			return $formats[ $format ];
		}
	}

	$fallback = array(
		'webinar'    => array(
			'label'          => __( 'Free Webinar', 'rocketpd' ),
			'plural'         => __( 'Free Webinars', 'rocketpd' ),
			'group_label'    => __( 'Free Webinars', 'rocketpd' ),
			'group_subtitle' => __( 'On-demand expert conversations - watch any time, no card required.', 'rocketpd' ),
			'tone'           => 'emerald',
			'icon'           => 'play',
			'cta'            => __( 'Watch Free', 'rocketpd' ),
		),
		'self-paced' => array(
			'label'          => __( 'Self-Paced Course', 'rocketpd' ),
			'plural'         => __( 'Self-Paced Courses', 'rocketpd' ),
			'group_label'    => __( 'Self-Paced Courses', 'rocketpd' ),
			'group_subtitle' => __( 'Expert-led video modules + workbook + certificate. Learn on your schedule.', 'rocketpd' ),
			'tone'           => 'gold',
			'icon'           => 'layers',
			'cta'            => __( 'Start Course', 'rocketpd' ),
		),
		'cohort'     => array(
			'label'          => __( 'Live-Virtual Cohort', 'rocketpd' ),
			'plural'         => __( 'Live-Virtual Cohorts', 'rocketpd' ),
			'group_label'    => __( 'Live-Virtual Cohorts', 'rocketpd' ),
			'group_subtitle' => __( 'Multi-session live programs with direct expert guidance and a peer cohort.', 'rocketpd' ),
			'tone'           => 'blue',
			'icon'           => 'calendar',
			'cta'            => __( 'Reserve a Seat', 'rocketpd' ),
		),
	);

	return $fallback[ $format ] ?? $fallback['self-paced'];
}

/**
 * Return a media URL from a WordPress/ACF image value.
 *
 * @param mixed $image Image ID, array, URL, or empty value.
 * @return string
 */
function rocketpd_get_learning_experience_image_url( $image ) {
	if ( is_numeric( $image ) && function_exists( 'wp_get_attachment_image_url' ) ) {
		return (string) wp_get_attachment_image_url( (int) $image, 'large' );
	}

	if ( is_array( $image ) ) {
		if ( ! empty( $image['sizes']['large'] ) ) {
			return (string) $image['sizes']['large'];
		}

		if ( ! empty( $image['url'] ) ) {
			return (string) $image['url'];
		}
	}

	return is_string( $image ) ? $image : '';
}

/**
 * Return the empty normalized learning-experience card shape.
 *
 * @return array
 */
function rocketpd_get_empty_learning_experience_card() {
	return array(
		'source_type'      => '',
		'source_id'        => 0,
		'slug'             => '',
		'title'            => '',
		'instructor'       => '',
		'instructor_title' => '',
		'instructor_image' => '',
		'format'           => 'self-paced',
		'format_label'     => '',
		'format_tone'      => 'gold',
		'price'            => '',
		'topic'            => '',
		'image'            => '',
		'href'             => '',
		'meta'             => '',
		'description'      => '',
		'cta_label'        => '',
		'status'           => '',
		'raw_source'       => null,
	);
}

/**
 * Normalize a static learning-experience card array.
 *
 * @param array $source    Source card data.
 * @param array $overrides Optional override data.
 * @return array
 */
function rocketpd_normalize_static_learning_experience_card( $source, $overrides = array() ) {
	$source = is_array( $source ) ? $source : array();
	$format = sanitize_key( $source['format'] ?? $overrides['format'] ?? 'self-paced' );
	$meta   = rocketpd_get_learning_experience_format_meta( $format );
	$card   = array_merge(
		rocketpd_get_empty_learning_experience_card(),
		array(
			'source_type'      => 'static',
			'source_id'        => isset( $source['source_id'] ) ? (int) $source['source_id'] : 0,
			'slug'             => (string) ( $source['slug'] ?? '' ),
			'title'            => (string) ( $source['title'] ?? '' ),
			'instructor'       => (string) ( $source['instructor'] ?? '' ),
			'instructor_title' => (string) ( $source['instructor_title'] ?? $source['instructorTitle'] ?? '' ),
			'instructor_image' => rocketpd_get_learning_experience_image_url( $source['instructor_image'] ?? $source['instructorImage'] ?? $source['headshot'] ?? '' ),
			'format'           => $format,
			'format_label'     => (string) ( $source['format_label'] ?? $source['formatLabel'] ?? $meta['label'] ?? '' ),
			'format_tone'      => (string) ( $meta['tone'] ?? 'gold' ),
			'price'            => (string) ( $source['price'] ?? '' ),
			'topic'            => (string) ( $source['topic'] ?? '' ),
			'image'            => rocketpd_get_learning_experience_image_url( $source['image'] ?? $source['card_image'] ?? $source['cardImage'] ?? '' ),
			'href'             => (string) ( $source['href'] ?? $source['url'] ?? '' ),
			'meta'             => (string) ( $source['meta'] ?? '' ),
			'description'      => (string) ( $source['description'] ?? $source['summary'] ?? '' ),
			'cta_label'        => (string) ( $source['cta_label'] ?? $source['ctaLabel'] ?? __( 'View', 'rocketpd' ) ),
			'status'           => (string) ( $source['status'] ?? '' ),
			'raw_source'       => $source,
		)
	);

	return rocketpd_normalize_learning_experience_card_overrides( $card, $overrides );
}

/**
 * Normalize a real cohort post into the learning-experience card shape.
 *
 * @param WP_Post|int $post      Cohort post object or ID.
 * @param array       $overrides Optional override data.
 * @return array
 */
function rocketpd_normalize_cohort_learning_experience_card( $post, $overrides = array() ) {
	$post = get_post( $post );

	if ( ! $post || 'cohort' !== get_post_type( $post ) ) {
		return rocketpd_get_empty_learning_experience_card();
	}

	$post_id         = (int) $post->ID;
	$format         = 'cohort';
	$format_meta    = rocketpd_get_learning_experience_format_meta( $format );
	$instructor     = '';
	$instructor_job = '';
	$instructor_img = '';
	$instructor_obj = function_exists( 'rocketpd_get_field' ) ? rocketpd_get_field( 'rpd_cohort_instructor', 0, $post_id ) : 0;
	$instructor_id  = is_object( $instructor_obj ) && isset( $instructor_obj->ID ) ? (int) $instructor_obj->ID : (int) $instructor_obj;

	if ( $instructor_id ) {
		$instructor     = get_the_title( $instructor_id );
		$instructor_job = function_exists( 'rocketpd_get_field' ) ? (string) rocketpd_get_field( 'rpd_instructor_bio_heading', '', $instructor_id ) : '';
		$instructor_img = function_exists( 'rocketpd_get_field' ) ? rocketpd_get_learning_experience_image_url( rocketpd_get_field( 'rpd_instructor_headshot', '', $instructor_id ) ) : '';
	}

	$card_image = function_exists( 'rocketpd_get_field' ) ? rocketpd_get_field( 'rpd_cohort_card_image', '', $post_id ) : '';
	$image      = rocketpd_get_learning_experience_image_url( $card_image );

	if ( ! $image && has_post_thumbnail( $post_id ) ) {
		$image = (string) get_the_post_thumbnail_url( $post_id, 'large' );
	}

	$price = function_exists( 'rocketpd_get_field' ) ? (string) rocketpd_get_field( 'rpd_cohort_price_label', '', $post_id ) : '';

	if ( ! $price && function_exists( 'rocketpd_get_field' ) ) {
		$price = (string) rocketpd_get_field( 'rpd_cohort_price_amount', '', $post_id );
	}

	$card = array_merge(
		rocketpd_get_empty_learning_experience_card(),
		array(
			'source_type'      => 'cohort',
			'source_id'        => $post_id,
			'slug'             => $post->post_name,
			'title'            => function_exists( 'rocketpd_get_field' ) ? (string) rocketpd_get_field( 'rpd_cohort_title', get_the_title( $post_id ), $post_id ) : get_the_title( $post_id ),
			'instructor'       => $instructor,
			'instructor_title' => $instructor_job,
			'instructor_image' => $instructor_img,
			'format'           => $format,
			'format_label'     => (string) ( $format_meta['label'] ?? __( 'Live-Virtual Cohort', 'rocketpd' ) ),
			'format_tone'      => (string) ( $format_meta['tone'] ?? 'blue' ),
			'price'            => $price,
			'topic'            => function_exists( 'rocketpd_get_field' ) ? (string) rocketpd_get_field( 'rpd_cohort_topic', '', $post_id ) : '',
			'image'            => $image,
			'href'             => get_permalink( $post_id ),
			'meta'             => function_exists( 'rocketpd_get_field' ) ? (string) rocketpd_get_field( 'rpd_cohort_session_count_label', '', $post_id ) : '',
			'description'      => function_exists( 'rocketpd_get_field' ) ? (string) rocketpd_get_field( 'rpd_cohort_short_description', get_the_excerpt( $post_id ), $post_id ) : get_the_excerpt( $post_id ),
			'cta_label'        => __( 'View', 'rocketpd' ),
			'status'           => function_exists( 'rocketpd_get_field' ) ? (string) rocketpd_get_field( 'rpd_cohort_status', '', $post_id ) : '',
			'raw_source'       => $post,
		)
	);

	return rocketpd_normalize_learning_experience_card_overrides( $card, $overrides );
}

/**
 * Apply non-empty override values to a normalized card.
 *
 * @param array $card      Normalized card.
 * @param array $overrides Override values.
 * @return array
 */
function rocketpd_normalize_learning_experience_card_overrides( $card, $overrides = array() ) {
	if ( ! is_array( $overrides ) || ! $overrides ) {
		return $card;
	}

	foreach ( $overrides as $key => $value ) {
		if ( '' === $value || null === $value || array() === $value ) {
			continue;
		}

		if ( array_key_exists( $key, $card ) ) {
			$card[ $key ] = $value;
		}
	}

	if ( empty( $card['format_label'] ) || empty( $card['format_tone'] ) || empty( $card['cta_label'] ) ) {
		$format_meta          = rocketpd_get_learning_experience_format_meta( $card['format'] );
		$card['format_label'] = $card['format_label'] ?: ( $format_meta['label'] ?? '' );
		$card['format_tone']  = $card['format_tone'] ?: ( $format_meta['tone'] ?? 'gold' );
		$card['cta_label']    = $card['cta_label'] ?: __( 'View', 'rocketpd' );
	}

	return $card;
}

/**
 * Normalize a learning-experience source into the shared card shape.
 *
 * @param mixed $source    Static array or WP_Post.
 * @param array $overrides Optional override data.
 * @return array
 */
function rocketpd_normalize_learning_experience_card( $source, $overrides = array() ) {
	if ( is_object( $source ) && isset( $source->ID ) ) {
		if ( 'cohort' === get_post_type( $source ) ) {
			return rocketpd_normalize_cohort_learning_experience_card( $source, $overrides );
		}

		$format_meta = rocketpd_get_learning_experience_format_meta( $overrides['format'] ?? 'self-paced' );

		return rocketpd_normalize_learning_experience_card_overrides(
			array_merge(
				rocketpd_get_empty_learning_experience_card(),
				array(
					'source_type'  => get_post_type( $source ),
					'source_id'    => (int) $source->ID,
					'slug'         => $source->post_name,
					'title'        => get_the_title( $source ),
					'format'       => sanitize_key( $overrides['format'] ?? 'self-paced' ),
					'format_label' => (string) ( $format_meta['label'] ?? '' ),
					'format_tone'  => (string) ( $format_meta['tone'] ?? 'gold' ),
					'image'        => has_post_thumbnail( $source->ID ) ? (string) get_the_post_thumbnail_url( $source->ID, 'large' ) : '',
					'href'         => get_permalink( $source ),
					'description'  => get_the_excerpt( $source ),
					'cta_label'    => __( 'View', 'rocketpd' ),
					'raw_source'   => $source,
				)
			),
			$overrides
		);
	}

	if ( is_array( $source ) ) {
		return rocketpd_normalize_static_learning_experience_card( $source, $overrides );
	}

	return rocketpd_get_empty_learning_experience_card();
}

/**
 * Normalize multiple learning-experience sources.
 *
 * @param array $items Learning-experience sources.
 * @return array
 */
function rocketpd_normalize_learning_experience_cards( $items ) {
	if ( ! is_array( $items ) ) {
		return array();
	}

	$cards = array();

	foreach ( $items as $item ) {
		$card = rocketpd_normalize_learning_experience_card( $item );

		if ( empty( $card['title'] ) || empty( $card['href'] ) ) {
			continue;
		}

		$cards[] = $card;
	}

	return $cards;
}

/**
 * Query published cohort posts as normalized learning-experience cards.
 *
 * @param array $args Query arguments.
 * @return array
 */
function rocketpd_get_related_cohort_learning_experiences( $args = array() ) {
	if ( ! class_exists( 'WP_Query' ) ) {
		return array();
	}

	$defaults = array(
		'post_type'           => 'cohort',
		'post_status'         => 'publish',
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	);

	$query = new WP_Query( array_merge( $defaults, is_array( $args ) ? $args : array() ) );

	if ( ! $query->have_posts() ) {
		return array();
	}

	$cards = array();

	foreach ( $query->posts as $post ) {
		$card = rocketpd_normalize_cohort_learning_experience_card( $post );

		if ( ! empty( $card['title'] ) && ! empty( $card['href'] ) ) {
			$cards[] = $card;
		}
	}

	wp_reset_postdata();

	return $cards;
}
