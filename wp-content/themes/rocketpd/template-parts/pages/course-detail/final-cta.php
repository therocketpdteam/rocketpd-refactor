<?php
/**
 * Course detail final CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course = function_exists( 'rocketpd_get_current_course_detail' ) ? rocketpd_get_current_course_detail() : array();
$cta    = $course['finalCta'] ?? array();
?>

<section class="rpd-course-final-cta">
	<span class="rpd-course-final-cta__orb rpd-course-final-cta__orb--blue" aria-hidden="true"></span>
	<span class="rpd-course-final-cta__orb rpd-course-final-cta__orb--magenta" aria-hidden="true"></span>
	<div class="rpd-container">
		<h2><?php echo esc_html( $cta['headline'] ?? __( 'Ready to rethink teacher evaluation?', 'rocketpd' ) ); ?></h2>
		<p><?php echo esc_html( $cta['body'] ?? '' ); ?></p>
		<div>
			<?php if ( ! empty( $cta['primaryLabel'] ) && ! empty( $cta['primaryHref'] ) ) : ?>
				<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $cta['primaryHref'] ); ?>"><?php echo esc_html( $cta['primaryLabel'] ); ?></a>
			<?php endif; ?>
			<?php if ( ! empty( $cta['secondaryLabel'] ) && ! empty( $cta['secondaryHref'] ) ) : ?>
				<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( $cta['secondaryHref'] ); ?>"><?php echo esc_html( $cta['secondaryLabel'] ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</section>
