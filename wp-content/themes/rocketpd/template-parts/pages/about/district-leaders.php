<?php
/**
 * About district leaders section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$default_headline = __( "District leaders don't need to search across multiple vendors to support their teams.", 'rocketpd' );
$default_body     = __( "RocketPD brings professional learning, collaboration, implementation support, and expert guidance together in one connected community.\n\nFrom free guides and webinars on urgent topics to asynchronous courses to live cohorts to district learning ecosystems and research, schools can support educator growth in ways that align with their strategic priorities and schedules, all while providing a safe space to explore and grow.", 'rocketpd' );
$default_emphasis = __( 'Professional learning becomes part of your personal career path — not one more thing to do.', 'rocketpd' );

$mode = rocketpd_get_field( 'rpd_about_district_mode', 'defaults' );

if ( 'hidden' === $mode ) {
	return;
}

if ( 'custom' === $mode ) {
	$headline = rocketpd_get_field( 'rpd_about_district_headline', $default_headline );
	$body     = rocketpd_get_field( 'rpd_about_district_body', $default_body );
	$emphasis = rocketpd_get_field( 'rpd_about_district_emphasis', $default_emphasis );
} else {
	$headline = $default_headline;
	$body     = $default_body;
	$emphasis = $default_emphasis;
}
?>

<section class="rpd-about-district rpd-about-section">
	<div class="rpd-container rpd-about-centered">
		<h2><?php echo esc_html( $headline ); ?></h2>

		<?php if ( $body ) : ?>
			<div class="rpd-about-copy">
				<?php echo wp_kses_post( wpautop( $body ) ); ?>
			</div>
		<?php endif; ?>

		<?php if ( $emphasis ) : ?>
			<p class="rpd-about-district__emphasis"><?php echo esc_html( $emphasis ); ?></p>
		<?php endif; ?>
	</div>
</section>
