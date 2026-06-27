<?php
/**
 * Flexible page — CTA Band layout.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bg                  = $args['bg'] ?? 'navy';
$eyebrow             = $args['eyebrow'] ?? '';
$heading             = $args['heading'] ?? '';
$subtext             = $args['subtext'] ?? '';
$primary_text        = $args['primary_cta_text'] ?? '';
$primary_url         = $args['primary_cta_url'] ?? '';
$show_secondary      = isset( $args['show_secondary_cta'] ) ? (bool) $args['show_secondary_cta'] : true;
$secondary_text      = $show_secondary ? ( $args['secondary_cta_text'] ?? '' ) : '';
$secondary_url       = $show_secondary ? ( $args['secondary_cta_url'] ?? '' ) : '';

if ( ! $heading ) {
	return;
}

rpd_flex_section_open( 'cta', $args );
?>
	<div class="rpd-flex-container">
		<div class="rpd-flex-cta__inner">
			<?php if ( $eyebrow ) : ?>
				<p class="rpd-flex-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>
			<h2 class="rpd-flex-cta__heading"><?php echo esc_html( $heading ); ?></h2>
			<?php if ( $subtext ) : ?>
				<p class="rpd-flex-cta__sub"><?php echo esc_html( $subtext ); ?></p>
			<?php endif; ?>
			<?php if ( $primary_text || $secondary_text ) : ?>
				<div class="rpd-flex-cta__actions">
					<?php if ( $primary_text && $primary_url ) : ?>
						<a href="<?php echo esc_url( $primary_url ); ?>" class="rpd-flex-btn rpd-flex-btn--primary">
							<?php echo esc_html( $primary_text ); ?>
						</a>
					<?php endif; ?>
					<?php if ( $secondary_text && $secondary_url ) : ?>
						<a href="<?php echo esc_url( $secondary_url ); ?>" class="rpd-flex-btn rpd-flex-btn--secondary">
							<?php echo esc_html( $secondary_text ); ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php
rpd_flex_section_close();
