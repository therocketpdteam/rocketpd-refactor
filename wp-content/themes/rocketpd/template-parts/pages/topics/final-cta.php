<?php
/**
 * Topic Index final CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="rpd-topics-final-cta">
	<div class="rpd-container">
		<h2><?php echo esc_html( rocketpd_get_field( 'rpd_topics_final_headline', __( 'Find the Right Resources for Your Next Challenge.', 'rocketpd' ) ) ); ?></h2>
		<p><?php echo esc_html( rocketpd_get_field( 'rpd_topics_final_body', __( "Whether you're a teacher, instructional coach, principal, or district leader - there's a RocketPD topic hub for the work in front of you.", 'rocketpd' ) ) ); ?></p>
		<div>
			<a class="rpd-btn rpd-btn--gold" href="#gallery"><?php esc_html_e( 'Explore Topics', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></a>
			<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( home_url( '/community/' ) ); ?>"><?php esc_html_e( 'Explore the Community', 'rocketpd' ); ?></a>
		</div>
	</div>
</section>
