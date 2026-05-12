<?php
/**
 * About thought leaders section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_about_leaders_eyebrow', __( 'Built with leading K-12 voices', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_about_leaders_headline', __( 'The people educators already trust, in one professional learning home.', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_about_leaders_body', __( 'RocketPD partners with respected practitioners, authors, and education leaders to help schools turn big ideas into better daily practice.', 'rocketpd' ) );
$leader_points = rocketpd_get_field(
	'rpd_about_leader_points',
	array(
		array( 'text' => __( 'Nationally recognized instructors and facilitators', 'rocketpd' ) ),
		array( 'text' => __( 'Sessions designed for school and district realities', 'rocketpd' ) ),
		array( 'text' => __( 'Learning paths that connect inspiration to implementation', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-about-leaders rpd-section">
	<div class="rpd-container rpd-about-leaders__grid">
		<div class="rpd-about-leaders__panel">
			<div class="rpd-about-leaders__orbit" aria-hidden="true">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>

		<div>
			<p class="rpd-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p class="rpd-lede"><?php echo esc_html( $body ); ?></p>

			<?php if ( is_array( $leader_points ) && ! empty( $leader_points ) ) : ?>
				<ul class="rpd-about-checklist">
					<?php foreach ( $leader_points as $point ) : ?>
						<?php $text = isset( $point['text'] ) ? $point['text'] : ''; ?>
						<?php if ( $text ) : ?>
							<li><?php echo esc_html( $text ); ?></li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</section>
