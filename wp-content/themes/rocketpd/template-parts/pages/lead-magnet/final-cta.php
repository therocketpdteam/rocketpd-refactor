<?php
/**
 * Lead Magnet final CTA section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow   = rocketpd_get_field( 'rpd_lead_final_eyebrow', __( 'Start with clarity', 'rocketpd' ) );
$headline  = rocketpd_get_field( 'rpd_lead_final_headline', __( 'Start with clarity.', 'rocketpd' ) );
$body      = rocketpd_get_field( 'rpd_lead_final_body', __( "Download the guide and see what's possible.", 'rocketpd' ) );
$cta_label = rocketpd_get_field( 'rpd_lead_final_cta_label', __( 'Download the Guide', 'rocketpd' ) );
$cta_url   = rocketpd_get_field( 'rpd_lead_final_cta_url', '#rpd-lead-download' );
$proof     = rocketpd_get_field( 'rpd_lead_final_proof', __( '28-page PDF - Free - No follow-up sales sequence', 'rocketpd' ) );
?>

<section class="rpd-lead-final rpd-lead-section">
	<div class="rpd-container rpd-lead-final__inner">
		<p class="rpd-lead-pill"><?php echo esc_html( $eyebrow ); ?></p>
		<h2><?php echo esc_html( $headline ); ?></h2>
		<p><?php echo esc_html( $body ); ?></p>
		<?php if ( $cta_label && $cta_url ) : ?>
			<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $cta_url ); ?>"><?php echo esc_html( $cta_label ); ?> <span aria-hidden="true">v</span></a>
		<?php endif; ?>
		<small><?php echo esc_html( $proof ); ?></small>
	</div>
</section>
