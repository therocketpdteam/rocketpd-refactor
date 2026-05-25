<?php
/**
 * Custom post type registration.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register a documented RocketPD custom post type.
 *
 * Field groups and template-specific data belong in ACF local JSON, not here.
 *
 * @param string $post_type Post type key.
 * @param array  $args      Registration arguments.
 */
function rocketpd_register_content_type( $post_type, $args ) {
	$singular = $args['singular'];
	$plural   = $args['plural'];
	$slug     = $args['slug'];
	$icon     = $args['icon'];
	$supports = isset( $args['supports'] ) ? $args['supports'] : array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' );

	register_post_type(
		$post_type,
		array(
			'labels'             => array(
				'name'                  => $plural,
				'singular_name'         => $singular,
				'add_new_item'          => sprintf(
					/* translators: %s: singular post type label. */
					__( 'Add New %s', 'rocketpd' ),
					$singular
				),
				'edit_item'             => sprintf(
					/* translators: %s: singular post type label. */
					__( 'Edit %s', 'rocketpd' ),
					$singular
				),
				'new_item'              => sprintf(
					/* translators: %s: singular post type label. */
					__( 'New %s', 'rocketpd' ),
					$singular
				),
				'view_item'             => sprintf(
					/* translators: %s: singular post type label. */
					__( 'View %s', 'rocketpd' ),
					$singular
				),
				'search_items'          => sprintf(
					/* translators: %s: plural post type label. */
					__( 'Search %s', 'rocketpd' ),
					$plural
				),
				'not_found'             => sprintf(
					/* translators: %s: plural post type label. */
					__( 'No %s found.', 'rocketpd' ),
					strtolower( $plural )
				),
				'not_found_in_trash'    => sprintf(
					/* translators: %s: plural post type label. */
					__( 'No %s found in Trash.', 'rocketpd' ),
					strtolower( $plural )
				),
				'all_items'             => sprintf(
					/* translators: %s: plural post type label. */
					__( 'All %s', 'rocketpd' ),
					$plural
				),
				'archives'              => sprintf(
					/* translators: %s: singular post type label. */
					__( '%s Archives', 'rocketpd' ),
					$singular
				),
				'attributes'            => sprintf(
					/* translators: %s: singular post type label. */
					__( '%s Attributes', 'rocketpd' ),
					$singular
				),
				'insert_into_item'      => sprintf(
					/* translators: %s: singular post type label. */
					__( 'Insert into %s', 'rocketpd' ),
					strtolower( $singular )
				),
				'uploaded_to_this_item' => sprintf(
					/* translators: %s: singular post type label. */
					__( 'Uploaded to this %s', 'rocketpd' ),
					strtolower( $singular )
				),
				'menu_name'             => $plural,
			),
			'public'             => true,
			'show_in_rest'       => true,
			'menu_icon'          => $icon,
			'supports'           => $supports,
			'has_archive'        => isset( $args['has_archive'] ) ? (bool) $args['has_archive'] : true,
			'rewrite'            => array(
				'slug'       => $slug,
				'with_front' => false,
			),
			'capability_type'    => 'post',
			'map_meta_cap'       => true,
			'publicly_queryable' => true,
		)
	);
}

/**
 * Register documented RocketPD content types.
 */
function rocketpd_register_post_types() {
	$content_types = array(
		'lead_magnet' => array(
			'singular' => __( 'Lead Magnet', 'rocketpd' ),
			'plural'   => __( 'Lead Magnets', 'rocketpd' ),
			'slug'     => 'resources',
			'icon'     => 'dashicons-media-document',
		),
		'resource'    => array(
			'singular' => __( 'Resource', 'rocketpd' ),
			'plural'   => __( 'Resources', 'rocketpd' ),
			'slug'     => 'resource-library',
			'icon'     => 'dashicons-portfolio',
		),
		'course'      => array(
			'singular'    => __( 'Course', 'rocketpd' ),
			'plural'      => __( 'Courses', 'rocketpd' ),
			'slug'        => 'courses',
			'icon'        => 'dashicons-welcome-learn-more',
			'has_archive' => false,
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions' ),
		),
		'topic_hub'   => array(
			'singular'    => __( 'Topic Hub', 'rocketpd' ),
			'plural'      => __( 'Topics', 'rocketpd' ),
			'slug'        => 'topic',
			'icon'        => 'dashicons-index-card',
			'has_archive' => false,
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions' ),
		),
		'instructor'  => array(
			'singular' => __( 'Instructor', 'rocketpd' ),
			'plural'   => __( 'Instructors', 'rocketpd' ),
			'slug'     => 'instructors',
			'icon'     => 'dashicons-welcome-learn-more',
		),
		'cohort'      => array(
			'singular'    => __( 'Cohort', 'rocketpd' ),
			'plural'      => __( 'Cohorts', 'rocketpd' ),
			'slug'        => 'cohorts',
			'icon'        => 'dashicons-groups',
			'has_archive' => false,
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions' ),
		),
		'testimonial' => array(
			'singular' => __( 'Testimonial', 'rocketpd' ),
			'plural'   => __( 'Testimonials', 'rocketpd' ),
			'slug'     => 'testimonials',
			'icon'     => 'dashicons-format-quote',
		),
		'partner'     => array(
			'singular' => __( 'Partner', 'rocketpd' ),
			'plural'   => __( 'Partners', 'rocketpd' ),
			'slug'     => 'partners',
			'icon'     => 'dashicons-groups',
		),
	);

	foreach ( $content_types as $post_type => $args ) {
		rocketpd_register_content_type( $post_type, $args );
	}
}
add_action( 'init', 'rocketpd_register_post_types' );
