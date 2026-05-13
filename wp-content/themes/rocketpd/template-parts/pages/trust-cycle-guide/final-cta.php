<?php
/**
 * Trust Cycle Guide final CTA section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_trust_final_eyebrow', __( 'Take the next step', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_trust_final_headline', __( 'Explore what this could look like in your district.', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_trust_final_body', __( 'There are ways to begin now - pick the one that fits where your team is right now.', 'rocketpd' ) );
$fallback = array(
	array( 'step' => __( 'Step 1', 'rocketpd' ), 'title' => __( 'Watch the video.', 'rocketpd' ), 'body' => __( 'See how this idea shows up in a model for educators and what it could look like in real schools.', 'rocketpd' ), 'cta_label' => __( 'Watch the video', 'rocketpd' ), 'cta_url' => '#', 'style' => 'purple' ),
	array( 'step' => __( 'Step 2', 'rocketpd' ), 'title' => __( 'Take the readiness diagnostic.', 'rocketpd' ), 'body' => __( 'Get a quick structure for how your current professional learning approach aligns with what working in your district needs.', 'rocketpd' ), 'cta_label' => __( 'Take the diagnostic', 'rocketpd' ), 'cta_url' => '#', 'style' => 'purple' ),
	array( 'step' => __( 'Step 3', 'rocketpd' ), 'title' => __( 'Schedule a walkthrough.', 'rocketpd' ), 'body' => __( 'Talk through your current approach with someone who understands the realities of K-12 systems and implementation.', 'rocketpd' ), 'cta_label' => __( 'Schedule a walkthrough', 'rocketpd' ), 'cta_url' => home_url( '/contact/' ), 'style' => 'gold' ),
);
$cards = rocketpd_get_field( 'rpd_trust_final_cards', $fallback );
$cards = array_filter(
	is_array( $cards ) ? $cards : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['title'] );
	}
);
$cards = $cards ?: $fallback;
?>

<section id="rpd-trust-final" class="rpd-trust-final rpd-trust-section rpd-trust-dark">
	<div class="rpd-trust-container">
		<div class="rpd-trust-section-head">
			<p class="rpd-trust-kicker"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</div>
		<div class="rpd-trust-final-grid">
			<?php foreach ( $cards as $card ) : ?>
				<article>
					<span><?php echo esc_html( $card['step'] ?? '' ); ?></span>
					<h3><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $card['body'] ?? '' ); ?></p>
					<?php if ( ! empty( $card['cta_label'] ) && ! empty( $card['cta_url'] ) ) : ?>
						<a class="<?php echo 'gold' === ( $card['style'] ?? '' ) ? 'rpd-btn rpd-btn--gold' : 'rpd-btn rpd-btn--outline-white'; ?>" href="<?php echo esc_url( $card['cta_url'] ); ?>"><?php echo esc_html( $card['cta_label'] ); ?></a>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
