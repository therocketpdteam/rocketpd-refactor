<?php
/**
 * LaunchPad outcomes.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_lp_get_field( 'lp_outcomes_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_eyebrow = __( 'Outcomes', 'rocketpd' );
$default_h2      = __( 'Why Districts Choose LaunchPad.', 'rocketpd' );
$default_subhead = __( 'Professional learning becomes a strategic asset — not a compliance requirement.', 'rocketpd' );
$default_cards   = array(
	array( 'icon' => 'heart',      'title' => 'Support educator morale and retention' ),
	array( 'icon' => 'calendar',   'title' => 'Provide high-quality professional learning without disrupting schedules' ),
	array( 'icon' => 'clipboard',  'title' => 'Reduce administrative burden for professional credit' ),
	array( 'icon' => 'target',     'title' => 'Align professional learning to district priorities' ),
	array( 'icon' => 'sparkles',   'title' => 'Create flexible, meaningful growth opportunities' ),
);

if ( 'custom' === $mode ) {
	$eyebrow   = rocketpd_lp_get_field( 'outcomes_eyebrow', $default_eyebrow );
	$h2        = rocketpd_lp_get_field( 'outcomes_h2', $default_h2 );
	$subhead   = rocketpd_lp_get_field( 'outcomes_subhead', $default_subhead );
	$acf_cards = rocketpd_lp_get_field( 'outcomes_cards', null );
	$cards     = is_array( $acf_cards ) && ! empty( $acf_cards ) ? $acf_cards : $default_cards;
} else {
	$eyebrow = $default_eyebrow;
	$h2      = $default_h2;
	$subhead = $default_subhead;
	$cards   = $default_cards;
}
?>
<section class="rpd-lp-section rpd-lp-outcomes">
	<div class="rpd-container">
		<header class="rpd-lp-section-header rpd-lp-section-header--center"><p class="rpd-lp-eyebrow"><?php echo esc_html( $eyebrow ); ?></p><h2><?php echo esc_html( $h2 ); ?></h2><p><?php echo esc_html( $subhead ); ?></p></header>
		<div class="rpd-lp-five-grid rpd-lp-outcomes__grid">
			<?php foreach ( $cards as $card ) : ?><article class="rpd-lp-outcome-card"><?php rocketpd_lp_icon( $card['icon'] ?? 'sparkles' ); ?><h3><?php echo esc_html( $card['title'] ?? '' ); ?></h3></article><?php endforeach; ?>
		</div>
	</div>
</section>
