<?php
/**
 * Cohorts final CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_cohorts_finalcta_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_headline        = __( 'Start Learning With RocketPD.', 'rocketpd' );
$default_body            = __( 'Reserve a seat in the next cohort, or join the RocketPD Community to be the first to know when new cohorts launch.', 'rocketpd' );
$default_primary_label   = __( 'View Upcoming Cohorts', 'rocketpd' );
$default_primary_url     = '#cohort-gallery';
$default_secondary_label = __( 'Join the Community', 'rocketpd' );
$default_secondary_url   = home_url( '/community/' );

if ( 'custom' === $mode ) {
	$headline        = rocketpd_get_field( 'rpd_cohorts_finalcta_headline', $default_headline );
	$body            = rocketpd_get_field( 'rpd_cohorts_finalcta_body', $default_body );
	$primary_label   = rocketpd_get_field( 'rpd_cohorts_finalcta_primary_label', $default_primary_label );
	$primary_url     = rocketpd_get_field( 'rpd_cohorts_finalcta_primary_url', $default_primary_url );
	$secondary_label = rocketpd_get_field( 'rpd_cohorts_finalcta_secondary_label', $default_secondary_label );
	$secondary_url   = rocketpd_get_field( 'rpd_cohorts_finalcta_secondary_url', $default_secondary_url );
} else {
	$headline        = $default_headline;
	$body            = $default_body;
	$primary_label   = $default_primary_label;
	$primary_url     = $default_primary_url;
	$secondary_label = $default_secondary_label;
	$secondary_url   = $default_secondary_url;
}
?>

<section class="rpd-cohorts-final-cta">
	<div class="rpd-container">
		<h2><?php echo esc_html( $headline ); ?></h2>
		<p><?php echo esc_html( $body ); ?></p>
		<div class="rpd-cohorts-actions">
			<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?> <span aria-hidden="true">&rarr;</span></a>
			<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
		</div>
	</div>
</section>
