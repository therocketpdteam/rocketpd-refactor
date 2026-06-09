<?php
/**
 * LaunchPad transition.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$needs = rocketpd_lp_get_field( 'transition_needs', array( 'A way to align learning to district initiatives', 'A place to organize internal resources and frameworks', 'Greater visibility into how learning is being used', 'A system to support implementation across schools' ) );
?>
<section class="rpd-lp-section rpd-lp-transition">
	<div class="rpd-lp-orb rpd-lp-orb--two"></div>
	<div class="rpd-container rpd-lp-transition__inner">
		<header class="rpd-lp-section-header rpd-lp-section-header--center"><p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_lp_get_field( 'transition_eyebrow', __( 'The Next Step', 'rocketpd' ) ) ); ?></p><h2><?php echo esc_html( rocketpd_lp_get_field( 'transition_h2', __( 'When Professional Learning Becomes a System.', 'rocketpd' ) ) ); ?></h2><p><?php echo esc_html( rocketpd_lp_get_field( 'transition_lead', __( 'For many districts, access to high-quality learning is just the beginning. As teams grow, leaders often need more:', 'rocketpd' ) ) ); ?></p></header>
		<div class="rpd-lp-transition__grid"><?php foreach ( $needs as $need ) : ?><article><?php rocketpd_lp_icon( 'check' ); ?><p><?php echo esc_html( is_array( $need ) ? ( $need['text'] ?? '' ) : $need ); ?></p></article><?php endforeach; ?></div>
		<p class="rpd-lp-transition__closing"><?php echo esc_html( rocketpd_lp_get_field( 'transition_closing', __( "That's where LaunchPad can evolve even further.", 'rocketpd' ) ) ); ?></p>
	</div>
</section>
