<?php
/**
 * Trust Cycle Guide RocketPD fit section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_trust_fit_eyebrow', __( 'Where RocketPD fits', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_trust_fit_headline', __( 'Where RocketPD fits.', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_trust_fit_body', __( 'RocketPD was built around a simple idea:', 'rocketpd' ) );
$quote = rocketpd_get_field( 'rpd_trust_fit_quote', __( 'Professional learning should support the work - not sit outside of it.', 'rocketpd' ) );
$closing = rocketpd_get_field( 'rpd_trust_fit_closing', __( 'Professional learning becomes infrastructure, not an initiative.', 'rocketpd' ) );
$fallback = array(
	array( 'text' => __( 'Provide expert-led learning on demand', 'rocketpd' ) ),
	array( 'text' => __( 'Support educator growth continuously', 'rocketpd' ) ),
	array( 'text' => __( 'Align learning to strategic priorities', 'rocketpd' ) ),
	array( 'text' => __( 'Simplify professional credit', 'rocketpd' ) ),
	array( 'text' => __( 'Integrate learning into daily practice', 'rocketpd' ) ),
);
$items = rocketpd_get_field( 'rpd_trust_fit_checklist', $fallback );
$items = array_filter(
	is_array( $items ) ? $items : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['text'] );
	}
);
$items = $items ?: $fallback;
?>

<section class="rpd-trust-fit rpd-trust-section rpd-trust-dark">
	<div class="rpd-trust-container rpd-trust-narrow">
		<p class="rpd-trust-kicker"><?php echo esc_html( $eyebrow ); ?></p>
		<h2><?php echo esc_html( $headline ); ?></h2>
		<p><?php echo esc_html( $body ); ?></p>
		<blockquote><?php echo esc_html( $quote ); ?></blockquote>
		<div class="rpd-trust-fit-list">
			<?php foreach ( $items as $item ) : ?>
				<div><?php echo esc_html( $item['text'] ); ?></div>
			<?php endforeach; ?>
		</div>
		<p class="rpd-trust-fit-closing"><?php echo esc_html( $closing ); ?></p>
	</div>
</section>
