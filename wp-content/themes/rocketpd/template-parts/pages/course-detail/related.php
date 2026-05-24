<?php
/**
 * Course detail related courses.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course  = function_exists( 'rocketpd_get_current_course_detail' ) ? rocketpd_get_current_course_detail() : array();
$related = isset( $course['related'] ) && is_array( $course['related'] ) ? $course['related'] : array();

if ( ! $related ) {
	return;
}
?>

<section class="rpd-course-related">
	<div class="rpd-container">
		<header class="rpd-course-related__header">
			<div>
				<p class="rpd-course-section-kicker"><?php esc_html_e( 'You might also like', 'rocketpd' ); ?></p>
				<h2><?php esc_html_e( 'Related courses across formats.', 'rocketpd' ); ?></h2>
			</div>
			<a href="<?php echo esc_url( home_url( '/launchpad/courses/' ) ); ?>"><?php esc_html_e( 'Browse all courses', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></a>
		</header>
		<div class="rpd-course-related__grid">
			<?php foreach ( array_slice( $related, 0, 3 ) as $item ) : ?>
				<?php
				$format_tone  = $item['format_tone'] ?? 'gold';
				$format_label = $item['format_label'] ?? '';

				if ( ! $format_label && function_exists( 'rocketpd_get_learning_experience_format_meta' ) ) {
					$format       = rocketpd_get_learning_experience_format_meta( $item['format'] ?? 'self-paced' );
					$format_label = $format['label'] ?? '';
					$format_tone  = $format['tone'] ?? $format_tone;
				} elseif ( ! $format_label && function_exists( 'rocketpd_get_course_format' ) ) {
					$format       = rocketpd_get_course_format( $item['format'] ?? 'self-paced' );
					$format_label = $format['label'] ?? '';
					$format_tone  = $format['tone'] ?? $format_tone;
				}
				?>
				<article class="rpd-course-related-card rpd-course-tone--<?php echo esc_attr( $format_tone ); ?>">
					<div>
						<?php if ( ! empty( $item['image'] ) ) : ?>
							<img src="<?php echo esc_url( $item['image'] ); ?>" alt="">
						<?php endif; ?>
						<span><?php echo esc_html( $format_label ); ?></span>
						<em><?php echo esc_html( $item['price'] ?? '' ); ?></em>
					</div>
					<div>
						<p><?php echo esc_html( $item['topic'] ?? '' ); ?></p>
						<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
						<strong><?php echo esc_html( $item['instructor'] ?? '' ); ?></strong>
						<a href="<?php echo esc_url( $item['href'] ?? '' ); ?>"><?php echo esc_html( $item['cta_label'] ?? __( 'View', 'rocketpd' ) ); ?> <span aria-hidden="true">-&gt;</span></a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
