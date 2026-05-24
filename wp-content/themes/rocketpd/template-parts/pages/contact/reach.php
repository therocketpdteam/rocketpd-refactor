<?php
/**
 * Contact reach section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$phone_display = rocketpd_get_option( 'rpd_phone_display', '(855) 757-6253' );
$phone_tel     = rocketpd_get_option( 'rpd_phone_tel', '8557576253' );
$email         = rocketpd_get_option( 'rpd_general_email', 'info@rocketpd.com' );
$support_email = rocketpd_get_option( 'rpd_support_email', 'support@rocketpd.com' );
$address       = array_filter(
	array(
		rocketpd_get_option( 'rpd_address_line_1', '1055 Howell Mill Rd.' ),
		rocketpd_get_option( 'rpd_address_line_2', '8th Floor' ),
		rocketpd_get_option( 'rpd_city_state_zip', 'Atlanta, GA 30318' ),
	)
);
?>

<section class="rpd-contact-reach rpd-section">
	<div class="rpd-container">
		<header class="rpd-section-header">
			<p class="rpd-section-header__eyebrow"><?php esc_html_e( 'Other ways to reach us', 'rocketpd' ); ?></p>
			<h2 class="rpd-section-header__title"><?php esc_html_e( 'Old-school works too.', 'rocketpd' ); ?></h2>
			<p class="rpd-section-header__body"><?php esc_html_e( 'Phone, email, or actual mail. We read every one.', 'rocketpd' ); ?></p>
		</header>

		<div class="rpd-contact-reach__grid">
			<a class="rpd-card rpd-contact-method rpd-contact-method--phone" href="<?php echo esc_url( 'tel:' . preg_replace( '/[^0-9+]/', '', $phone_tel ) ); ?>">
				<span class="rpd-icon-chip rpd-contact-method__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" focusable="false"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.4 19.4 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.6a2 2 0 0 1-.5 2.1L8 9.6a16 16 0 0 0 6.4 6.4l1.2-1.2a2 2 0 0 1 2.1-.5 12.8 12.8 0 0 0 2.6.6A2 2 0 0 1 22 16.9Z"/></svg>
				</span>
				<p class="rpd-contact-method__eyebrow"><?php esc_html_e( 'Phone', 'rocketpd' ); ?></p>
				<h3><?php echo esc_html( $phone_display ); ?></h3>
				<p><?php esc_html_e( 'Call or leave a voicemail. Someone real will get back to you.', 'rocketpd' ); ?></p>
			</a>

			<a class="rpd-card rpd-contact-method rpd-contact-method--email" href="<?php echo esc_url( 'mailto:' . $email ); ?>">
				<span class="rpd-icon-chip rpd-contact-method__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" focusable="false"><path d="M4 5h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z"/><path d="m22 7-10 6L2 7"/></svg>
				</span>
				<p class="rpd-contact-method__eyebrow"><?php esc_html_e( 'Email', 'rocketpd' ); ?></p>
				<h3><?php echo esc_html( $email ); ?></h3>
				<p><?php esc_html_e( 'General inquiries, hello, or you just want to say hi.', 'rocketpd' ); ?></p>
			</a>

			<div class="rpd-card rpd-contact-method rpd-contact-method--address">
				<span class="rpd-icon-chip rpd-contact-method__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" focusable="false"><path d="M12 21s7-5.3 7-12a7 7 0 1 0-14 0c0 6.7 7 12 7 12Z"/><circle cx="12" cy="9" r="2.5"/></svg>
				</span>
				<p class="rpd-contact-method__eyebrow"><?php esc_html_e( 'Mailing address', 'rocketpd' ); ?></p>
				<?php if ( ! empty( $address ) ) : ?>
					<h3><?php echo esc_html( implode( ', ', $address ) ); ?></h3>
				<?php else : ?>
					<h3><?php esc_html_e( 'Address coming soon', 'rocketpd' ); ?></h3>
				<?php endif; ?>
				<p><?php esc_html_e( 'Send us a postcard. Seriously, we love them.', 'rocketpd' ); ?></p>
			</div>
		</div>

		<div class="rpd-contact-support">
			<div class="rpd-contact-support__body">
				<span class="rpd-contact-support__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="3"/><path d="m5.6 5.6 4.3 4.3M18.4 5.6l-4.3 4.3M18.4 18.4l-4.3-4.3M5.6 18.4l4.3-4.3"/></svg>
				</span>
				<div>
					<h3><?php esc_html_e( 'Already a member?', 'rocketpd' ); ?></h3>
					<p><?php esc_html_e( 'Account, billing, or course questions go straight to support.', 'rocketpd' ); ?></p>
				</div>
			</div>
			<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( 'mailto:' . $support_email ); ?>"><?php esc_html_e( 'Email Support', 'rocketpd' ); ?></a>
		</div>
	</div>
</section>
