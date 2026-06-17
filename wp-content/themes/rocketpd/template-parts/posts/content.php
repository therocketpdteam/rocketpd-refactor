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
 * Uses a simple targeted pattern — only matches vc_custom_heading,
 * extracts the text="" value, ignores all other attributes.
 *
 * @param string $content Raw post content.
 * @return string Content with vc_custom_heading replaced by <h2> tags.
 */
function rocketpd_convert_vc_headings( $content ) {
	// Match [vc_custom_heading ... text="VALUE" ...] in any attribute order.
	// Uses a lazy .*? with the s flag to handle multiline tags safely.
	// Anchored to vc_custom_heading only — not a general shortcode pattern.
	return preg_replace_callback(
		'/\[vc_custom_heading\b[^\]]*?\btext=["\']([^"\']+)["\'][^\]]*?\]/is',
		function ( $matches ) {
			return '<h2>' . wp_kses_post( $matches[1] ) . '</h2>';
		},
		$content
	);
}

/**
 * Strip all WPBakery, Nectar, and Salient shortcode tags from content.
 *
 * Uses a simple [^]]* pattern — safe for WPBakery because its attribute
 * values never contain literal ] characters. Avoids catastrophic
 * backtracking caused by nested alternation on long attribute strings.
 *
 * Handles:
 * - Opening tags:      [vc_row attr="val"]
 * - Closing tags:      [/vc_column]
 * - Self-closing tags: [vc_tag /]
 * - Multiline tags:    s flag allows newlines in attribute lists
 * - Prefixes:          vc_, wpb_, nectar_, divider (Salient)
 *
 * Does NOT strip content between shortcode tags — only the tags themselves.
 * Does NOT modify the database — runs at render time only.
 *
 * @param string $content Raw post content.
 * @return string Cleaned content.
 */
function rocketpd_strip_wpbakery( $content ) {
	// Step 1: convert vc_custom_heading to <h2> before anything is stripped.
	$content = rocketpd_convert_vc_headings( $content );

	// Step 2: convert [divider ...] to <hr> — preserves the visual section
	// break without depending on WPBakery or Salient to render it.
	$content = preg_replace(
		'/\[divider[^]]*\]/is',
		'<hr class="rpd-post-divider">',
		$content
	);

	// Step 3: strip all vc_, wpb_, nectar_ shortcode tags.
	// [^]]* is safe here — WPBakery never puts ] inside attribute values.
	$content = preg_replace(
		'/\[\/?\s*(?:vc_|wpb_|nectar_)[^]]*\]/is',
		'',
		$content
	);

	// Step 3: collapse runs of blank lines left after stripping (3+ → 2).
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
