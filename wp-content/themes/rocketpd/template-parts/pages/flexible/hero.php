<?php
/**
 * Flexible page — Hero layout.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bg        = $args['bg'] ?? 'navy';
$eyebrow   = $args['eyebrow'] ?? '';
$headline  = $args['headline'] ?? '';
$highlight = $args['highlight'] ?? '';
$subtext   = $args['subtext'] ?? '';
$show_cta  = isset( $args['show_cta'] ) ? (bool) $args['show_cta'] : true;
$cta_text  = $args['cta_text'] ?? '';
$cta_url   = $args['cta_url'] ?? '';

if ( ! $headline ) {
	return;
}

if ( $highlight ) {
	$headline_html = str_replace(
		esc_html( $highlight ),
		'<mark>' . esc_html( $highlight ) . '</mark>',
		esc_html( $headline )
	);
} else {
	$headline_html = esc_html( $headline );
}

rpd_flex_section_open( 'hero', $args );
?>
	<div class="rpd-flex-container">
		<div class="rpd-flex-hero__inner">
			<?php if ( $eyebrow ) : ?>
				<p class="rpd-flex-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>
			<h1 class="rpd-flex-hero__headline">
				<?php echo wp_kses( $headline_html, array( 'mark' => array() ) ); ?>
			</h1>
			<?php if ( $subtext ) : ?>
				<p class="rpd-flex-hero__sub"><?php echo esc_html( $subtext ); ?></p>
			<?php endif; ?>
			<?php if ( $show_cta && $cta_text && $cta_url ) : ?>
				<a href="<?php echo esc_url( $cta_url ); ?>" class="rpd-flex-btn rpd-flex-btn--primary">
					<?php echo esc_html( $cta_text ); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
<?php
rpd_flex_section_close();
