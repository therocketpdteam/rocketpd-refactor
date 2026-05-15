<?php
/**
 * Cohorts final CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="rpd-cohorts-final-cta">
	<div class="rpd-container">
		<h2><?php esc_html_e( 'Start Learning With RocketPD.', 'rocketpd' ); ?></h2>
		<p><?php esc_html_e( 'Reserve a seat in the next cohort, or join the RocketPD Community to be the first to know when new cohorts launch.', 'rocketpd' ); ?></p>
		<div class="rpd-cohorts-actions">
			<a class="rpd-btn rpd-btn--gold" href="#cohort-gallery"><?php esc_html_e( 'View Upcoming Cohorts', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></a>
			<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( home_url( '/community/' ) ); ?>"><?php esc_html_e( 'Join the Community', 'rocketpd' ); ?></a>
		</div>
	</div>
</section>
