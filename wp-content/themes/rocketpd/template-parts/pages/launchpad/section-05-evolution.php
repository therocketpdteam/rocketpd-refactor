<?php
/**
 * LaunchPad evolution section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = rocketpd_lp_get_field(
	'evolution_cards',
	array(
		array( 'icon' => 'target', 'title' => __( 'Align learning to strategic priorities', 'rocketpd' ), 'body' => __( "Anchor every course and pathway to your district's strategic plan and instructional focus.", 'rocketpd' ) ),
		array( 'icon' => 'users', 'title' => __( 'Support growth across teams & roles', 'rocketpd' ), 'body' => __( 'Pathways for new hires, veteran teachers, coaches, and leadership.', 'rocketpd' ) ),
		array( 'icon' => 'play', 'title' => __( 'Flexible, on-demand access', 'rocketpd' ), 'body' => __( 'Expert-led video content available the moment educators need it.', 'rocketpd' ) ),
		array( 'icon' => 'clipboard', 'title' => __( 'Streamline credit & documentation', 'rocketpd' ), 'body' => __( 'Cut the paperwork around professional credit and PDP tracking.', 'rocketpd' ) ),
		array( 'icon' => 'workflow', 'title' => __( 'Connect learning to practice', 'rocketpd' ), 'body' => __( 'Tied directly to classroom and leadership routines.', 'rocketpd' ) ),
	)
);
?>
<section class="rpd-lp-section rpd-lp-dark rpd-lp-evolution">
	<div class="rpd-lp-orb rpd-lp-orb--one"></div>
	<div class="rpd-container">
		<header class="rpd-lp-section-header rpd-lp-section-header--center">
			<p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_lp_get_field( 'evolution_eyebrow', __( 'The Evolution', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_lp_get_field( 'evolution_h2', __( 'From Course Library to Professional Learning System.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_lp_get_field( 'evolution_intro', __( "LaunchPad began as a video-based professional learning library. Today, it's a unified system that helps districts bring learning, engagement, and growth into one place.", 'rocketpd' ) ) ); ?></p>
		</header>
		<div class="rpd-lp-five-grid">
			<?php foreach ( $cards as $card ) : ?>
				<article class="rpd-lp-glass-card"><?php rocketpd_lp_icon( $card['icon'] ?? 'sparkles' ); ?><h3><?php echo esc_html( $card['title'] ?? '' ); ?></h3><p><?php echo esc_html( $card['body'] ?? '' ); ?></p></article>
			<?php endforeach; ?>
		</div>
		<p class="rpd-lp-centered-note"><?php echo esc_html( rocketpd_lp_get_field( 'evolution_closing', __( 'District leaders gain a clearer view of how professional learning is being used — while educators gain access to meaningful, practical support when and where they need it.', 'rocketpd' ) ) ); ?></p>
	</div>
</section>
