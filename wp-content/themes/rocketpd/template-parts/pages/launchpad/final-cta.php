<?php
/**
 * LaunchPad final CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$demo_url = rocketpd_get_option( 'rpd_walkthrough_url', home_url( '/contact/' ) );
?>

<section class="rpd-lp-final rpd-lp-section rpd-lp-dark" id="launchpad-demo">
	<div class="rpd-container rpd-lp-final__inner">
		<p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_final_eyebrow', __( 'See It In Action', 'rocketpd' ) ) ); ?></p>
		<h2><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_final_headline', __( 'See LaunchPad in Action.', 'rocketpd' ) ) ); ?></h2>
		<p><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_final_body', __( 'LaunchPad helps districts turn professional learning into a continuous system for educator growth and engagement. Schedule a walkthrough to see how LaunchPad can support your team.', 'rocketpd' ) ) ); ?></p>
		<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( rocketpd_get_field( 'rpd_launchpad_final_cta_url', $demo_url ) ); ?>"><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_final_cta_label', __( 'Schedule a LaunchPad Demo', 'rocketpd' ) ) ); ?> <span aria-hidden="true">→</span></a>
	</div>
</section>
