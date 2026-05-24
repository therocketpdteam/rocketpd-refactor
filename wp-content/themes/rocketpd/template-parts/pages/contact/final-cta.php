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
$proof_items   = array_filter( array_map( 'trim', explode( '|', $proof ) ) );
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
		<?php if ( ! empty( $proof_items ) ) : ?>
			<p class="rpd-contact-final__proof">
				<span class="rpd-contact-final__proof-icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" focusable="false"><path d="M8 20a4 4 0 0 1 8 0"/><circle cx="12" cy="11" r="3"/><path d="M3 19a3.5 3.5 0 0 1 5.2-3.1"/><path d="M20.9 19a3.5 3.5 0 0 0-5.2-3.1"/><circle cx="5.5" cy="10" r="2"/><circle cx="18.5" cy="10" r="2"/></svg>
				</span>
				<span class="rpd-contact-final__proof-list">
					<?php foreach ( $proof_items as $item ) : ?>
						<span><?php echo esc_html( $item ); ?></span>
					<?php endforeach; ?>
				</span>
			</p>
		<?php endif; ?>
	</div>
</section>
