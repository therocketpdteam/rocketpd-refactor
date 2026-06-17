<?php
/**
 * Post-related hooks and filters.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Suppress the "Header and Footer Scripts" plugin (by Anand Kumar) output
 * on the frontend for all singular posts. The meta value is preserved in the
 * DB and remains visible in the editor meta box — it just won't be echoed
 * into wp_head on the live page.
 *
 * The plugin hooks its per-post head script output onto wp_head at priority 1
 * using the function `hfs_header_footer_scripts`. We remove it only on singular
 * post views so it doesn't affect other post types or page templates.
 */
/**
 * Suppress the "Header and Footer Scripts" plugin (by Anand Kumar) output
 * on the frontend for single posts.
 *
 * The plugin uses an object method (array( &$this, 'wp_head' )) which can't
 * be removed via remove_action() without a reference to the instance.
 * Instead we filter the post meta value to return empty on the frontend,
 * which causes the plugin to output nothing.
 *
 * The meta value is unaffected in the DB — the editor meta box still shows
 * and saves correctly. Only the frontend output is suppressed.
 *
 * To restore: comment out the add_filter() call below.
 */
add_filter(
	'get_post_metadata',
	function ( $value, $object_id, $meta_key, $single ) {
		if (
			! is_admin()
			&& is_singular( 'post' )
			&& '_shfs_head_scripts' === $meta_key // Comment out to re-enable.
		) {
			return $single ? '' : array( '' );
		}
		return $value;
	},
	10,
	4
);
