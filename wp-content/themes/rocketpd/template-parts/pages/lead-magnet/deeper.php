<?php
/**
 * Lead Magnet deeper next steps section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow        = rocketpd_get_field( 'rpd_lead_deeper_eyebrow', __( 'Want to go a step further?', 'rocketpd' ) );
$headline       = rocketpd_get_field( 'rpd_lead_deeper_headline', __( 'A few ways to dig deeper.', 'rocketpd' ) );
$body           = rocketpd_get_field( 'rpd_lead_deeper_body', __( 'The guide is the place to start. These are the next steps - pick whichever fits where you are.', 'rocketpd' ) );
$fallback_cards = array(
	array( 'icon' => 'play', 'title' => __( 'Watch how districts are implementing this model', 'rocketpd' ), 'body' => __( "See how districts are putting this model into practice and what it looks like inside real schools. You'll walk away with a clearer picture of how learning and doing can work together in your own district.", 'rocketpd' ), 'cta_label' => __( 'Watch the Video', 'rocketpd' ), 'cta_url' => '#', 'style' => 'purple' ),
	array( 'icon' => 'check', 'title' => __( 'Take the Readiness Diagnostic', 'rocketpd' ), 'body' => __( "Get a quick, structured view of how your current professional learning approach aligns with what's working in other districts. You'll receive immediate insight into where you're strong, where gaps exist, and where to focus next.", 'rocketpd' ), 'cta_label' => __( 'Take the Diagnostic', 'rocketpd' ), 'cta_url' => '#', 'style' => 'pink' ),
	array( 'icon' => 'calendar', 'title' => __( 'Schedule a LaunchPad Walkthrough', 'rocketpd' ), 'body' => __( "Talk through your current approach with someone who understands the realities of K-12 systems and implementation. You'll leave with a clearer sense of what's possible - and what a practical next step could look like in your district.", 'rocketpd' ), 'cta_label' => __( 'Schedule a Walkthrough', 'rocketpd' ), 'cta_url' => home_url( '/contact/' ), 'style' => 'gold' ),
);
$cards          = rocketpd_get_field( 'rpd_lead_deeper_cards', $fallback_cards );
$cards          = array_filter(
	is_array( $cards ) ? $cards : array(),
	function ( $card ) {
		return is_array( $card ) && ! empty( $card['title'] );
	}
);
$cards          = $cards ? $cards : $fallback_cards;
?>

<section class="rpd-lead-deeper rpd-lead-section">
	<div class="rpd-container">
		<header class="rpd-lead-section-header rpd-lead-section-header--left">
			<p class="rpd-lead-pill"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</header>
		<div class="rpd-lead-deeper-grid">
			<?php foreach ( $cards as $card ) : ?>
				<article class="rpd-lead-deeper-card rpd-lead-deeper-card--<?php echo esc_attr( sanitize_html_class( $card['style'] ?? 'purple' ) ); ?>">
					<span aria-hidden="true"><?php echo esc_html( substr( (string) ( $card['icon'] ?? 'step' ), 0, 1 ) ); ?></span>
					<h3><?php echo esc_html( $card['title'] ); ?></h3>
					<p><?php echo esc_html( $card['body'] ?? '' ); ?></p>
					<?php if ( ! empty( $card['cta_label'] ) && ! empty( $card['cta_url'] ) ) : ?>
						<a class="rpd-btn <?php echo 'gold' === ( $card['style'] ?? '' ) ? 'rpd-btn--gold' : 'rpd-btn--outline-purple'; ?>" href="<?php echo esc_url( $card['cta_url'] ); ?>"><?php echo esc_html( $card['cta_label'] ); ?> <span aria-hidden="true">-&gt;</span></a>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
