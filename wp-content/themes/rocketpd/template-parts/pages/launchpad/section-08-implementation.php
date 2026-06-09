<?php
/**
 * LaunchPad implementation.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$fits = rocketpd_lp_get_field( 'impl_fits', array( 'New teacher onboarding', 'PLC learning cycles', 'PD days and in-service sessions', 'Individual growth plans', 'Department and leadership meetings' ) );
$steps = rocketpd_lp_get_field(
	'impl_steps',
	array(
		array( 'icon' => 'compass', 'step' => 'Plan', 'body' => 'Co-design rollout with implementation partner' ),
		array( 'icon' => 'users', 'step' => 'Launch', 'body' => 'Roster staff and seed first cohorts' ),
		array( 'icon' => 'graduation', 'step' => 'Use', 'body' => 'Educators learn in PLCs, PD days, and on their own' ),
		array( 'icon' => 'chart', 'step' => 'Track', 'body' => 'Dashboards show engagement and completion' ),
		array( 'icon' => 'trend', 'step' => 'Improve', 'body' => 'Refine pathways based on real outcomes' ),
	)
);
?>
<section class="rpd-lp-section rpd-lp-implementation">
	<div class="rpd-container">
		<div class="rpd-lp-split">
			<div>
				<p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_lp_get_field( 'impl_eyebrow', __( 'Implementation', 'rocketpd' ) ) ); ?></p>
				<h2><?php echo esc_html( rocketpd_lp_get_field( 'impl_h2', __( 'Designed for Real District Use.', 'rocketpd' ) ) ); ?></h2>
				<p><?php esc_html_e( 'The flexibility of asynchronous learning is powerful — but without a plan, it often goes unused. LaunchPad addresses this directly.', 'rocketpd' ); ?></p>
				<p><?php esc_html_e( 'Each district receives support to integrate the platform into existing systems — onboarding, PLCs, PD days, growth plans, and leadership meetings.', 'rocketpd' ); ?></p>
			</div>
			<aside class="rpd-lp-fit-card">
				<h3><?php echo esc_html( rocketpd_lp_get_field( 'impl_fits_header', __( 'Where LaunchPad Fits', 'rocketpd' ) ) ); ?></h3>
				<?php foreach ( $fits as $fit ) : ?><div><?php rocketpd_lp_icon( 'check' ); ?><span><?php echo esc_html( is_array( $fit ) ? ( $fit['title'] ?? '' ) : $fit ); ?></span></div><?php endforeach; ?>
			</aside>
		</div>
		<div class="rpd-lp-workflow">
			<p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_lp_get_field( 'impl_workflow_eyebrow', __( 'Implementation Workflow', 'rocketpd' ) ) ); ?></p>
			<h3><?php echo esc_html( rocketpd_lp_get_field( 'impl_workflow_heading', __( 'From day one to district-wide impact.', 'rocketpd' ) ) ); ?></h3>
			<div class="rpd-lp-workflow__steps">
				<?php foreach ( $steps as $index => $step ) : ?>
					<article><span><?php rocketpd_lp_icon( $step['icon'] ?? 'sparkles' ); ?><b><?php echo esc_html( (string) ( $index + 1 ) ); ?></b></span><h4><?php echo esc_html( $step['step'] ?? '' ); ?></h4><p><?php echo esc_html( $step['body'] ?? '' ); ?></p></article>
				<?php endforeach; ?>
			</div>
			<p class="rpd-lp-workflow__closing"><?php echo esc_html( rocketpd_lp_get_field( 'impl_workflow_closing', __( 'This ensures LaunchPad becomes part of daily practice — not just another tool.', 'rocketpd' ) ) ); ?></p>
		</div>
	</div>
</section>
