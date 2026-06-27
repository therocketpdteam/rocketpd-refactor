<?php
/**
 * Flexible page — Stats Strip layout.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bg          = $args['bg'] ?? 'navy';
$show_header = isset( $args['show_header'] ) ? (bool) $args['show_header'] : true;
$eyebrow     = $show_header ? ( $args['eyebrow'] ?? '' ) : '';
$heading     = $show_header ? ( $args['heading'] ?? '' ) : '';
$stats       = $args['stats'] ?? array();

if ( ! $stats ) {
	return;
}

rpd_flex_section_open( 'stats', $args );
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
		<div class="rpd-flex-stats">
			<?php foreach ( $stats as $stat ) : ?>
				<?php
				$value      = $stat['value'] ?? '';
				$label      = $stat['label'] ?? '';
				$source     = $stat['source'] ?? '';
				$source_url = $stat['source_url'] ?? '';
				?>
				<?php if ( $value || $label ) : ?>
					<div class="rpd-flex-stat">
						<?php if ( $value ) : ?>
							<p class="rpd-flex-stat__value"><?php echo esc_html( $value ); ?></p>
						<?php endif; ?>
						<?php if ( $label ) : ?>
							<p class="rpd-flex-stat__label"><?php echo esc_html( $label ); ?></p>
						<?php endif; ?>
						<?php if ( $source ) : ?>
							<p class="rpd-flex-stat__source">
								<?php if ( $source_url ) : ?>
									<a href="<?php echo esc_url( $source_url ); ?>" target="_blank" rel="noopener noreferrer">
										<?php echo esc_html( $source ); ?>
									</a>
								<?php else : ?>
									<?php echo esc_html( $source ); ?>
								<?php endif; ?>
							</p>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
<?php
rpd_flex_section_close();
