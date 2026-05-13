<?php
/**
 * Trust Cycle Guide engagement section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_trust_engagement_eyebrow', __( 'The community effect', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_trust_engagement_headline', __( 'From compliance to engagement.', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_trust_engagement_body', __( 'In many districts, professional learning becomes something educators complete, not something they engage with. That is not a teacher problem. It is a design problem.', 'rocketpd' ) );
$quote_left = rocketpd_get_field( 'rpd_trust_engagement_quote_left', __( 'Do I have to do this?', 'rocketpd' ) );
$quote_right = rocketpd_get_field( 'rpd_trust_engagement_quote_right', __( 'Can this help me?', 'rocketpd' ) );
$note = rocketpd_get_field( 'rpd_trust_engagement_note', __( 'More collaboration, more openness to new ideas, and more shared ownership of growth.', 'rocketpd' ) );
$fallback = array(
	array( 'title' => __( 'Relevance', 'rocketpd' ), 'body' => __( 'Learning is tied to real classroom needs.', 'rocketpd' ) ),
	array( 'title' => __( 'Social Proof', 'rocketpd' ), 'body' => __( 'Educators see peers applying what they learn.', 'rocketpd' ) ),
	array( 'title' => __( 'Momentum', 'rocketpd' ), 'body' => __( 'Engagement compounds across time.', 'rocketpd' ) ),
);
$cards = rocketpd_get_field( 'rpd_trust_engagement_cards', $fallback );
$cards = array_filter(
	is_array( $cards ) ? $cards : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['title'] );
	}
);
$cards = $cards ?: $fallback;
?>

<section class="rpd-trust-engagement rpd-trust-section">
	<div class="rpd-trust-container">
		<div class="rpd-trust-section-head">
			<p class="rpd-trust-kicker"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</div>
		<div class="rpd-trust-quote-split">
			<blockquote><?php echo esc_html( $quote_left ); ?></blockquote>
			<blockquote><?php echo esc_html( $quote_right ); ?></blockquote>
		</div>
		<div class="rpd-trust-card-row rpd-trust-card-row--three">
			<?php foreach ( $cards as $card ) : ?>
				<article>
					<i aria-hidden="true"></i>
					<h3><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $card['body'] ?? '' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="rpd-trust-note-strip"><?php echo esc_html( $note ); ?></div>
	</div>
</section>
