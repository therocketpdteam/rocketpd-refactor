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
		rocketpd_get_option( 'rpd_address_line_1' ),
		rocketpd_get_option( 'rpd_address_line_2' ),
		rocketpd_get_option( 'rpd_city_state_zip' ),
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
			<a class="rpd-card rpd-contact-method" href="<?php echo esc_url( 'tel:' . preg_replace( '/[^0-9+]/', '', $phone_tel ) ); ?>">
				<span class="rpd-icon-chip rpd-icon-chip--gold" aria-hidden="true"></span>
				<p class="rpd-contact-method__eyebrow"><?php esc_html_e( 'Phone', 'rocketpd' ); ?></p>
				<h3><?php echo esc_html( $phone_display ); ?></h3>
				<p><?php esc_html_e( 'Call or leave a voicemail. Someone real will get back to you.', 'rocketpd' ); ?></p>
			</a>

			<a class="rpd-card rpd-contact-method" href="<?php echo esc_url( 'mailto:' . $email ); ?>">
				<span class="rpd-icon-chip" aria-hidden="true"></span>
				<p class="rpd-contact-method__eyebrow"><?php esc_html_e( 'Email', 'rocketpd' ); ?></p>
				<h3><?php echo esc_html( $email ); ?></h3>
				<p><?php esc_html_e( 'General inquiries, hello, or you just want to say hi.', 'rocketpd' ); ?></p>
			</a>

			<div class="rpd-card rpd-contact-method">
				<span class="rpd-icon-chip" aria-hidden="true"></span>
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
			<div>
				<h3><?php esc_html_e( 'Already a member?', 'rocketpd' ); ?></h3>
				<p><?php esc_html_e( 'Account, billing, or course questions go straight to support.', 'rocketpd' ); ?></p>
			</div>
			<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( 'mailto:' . $support_email ); ?>"><?php esc_html_e( 'Email Support', 'rocketpd' ); ?></a>
		</div>
	</div>
</section>
