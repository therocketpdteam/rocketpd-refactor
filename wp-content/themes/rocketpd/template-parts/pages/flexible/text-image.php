<?php
/**
 * Flexible page — Text + Image layout.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bg         = $args['bg'] ?? 'white';
$heading    = $args['heading'] ?? '';
$body       = $args['body'] ?? '';
$show_cta   = isset( $args['show_cta'] ) ? (bool) $args['show_cta'] : true;
$cta_text   = $args['cta_text'] ?? '';
$cta_url    = $args['cta_url'] ?? '';
$show_image = isset( $args['show_image'] ) ? (bool) $args['show_image'] : true;
$image_id   = $show_image ? intval( $args['image'] ?? 0 ) : 0;
$image_pos  = $args['image_position'] ?? 'right';

if ( ! $heading && ! $body && ! $image_id ) {
	return;
}

rpd_flex_section_open( 'text-image', $args );
?>
	<div class="rpd-flex-container">
		<div class="rpd-flex-ti__grid<?php echo $image_id ? ' rpd-flex-ti__grid--img-' . esc_attr( $image_pos ) : ' rpd-flex-ti__grid--text-only'; ?>">
			<div class="rpd-flex-ti__content">
				<?php if ( $heading ) : ?>
					<h2 class="rpd-flex-ti__heading"><?php echo esc_html( $heading ); ?></h2>
				<?php endif; ?>
				<?php if ( $body ) : ?>
					<p class="rpd-flex-ti__body"><?php echo esc_html( $body ); ?></p>
				<?php endif; ?>
				<?php if ( $show_cta && $cta_text && $cta_url ) : ?>
					<a href="<?php echo esc_url( $cta_url ); ?>" class="rpd-flex-btn rpd-flex-btn--primary">
						<?php echo esc_html( $cta_text ); ?>
					</a>
				<?php endif; ?>
			</div>
			<?php if ( $image_id ) : ?>
				<div class="rpd-flex-ti__image-wrap">
					<?php echo wp_get_attachment_image( $image_id, 'large', false, array( 'class' => 'rpd-flex-ti__image' ) ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php
rpd_flex_section_close();
