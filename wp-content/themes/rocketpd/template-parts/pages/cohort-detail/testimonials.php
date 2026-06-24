<?php
/**
 * Cohort testimonials.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohort       = function_exists( 'rocketpd_get_current_cohort_detail' ) ? rocketpd_get_current_cohort_detail() : array();
$testimonials = $cohort['testimonials'] ?? array();
$instructor   = $cohort['instructor'] ?? array();

if ( ! $testimonials ) {
	return;
}
?>

<section class="rpd-cohort-testimonials">
	<div class="rpd-container">
		<header class="rpd-cohort-section-header">
			<p class="rpd-cohort-kicker"><?php esc_html_e( 'Testimonials', 'rocketpd' ); ?></p>
			<h2><?php printf( esc_html__( 'What educators say about learning with %s.', 'rocketpd' ), esc_html( $instructor['name'] ?? __( 'this instructor', 'rocketpd' ) ) ); ?></h2>
		</header>
		<div class="rpd-cohort-testimonials__grid">
			<?php foreach ( $testimonials as $testimonial ) : ?>
				<article class="rpd-cohort-testimonial-card">
					<?php echo rocketpd_get_icon( 'quote', 28 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<p><?php echo esc_html( $testimonial['quote'] ?? '' ); ?></p>
					<strong><?php echo esc_html( $testimonial['name'] ?? '' ); ?></strong>
					<span><?php echo esc_html( trim( ( $testimonial['role'] ?? '' ) . ', ' . ( $testimonial['organization'] ?? '' ), ', ' ) ); ?></span>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
