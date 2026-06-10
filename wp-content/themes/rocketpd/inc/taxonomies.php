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
				'name'              => __( 'Related Topics', 'rocketpd' ),
				'singular_name'     => __( 'Related Topic', 'rocketpd' ),
				'search_items'      => __( 'Search Related Topics', 'rocketpd' ),
				'all_items'         => __( 'All Related Topics', 'rocketpd' ),
				'parent_item'       => __( 'Parent Related Topic', 'rocketpd' ),
				'parent_item_colon' => __( 'Parent Related Topic:', 'rocketpd' ),
				'edit_item'         => __( 'Edit Related Topic', 'rocketpd' ),
				'update_item'       => __( 'Update Related Topic', 'rocketpd' ),
				'add_new_item'      => __( 'Add New Related Topic', 'rocketpd' ),
				'new_item_name'     => __( 'New Related Topic Name', 'rocketpd' ),
				'menu_name'         => __( 'Related Topics', 'rocketpd' ),
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_menu'      => false,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'learning-topics',
				'with_front' => false,
			),
		)
	);
}
add_action( 'init', 'rocketpd_register_taxonomies' );

/**
 * Keep Related Topics off object-specific admin menus.
 */
function rocketpd_remove_learning_topic_admin_submenus() {
	global $submenu;

	$post_types = array( 'post', 'resource', 'lead_magnet', 'course', 'cohort', 'instructor' );

	foreach ( $post_types as $post_type ) {
		$parent_slug = 'edit.php' . ( 'post' === $post_type ? '' : '?post_type=' . $post_type );
		$menu_slug   = 'edit-tags.php?taxonomy=learning_topic' . ( 'post' === $post_type ? '' : '&post_type=' . $post_type );

		remove_submenu_page( $parent_slug, $menu_slug );
		remove_submenu_page( $parent_slug, str_replace( '&', '&amp;', $menu_slug ) );
	}

	foreach ( $submenu as $parent_slug => $items ) {
		foreach ( $items as $index => $item ) {
			$menu_slug = isset( $item[2] ) ? html_entity_decode( (string) $item[2], ENT_QUOTES, 'UTF-8' ) : '';

			if ( false !== strpos( $menu_slug, 'edit-tags.php?taxonomy=learning_topic' ) ) {
				unset( $submenu[ $parent_slug ][ $index ] );
			}
		}
	}
}
add_action( 'admin_menu', 'rocketpd_remove_learning_topic_admin_submenus', 999 );
