<?php
/**
 * LaunchPad community connection section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bullets = rocketpd_get_field(
	'rpd_launchpad_community_bullets',
	array(
		array( 'text' => __( 'Access expert insights and emerging best practices', 'rocketpd' ) ),
		array( 'text' => __( 'Participate in virtual learning experiences', 'rocketpd' ) ),
		array( 'text' => __( 'Learn alongside peer districts', 'rocketpd' ) ),
		array( 'text' => __( 'Extend learning through live cohorts and events', 'rocketpd' ) ),
	)
);
$satellites = rocketpd_get_field(
	'rpd_launchpad_community_satellites',
	array(
		array( 'label' => __( 'Expert Insights', 'rocketpd' ) ),
		array( 'label' => __( 'Virtual Experiences', 'rocketpd' ) ),
		array( 'label' => __( 'Peer Districts', 'rocketpd' ) ),
		array( 'label' => __( 'Live Cohorts', 'rocketpd' ) ),
		array( 'label' => __( 'Best Practices', 'rocketpd' ) ),
		array( 'label' => __( 'Events', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-lp-community rpd-lp-section">
	<div class="rpd-container rpd-lp-community__grid">
		<div>
			<p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_community_eyebrow', __( 'Community', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_community_headline', __( 'Connected to a National Community of Educators.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_community_intro', __( 'LaunchPad connects your team to the broader RocketPD community, where educators can:', 'rocketpd' ) ) ); ?></p>
			<ul class="rpd-lp-checks">
				<?php foreach ( $bullets as $bullet ) : ?>
					<?php $text = isset( $bullet['text'] ) ? $bullet['text'] : ''; ?>
					<?php if ( $text ) : ?>
						<li><?php echo esc_html( $text ); ?></li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
			<p><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_community_closing', __( 'This keeps professional learning relevant, collaborative, and continuously evolving.', 'rocketpd' ) ) ); ?></p>
		</div>
		<div class="rpd-lp-hub" aria-label="<?php esc_attr_e( 'RocketPD community hub diagram', 'rocketpd' ); ?>">
			<div class="rpd-lp-hub__center"><span aria-hidden="true">⚡</span><?php esc_html_e( 'Your district', 'rocketpd' ); ?><small><?php esc_html_e( 'on LaunchPad', 'rocketpd' ); ?></small></div>
			<?php foreach ( $satellites as $index => $satellite ) : ?>
				<?php $label = isset( $satellite['label'] ) ? $satellite['label'] : ''; ?>
				<?php if ( $label ) : ?>
					<div class="rpd-lp-hub__satellite rpd-lp-hub__satellite--<?php echo esc_attr( (string) ( $index + 1 ) ); ?>"><span aria-hidden="true"></span><?php echo esc_html( $label ); ?></div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
