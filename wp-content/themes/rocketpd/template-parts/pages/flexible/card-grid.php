<?php
/**
 * Flexible page — Card Grid layout.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bg          = $args['bg'] ?? 'soft';
$show_header = isset( $args['show_header'] ) ? (bool) $args['show_header'] : true;
$eyebrow     = $show_header ? ( $args['eyebrow'] ?? '' ) : '';
$heading     = $show_header ? ( $args['heading'] ?? '' ) : '';
$columns     = max( 1, min( 3, intval( $args['columns'] ?? 3 ) ) );
$cards       = $args['cards'] ?? array();

if ( ! $cards ) {
	return;
}

rpd_flex_section_open( 'card-grid', $args );
?>
	<div class="rpd-flex-container">
		<?php if ( $eyebrow || $heading ) : ?>
			<header class="rpd-flex-section-header">
				<?php if ( $eyebrow ) : ?>
					<p class="rpd-flex-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
				<?php endif; ?>
				<?php if ( $heading ) : ?>
					<h2 class="rpd-flex-section-heading"><?php echo esc_html( $heading ); ?></h2>
				<?php endif; ?>
			</header>
		<?php endif; ?>
		<div class="rpd-flex-card-grid" style="--flex-cols: <?php echo esc_attr( $columns ); ?>">
			<?php foreach ( $cards as $card ) : ?>
				<?php
				$icon         = $card['icon'] ?? '';
				$card_heading = $card['heading'] ?? '';
				$card_body    = $card['body'] ?? '';
				?>
				<?php if ( $card_heading || $card_body ) : ?>
					<div class="rpd-flex-card">
						<?php if ( $icon ) : ?>
							<div class="rpd-flex-card__icon" aria-hidden="true">
								<i data-lucide="<?php echo esc_attr( $icon ); ?>"></i>
							</div>
						<?php endif; ?>
						<?php if ( $card_heading ) : ?>
							<h3 class="rpd-flex-card__heading"><?php echo esc_html( $card_heading ); ?></h3>
						<?php endif; ?>
						<?php if ( $card_body ) : ?>
							<p class="rpd-flex-card__body"><?php echo esc_html( $card_body ); ?></p>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
<?php
rpd_flex_section_close();
