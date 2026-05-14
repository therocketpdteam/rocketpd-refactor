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
				<?php if ( ! empty( $included['visual'] ) ) : ?>
					<img src="<?php echo esc_url( $included['visual'] ); ?>" alt="">
				<?php endif; ?>
				<div>
					<strong><?php esc_html_e( 'LaunchPad', 'rocketpd' ); ?></strong>
					<span><?php esc_html_e( 'Video modules, workbook, certificate, and community access.', 'rocketpd' ); ?></span>
				</div>
			</div>
		</div>
	</div>
</section>
