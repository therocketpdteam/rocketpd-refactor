<?php
/**
 * LaunchPad community.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_lp_get_field( 'lp_community_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_eyebrow      = __( 'Community', 'rocketpd' );
$default_h2           = __( 'Connected to a National Community of Educators.', 'rocketpd' );
$default_lead         = __( 'LaunchPad connects your team to the broader RocketPD community, where educators can:', 'rocketpd' );
$default_closing      = __( 'This keeps professional learning relevant, collaborative, and continuously evolving.', 'rocketpd' );
$default_center_label = __( 'Your district on LaunchPad', 'rocketpd' );
$default_bullets      = array( 'Access expert insights and emerging best practices', 'Participate in virtual learning experiences', 'Learn alongside peer districts', 'Extend learning through live cohorts and events' );
$default_nodes        = array( 'Expert Insights', 'Virtual Experiences', 'Peer Districts', 'Live Cohorts', 'Best Practices', 'Events' );

if ( 'custom' === $mode ) {
	$eyebrow      = rocketpd_lp_get_field( 'community_eyebrow', $default_eyebrow );
	$h2           = rocketpd_lp_get_field( 'community_h2', $default_h2 );
	$lead         = rocketpd_lp_get_field( 'community_lead', $default_lead );
	$closing      = rocketpd_lp_get_field( 'community_closing', $default_closing );
	$center_label = rocketpd_lp_get_field( 'community_center_label', $default_center_label );
	$acf_bullets  = rocketpd_lp_get_field( 'community_bullets', null );
	$bullets      = is_array( $acf_bullets ) && ! empty( $acf_bullets ) ? $acf_bullets : $default_bullets;
	$acf_nodes    = rocketpd_lp_get_field( 'community_nodes', null );
	$nodes        = is_array( $acf_nodes ) && ! empty( $acf_nodes ) ? $acf_nodes : $default_nodes;
} else {
	$eyebrow      = $default_eyebrow;
	$h2           = $default_h2;
	$lead         = $default_lead;
	$closing      = $default_closing;
	$center_label = $default_center_label;
	$bullets      = $default_bullets;
	$nodes        = $default_nodes;
}
?>
<section class="rpd-lp-section rpd-lp-community">
	<div class="rpd-container rpd-lp-split rpd-lp-split--wide">
		<div>
			<p class="rpd-lp-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $h2 ); ?></h2>
			<p><?php echo esc_html( $lead ); ?></p>
			<ul class="rpd-lp-check-list"><?php foreach ( $bullets as $bullet ) : ?><li><?php echo esc_html( is_array( $bullet ) ? ( $bullet['text'] ?? '' ) : $bullet ); ?></li><?php endforeach; ?></ul>
			<p><?php echo esc_html( $closing ); ?></p>
		</div>
		<div class="rpd-lp-hub">
			<div class="rpd-lp-hub__ring rpd-lp-hub__ring--outer"></div><div class="rpd-lp-hub__ring rpd-lp-hub__ring--inner"></div>
			<div class="rpd-lp-hub__center"><?php rocketpd_lp_icon( 'zap' ); ?><strong><?php echo esc_html( $center_label ); ?></strong></div>
			<?php foreach ( $nodes as $index => $node ) : ?><div class="rpd-lp-hub__node rpd-lp-hub__node--<?php echo esc_attr( (string) ( $index + 1 ) ); ?>"><?php rocketpd_lp_icon( 'sparkles' ); ?><?php echo esc_html( is_array( $node ) ? ( $node['label'] ?? '' ) : $node ); ?></div><?php endforeach; ?>
		</div>
	</div>
</section>
