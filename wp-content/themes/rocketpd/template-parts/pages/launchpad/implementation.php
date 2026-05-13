<?php
/**
 * LaunchPad implementation section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$fit_items = rocketpd_get_field(
	'rpd_launchpad_fit_items',
	array(
		array( 'label' => __( 'New teacher onboarding', 'rocketpd' ) ),
		array( 'label' => __( 'PLC learning cycles', 'rocketpd' ) ),
		array( 'label' => __( 'PD days and in-service sessions', 'rocketpd' ) ),
		array( 'label' => __( 'Individual growth plans', 'rocketpd' ) ),
		array( 'label' => __( 'Department and leadership meetings', 'rocketpd' ) ),
	)
);
$steps = rocketpd_get_field(
	'rpd_launchpad_workflow_steps',
	array(
		array( 'step' => __( 'Plan', 'rocketpd' ), 'body' => __( 'Co-design rollout with instructional goals.', 'rocketpd' ) ),
		array( 'step' => __( 'Launch', 'rocketpd' ), 'body' => __( 'Invite staff and launch the experience.', 'rocketpd' ) ),
		array( 'step' => __( 'Use', 'rocketpd' ), 'body' => __( 'Educators learn in PD days, PLCs, and on their own.', 'rocketpd' ) ),
		array( 'step' => __( 'Track', 'rocketpd' ), 'body' => __( 'Dashboards show engagement and completion.', 'rocketpd' ) ),
		array( 'step' => __( 'Improve', 'rocketpd' ), 'body' => __( 'Refine pathways based on real use data.', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-lp-implementation rpd-lp-section">
	<div class="rpd-container">
		<div class="rpd-lp-implementation__grid">
			<div>
				<p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_implementation_eyebrow', __( 'Implementation', 'rocketpd' ) ) ); ?></p>
				<h2><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_implementation_headline', __( 'Designed for Real District Use.', 'rocketpd' ) ) ); ?></h2>
				<p><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_implementation_body_1', __( 'The flexibility of asynchronous learning is powerful — but without a plan, it often goes unused. LaunchPad addresses this directly.', 'rocketpd' ) ) ); ?></p>
				<p><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_implementation_body_2', __( 'Each district receives support to integrate the platform into existing systems — onboarding, PLCs, PD days, growth plans, and leadership meetings.', 'rocketpd' ) ) ); ?></p>
			</div>
			<aside class="rpd-lp-fit-card">
				<h3><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_fit_title', __( 'Where LaunchPad Fits', 'rocketpd' ) ) ); ?></h3>
				<ul>
					<?php foreach ( $fit_items as $item ) : ?>
						<?php $label = isset( $item['label'] ) ? $item['label'] : ''; ?>
						<?php if ( $label ) : ?>
							<li><span aria-hidden="true"></span><?php echo esc_html( $label ); ?></li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</aside>
		</div>

		<div class="rpd-lp-workflow">
			<p class="rpd-lp-eyebrow"><?php esc_html_e( 'Implementation Workflow', 'rocketpd' ); ?></p>
			<h3><?php esc_html_e( 'From day one to district-wide impact.', 'rocketpd' ); ?></h3>
			<div class="rpd-lp-workflow__steps">
				<?php foreach ( $steps as $index => $item ) : ?>
					<?php
					$step = isset( $item['step'] ) ? $item['step'] : '';
					$body = isset( $item['body'] ) ? $item['body'] : '';
					?>
					<article>
						<span><b><?php echo esc_html( (string) ( $index + 1 ) ); ?></b></span>
						<h4><?php echo esc_html( $step ); ?></h4>
						<p><?php echo esc_html( $body ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
			<p class="rpd-lp-workflow__footer"><?php esc_html_e( 'This ensures LaunchPad becomes part of daily practice — not just another tool.', 'rocketpd' ); ?></p>
		</div>
	</div>
</section>
