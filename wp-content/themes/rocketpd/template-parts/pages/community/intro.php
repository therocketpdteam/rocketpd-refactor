<?php
/**
 * Community intro section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_community_get_field( 'rpd_community_intro_eyebrow', __( 'A Place to Start', 'rocketpd' ) );
$heading = rocketpd_community_get_field( 'rpd_community_intro_heading', __( 'Learning that actually supports your work.', 'rocketpd' ) );
$body    = rocketpd_community_get_field(
	'rpd_community_intro_body',
	'<p>' . esc_html__( "Professional learning shouldn't be hard to access — or hard to use.", 'rocketpd' ) . '</p><p>' . esc_html__( 'The RocketPD Community brings together practical, high-quality resources and experiences designed for real classrooms, real schools, and real challenges.', 'rocketpd' ) . '</p><p>' . esc_html__( "Whether you're looking for quick ideas, deeper learning, or connection with other educators, the Community gives you a place to start — and a way to keep growing.", 'rocketpd' ) . '</p>'
);
?>

<section class="rpd-community-intro rpd-community-section">
	<div class="rpd-container rpd-community-narrow">
		<p class="rpd-community-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
		<h2><?php echo esc_html( $heading ); ?></h2>
		<div class="rpd-community-prose"><?php echo wp_kses_post( $body ); ?></div>
	</div>
</section>
