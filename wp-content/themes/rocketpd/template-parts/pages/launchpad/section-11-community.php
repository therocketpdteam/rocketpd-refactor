<?php
/**
 * LaunchPad community.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bullets = rocketpd_lp_get_field( 'community_bullets', array( 'Access expert insights and emerging best practices', 'Participate in virtual learning experiences', 'Learn alongside peer districts', 'Extend learning through live cohorts and events' ) );
$nodes = rocketpd_lp_get_field( 'community_nodes', array( 'Expert Insights', 'Virtual Experiences', 'Peer Districts', 'Live Cohorts', 'Best Practices', 'Events' ) );
?>
<section class="rpd-lp-section rpd-lp-community">
	<div class="rpd-container rpd-lp-split rpd-lp-split--wide">
		<div>
			<p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_lp_get_field( 'community_eyebrow', __( 'Community', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_lp_get_field( 'community_h2', __( 'Connected to a National Community of Educators.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_lp_get_field( 'community_lead', __( 'LaunchPad connects your team to the broader RocketPD community, where educators can:', 'rocketpd' ) ) ); ?></p>
			<ul class="rpd-lp-check-list"><?php foreach ( $bullets as $bullet ) : ?><li><?php echo esc_html( is_array( $bullet ) ? ( $bullet['text'] ?? '' ) : $bullet ); ?></li><?php endforeach; ?></ul>
			<p><?php echo esc_html( rocketpd_lp_get_field( 'community_closing', __( 'This keeps professional learning relevant, collaborative, and continuously evolving.', 'rocketpd' ) ) ); ?></p>
		</div>
		<div class="rpd-lp-hub">
			<div class="rpd-lp-hub__ring rpd-lp-hub__ring--outer"></div><div class="rpd-lp-hub__ring rpd-lp-hub__ring--inner"></div>
			<div class="rpd-lp-hub__center"><?php rocketpd_lp_icon( 'zap' ); ?><strong><?php echo esc_html( rocketpd_lp_get_field( 'community_center_label', __( 'Your district on LaunchPad', 'rocketpd' ) ) ); ?></strong></div>
			<?php foreach ( $nodes as $index => $node ) : ?><div class="rpd-lp-hub__node rpd-lp-hub__node--<?php echo esc_attr( (string) ( $index + 1 ) ); ?>"><?php rocketpd_lp_icon( 'sparkles' ); ?><?php echo esc_html( is_array( $node ) ? ( $node['label'] ?? '' ) : $node ); ?></div><?php endforeach; ?>
		</div>
	</div>
</section>
