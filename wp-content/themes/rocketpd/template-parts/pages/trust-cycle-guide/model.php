<?php
/**
 * Trust Cycle Guide model problem section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow       = rocketpd_get_field( 'rpd_trust_model_eyebrow', __( 'In education', 'rocketpd' ) );
$headline      = rocketpd_get_field( 'rpd_trust_model_headline', __( 'Professional learning isn\'t broken. The model is.', 'rocketpd' ) );
$body          = rocketpd_get_field( 'rpd_trust_model_body', __( 'When districts are rethinking whether professional learning matters, they are usually asking whether it is working. In many schools, professional learning still feels disconnected from classroom reality, difficult to sustain, and focused on compliance instead of growth.', 'rocketpd' ) );
$warning_label = rocketpd_get_field( 'rpd_trust_model_warning_label', __( 'Where most systems fail', 'rocketpd' ) );
$warning_body  = rocketpd_get_field( 'rpd_trust_model_warning_body', __( 'One-time professional development has limited impact unless it is sustained over time, connected to classroom practice, and supported by collaboration and reflection.', 'rocketpd' ) );
$dark_label    = rocketpd_get_field( 'rpd_trust_model_dark_label', __( 'Educators remember what is consistent', 'rocketpd' ) );
$dark_body     = rocketpd_get_field( 'rpd_trust_model_dark_body', __( 'Teachers are not learning tools in isolation. They are building confidence, clarity, and instructional rhythm.', 'rocketpd' ) );
$closing       = rocketpd_get_field( 'rpd_trust_model_closing', __( 'When professional learning fails to meet these needs, it does not just lose effectiveness. It loses engagement.', 'rocketpd' ) );
$fallback      = array(
	array( 'title' => __( 'Confidence stalls', 'rocketpd' ) ),
	array( 'title' => __( 'Momentum declines', 'rocketpd' ) ),
	array( 'title' => __( 'Retention becomes harder', 'rocketpd' ) ),
);
$items         = rocketpd_get_field( 'rpd_trust_model_impact_items', $fallback );
$items         = array_filter(
	is_array( $items ) ? $items : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['title'] );
	}
);
$items         = $items ?: $fallback;
?>

<section id="rpd-trust-model" class="rpd-trust-model rpd-trust-section">
	<div class="rpd-trust-container rpd-trust-narrow">
		<p class="rpd-trust-kicker"><?php echo esc_html( $eyebrow ); ?></p>
		<h2><?php echo esc_html( $headline ); ?></h2>
		<p><?php echo esc_html( $body ); ?></p>
		<div class="rpd-trust-callout rpd-trust-callout--gold">
			<span><?php echo esc_html( $warning_label ); ?></span>
			<p><?php echo esc_html( $warning_body ); ?></p>
		</div>
		<div class="rpd-trust-callout rpd-trust-callout--purple">
			<span><?php echo esc_html( $dark_label ); ?></span>
			<p><?php echo esc_html( $dark_body ); ?></p>
		</div>
		<p><?php echo esc_html( $closing ); ?></p>
		<div class="rpd-trust-mini-grid">
			<?php foreach ( $items as $item ) : ?>
				<div>
					<i aria-hidden="true"></i>
					<strong><?php echo esc_html( $item['title'] ); ?></strong>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
