<?php
/**
 * LaunchPad transition.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_lp_get_field( 'lp_transition_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_eyebrow = __( 'The Next Step', 'rocketpd' );
$default_h2      = __( 'When Professional Learning Becomes a System.', 'rocketpd' );
$default_lead    = __( 'For many districts, access to high-quality learning is just the beginning. As teams grow, leaders often need more:', 'rocketpd' );
$default_closing = __( "That's where LaunchPad can evolve even further.", 'rocketpd' );
$default_needs   = array( 'A way to align learning to district initiatives', 'A place to organize internal resources and frameworks', 'Greater visibility into how learning is being used', 'A system to support implementation across schools' );

if ( 'custom' === $mode ) {
	$eyebrow   = rocketpd_lp_get_field( 'transition_eyebrow', $default_eyebrow );
	$h2        = rocketpd_lp_get_field( 'transition_h2', $default_h2 );
	$lead      = rocketpd_lp_get_field( 'transition_lead', $default_lead );
	$closing   = rocketpd_lp_get_field( 'transition_closing', $default_closing );
	$acf_needs = rocketpd_lp_get_field( 'transition_needs', null );
	$needs     = is_array( $acf_needs ) && ! empty( $acf_needs ) ? $acf_needs : $default_needs;
} else {
	$eyebrow = $default_eyebrow;
	$h2      = $default_h2;
	$lead    = $default_lead;
	$closing = $default_closing;
	$needs   = $default_needs;
}
?>
<section class="rpd-lp-section rpd-lp-transition">
	<div class="rpd-lp-orb rpd-lp-orb--two"></div>
	<div class="rpd-container rpd-lp-transition__inner">
		<header class="rpd-lp-section-header rpd-lp-section-header--center"><p class="rpd-lp-eyebrow"><?php echo esc_html( $eyebrow ); ?></p><h2><?php echo esc_html( $h2 ); ?></h2><p><?php echo esc_html( $lead ); ?></p></header>
		<div class="rpd-lp-transition__grid"><?php foreach ( $needs as $need ) : ?><article><?php rocketpd_lp_icon( 'check' ); ?><p><?php echo esc_html( is_array( $need ) ? ( $need['text'] ?? '' ) : $need ); ?></p></article><?php endforeach; ?></div>
		<p class="rpd-lp-transition__closing"><?php echo esc_html( $closing ); ?></p>
	</div>
</section>
