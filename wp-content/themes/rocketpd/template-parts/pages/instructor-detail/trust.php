<?php
/**
 * Instructor trust split.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$instructor = function_exists( 'rocketpd_get_current_instructor_detail' ) ? rocketpd_get_current_instructor_detail() : array();
$trust      = $instructor['trust'] ?? array();
$stats      = isset( $trust['stats'] ) && is_array( $trust['stats'] ) ? $trust['stats'] : array();
?>

<section class="rpd-instructor-trust">
	<div class="rpd-container rpd-instructor-trust__grid">
		<figure class="rpd-instructor-testimonial">
			<span aria-hidden="true">"</span>
			<blockquote><?php echo esc_html( $trust['quote'] ?? '' ); ?></blockquote>
			<figcaption>
				<strong><?php echo esc_html( $trust['person'] ?? '' ); ?></strong>
				<small><?php echo esc_html( $trust['attribution'] ?? '' ); ?></small>
			</figcaption>
		</figure>
		<?php if ( $stats ) : ?>
			<div class="rpd-instructor-trust__stats" aria-label="<?php esc_attr_e( 'Instructor impact stats', 'rocketpd' ); ?>">
				<?php foreach ( $stats as $stat ) : ?>
					<div>
						<strong><?php echo esc_html( $stat['value'] ?? '' ); ?></strong>
						<span><?php echo esc_html( $stat['label'] ?? '' ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
