<?php
/**
 * Trust Cycle Guide practice cycle section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = rocketpd_get_field( 'rpd_trust_cycle_eyebrow', __( 'Learning + doing', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_trust_cycle_headline', __( 'Why learning only works when it shows up in practice.', 'rocketpd' ) );
$body     = rocketpd_get_field( 'rpd_trust_cycle_body', __( 'Traditional PD assumes understanding leads to application. In reality, implementation requires repetition, context, and support.', 'rocketpd' ) );
$fallback_steps = array(
	array( 'number' => '01', 'title' => __( 'Learn', 'rocketpd' ), 'body' => __( 'Start with relevant, focused learning.', 'rocketpd' ) ),
	array( 'number' => '02', 'title' => __( 'Apply', 'rocketpd' ), 'body' => __( 'Try it in a realistic classroom context.', 'rocketpd' ) ),
	array( 'number' => '03', 'title' => __( 'Reflect', 'rocketpd' ), 'body' => __( 'Notice what worked and what needs support.', 'rocketpd' ) ),
	array( 'number' => '04', 'title' => __( 'Refine', 'rocketpd' ), 'body' => __( 'Adjust the strategy with support.', 'rocketpd' ) ),
	array( 'number' => '05', 'title' => __( 'Repeat', 'rocketpd' ), 'body' => __( 'Turn new practice into sustainable rhythm.', 'rocketpd' ) ),
);
$fallback_conditions = array(
	array( 'title' => __( 'Faster action', 'rocketpd' ), 'body' => __( 'Educators have a next step they can try.', 'rocketpd' ) ),
	array( 'title' => __( 'Greater relevance', 'rocketpd' ), 'body' => __( 'Learning becomes tied to the work at hand.', 'rocketpd' ) ),
	array( 'title' => __( 'Mistakes fuel growth', 'rocketpd' ), 'body' => __( 'Educators can refine with support.', 'rocketpd' ) ),
	array( 'title' => __( 'Confidence builds', 'rocketpd' ), 'body' => __( 'Trying shows progress, not perfection.', 'rocketpd' ) ),
);
$fallback_outcomes = array(
	array( 'title' => __( 'Consistent improvement in practice', 'rocketpd' ) ),
	array( 'title' => __( 'Stronger instructional alignment', 'rocketpd' ) ),
	array( 'title' => __( 'More confident educators', 'rocketpd' ) ),
);
$steps = rocketpd_get_field( 'rpd_trust_cycle_steps', $fallback_steps );
$conditions = rocketpd_get_field( 'rpd_trust_cycle_conditions', $fallback_conditions );
$outcomes = rocketpd_get_field( 'rpd_trust_cycle_outcomes', $fallback_outcomes );
$steps = array_filter(
	is_array( $steps ) ? $steps : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['title'] );
	}
);
$conditions = array_filter(
	is_array( $conditions ) ? $conditions : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['title'] );
	}
);
$outcomes = array_filter(
	is_array( $outcomes ) ? $outcomes : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['title'] );
	}
);
$steps = $steps ?: $fallback_steps;
$conditions = $conditions ?: $fallback_conditions;
$outcomes = $outcomes ?: $fallback_outcomes;
?>

<section class="rpd-trust-cycle rpd-trust-section rpd-trust-dark">
	<div class="rpd-trust-container">
		<div class="rpd-trust-section-head">
			<p class="rpd-trust-kicker"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</div>
		<div class="rpd-trust-cycle-steps">
			<?php foreach ( $steps as $step ) : ?>
				<article>
					<span><?php echo esc_html( $step['number'] ?? '' ); ?></span>
					<h3><?php echo esc_html( $step['title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $step['body'] ?? '' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
		<p class="rpd-trust-cycle-label"><?php esc_html_e( 'Learn - Apply - Reflect - Refine - Repeat', 'rocketpd' ); ?></p>
		<div class="rpd-trust-condition-grid">
			<?php foreach ( $conditions as $item ) : ?>
				<div>
					<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $item['body'] ?? '' ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="rpd-trust-outcomes">
			<?php foreach ( $outcomes as $outcome ) : ?>
				<div><?php echo esc_html( $outcome['title'] ?? '' ); ?></div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
