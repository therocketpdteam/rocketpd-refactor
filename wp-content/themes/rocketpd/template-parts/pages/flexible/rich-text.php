<?php
/**
 * Flexible page — Rich Text layout.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$content = $args['content'] ?? '';

if ( ! $content ) {
	return;
}

rpd_flex_section_open( 'rich-text', $args );
?>
	<div class="rpd-flex-container rpd-flex-container--prose">
		<div class="rpd-flex-prose">
			<?php echo wp_kses_post( $content ); ?>
		</div>
	</div>
<?php
rpd_flex_section_close();
