<?php
/**
 * LaunchPad why districts choose section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = rocketpd_get_field(
	'rpd_launchpad_why_cards',
	array(
		array( 'title' => __( 'Support educator morale and retention', 'rocketpd' ) ),
		array( 'title' => __( 'Provide high-quality professional learning without disrupting schedules', 'rocketpd' ) ),
		array( 'title' => __( 'Reduce administrative burden for professional credit', 'rocketpd' ) ),
		array( 'title' => __( 'Align professional learning to district priorities', 'rocketpd' ) ),
		array( 'title' => __( 'Create flexible, meaningful growth opportunities', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-lp-why rpd-lp-section">
	<div class="rpd-container">
		<header class="rpd-lp-section-header rpd-lp-section-header--center">
			<p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_why_eyebrow', __( 'Outcomes', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_why_headline', __( 'Why Districts Choose LaunchPad.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_why_intro', __( 'Professional learning becomes a strategic asset — not a compliance requirement.', 'rocketpd' ) ) ); ?></p>
		</header>
		<div class="rpd-lp-why__grid">
			<?php foreach ( $cards as $card ) : ?>
				<?php $title = isset( $card['title'] ) ? $card['title'] : ''; ?>
				<?php if ( $title ) : ?>
					<article class="rpd-lp-outcome-card"><span class="rpd-lp-icon-tile" aria-hidden="true"></span><h3><?php echo esc_html( $title ); ?></h3></article>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
