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
	$public   = isset( $args['public'] ) ? (bool) $args['public'] : true;
	$rewrite  = isset( $args['rewrite'] ) ? $args['rewrite'] : array(
		'slug'       => $slug,
		'with_front' => false,
	);
	$labels   = array(
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
	);

	if ( ! empty( $args['labels'] ) && is_array( $args['labels'] ) ) {
		$labels = array_merge( $labels, $args['labels'] );
	}

	register_post_type(
		$post_type,
		array(
			'labels'             => $labels,
			'public'             => $public,
			'show_ui'            => isset( $args['show_ui'] ) ? (bool) $args['show_ui'] : true,
			'show_in_rest'       => isset( $args['show_in_rest'] ) ? (bool) $args['show_in_rest'] : true,
			'show_in_menu'       => isset( $args['show_in_menu'] ) ? $args['show_in_menu'] : true,
			'menu_icon'          => $icon,
			'supports'           => $supports,
			'has_archive'        => isset( $args['has_archive'] ) ? (bool) $args['has_archive'] : true,
			'rewrite'            => $rewrite,
			'capability_type'    => 'post',
			'map_meta_cap'       => true,
			'publicly_queryable' => isset( $args['publicly_queryable'] ) ? (bool) $args['publicly_queryable'] : $public,
			'exclude_from_search' => isset( $args['exclude_from_search'] ) ? (bool) $args['exclude_from_search'] : ! $public,
			'query_var'          => isset( $args['query_var'] ) ? $args['query_var'] : $public,
			'show_in_nav_menus'  => isset( $args['show_in_nav_menus'] ) ? (bool) $args['show_in_nav_menus'] : $public,
		)
	);
}

/**
 * Register documented RocketPD content types.
 */
function rocketpd_register_post_types() {
	$content_types = array(
		'resource'    => array(
			'singular' => __( 'Resource', 'rocketpd' ),
			'plural'   => __( 'Resources', 'rocketpd' ),
			'slug'     => 'resource-library',
			'icon'     => 'dashicons-portfolio',
		),
		'lead_magnet' => array(
			'singular'     => __( 'Lead Magnet', 'rocketpd' ),
			'plural'       => __( 'Lead Magnets', 'rocketpd' ),
			'slug'         => 'resources',
			'icon'         => 'dashicons-media-document',
			'show_in_menu' => 'edit.php?post_type=resource',
		),
		'course'      => array(
			'singular'    => __( 'Course', 'rocketpd' ),
			'plural'      => __( 'Courses', 'rocketpd' ),
			'slug'        => 'launchpad/courses',
			'icon'        => 'dashicons-welcome-learn-more',
			'has_archive' => false,
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions' ),
		),
		'topic_hub'   => array(
			'singular'    => __( 'Topic', 'rocketpd' ),
			'plural'      => __( 'Topics', 'rocketpd' ),
			'slug'        => 'topic',
			'icon'        => 'dashicons-index-card',
			'has_archive' => false,
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions' ),
			'labels'      => array(
				'menu_name'             => __( 'Topics', 'rocketpd' ),
				'name'                  => __( 'Topics', 'rocketpd' ),
				'singular_name'         => __( 'Topic', 'rocketpd' ),
				'add_new'               => __( 'Add New Topic', 'rocketpd' ),
				'add_new_item'          => __( 'Add New Topic', 'rocketpd' ),
				'edit_item'             => __( 'Edit Topic', 'rocketpd' ),
				'new_item'              => __( 'New Topic', 'rocketpd' ),
				'view_item'             => __( 'View Topic', 'rocketpd' ),
				'view_items'            => __( 'View Topics', 'rocketpd' ),
				'search_items'          => __( 'Search Topics', 'rocketpd' ),
				'not_found'             => __( 'No topics found', 'rocketpd' ),
				'not_found_in_trash'    => __( 'No topics found in Trash', 'rocketpd' ),
				'parent_item_colon'     => __( 'Parent Topic:', 'rocketpd' ),
				'all_items'             => __( 'All Topics', 'rocketpd' ),
				'archives'              => __( 'Topic Archives', 'rocketpd' ),
				'attributes'            => __( 'Topic Attributes', 'rocketpd' ),
				'insert_into_item'      => __( 'Insert into topic', 'rocketpd' ),
				'uploaded_to_this_item' => __( 'Uploaded to this topic', 'rocketpd' ),
				'filter_items_list'     => __( 'Filter topics list', 'rocketpd' ),
				'items_list_navigation' => __( 'Topics list navigation', 'rocketpd' ),
				'items_list'            => __( 'Topics list', 'rocketpd' ),
			),
		),
		'instructor'  => array(
			'singular'          => __( 'Instructor', 'rocketpd' ),
			'plural'            => __( 'Instructors', 'rocketpd' ),
			'slug'              => 'instructors',
			'icon'              => 'dashicons-welcome-learn-more',
			'show_in_nav_menus' => true,
		),
		'member'      => array(
			'singular'            => __( 'Member', 'rocketpd' ),
			'plural'              => __( 'Members', 'rocketpd' ),
			'slug'                => 'member',
			'icon'                => 'dashicons-groups',
			'public'              => false,
			'publicly_queryable'  => false,
			'has_archive'         => false,
			'rewrite'             => false,
			'query_var'           => false,
			'show_in_nav_menus'   => false,
			'supports'            => array( 'title', 'thumbnail', 'page-attributes', 'revisions' ),
			'labels'              => array(
				'menu_name' => __( 'Members', 'rocketpd' ),
				'all_items' => __( 'All Members', 'rocketpd' ),
			),
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

/**
 * Keep Resources as the single admin parent for resource content.
 */
function rocketpd_register_resource_admin_submenus() {
	global $submenu;

	$parent_slug = 'edit.php?post_type=resource';

	if ( empty( $submenu[ $parent_slug ] ) || ! is_array( $submenu[ $parent_slug ] ) ) {
		return;
	}

	$resource_types = array(
		'guide'    => __( 'Guides', 'rocketpd' ),
		'playbook' => __( 'Playbooks', 'rocketpd' ),
		'podcast'  => __( 'Podcasts', 'rocketpd' ),
		'webinar'  => __( 'Webinars', 'rocketpd' ),
	);

	foreach ( $resource_types as $type => $label ) {
		$submenu[ $parent_slug ][] = array(
			$label,
			'edit_posts',
			add_query_arg(
				array(
					'post_type'              => 'resource',
					'rocketpd_resource_type' => $type,
				),
				'edit.php'
			),
			$label,
		);
	}
}
add_action( 'admin_menu', 'rocketpd_register_resource_admin_submenus', 20 );

/**
 * Filter the Resources list when one of the resource-type submenu links is used.
 *
 * Existing installs may store resource type as different ACF/meta keys while the
 * final Resource model settles, so support the known likely keys without
 * changing the public data model.
 *
 * @param WP_Query $query Current query.
 */
function rocketpd_filter_resource_admin_by_type( $query ) {
	if ( ! is_admin() || ! $query->is_main_query() ) {
		return;
	}

	$post_type = $query->get( 'post_type' );

	if ( 'resource' !== $post_type || empty( $_GET['rocketpd_resource_type'] ) ) {
		return;
	}

	$resource_type = sanitize_key( wp_unslash( $_GET['rocketpd_resource_type'] ) );
	$allowed_types = array( 'guide', 'playbook', 'podcast', 'webinar' );

	if ( ! in_array( $resource_type, $allowed_types, true ) ) {
		return;
	}

	$query->set(
		'meta_query',
		array(
			'relation' => 'OR',
			array(
				'key'   => 'resource_type',
				'value' => $resource_type,
			),
			array(
				'key'   => 'rpd_resource_type',
				'value' => $resource_type,
			),
			array(
				'key'   => 'type',
				'value' => $resource_type,
			),
		)
	);
}
add_action( 'pre_get_posts', 'rocketpd_filter_resource_admin_by_type' );

/**
 * Keep the selected resource-type submenu highlighted.
 *
 * @param string $submenu_file Current submenu file.
 * @return string
 */
function rocketpd_resource_admin_submenu_file( $submenu_file ) {
	if ( empty( $_GET['post_type'] ) || 'resource' !== sanitize_key( wp_unslash( $_GET['post_type'] ) ) || empty( $_GET['rocketpd_resource_type'] ) ) {
		return $submenu_file;
	}

	$resource_type = sanitize_key( wp_unslash( $_GET['rocketpd_resource_type'] ) );
	$allowed_types = array( 'guide', 'playbook', 'podcast', 'webinar' );

	if ( ! in_array( $resource_type, $allowed_types, true ) ) {
		return $submenu_file;
	}

	return add_query_arg(
		array(
			'post_type'              => 'resource',
			'rocketpd_resource_type' => $resource_type,
		),
		'edit.php'
	);
}
add_filter( 'submenu_file', 'rocketpd_resource_admin_submenu_file' );
