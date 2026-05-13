<?php
/**
 * Lead Magnet impact section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow        = rocketpd_get_field( 'rpd_lead_impact_eyebrow', __( 'Why it matters', 'rocketpd' ) );
$headline       = rocketpd_get_field( 'rpd_lead_impact_headline', __( "This isn't just about professional learning.", 'rocketpd' ) );
$body           = rocketpd_get_field( 'rpd_lead_impact_body', __( 'When learning works, educators feel supported, practice improves, and schools move forward together.', 'rocketpd' ) );
$footer_text    = rocketpd_get_field( 'rpd_lead_impact_footer_text', __( 'When learning is built into the work, educator confidence, staff engagement, retention, and organizational alignment all move together.', 'rocketpd' ) );
$fallback_steps = array(
	array( 'number' => '1', 'title' => __( 'Learning', 'rocketpd' ), 'subtitle' => __( 'Relevant, on-demand', 'rocketpd' ), 'accent' => 'purple' ),
	array( 'number' => '2', 'title' => __( 'Practice', 'rocketpd' ), 'subtitle' => __( 'Applied immediately', 'rocketpd' ), 'accent' => 'violet' ),
	array( 'number' => '3', 'title' => __( 'Confidence', 'rocketpd' ), 'subtitle' => __( 'Built through experience', 'rocketpd' ), 'accent' => 'pink' ),
	array( 'number' => '4', 'title' => __( 'Retention', 'rocketpd' ), 'subtitle' => __( 'Supported educators stay', 'rocketpd' ), 'accent' => 'rose' ),
	array( 'number' => '5', 'title' => __( 'Organizational Goals', 'rocketpd' ), 'subtitle' => __( 'Aligned, moving forward', 'rocketpd' ), 'accent' => 'gold' ),
);
$steps          = rocketpd_get_field( 'rpd_lead_impact_steps', $fallback_steps );
$steps          = array_filter(
	is_array( $steps ) ? $steps : array(),
	function ( $step ) {
		return is_array( $step ) && ! empty( $step['title'] );
	}
);
$steps          = $steps ? $steps : $fallback_steps;
?>

<section class="rpd-lead-impact rpd-lead-section">
	<div class="rpd-container">
		<header class="rpd-lead-section-header">
			<p class="rpd-lead-pill"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</header>
		<div class="rpd-lead-flow">
			<?php foreach ( $steps as $step ) : ?>
				<article class="rpd-lead-flow-card rpd-lead-flow-card--<?php echo esc_attr( sanitize_html_class( $step['accent'] ?? 'purple' ) ); ?>">
					<span><?php echo esc_html( $step['number'] ?? '' ); ?></span>
					<h3><?php echo esc_html( $step['title'] ); ?></h3>
					<p><?php echo esc_html( $step['subtitle'] ?? '' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
		<p class="rpd-lead-impact__footer"><?php echo wp_kses_post( $footer_text ); ?></p>
	</div>
</section>
