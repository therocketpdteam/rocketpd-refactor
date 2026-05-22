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
$person     = isset( $trust['person'] ) ? trim( wp_strip_all_tags( (string) $trust['person'] ) ) : '';
$image      = $trust['image'] ?? '';
$image_url  = '';

if ( is_array( $image ) && ! empty( $image['url'] ) ) {
	$image_url = $image['url'];
} elseif ( is_string( $image ) ) {
	$image_url = $image;
}

$name_parts = array_values(
	array_filter(
		preg_split( '/\s+/', $person ),
		function ( $part ) {
			$clean_part = strtolower( preg_replace( '/[^\p{L}]/u', '', $part ) );
			return $clean_part && ! in_array( $clean_part, array( 'dr', 'mr', 'mrs', 'ms', 'miss' ), true );
		}
	)
);
$first_part = $name_parts[0] ?? '';
$last_part  = count( $name_parts ) > 1 ? $name_parts[ count( $name_parts ) - 1 ] : '';
$initials   = '';

if ( $first_part ) {
	$initials .= function_exists( 'mb_substr' ) ? mb_substr( $first_part, 0, 1 ) : substr( $first_part, 0, 1 );
}

if ( $last_part ) {
	$initials .= function_exists( 'mb_substr' ) ? mb_substr( $last_part, 0, 1 ) : substr( $last_part, 0, 1 );
}

$initials = $initials ? strtoupper( $initials ) : '?';
?>

<section class="rpd-instructor-trust">
	<div class="rpd-container rpd-instructor-trust__grid">
		<figure class="rpd-instructor-testimonial">
			<svg class="rpd-instructor-testimonial__quote-icon" viewBox="0 0 64 48" aria-hidden="true" focusable="false">
				<path d="M23.5 7.5C15.2 13 10 21 10 30.5c0 6 3.8 10 9 10 4.8 0 8.5-3.5 8.5-8.2 0-4.3-3.1-7.4-7.2-7.9.9-4.7 4.6-8.8 10.2-12.2L23.5 7.5Z" />
				<path d="M50.5 7.5C42.2 13 37 21 37 30.5c0 6 3.8 10 9 10 4.8 0 8.5-3.5 8.5-8.2 0-4.3-3.1-7.4-7.2-7.9.9-4.7 4.6-8.8 10.2-12.2L50.5 7.5Z" />
			</svg>
			<blockquote><?php echo esc_html( $trust['quote'] ?? '' ); ?></blockquote>
			<figcaption>
				<?php if ( $image_url ) : ?>
					<img class="rpd-instructor-testimonial__avatar" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $person ); ?>">
				<?php else : ?>
					<span class="rpd-instructor-testimonial__avatar" aria-hidden="true"><?php echo esc_html( $initials ); ?></span>
				<?php endif; ?>
				<span class="rpd-instructor-testimonial__author">
					<strong><?php echo esc_html( $trust['person'] ?? '' ); ?></strong>
					<small><?php echo esc_html( $trust['attribution'] ?? '' ); ?></small>
				</span>
			</figcaption>
		</figure>
		<?php if ( $stats ) : ?>
			<div class="rpd-instructor-trust__impact">
				<p class="rpd-instructor-section-kicker"><?php esc_html_e( 'Trusted by school leaders', 'rocketpd' ); ?></p>
				<h2><?php esc_html_e( 'Used in 850+ districts across 47 states.', 'rocketpd' ); ?></h2>
				<p><?php esc_html_e( 'School leaders nationwide use Kim’s frameworks to rebuild teacher trust, free up principal time, and turn evaluation into a real engine for instructional growth.', 'rocketpd' ); ?></p>
				<div class="rpd-instructor-trust__stats" aria-label="<?php esc_attr_e( 'Instructor impact stats', 'rocketpd' ); ?>">
					<?php foreach ( $stats as $stat ) : ?>
						<div>
							<strong><?php echo esc_html( $stat['value'] ?? '' ); ?></strong>
							<span><?php echo esc_html( $stat['label'] ?? '' ); ?></span>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
