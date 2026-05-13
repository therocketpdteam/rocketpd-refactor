<?php
/**
 * Lead Magnet shift section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow      = rocketpd_get_field( 'rpd_lead_shift_eyebrow', __( 'The shift', 'rocketpd' ) );
$headline     = rocketpd_get_field( 'rpd_lead_shift_headline', __( 'The districts seeing results are doing something different.', 'rocketpd' ) );
$body         = rocketpd_get_field( 'rpd_lead_shift_body', __( 'Instead of learning once and hoping it sticks, educators access learning when they need it, apply it immediately, and revisit it over time.', 'rocketpd' ) );
$old_title    = rocketpd_get_field( 'rpd_lead_old_model_title', __( 'Isolated PD events', 'rocketpd' ) );
$new_title    = rocketpd_get_field( 'rpd_lead_new_model_title', __( 'Continuous learning system', 'rocketpd' ) );
$old_fallback = array( array( 'text' => __( 'One-time events', 'rocketpd' ) ), array( 'text' => __( 'Disconnected sessions', 'rocketpd' ) ), array( 'text' => __( 'Completion-focused', 'rocketpd' ) ), array( 'text' => __( 'Hard to sustain', 'rocketpd' ) ) );
$new_fallback = array( array( 'text' => __( 'Continuous learning', 'rocketpd' ) ), array( 'text' => __( 'Connected to practice', 'rocketpd' ) ), array( 'text' => __( 'Application-focused', 'rocketpd' ) ), array( 'text' => __( 'Built into existing routines', 'rocketpd' ) ) );
$step_fallback = array( array( 'text' => 'Learn' ), array( 'text' => 'Apply' ), array( 'text' => 'Reflect' ), array( 'text' => 'Refine' ), array( 'text' => 'Repeat' ) );
$old_items    = rocketpd_get_field( 'rpd_lead_old_model_items', $old_fallback );
$new_items    = rocketpd_get_field( 'rpd_lead_new_model_items', $new_fallback );
$steps        = rocketpd_get_field( 'rpd_lead_process_steps', $step_fallback );
$filter_text  = function ( $items ) {
	return array_filter(
		is_array( $items ) ? $items : array(),
		function ( $item ) {
			return is_array( $item ) && ! empty( $item['text'] );
		}
	);
};
$old_items    = $filter_text( $old_items ) ?: $old_fallback;
$new_items    = $filter_text( $new_items ) ?: $new_fallback;
$steps        = $filter_text( $steps ) ?: $step_fallback;
?>

<section class="rpd-lead-shift rpd-lead-section">
	<div class="rpd-container">
		<header class="rpd-lead-section-header">
			<p class="rpd-lead-pill rpd-lead-pill--gold"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</header>
		<div class="rpd-lead-model-grid">
			<article class="rpd-lead-model-card">
				<p><?php esc_html_e( 'Old model', 'rocketpd' ); ?></p>
				<h3><?php echo esc_html( $old_title ); ?></h3>
				<ul>
					<?php foreach ( $old_items as $item ) : ?>
						<li><?php echo esc_html( $item['text'] ); ?></li>
					<?php endforeach; ?>
				</ul>
			</article>
			<article class="rpd-lead-model-card rpd-lead-model-card--new">
				<p><?php esc_html_e( 'New model', 'rocketpd' ); ?></p>
				<h3><?php echo esc_html( $new_title ); ?></h3>
				<ul>
					<?php foreach ( $new_items as $item ) : ?>
						<li><?php echo esc_html( $item['text'] ); ?></li>
					<?php endforeach; ?>
				</ul>
			</article>
		</div>
		<div class="rpd-lead-process">
			<?php foreach ( $steps as $index => $step ) : ?>
				<span><?php echo esc_html( $step['text'] ); ?></span>
				<?php if ( $index < count( $steps ) - 1 ) : ?>
					<i aria-hidden="true">-&gt;</i>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
