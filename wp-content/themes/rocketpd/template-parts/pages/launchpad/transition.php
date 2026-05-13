<?php
/**
 * LaunchPad transition to LaunchPad+.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reasons = rocketpd_get_field(
	'rpd_launchpad_transition_reasons',
	array(
		array( 'text' => __( 'A way to align learning to district initiatives', 'rocketpd' ) ),
		array( 'text' => __( 'A place to organize internal resources and frameworks', 'rocketpd' ) ),
		array( 'text' => __( 'Greater visibility into how learning is being used', 'rocketpd' ) ),
		array( 'text' => __( 'A system to support implementation across schools', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-lp-transition rpd-lp-section">
	<div class="rpd-container">
		<div class="rpd-lp-transition__inner">
			<header class="rpd-lp-section-header rpd-lp-section-header--center">
				<p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_transition_eyebrow', __( 'The Next Step', 'rocketpd' ) ) ); ?></p>
				<h2><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_transition_headline', __( 'When Professional Learning Becomes a System.', 'rocketpd' ) ) ); ?></h2>
				<p><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_transition_intro', __( 'For many districts, access to high-quality learning is just the beginning. As teams grow, leaders often need more:', 'rocketpd' ) ) ); ?></p>
			</header>
			<div class="rpd-lp-transition__grid">
				<?php foreach ( $reasons as $reason ) : ?>
					<?php $text = isset( $reason['text'] ) ? $reason['text'] : ''; ?>
					<?php if ( $text ) : ?>
						<div><span class="rpd-lp-icon-tile" aria-hidden="true"></span><?php echo esc_html( $text ); ?></div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<p><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_transition_closing', __( 'That’s where LaunchPad can evolve even further.', 'rocketpd' ) ) ); ?></p>
		</div>
	</div>
</section>
