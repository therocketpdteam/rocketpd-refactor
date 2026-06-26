<?php
/**
 * Empowered Educator Experience — RocketPD pricing section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_ee_pricing_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$eyebrow = rocketpd_get_field( 'rpd_ee_pricing_eyebrow', __( 'RocketPD Pricing', 'rocketpd' ) );
$heading = rocketpd_get_field( 'rpd_ee_pricing_heading', __( "Great K-12 PD doesn't have to break the budget.", 'rocketpd' ) );
$sub     = rocketpd_get_field( 'rpd_ee_pricing_sub', __( "How much you'll pay with RocketPD.", 'rocketpd' ) );
$amount  = rocketpd_get_field( 'rpd_ee_pricing_amount', __( 'Less than $100', 'rocketpd' ) );

$fallback_items = array(
	array(
		'text' => __( 'Per contact hour for live virtual or video-based asynchronous learning experiences.', 'rocketpd' ),
	),
	array(
		'text' => __( 'Savings that you can pass on to students!', 'rocketpd' ),
	),
);

$items = rocketpd_get_field( 'rpd_ee_pricing_items', $fallback_items );
$items = is_array( $items ) ? $items : $fallback_items;
?>

<section class="rpd-ee-pricing rpd-ee-section">
	<div class="rpd-ee-container">
		<div class="rpd-ee-section-header rpd-ee-section-header--center">
			<?php if ( $eyebrow ) : ?>
				<p class="rpd-ee-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>
			<?php if ( $heading ) : ?>
				<h2><?php echo esc_html( $heading ); ?></h2>
			<?php endif; ?>
			<?php if ( $sub ) : ?>
				<p><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>
		</div>

		<div class="rpd-ee-pricing__card">
			<div class="rpd-ee-pricing__card-top">
				<p class="rpd-ee-pricing__tag"><?php esc_html_e( 'Per contact hour', 'rocketpd' ); ?></p>
				<?php if ( $amount ) : ?>
					<p class="rpd-ee-pricing__amount"><?php echo esc_html( $amount ); ?></p>
				<?php endif; ?>
			</div>
			<ul class="rpd-ee-pricing__items">
				<?php foreach ( $items as $item ) : ?>
					<?php $text = $item['text'] ?? ''; ?>
					<?php if ( $text ) : ?>
						<li>
							<span aria-hidden="true">★</span>
							<?php echo esc_html( $text ); ?>
						</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>
