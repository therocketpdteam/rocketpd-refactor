<?php
/**
 * Course detail FAQ.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course = function_exists( 'rocketpd_get_current_course_detail' ) ? rocketpd_get_current_course_detail() : array();
$faqs   = isset( $course['faqs'] ) && is_array( $course['faqs'] ) ? $course['faqs'] : array();

if ( ! $faqs ) {
	return;
}
?>

<section class="rpd-course-faq">
	<div class="rpd-container rpd-course-split">
		<div>
			<p class="rpd-course-section-kicker rpd-section-header__eyebrow"><?php esc_html_e( 'FAQ', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'Common questions.', 'rocketpd' ); ?></h2>
			<p>
				<?php esc_html_e( 'Everything you need to know before enrolling - or to share with your team.', 'rocketpd' ); ?>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Talk with the RocketPD team.', 'rocketpd' ); ?></a>
			</p>
		</div>
		<div class="rpd-course-faq__list" data-rpd-course-faq>
			<?php foreach ( $faqs as $index => $faq ) : ?>
				<?php
				$button_id = 'rpd-course-faq-button-' . ( $index + 1 );
				$panel_id  = 'rpd-course-faq-panel-' . ( $index + 1 );
				$is_open   = 0 === $index;
				?>
				<div class="rpd-course-faq__item">
					<button id="<?php echo esc_attr( $button_id ); ?>" type="button" aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $panel_id ); ?>">
						<span><?php echo esc_html( $faq['question'] ?? '' ); ?></span>
						<i aria-hidden="true"></i>
					</button>
					<div id="<?php echo esc_attr( $panel_id ); ?>" role="region" aria-labelledby="<?php echo esc_attr( $button_id ); ?>"<?php echo $is_open ? '' : ' hidden'; ?>>
						<p><?php echo esc_html( $faq['answer'] ?? '' ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
