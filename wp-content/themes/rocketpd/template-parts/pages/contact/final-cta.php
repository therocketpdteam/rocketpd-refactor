<?php
/**
 * Contact final CTA section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$community_url   = rocketpd_get_option( 'rpd_community_signup_url', home_url( '/' ) );
$jesse_url       = rocketpd_get_option( 'rpd_jesse_schedule_url', home_url( '/contact/#jesse' ) );
$eyebrow         = rocketpd_get_field( 'rpd_contact_final_eyebrow', __( 'The fastest way to meet us', 'rocketpd' ) );
$headline        = rocketpd_get_field( 'rpd_contact_final_headline', __( 'Honestly? Just come hang out.', 'rocketpd' ) );
$body            = rocketpd_get_field( 'rpd_contact_final_body', __( "40,000 educators are already inside the RocketPD Community swapping lessons, asking questions, and figuring it out together. The door's open — and it's free.", 'rocketpd' ) );
$primary_label   = rocketpd_get_field( 'rpd_contact_final_primary_label', __( 'Join the Community', 'rocketpd' ) );
$primary_url     = rocketpd_get_field( 'rpd_contact_final_primary_url', $community_url );
$secondary_label = rocketpd_get_field( 'rpd_contact_final_secondary_label', __( 'Or Book Time with Jesse', 'rocketpd' ) );
$secondary_url   = rocketpd_get_field( 'rpd_contact_final_secondary_url', $jesse_url );
$proof           = rocketpd_get_field( 'rpd_contact_final_proof', __( '40K+ educators · 850+ districts · 48+ countries', 'rocketpd' ) );
?>

<section class="rpd-contact-final rpd-contact-section">
	<div class="rpd-container rpd-contact-final__inner">
		<p class="rpd-contact-pill"><?php echo esc_html( $eyebrow ); ?></p>
		<h2><?php echo esc_html( $headline ); ?></h2>
		<p><?php echo esc_html( $body ); ?></p>
		<?php if ( ( $primary_label && $primary_url ) || ( $secondary_label && $secondary_url ) ) : ?>
			<div class="rpd-contact-final__actions">
				<?php if ( $primary_label && $primary_url ) : ?>
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?> <span aria-hidden="true">→</span></a>
				<?php endif; ?>
				<?php if ( $secondary_label && $secondary_url ) : ?>
					<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if ( $proof ) : ?>
			<p class="rpd-contact-final__proof"><?php echo esc_html( $proof ); ?></p>
		<?php endif; ?>
	</div>
</section>
