<?php
/**
 * Post body content.
 *
 * Strips WPBakery and Nectar shortcodes from post content before rendering,
 * leaving only the prose. This avoids a WPBakery dependency on staging and
 * production while keeping all migrated content intact in the DB.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Strip WPBakery and Nectar shortcode tags from content.
 *
 * Handles:
 * - Multiline tags (attributes spanning multiple lines).
 * - Quoted attribute values that contain ] characters (e.g. inline CSS).
 * - Self-closing tags [vc_tag /] and block tags [vc_tag]...[/vc_tag].
 * - nectar_global_section and other nectar_ tags from the live theme.
 * - Leftover blank lines / empty paragraphs after stripping.
 *
 * Does NOT strip content between shortcode tags — only the tags themselves.
 *
 * @param string $content Raw post content.
 * @return string Cleaned content.
 */
function rocketpd_strip_wpbakery( $content ) {
	// Pattern explanation:
	// \[        — opening bracket
	// \/?       — optional / for closing tags
	// \s*       — optional whitespace
	// (vc_|nectar_|wpb_) — tag prefixes to strip
	// (?:       — non-capturing group for attribute matching
	//   "[^"]*" — double-quoted value (may contain ])
	//   |'[^']*'— single-quoted value (may contain ])
	//   |[^\]]  — any char that isn't ] (unquoted values, whitespace)
	// )*        — zero or more of the above
	// \/?       — optional trailing / for self-closing tags
	// \]        — closing bracket
	// The s flag (DOTALL) allows . to match newlines for multiline tags.

	$pattern = '/\[\/?\s*(?:vc_|nectar_|wpb_)(?:"[^"]*"|\'[^\']*\'|[^\]])*\/?\]/is';
	$content = preg_replace( $pattern, '', $content );

	// Collapse runs of blank lines left after stripping tags (3+ newlines → 2).
	$content = preg_replace( '/\n{3,}/', "\n\n", $content );

	// Trim leading/trailing whitespace.
	$content = trim( $content );

	return $content;
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
