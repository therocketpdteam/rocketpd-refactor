<?php
/**
 * Post body content.
 *
 * Strips WPBakery and Nectar shortcodes from post content before rendering,
 * leaving only the prose. Handles vc_custom_heading by extracting the text
 * attribute and converting it to a semantic <h2> before stripping.
 *
 * This runs at render time only — the DB is never modified, so posts remain
 * fully editable. New Gutenberg posts are unaffected (no vc_ tags present).
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Convert [vc_custom_heading text="..."] to <h2> before stripping.
 * The heading text lives inside the tag attribute, not between tags,
 * so it would be lost if we stripped blindly.
 *
 * @param string $content Raw post content.
 * @return string Content with vc_custom_heading replaced by <h2> tags.
 */
function rocketpd_convert_vc_headings( $content ) {
	return preg_replace_callback(
		'/\[\s*vc_custom_heading\b(?:"[^"]*"|\'[^\']*\'|[^\]])*\btext=["\']([^"\']+)["\'](?:"[^"]*"|\'[^\']*\'|[^\]])*\/?\]/is',
		function ( $matches ) {
			return '<h2>' . wp_kses_post( $matches[1] ) . '</h2>';
		},
		$content
	);
}

/**
 * Strip all WPBakery, Nectar, and Salient shortcode tags from content.
 *
 * Handles:
 * - Multiline tags (s flag / DOTALL).
 * - Quoted attribute values containing ] (e.g. inline CSS).
 * - Self-closing [vc_tag /] and block [vc_tag]...[/vc_tag] tags.
 * - vc_, wpb_, nectar_ prefixes.
 * - Standalone [divider ...] tags from the Salient/Nectar theme.
 * - Leftover blank lines after stripping.
 *
 * Does NOT strip content between shortcode tags — only the tags themselves.
 * Does NOT modify the database — runs at render time only.
 *
 * @param string $content Raw post content.
 * @return string Cleaned content.
 */
function rocketpd_strip_wpbakery( $content ) {
	// Convert vc_custom_heading to <h2> before stripping so text is preserved.
	$content = rocketpd_convert_vc_headings( $content );

	// Strip all vc_, wpb_, nectar_ shortcode tags.
	$content = preg_replace(
		'/\[\/?\s*(?:vc_|wpb_|nectar_)(?:"[^"]*"|\'[^\']*\'|[^\]])*\/?\]/is',
		'',
		$content
	);

	// Strip standalone [divider ...] tags from Salient/Nectar theme.
	$content = preg_replace(
		'/\[\/?\s*divider(?:"[^"]*"|\'[^\']*\'|[^\]])*\/?\]/is',
		'',
		$content
	);

	// Collapse runs of blank lines left after stripping (3+ newlines → 2).
	$content = preg_replace( '/\n{3,}/', "\n\n", $content );

	return trim( $content );
}
?>
<div class="rpd-post-content">
	<?php
	$raw     = get_the_content();
	$cleaned = rocketpd_strip_wpbakery( $raw );

	// apply_filters( 'the_content' ) runs wpautop, wptexturize, and other
	// standard WP content filters. Shortcodes are already stripped so
	// do_shortcode (which runs inside this filter) has nothing to process.
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo apply_filters( 'the_content', $cleaned );
	?>
</div>
