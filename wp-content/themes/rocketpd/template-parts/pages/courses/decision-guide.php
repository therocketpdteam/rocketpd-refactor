<?php
/**
 * Courses decision guide.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_courses_guide_eyebrow', __( 'Decision Guide', 'rocketpd' ) );
$heading = rocketpd_get_field( 'rpd_courses_guide_headline', __( 'Not sure where to start?', 'rocketpd' ) );
$body    = rocketpd_get_field( 'rpd_courses_guide_body', __( 'A 30-second decision guide to pick the format that fits your goal this month.', 'rocketpd' ) );
$cards   = rocketpd_get_repeater_rows(
	'rpd_courses_guide_cards',
	array(
		array( 'format' => 'webinar', 'eyebrow' => __( 'Choose a Webinar if', 'rocketpd' ), 'body' => __( 'You want a quick, free introduction to an important idea - and a sense of how the expert thinks before going deeper.', 'rocketpd' ), 'meta' => __( '45-60 min', 'rocketpd' ) ),
		array( 'format' => 'self-paced', 'eyebrow' => __( 'Choose a Self-Paced Course if', 'rocketpd' ), 'body' => __( "You want flexible, practical learning with a workbook and certificate - at $49 it's the easiest yes for individual educators.", 'rocketpd' ), 'meta' => __( '~1 hour, on your schedule', 'rocketpd' ) ),
		array( 'format' => 'cohort', 'eyebrow' => __( 'Choose a Live Cohort if', 'rocketpd' ), 'body' => __( 'You want deeper collaboration, expert interaction, and structured implementation - ideal for leadership teams making real change.', 'rocketpd' ), 'meta' => __( '3, 5, or 8 live sessions', 'rocketpd' ) ),
	),
	array( 'eyebrow', 'body' )
);
?>

<section class="rpd-courses-guide">
	<div class="rpd-container">
		<header class="rpd-courses-section-header rpd-courses-section-header--center">
			<p><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $heading ); ?></h2>
			<span><?php echo esc_html( $body ); ?></span>
		</header>

		<div class="rpd-courses-guide__grid">
			<?php foreach ( $cards as $card ) : ?>
				<?php $format = rocketpd_get_course_format( $card['format'] ?? 'self-paced' ); ?>
				<article class="rpd-courses-guide-card rpd-course-tone--<?php echo esc_attr( $format['tone'] ); ?>">
					<div data-icon="<?php echo esc_attr( $format['icon'] ); ?>" aria-hidden="true"></div>
					<h3><?php echo esc_html( $card['eyebrow'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $card['body'] ?? '' ); ?></p>
					<footer>
						<span><?php esc_html_e( 'Time Commitment', 'rocketpd' ); ?></span>
						<strong><?php echo esc_html( $card['meta'] ?? '' ); ?></strong>
					</footer>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
