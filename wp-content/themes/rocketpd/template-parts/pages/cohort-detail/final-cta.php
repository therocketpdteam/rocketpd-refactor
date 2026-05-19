<?php
/**
 * Cohort final CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohort      = function_exists( 'rocketpd_get_current_cohort_detail' ) ? rocketpd_get_current_cohort_detail() : array();
$final       = $cohort['finalCta'] ?? array();
$primary_url = ! empty( $final['primaryHref'] ) ? $final['primaryHref'] : ( function_exists( 'rocketpd_get_cohort_detail_primary_href' ) ? rocketpd_get_cohort_detail_primary_href( $cohort ) : '#' );
$primary     = ! empty( $final['primaryLabel'] ) ? $final['primaryLabel'] : ( function_exists( 'rocketpd_get_cohort_detail_primary_label' ) ? rocketpd_get_cohort_detail_primary_label( $cohort ) : __( 'Register for Cohort', 'rocketpd' ) );
?>

<section class="rpd-cohort-final-cta">
	<div class="rpd-container">
		<h2><?php echo esc_html( $final['headline'] ?? __( 'Ready to Join the Cohort?', 'rocketpd' ) ); ?></h2>
		<p><?php echo esc_html( $final['body'] ?? '' ); ?></p>
		<div class="rpd-cohort-final-cta__actions">
			<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary ); ?></a>
			<?php if ( ! empty( $final['secondaryLabel'] ) && ! empty( $final['secondaryHref'] ) ) : ?>
				<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( $final['secondaryHref'] ); ?>"><?php echo esc_html( $final['secondaryLabel'] ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</section>
