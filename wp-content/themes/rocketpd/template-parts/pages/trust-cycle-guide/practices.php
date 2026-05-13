<?php
/**
 * Trust Cycle Guide practices section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_trust_practices_eyebrow', __( 'What districts can start doing', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_trust_practices_headline', __( 'Five practices that actually work.', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_trust_practices_body', __( 'Districts that move beyond traditional PD treat professional learning as a system and support it through practical routines.', 'rocketpd' ) );
$fallback = array(
	array( 'number' => '01', 'title' => __( 'Start With Learning', 'rocketpd' ), 'body' => __( 'Begin by identifying what educators need to do differently in their day-to-day work.', 'rocketpd' ), 'note' => __( 'Learning stays relevant', 'rocketpd' ) ),
	array( 'number' => '02', 'title' => __( 'Use Trusted Voices', 'rocketpd' ), 'body' => __( 'Let educators learn from practitioners, coaches, researchers, and leaders they trust.', 'rocketpd' ), 'note' => __( 'Support becomes practical', 'rocketpd' ) ),
	array( 'number' => '03', 'title' => __( 'Design for Real Schedules', 'rocketpd' ), 'body' => __( 'Make learning accessible in the moments educators can actually use it.', 'rocketpd' ), 'note' => __( 'Access becomes sustainable', 'rocketpd' ) ),
	array( 'number' => '04', 'title' => __( 'Focus on Application', 'rocketpd' ), 'body' => __( 'Help educators try, adapt, and apply learning in context.', 'rocketpd' ), 'note' => __( 'Ideas become action', 'rocketpd' ) ),
	array( 'number' => '05', 'title' => __( 'Integrate Into Existing Structures', 'rocketpd' ), 'body' => __( 'Connect learning to PLCs, coaching, team meetings, and district priorities.', 'rocketpd' ), 'note' => __( 'Systems become the support', 'rocketpd' ) ),
);
$items = rocketpd_get_field( 'rpd_trust_practices', $fallback );
$items = array_filter(
	is_array( $items ) ? $items : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['title'] );
	}
);
$items = $items ?: $fallback;
?>

<section class="rpd-trust-practices rpd-trust-section">
	<div class="rpd-trust-container">
		<div class="rpd-trust-section-head">
			<p class="rpd-trust-kicker"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</div>
		<div class="rpd-trust-practice-grid">
			<?php foreach ( $items as $item ) : ?>
				<article>
					<span><?php echo esc_html( $item['number'] ?? '' ); ?></span>
					<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $item['body'] ?? '' ); ?></p>
					<small><?php echo esc_html( $item['note'] ?? '' ); ?></small>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
