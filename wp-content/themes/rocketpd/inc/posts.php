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
 * To restore the plugin output on single posts, simply comment out or
 * delete the remove_action() call below. The plugin and its meta box
 * are unaffected — this only controls frontend output.
 */
add_action(
	'wp',
	function () {
		if ( is_singular( 'post' ) ) {
			// Comment out the line below to re-enable the plugin output on posts.
			remove_action( 'wp_head', 'hfs_header_footer_scripts', 1 );
		}
	}
);
