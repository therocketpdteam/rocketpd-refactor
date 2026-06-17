<?php
/**
 * Post body content.
 *
 * Renders the post content via do_shortcode() to support legacy WPBakery
 * shortcode content migrated from the live site. Once posts are converted
 * to Gutenberg blocks, this file can be simplified to the_content().
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="rpd-post-content">
	<?php
	// do_shortcode ensures WPBakery [vc_row] wrappers in post_content are
	// processed. wpautop runs inside the_content filter chain already.
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo do_shortcode( apply_filters( 'the_content', get_the_content() ) );
	?>
</div>
