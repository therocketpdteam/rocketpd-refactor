<?php
/**
 * Contact final CTA section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$community_url = rocketpd_get_option( 'rpd_community_signup_url', home_url( '/community/' ) );
$jesse_url     = rocketpd_get_option( 'rpd_jesse_schedule_url', 'https://rocketpd.com/jesse-schedule/' );
$eyebrow       = rocketpd_get_field( 'rpd_contact_final_eyebrow', __( 'The fastest way to meet us', 'rocketpd' ) );
$headline      = rocketpd_get_field( 'rpd_contact_final_headline', __( 'Honestly? Just come hang out.', 'rocketpd' ) );
$body          = rocketpd_get_field( 'rpd_contact_final_body', __( "The door's open, and it's free.", 'rocketpd' ) );
$proof         = rocketpd_get_field( 'rpd_contact_final_proof', __( '40K+ educators | 850+ districts | 48+ countries', 'rocketpd' ) );
?>

<section class="rpd-contact-final rpd-section">
	<div class="rpd-container rpd-contact-final__inner">
		<p class="rpd-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
		<h2><?php echo esc_html( $headline ); ?></h2>
		<p><?php echo esc_html( $body ); ?></p>
		<div class="rpd-cluster rpd-contact-final__actions">
			<?php if ( $community_url ) : ?>
				<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $community_url ); ?>"><?php esc_html_e( 'Join the Community', 'rocketpd' ); ?></a>
			<?php endif; ?>
			<?php if ( $jesse_url ) : ?>
				<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( $jesse_url ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Or Book Time with Jesse', 'rocketpd' ); ?></a>
			<?php endif; ?>
		</div>
		<p class="rpd-contact-final__proof"><?php echo esc_html( $proof ); ?></p>
	</div>
</section>
