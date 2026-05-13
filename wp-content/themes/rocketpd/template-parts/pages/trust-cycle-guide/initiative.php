<?php
/**
 * Trust Cycle Guide initiative section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_trust_initiative_eyebrow', __( 'Final word', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_trust_initiative_headline', __( 'From initiative to infrastructure.', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_trust_initiative_body', __( 'Professional learning does not need to be another initiative. It can be the system that supports educators.', 'rocketpd' ) );
$shift_headline = rocketpd_get_field( 'rpd_trust_initiative_shift_headline', __( 'The shift is already happening.', 'rocketpd' ) );
$shift_body = rocketpd_get_field( 'rpd_trust_initiative_shift_body', __( 'The question is not whether your district can move forward. The question is how your district moves forward.', 'rocketpd' ) );
$summary = rocketpd_get_field( 'rpd_trust_initiative_summary', __( 'When professional learning is designed to connect directly to the work educators do every day, it becomes something more: a system that builds confidence, a structure that supports growth, a strategy that strengthens retention.', 'rocketpd' ) );
$fallback = array(
	array( 'title' => __( 'Educator Confidence', 'rocketpd' ) ),
	array( 'title' => __( 'Staff Retention', 'rocketpd' ) ),
	array( 'title' => __( 'Instructional Improvement', 'rocketpd' ) ),
	array( 'title' => __( 'Organizational Alignment', 'rocketpd' ) ),
);
$items = rocketpd_get_field( 'rpd_trust_initiative_outcomes', $fallback );
$items = array_filter(
	is_array( $items ) ? $items : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['title'] );
	}
);
$items = $items ?: $fallback;
?>

<section class="rpd-trust-initiative rpd-trust-section">
	<div class="rpd-trust-container rpd-trust-narrow">
		<div class="rpd-trust-section-head rpd-trust-section-head--center">
			<p class="rpd-trust-kicker"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</div>
		<div class="rpd-trust-card-row">
			<?php foreach ( $items as $item ) : ?>
				<article>
					<i aria-hidden="true"></i>
					<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="rpd-trust-summary">
			<h3><?php echo esc_html( $shift_headline ); ?></h3>
			<p><?php echo esc_html( $shift_body ); ?></p>
			<div><?php echo esc_html( $summary ); ?></div>
		</div>
	</div>
</section>
