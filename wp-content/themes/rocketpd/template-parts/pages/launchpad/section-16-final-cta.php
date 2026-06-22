<?php
/**
 * LaunchPad final CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_lp_get_field( 'lp_finalcta_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_eyebrow = __( 'See It In Action', 'rocketpd' );
$default_h2      = __( 'See LaunchPad in Action.', 'rocketpd' );
$default_body    = __( 'LaunchPad helps districts turn professional learning into a continuous system for educator growth and engagement. Schedule a walkthrough to see how LaunchPad can support your team.', 'rocketpd' );
$default_button  = array( 'title' => __( 'Schedule a LaunchPad Demo', 'rocketpd' ), 'url' => home_url( '/contact/' ) );

if ( 'custom' === $mode ) {
	$eyebrow = rocketpd_lp_get_field( 'cta_eyebrow', $default_eyebrow );
	$h2      = rocketpd_lp_get_field( 'cta_h2', $default_h2 );
	$body    = rocketpd_lp_get_field( 'cta_body', $default_body );
	$button  = rocketpd_lp_get_field( 'cta_button', $default_button );
} else {
	$eyebrow = $default_eyebrow;
	$h2      = $default_h2;
	$body    = $default_body;
	$button  = $default_button;
}
?>
<section class="rpd-lp-section rpd-lp-final" id="launchpad-demo">
	<div class="rpd-lp-orb rpd-lp-orb--one"></div>
	<div class="rpd-lp-orb rpd-lp-orb--two"></div>
	<div class="rpd-container rpd-lp-final__inner">
		<p class="rpd-lp-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
		<h2><?php echo esc_html( $h2 ); ?></h2>
		<p><?php echo esc_html( $body ); ?></p>
		<a class="rpd-lp-btn rpd-lp-btn--gold" href="<?php echo esc_url( $button['url'] ?? home_url( '/contact/' ) ); ?>"><?php echo esc_html( $button['title'] ?? __( 'Schedule a LaunchPad Demo', 'rocketpd' ) ); ?></a>
	</div>
</section>
