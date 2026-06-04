<?php
/**
 * Course detail outcomes.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course   = function_exists( 'rocketpd_get_current_course_detail' ) ? rocketpd_get_current_course_detail() : array();
$outcomes = isset( $course['outcomes'] ) && is_array( $course['outcomes'] ) ? $course['outcomes'] : array();

if ( ! $outcomes ) {
	return;
}
?>

<section class="rpd-course-outcomes">
	<div class="rpd-container">
		<header class="rpd-course-section-header">
			<p><?php esc_html_e( "What You'll Learn", 'rocketpd' ); ?></p>
			<h2><?php echo esc_html( $course['outcomesHeading'] ?? __( "Three concrete shifts you'll be ready to make on Monday.", 'rocketpd' ) ); ?></h2>
		</header>
		<div class="rpd-course-outcomes__grid">
			<?php foreach ( array_slice( $outcomes, 0, 3 ) as $index => $outcome ) : ?>
				<article class="rpd-course-outcome-card">
					<span><?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
					<h3><?php echo esc_html( $outcome['title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $outcome['summary'] ?? '' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
