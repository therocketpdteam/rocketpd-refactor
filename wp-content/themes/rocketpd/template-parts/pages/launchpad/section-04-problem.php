<?php
/**
 * LaunchPad problem section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$before = rocketpd_lp_get_field( 'problem_before_items', array( 'Annual workshops', 'Onboarding binders', 'Conference takeaways', 'Faculty meetings', 'Coaching notes', 'PLC handouts' ) );
$after = rocketpd_lp_get_field( 'problem_after_items', array( 'Course library', 'Credit & certificates', 'Implementation playbooks', 'Progress dashboards', 'Team learning', 'Workbooks & resources' ) );
?>
<section class="rpd-lp-section rpd-lp-problem">
	<div class="rpd-container rpd-lp-split">
		<div>
			<p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_lp_get_field( 'problem_eyebrow', __( 'The Problem', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_lp_get_field( 'problem_h2', __( "Professional learning shouldn't live outside the work educators do every day.", 'rocketpd' ) ) ); ?></h2>
			<p><?php esc_html_e( "LaunchPad is RocketPD's professional learning and staff engagement platform — designed to help districts support educator growth in flexible, practical, and sustainable ways.", 'rocketpd' ); ?></p>
			<p><?php esc_html_e( 'Instead of one-time workshops or disconnected training experiences, LaunchPad makes it possible to integrate professional learning directly into onboarding, PLCs, faculty meetings, and individual growth pathways.', 'rocketpd' ); ?></p>
			<p><strong><?php esc_html_e( 'With LaunchPad, learning becomes part of the work — not separate from it.', 'rocketpd' ); ?></strong></p>
		</div>
		<div class="rpd-lp-problem__visual">
			<div class="rpd-lp-before">
				<h3><?php esc_html_e( 'Today: Disconnected', 'rocketpd' ); ?></h3>
				<?php foreach ( $before as $item ) : ?>
					<div class="rpd-lp-before__card"><?php rocketpd_lp_icon( 'x' ); ?><?php echo esc_html( is_array( $item ) ? ( $item['label'] ?? '' ) : $item ); ?></div>
				<?php endforeach; ?>
			</div>
			<div class="rpd-lp-arrow-badge" aria-hidden="true"><?php rocketpd_lp_icon( 'arrow' ); ?></div>
			<div class="rpd-lp-after">
				<h3><?php esc_html_e( 'With LaunchPad', 'rocketpd' ); ?></h3>
				<div class="rpd-lp-after__logo">RocketPD</div>
				<?php foreach ( $after as $item ) : ?>
					<div class="rpd-lp-after__row"><?php rocketpd_lp_icon( 'check' ); ?><?php echo esc_html( is_array( $item ) ? ( $item['label'] ?? '' ) : $item ); ?></div>
				<?php endforeach; ?>
				<strong><?php echo esc_html( rocketpd_lp_get_field( 'problem_after_footer', __( 'One Professional Learning System', 'rocketpd' ) ) ); ?></strong>
			</div>
		</div>
	</div>
</section>
