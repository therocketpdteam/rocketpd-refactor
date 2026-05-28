<?php
/**
 * Custom taxonomy registration.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register shared content taxonomies.
 */
function rocketpd_register_taxonomies() {
	register_taxonomy(
		'learning_topic',
		array( 'post', 'resource', 'lead_magnet', 'course', 'cohort', 'instructor' ),
		array(
			'labels'            => array(
				'name'              => __( 'Learning Topics', 'rocketpd' ),
				'singular_name'     => __( 'Learning Topic', 'rocketpd' ),
				'search_items'      => __( 'Search Learning Topics', 'rocketpd' ),
				'all_items'         => __( 'All Learning Topics', 'rocketpd' ),
				'parent_item'       => __( 'Parent Learning Topic', 'rocketpd' ),
				'parent_item_colon' => __( 'Parent Learning Topic:', 'rocketpd' ),
				'edit_item'         => __( 'Edit Learning Topic', 'rocketpd' ),
				'update_item'       => __( 'Update Learning Topic', 'rocketpd' ),
				'add_new_item'      => __( 'Add New Learning Topic', 'rocketpd' ),
				'new_item_name'     => __( 'New Learning Topic Name', 'rocketpd' ),
				'menu_name'         => __( 'Learning Topics', 'rocketpd' ),
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'learning-topics',
				'with_front' => false,
			),
		)
	);
}
add_action( 'init', 'rocketpd_register_taxonomies' );
