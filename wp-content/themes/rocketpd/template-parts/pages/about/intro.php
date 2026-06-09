<?php
/**
 * About problem section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading  = rocketpd_about_get_field( 'problem_heading', __( "Some people say PD is dead.\nThey're not wrong. Not exactly.", 'rocketpd' ) );
$body     = rocketpd_about_get_field(
	'problem_body',
	'<p>' . esc_html__( "Too often, professional learning experiences are disconnected from daily work, difficult to implement, or limited to one-time workshops that don't create lasting change.", 'rocketpd' ) . '</p><p>' . esc_html__( 'School leaders told us they wanted something different — professional learning that was flexible, practical, collaborative, and aligned to real challenges. In short: learning connected to doing.', 'rocketpd' ) . '</p>'
);
$emphasis = rocketpd_about_get_field( 'problem_emphasis', __( 'This is why RocketPD exists.', 'rocketpd' ) );
?>

<section class="rpd-about-intro rpd-about-section" aria-labelledby="rpd-about-problem-title">
	<div class="rpd-container rpd-about-centered">
		<h2 id="rpd-about-problem-title"><?php echo nl2br( esc_html( $heading ) ); ?></h2>
		<div class="rpd-about-copy"><?php echo wp_kses_post( $body ); ?></div>
		<p class="rpd-about-emphasis"><?php echo esc_html( $emphasis ); ?></p>
	</div>
</section>
