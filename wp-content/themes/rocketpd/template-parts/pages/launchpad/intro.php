<?php
/**
 * LaunchPad problem intro.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow       = rocketpd_get_field( 'rpd_launchpad_intro_eyebrow', __( 'The Problem', 'rocketpd' ) );
$headline      = rocketpd_get_field( 'rpd_launchpad_intro_headline', __( "Professional learning shouldn't live outside the work educators do every day.", 'rocketpd' ) );
$paragraphs    = rocketpd_get_field(
	'rpd_launchpad_intro_paragraphs',
	array(
		array( 'text' => __( 'LaunchPad is RocketPD’s professional learning and staff engagement platform — designed to help districts support educator growth in flexible, practical, and sustainable ways.', 'rocketpd' ) ),
		array( 'text' => __( 'Instead of one-time workshops or disconnected training experiences, LaunchPad makes it possible to integrate professional learning directly into onboarding, PLCs, faculty meetings, and individual growth pathways.', 'rocketpd' ) ),
	)
);
$closing       = rocketpd_get_field( 'rpd_launchpad_intro_closing', __( 'With LaunchPad, learning becomes part of the work — not separate from it.', 'rocketpd' ) );
$today_cards   = rocketpd_get_field(
	'rpd_launchpad_intro_today_cards',
	array(
		array( 'label' => __( 'Annual workshops', 'rocketpd' ) ),
		array( 'label' => __( 'Onboarding binders', 'rocketpd' ) ),
		array( 'label' => __( 'Conference takeaways', 'rocketpd' ) ),
		array( 'label' => __( 'Faculty meetings', 'rocketpd' ) ),
		array( 'label' => __( 'Coaching notes', 'rocketpd' ) ),
		array( 'label' => __( 'PLC handouts', 'rocketpd' ) ),
	)
);
$capabilities  = rocketpd_get_field(
	'rpd_launchpad_intro_capabilities',
	array(
		array( 'label' => __( 'Course library', 'rocketpd' ) ),
		array( 'label' => __( 'Credit & certificates', 'rocketpd' ) ),
		array( 'label' => __( 'Implementation playbooks', 'rocketpd' ) ),
		array( 'label' => __( 'Progress dashboards', 'rocketpd' ) ),
		array( 'label' => __( 'Team learning', 'rocketpd' ) ),
		array( 'label' => __( 'Workbooks & resources', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-lp-intro rpd-lp-section">
	<div class="rpd-container rpd-lp-intro__grid">
		<div>
			<p class="rpd-lp-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<?php foreach ( $paragraphs as $paragraph ) : ?>
				<?php $text = isset( $paragraph['text'] ) ? $paragraph['text'] : ''; ?>
				<?php if ( $text ) : ?>
					<p><?php echo esc_html( $text ); ?></p>
				<?php endif; ?>
			<?php endforeach; ?>
			<?php if ( $closing ) : ?>
				<p class="rpd-lp-intro__closing"><?php echo esc_html( $closing ); ?></p>
			<?php endif; ?>
		</div>

		<div class="rpd-lp-unify">
			<div>
				<p><?php esc_html_e( 'Today: Disconnected', 'rocketpd' ); ?></p>
				<?php foreach ( $today_cards as $card ) : ?>
					<?php $label = isset( $card['label'] ) ? $card['label'] : ''; ?>
					<?php if ( $label ) : ?>
						<span class="rpd-lp-loose-card"><?php echo esc_html( $label ); ?><b aria-hidden="true">×</b></span>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<span class="rpd-lp-unify__arrow" aria-hidden="true">→</span>
			<div class="rpd-lp-system-card">
				<strong class="rpd-lp-system-card__logo"><?php esc_html_e( 'RocketPD', 'rocketpd' ); ?></strong>
				<ul>
					<?php foreach ( $capabilities as $item ) : ?>
						<?php $label = isset( $item['label'] ) ? $item['label'] : ''; ?>
						<?php if ( $label ) : ?>
							<li><?php echo esc_html( $label ); ?></li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
				<small><?php esc_html_e( 'One Professional Learning System', 'rocketpd' ); ?></small>
			</div>
		</div>
	</div>
</section>
