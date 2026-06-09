<?php
/**
 * LaunchPad final CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$button = rocketpd_lp_get_field( 'cta_button', array( 'title' => __( 'Schedule a LaunchPad Demo', 'rocketpd' ), 'url' => home_url( '/contact/' ) ) );
?>
<section class="rpd-lp-section rpd-lp-final" id="launchpad-demo">
	<div class="rpd-lp-orb rpd-lp-orb--one"></div>
	<div class="rpd-lp-orb rpd-lp-orb--two"></div>
	<div class="rpd-container rpd-lp-final__inner">
		<p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_lp_get_field( 'cta_eyebrow', __( 'See It In Action', 'rocketpd' ) ) ); ?></p>
		<h2><?php echo esc_html( rocketpd_lp_get_field( 'cta_h2', __( 'See LaunchPad in Action.', 'rocketpd' ) ) ); ?></h2>
		<p><?php echo esc_html( rocketpd_lp_get_field( 'cta_body', __( 'LaunchPad helps districts turn professional learning into a continuous system for educator growth and engagement. Schedule a walkthrough to see how LaunchPad can support your team.', 'rocketpd' ) ) ); ?></p>
		<a class="rpd-lp-btn rpd-lp-btn--gold" href="<?php echo esc_url( $button['url'] ?? home_url( '/contact/' ) ); ?>"><?php echo esc_html( $button['title'] ?? __( 'Schedule a LaunchPad Demo', 'rocketpd' ) ); ?></a>
	</div>
</section>
