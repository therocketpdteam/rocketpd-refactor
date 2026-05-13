<?php
/**
 * LaunchPad Plus final CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$demo_url = rocketpd_get_option( 'rpd_walkthrough_url', home_url( '/contact/' ) );
?>

<section class="rpd-lpp-final rpd-lpp-section rpd-lpp-dark">
	<div class="rpd-container rpd-lpp-final__inner">
		<p class="rpd-lpp-eyebrow"><?php echo esc_html( rocketpd_get_field( 'rpd_lpp_final_eyebrow', __( 'Get Started', 'rocketpd' ) ) ); ?></p>
		<h2><?php echo esc_html( rocketpd_get_field( 'rpd_lpp_final_headline', __( 'Build a More Organized Approach to Professional Learning.', 'rocketpd' ) ) ); ?></h2>
		<p><?php echo esc_html( rocketpd_get_field( 'rpd_lpp_final_body', __( 'LaunchPad+ helps districts bring professional learning into one place - making it easier to access, manage, and sustain over time. Schedule a demo to see how LaunchPad+ can support your team.', 'rocketpd' ) ) ); ?></p>
		<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( rocketpd_get_field( 'rpd_lpp_final_cta_url', $demo_url ) ); ?>"><?php echo esc_html( rocketpd_get_field( 'rpd_lpp_final_cta_label', __( 'Schedule a LaunchPad+ Demo', 'rocketpd' ) ) ); ?> <span aria-hidden="true">→</span></a>
	</div>
</section>
