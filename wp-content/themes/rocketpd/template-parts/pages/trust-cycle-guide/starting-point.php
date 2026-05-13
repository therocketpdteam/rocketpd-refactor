<?php
/**
 * Trust Cycle Guide practical starting point section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_trust_start_eyebrow', __( 'Implementation blueprint', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_trust_start_headline', __( 'A practical starting point for districts.', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_trust_start_body', __( 'You do not need to overhaul your system to begin.', 'rocketpd' ) );
$fallback_steps = array(
	array( 'number' => '1', 'label' => __( 'Step 1', 'rocketpd' ), 'title' => __( 'Identify a Priority Area', 'rocketpd' ), 'body' => __( 'Start with a focused need tied to district goals - not every PD topic.', 'rocketpd' ) ),
	array( 'number' => '2', 'label' => __( 'Step 2', 'rocketpd' ), 'title' => __( 'Introduce Flexible Learning', 'rocketpd' ), 'body' => __( 'Offer short, relevant, accessible content educators can use when needed.', 'rocketpd' ) ),
	array( 'number' => '3', 'label' => __( 'Step 3', 'rocketpd' ), 'title' => __( 'Build a Learning Rhythm', 'rocketpd' ), 'body' => __( 'Connect learning with reflection and action.', 'rocketpd' ) ),
	array( 'number' => '4', 'label' => __( 'Step 4', 'rocketpd' ), 'title' => __( 'Integrate Into Existing Structures', 'rocketpd' ), 'body' => __( 'Embed learning into PLCs, team meetings, and coaching cycles.', 'rocketpd' ) ),
	array( 'number' => '5', 'label' => __( 'Step 5', 'rocketpd' ), 'title' => __( 'Focus on Application', 'rocketpd' ), 'body' => __( 'Support educators as they try new strategies in real classrooms.', 'rocketpd' ) ),
	array( 'number' => '6', 'label' => __( 'Step 6', 'rocketpd' ), 'title' => __( 'Gather Feedback', 'rocketpd' ), 'body' => __( 'Capture what educators need next and adjust supports.', 'rocketpd' ) ),
	array( 'number' => '7', 'label' => __( 'Step 7', 'rocketpd' ), 'title' => __( 'Expand Gradually', 'rocketpd' ), 'body' => __( 'Scale once momentum builds and the cohort becomes the model for what is next.', 'rocketpd' ) ),
);
$fallback_outcomes = array(
	array( 'value' => __( 'Sustainable', 'rocketpd' ), 'label' => __( 'Growth', 'rocketpd' ) ),
	array( 'value' => __( 'Stronger', 'rocketpd' ), 'label' => __( 'Engagement', 'rocketpd' ) ),
	array( 'value' => __( 'Clearer', 'rocketpd' ), 'label' => __( 'Impact', 'rocketpd' ) ),
);
$steps = rocketpd_get_field( 'rpd_trust_starting_steps', $fallback_steps );
$outcomes = rocketpd_get_field( 'rpd_trust_starting_outcomes', $fallback_outcomes );
$steps = array_filter(
	is_array( $steps ) ? $steps : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['title'] );
	}
);
$outcomes = array_filter(
	is_array( $outcomes ) ? $outcomes : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['value'] );
	}
);
$steps = $steps ?: $fallback_steps;
$outcomes = $outcomes ?: $fallback_outcomes;
?>

<section class="rpd-trust-start rpd-trust-section">
	<div class="rpd-trust-container">
		<div class="rpd-trust-section-head">
			<p class="rpd-trust-kicker"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</div>
		<div class="rpd-trust-timeline">
			<?php foreach ( $steps as $step ) : ?>
				<article>
					<span><?php echo esc_html( $step['number'] ?? '' ); ?></span>
					<div>
						<small><?php echo esc_html( $step['label'] ?? '' ); ?></small>
						<h3><?php echo esc_html( $step['title'] ?? '' ); ?></h3>
						<p><?php echo esc_html( $step['body'] ?? '' ); ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="rpd-trust-result-strip">
			<?php foreach ( $outcomes as $outcome ) : ?>
				<div>
					<strong><?php echo esc_html( $outcome['value'] ?? '' ); ?></strong>
					<span><?php echo esc_html( $outcome['label'] ?? '' ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
