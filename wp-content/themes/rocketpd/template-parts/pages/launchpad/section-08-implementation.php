<?php
/**
 * LaunchPad implementation.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_lp_get_field( 'lp_impl_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_eyebrow          = __( 'Implementation', 'rocketpd' );
$default_h2               = __( 'Designed for Real District Use.', 'rocketpd' );
$default_fits_header      = __( 'Where LaunchPad Fits', 'rocketpd' );
$default_workflow_eyebrow = __( 'Implementation Workflow', 'rocketpd' );
$default_workflow_heading = __( 'From day one to district-wide impact.', 'rocketpd' );
$default_workflow_closing = __( 'This ensures LaunchPad becomes part of daily practice — not just another tool.', 'rocketpd' );
$default_fits             = array( 'New teacher onboarding', 'PLC learning cycles', 'PD days and in-service sessions', 'Individual growth plans', 'Department and leadership meetings' );
$default_steps            = array(
	array( 'icon' => 'compass',    'step' => 'Plan',    'body' => 'Co-design rollout with implementation partner' ),
	array( 'icon' => 'users',      'step' => 'Launch',  'body' => 'Roster staff and seed first cohorts' ),
	array( 'icon' => 'graduation', 'step' => 'Use',     'body' => 'Educators learn in PLCs, PD days, and on their own' ),
	array( 'icon' => 'chart',      'step' => 'Track',   'body' => 'Dashboards show engagement and completion' ),
	array( 'icon' => 'trend',      'step' => 'Improve', 'body' => 'Refine pathways based on real outcomes' ),
);

if ( 'custom' === $mode ) {
	$eyebrow          = rocketpd_lp_get_field( 'impl_eyebrow', $default_eyebrow );
	$h2               = rocketpd_lp_get_field( 'impl_h2', $default_h2 );
	$body_html        = rocketpd_lp_get_field( 'impl_body', '' );
	$fits_header      = rocketpd_lp_get_field( 'impl_fits_header', $default_fits_header );
	$workflow_eyebrow = rocketpd_lp_get_field( 'impl_workflow_eyebrow', $default_workflow_eyebrow );
	$workflow_heading = rocketpd_lp_get_field( 'impl_workflow_heading', $default_workflow_heading );
	$workflow_closing = rocketpd_lp_get_field( 'impl_workflow_closing', $default_workflow_closing );
	$acf_fits         = rocketpd_lp_get_field( 'impl_fits', null );
	$fits             = is_array( $acf_fits ) && ! empty( $acf_fits ) ? $acf_fits : $default_fits;
	$acf_steps        = rocketpd_lp_get_field( 'impl_steps', null );
	$steps            = is_array( $acf_steps ) && ! empty( $acf_steps ) ? $acf_steps : $default_steps;
} else {
	$eyebrow          = $default_eyebrow;
	$h2               = $default_h2;
	$body_html        = '';
	$fits_header      = $default_fits_header;
	$workflow_eyebrow = $default_workflow_eyebrow;
	$workflow_heading = $default_workflow_heading;
	$workflow_closing = $default_workflow_closing;
	$fits             = $default_fits;
	$steps            = $default_steps;
}
?>
<section class="rpd-lp-section rpd-lp-implementation">
	<div class="rpd-container">
		<div class="rpd-lp-split">
			<div>
				<p class="rpd-lp-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
				<h2><?php echo esc_html( $h2 ); ?></h2>
				<?php if ( 'custom' === $mode && ! empty( $body_html ) ) : ?>
					<div class="rpd-lp-wysiwyg"><?php echo wp_kses_post( $body_html ); ?></div>
				<?php else : ?>
					<p><?php esc_html_e( 'The flexibility of asynchronous learning is powerful — but without a plan, it often goes unused. LaunchPad addresses this directly.', 'rocketpd' ); ?></p>
					<p><?php esc_html_e( 'Each district receives support to integrate the platform into existing systems — onboarding, PLCs, PD days, growth plans, and leadership meetings.', 'rocketpd' ); ?></p>
				<?php endif; ?>
			</div>
			<aside class="rpd-lp-fit-card">
				<h3><?php echo esc_html( $fits_header ); ?></h3>
				<?php foreach ( $fits as $fit ) : ?><div><?php rocketpd_lp_icon( 'check' ); ?><span><?php echo esc_html( is_array( $fit ) ? ( $fit['title'] ?? '' ) : $fit ); ?></span></div><?php endforeach; ?>
			</aside>
		</div>
		<div class="rpd-lp-workflow">
			<p class="rpd-lp-eyebrow"><?php echo esc_html( $workflow_eyebrow ); ?></p>
			<h3><?php echo esc_html( $workflow_heading ); ?></h3>
			<div class="rpd-lp-workflow__steps">
				<?php foreach ( $steps as $index => $step ) : ?>
					<article><span><?php rocketpd_lp_icon( $step['icon'] ?? 'sparkles' ); ?><b><?php echo esc_html( (string) ( $index + 1 ) ); ?></b></span><h4><?php echo esc_html( $step['step'] ?? '' ); ?></h4><p><?php echo esc_html( $step['body'] ?? '' ); ?></p></article>
				<?php endforeach; ?>
			</div>
			<p class="rpd-lp-workflow__closing"><?php echo esc_html( $workflow_closing ); ?></p>
		</div>
	</div>
</section>
