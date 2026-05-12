<?php
/**
 * About mission section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_about_mission_eyebrow', __( 'Our mission', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_about_mission_headline', __( 'Make professional learning feel connected, practical, and worth coming back to.', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_about_mission_body', __( 'RocketPD exists to help schools move beyond one-off PD. We bring trusted educators and leaders into live virtual experiences, pair the learning with usable resources, and keep the conversation going through community.', 'rocketpd' ) );
$points = rocketpd_get_field(
	'rpd_about_mission_points',
	array(
		array( 'text' => __( 'Built for real school calendars, real teams, and real implementation work.', 'rocketpd' ) ),
		array( 'text' => __( 'Designed to help educators leave with clarity, momentum, and next steps.', 'rocketpd' ) ),
		array( 'text' => __( 'Centered on the people doing the work in classrooms, schools, and districts.', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-about-mission rpd-about-band rpd-section">
	<div class="rpd-container rpd-about-mission__grid">
		<div class="rpd-about-mission__copy">
			<p class="rpd-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p class="rpd-lede"><?php echo esc_html( $body ); ?></p>
		</div>

		<?php if ( is_array( $points ) && ! empty( $points ) ) : ?>
			<div class="rpd-about-mission__panel">
				<?php foreach ( $points as $point ) : ?>
					<?php $text = isset( $point['text'] ) ? $point['text'] : ''; ?>
					<?php if ( $text ) : ?>
						<div class="rpd-about-proof">
							<span aria-hidden="true"></span>
							<p><?php echo esc_html( $text ); ?></p>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
