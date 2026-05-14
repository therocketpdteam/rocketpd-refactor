<?php
/**
 * Course detail included section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course   = function_exists( 'rocketpd_get_current_course_detail' ) ? rocketpd_get_current_course_detail() : array();
$format   = $course['format'] ?? 'self-paced';
$included = $course['included'][ $format ] ?? array();
$items    = isset( $included['items'] ) && is_array( $included['items'] ) ? $included['items'] : array();

if ( ! $items ) {
	return;
}
?>

<section class="rpd-course-included">
	<div class="rpd-container rpd-course-included__inner">
		<div>
			<p class="rpd-course-section-kicker"><?php esc_html_e( "What's Included", 'rocketpd' ); ?></p>
			<h2><?php echo esc_html( $included['heading'] ?? __( 'Every RocketPD course includes', 'rocketpd' ) ); ?></h2>
			<ul class="rpd-course-included__list">
				<?php foreach ( $items as $item ) : ?>
					<li><span data-icon="<?php echo esc_attr( $item['icon'] ?? 'check' ); ?>" aria-hidden="true"></span><?php echo esc_html( $item['label'] ?? '' ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="rpd-course-device-card">
			<div class="rpd-course-device-card__screen">
				<div class="rpd-course-device-card__brand"><?php esc_html_e( 'LaunchPad', 'rocketpd' ); ?><span aria-hidden="true">&raquo;</span></div>
				<div class="rpd-course-device-card__phone" aria-hidden="true">
					<span></span>
					<strong><?php esc_html_e( 'My courses', 'rocketpd' ); ?></strong>
					<em><?php echo esc_html( $course['title'] ?? __( 'Course', 'rocketpd' ) ); ?></em>
				</div>
				<div class="rpd-course-device-card__laptop" aria-hidden="true">
					<div>
						<?php if ( ! empty( $included['visual'] ) ) : ?>
							<img src="<?php echo esc_url( $included['visual'] ); ?>" alt="">
						<?php endif; ?>
						<span><?php esc_html_e( 'Workbook + video modules', 'rocketpd' ); ?></span>
					</div>
				</div>
				<div class="rpd-course-device-card__book" aria-hidden="true">
					<span><?php esc_html_e( 'Guide', 'rocketpd' ); ?></span>
				</div>
			</div>
		</div>
	</div>
</section>
