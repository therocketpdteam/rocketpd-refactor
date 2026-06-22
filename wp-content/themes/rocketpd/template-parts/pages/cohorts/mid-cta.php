<?php
/**
 * Mid-page Cohorts CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_cohorts_midcta_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_headline  = __( 'Find the right cohort for your next step.', 'rocketpd' );
$default_body      = __( 'New cohorts launch every season. Reserve your seat early - most fill 2-3 weeks before the first session.', 'rocketpd' );
$default_cta_label = __( 'Explore Upcoming Cohorts', 'rocketpd' );
$default_cta_url   = '#cohort-gallery';

if ( 'custom' === $mode ) {
	$headline  = rocketpd_get_field( 'rpd_cohorts_midcta_headline', $default_headline );
	$body      = rocketpd_get_field( 'rpd_cohorts_midcta_body', $default_body );
	$cta_label = rocketpd_get_field( 'rpd_cohorts_midcta_cta_label', $default_cta_label );
	$cta_url   = rocketpd_get_field( 'rpd_cohorts_midcta_cta_url', $default_cta_url );
} else {
	$headline  = $default_headline;
	$body      = $default_body;
	$cta_label = $default_cta_label;
	$cta_url   = $default_cta_url;
}
?>

<section class="rpd-cohorts-mid-cta">
	<div class="rpd-container">
		<h2><?php echo esc_html( $headline ); ?></h2>
		<p><?php echo esc_html( $body ); ?></p>
		<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $cta_url ); ?>"><?php echo esc_html( $cta_label ); ?> <span aria-hidden="true">&rarr;</span></a>
	</div>
</section>
