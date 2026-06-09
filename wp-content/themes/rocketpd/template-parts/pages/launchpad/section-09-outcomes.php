<?php
/**
 * LaunchPad outcomes.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = rocketpd_lp_get_field(
	'outcomes_cards',
	array(
		array( 'icon' => 'heart', 'title' => 'Support educator morale and retention' ),
		array( 'icon' => 'calendar', 'title' => 'Provide high-quality professional learning without disrupting schedules' ),
		array( 'icon' => 'clipboard', 'title' => 'Reduce administrative burden for professional credit' ),
		array( 'icon' => 'target', 'title' => 'Align professional learning to district priorities' ),
		array( 'icon' => 'sparkles', 'title' => 'Create flexible, meaningful growth opportunities' ),
	)
);
?>
<section class="rpd-lp-section rpd-lp-outcomes">
	<div class="rpd-container">
		<header class="rpd-lp-section-header rpd-lp-section-header--center"><p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_lp_get_field( 'outcomes_eyebrow', __( 'Outcomes', 'rocketpd' ) ) ); ?></p><h2><?php echo esc_html( rocketpd_lp_get_field( 'outcomes_h2', __( 'Why Districts Choose LaunchPad.', 'rocketpd' ) ) ); ?></h2><p><?php echo esc_html( rocketpd_lp_get_field( 'outcomes_subhead', __( 'Professional learning becomes a strategic asset — not a compliance requirement.', 'rocketpd' ) ) ); ?></p></header>
		<div class="rpd-lp-five-grid rpd-lp-outcomes__grid">
			<?php foreach ( $cards as $card ) : ?><article class="rpd-lp-outcome-card"><?php rocketpd_lp_icon( $card['icon'] ?? 'sparkles' ); ?><h3><?php echo esc_html( $card['title'] ?? '' ); ?></h3></article><?php endforeach; ?>
		</div>
	</div>
</section>
