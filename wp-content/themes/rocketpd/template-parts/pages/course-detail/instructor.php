<?php
/**
 * Course detail instructor authority.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course     = function_exists( 'rocketpd_get_current_course_detail' ) ? rocketpd_get_current_course_detail() : array();
$instructor = $course['instructor'] ?? array();
?>

<section class="rpd-course-instructor">
	<div class="rpd-container">
		<article class="rpd-course-instructor-card">
			<div class="rpd-course-instructor-card__portrait">
				<?php if ( ! empty( $instructor['headshot'] ) ) : ?>
					<img src="<?php echo esc_url( $instructor['headshot'] ); ?>" alt="<?php echo esc_attr( $instructor['name'] ?? '' ); ?>">
				<?php endif; ?>
				<span><?php esc_html_e( 'Featured Expert', 'rocketpd' ); ?></span>
			</div>
			<div>
				<p class="rpd-course-section-kicker"><?php esc_html_e( 'Meet your instructor', 'rocketpd' ); ?></p>
				<h2><?php echo esc_html( $instructor['name'] ?? '' ); ?></h2>
				<strong><?php echo esc_html( $instructor['title'] ?? '' ); ?></strong>
				<p><?php echo esc_html( $instructor['bio'] ?? '' ); ?></p>
				<?php if ( ! empty( $instructor['specialties'] ) && is_array( $instructor['specialties'] ) ) : ?>
					<div class="rpd-course-specialty-pills">
						<?php foreach ( $instructor['specialties'] as $specialty ) : ?>
							<span><?php echo esc_html( $specialty ); ?></span>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $instructor['href'] ) ) : ?>
					<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $instructor['href'] ); ?>"><?php echo esc_html( sprintf( __( "View %s's Instructor Page", 'rocketpd' ), $instructor['name'] ?? __( 'Instructor', 'rocketpd' ) ) ); ?></a>
				<?php endif; ?>
			</div>
		</article>
	</div>
</section>
