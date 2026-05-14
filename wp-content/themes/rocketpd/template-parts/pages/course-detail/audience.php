<?php
/**
 * Course detail audience.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course    = function_exists( 'rocketpd_get_current_course_detail' ) ? rocketpd_get_current_course_detail() : array();
$audiences = isset( $course['audiences'] ) && is_array( $course['audiences'] ) ? $course['audiences'] : array();
?>

<section class="rpd-course-audience">
	<div class="rpd-container rpd-course-split">
		<div>
			<p class="rpd-course-section-kicker"><?php esc_html_e( 'Who This Is For', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'Built for the people who run schools — and the coaches who support them.', 'rocketpd' ); ?></h2>
		</div>
		<div>
			<?php if ( $audiences ) : ?>
				<div class="rpd-course-chip-cloud">
					<?php foreach ( $audiences as $audience ) : ?>
						<span><i aria-hidden="true"></i><?php echo esc_html( $audience ); ?></span>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<p><?php echo esc_html( $course['audienceIntro'] ?? '' ); ?></p>
		</div>
	</div>
</section>
