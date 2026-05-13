<?php
/**
 * Trust Cycle Guide retention section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = rocketpd_get_field( 'rpd_trust_retention_eyebrow', __( 'Why it matters', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_trust_retention_headline', __( 'The link between professional learning and retention.', 'rocketpd' ) );
$body     = rocketpd_get_field( 'rpd_trust_retention_body', __( 'Retention is often talked about as compensation and workload. But district leaders increasingly see another driver: whether educators feel supported and are growing in their roles.', 'rocketpd' ) );
$quote    = rocketpd_get_field( 'rpd_trust_retention_quote', __( 'Educators stay where they feel supported - and where they feel they are improving.', 'rocketpd' ) );
$fallback_cards = array(
	array( 'title' => __( 'Feel capable', 'rocketpd' ), 'body' => __( 'In their classroom and daily practice.', 'rocketpd' ) ),
	array( 'title' => __( 'See progress', 'rocketpd' ), 'body' => __( 'Over time, not as a one-off event.', 'rocketpd' ) ),
	array( 'title' => __( 'Have access', 'rocketpd' ), 'body' => __( 'To meaningful, just-in-time learning.', 'rocketpd' ) ),
	array( 'title' => __( 'Feel supported', 'rocketpd' ), 'body' => __( 'Inside a stronger professional community.', 'rocketpd' ) ),
);
$fallback_principles = array(
	array( 'title' => __( 'Relevant', 'rocketpd' ), 'body' => __( 'Tied to what educators are actually trying to do.', 'rocketpd' ) ),
	array( 'title' => __( 'Flexible', 'rocketpd' ), 'body' => __( 'Available when educators need it.', 'rocketpd' ) ),
	array( 'title' => __( 'Practical', 'rocketpd' ), 'body' => __( 'Connected to classrooms and implementation.', 'rocketpd' ) ),
	array( 'title' => __( 'Continuous', 'rocketpd' ), 'body' => __( 'Supported across time.', 'rocketpd' ) ),
);
$cards = rocketpd_get_field( 'rpd_trust_retention_cards', $fallback_cards );
$principles = rocketpd_get_field( 'rpd_trust_retention_principles', $fallback_principles );
$cards = array_filter(
	is_array( $cards ) ? $cards : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['title'] );
	}
);
$principles = array_filter(
	is_array( $principles ) ? $principles : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['title'] );
	}
);
$cards = $cards ?: $fallback_cards;
$principles = $principles ?: $fallback_principles;
?>

<section class="rpd-trust-retention rpd-trust-section">
	<div class="rpd-trust-container">
		<div class="rpd-trust-section-head">
			<p class="rpd-trust-kicker"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</div>
		<div class="rpd-trust-card-row">
			<?php foreach ( $cards as $card ) : ?>
				<article>
					<i aria-hidden="true"></i>
					<h3><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $card['body'] ?? '' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
		<blockquote><?php echo esc_html( $quote ); ?></blockquote>
		<div class="rpd-trust-principle-bar">
			<?php foreach ( $principles as $item ) : ?>
				<div>
					<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $item['body'] ?? '' ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
