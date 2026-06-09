<?php
/**
 * About district leaders band.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$body = rocketpd_about_get_field(
	'district_body',
	'<p>' . esc_html__( 'RocketPD brings professional learning, collaboration, implementation support, and expert guidance together in one connected community.', 'rocketpd' ) . '</p><p>' . esc_html__( 'From free guides and webinars on urgent topics to asynchronous courses to live cohorts to district learning ecosystems and research, schools can support educator growth in ways that align with their strategic priorities and schedules, all while providing a safe space to explore and grow.', 'rocketpd' ) . '</p>'
);
?>

<section class="rpd-about-district rpd-about-section rpd-about-section--dark" aria-labelledby="rpd-about-district-title">
	<div class="rpd-about-orb rpd-about-orb--purple"></div>
	<div class="rpd-container rpd-about-dark-inner">
		<h2 id="rpd-about-district-title"><?php echo esc_html( rocketpd_about_get_field( 'district_heading', __( "District leaders don't need to search across multiple vendors to support their teams.", 'rocketpd' ) ) ); ?></h2>
		<div class="rpd-about-copy"><?php echo wp_kses_post( $body ); ?></div>
		<p class="rpd-about-district__emphasis"><?php echo esc_html( rocketpd_about_get_field( 'district_emphasis', __( 'Professional learning becomes part of your personal career path — not one more thing to do.', 'rocketpd' ) ) ); ?></p>
	</div>
</section>
