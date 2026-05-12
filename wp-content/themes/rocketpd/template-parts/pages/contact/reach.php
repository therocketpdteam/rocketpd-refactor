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
$eyebrow       = rocketpd_get_field( 'rpd_contact_reach_eyebrow', __( 'Other ways to reach us', 'rocketpd' ) );
$headline      = rocketpd_get_field( 'rpd_contact_reach_headline', __( 'Old-school works too.', 'rocketpd' ) );
$body          = rocketpd_get_field( 'rpd_contact_reach_body', __( 'Phone, email, or actual mail — we read every one.', 'rocketpd' ) );
$methods       = rocketpd_get_field(
	'rpd_contact_reach_methods',
	array(
		array(
			'style' => 'gold',
			'icon'  => 'phone',
			'label' => __( 'Phone', 'rocketpd' ),
			'title' => $phone_display,
			'body'  => __( 'Call or leave a voicemail — someone real will get back to you.', 'rocketpd' ),
			'url'   => 'tel:' . preg_replace( '/[^0-9+]/', '', $phone_tel ),
		),
		array(
			'style' => 'purple',
			'icon'  => 'email',
			'label' => __( 'Email', 'rocketpd' ),
			'title' => $email,
			'body'  => __( 'General inquiries, hello, or you just want to say hi.', 'rocketpd' ),
			'url'   => 'mailto:' . $email,
		),
		array(
			'style' => 'pink',
			'icon'  => 'pin',
			'label' => __( 'Mailing Address', 'rocketpd' ),
			'title' => __( "1055 Howell Mill Rd.\n8th Floor\nAtlanta, GA 30318", 'rocketpd' ),
			'body'  => __( 'Send us a postcard. Seriously, we love them.', 'rocketpd' ),
			'url'   => '',
		),
	)
);
$support_title = rocketpd_get_field( 'rpd_contact_support_title', __( 'Already a member?', 'rocketpd' ) );
$support_body  = rocketpd_get_field( 'rpd_contact_support_body', sprintf( __( 'Account, billing, or course questions go straight to %s — typically answered within 1 business day.', 'rocketpd' ), $support_email ) );
?>

<section class="rpd-contact-reach rpd-contact-section">
	<div class="rpd-container">
		<header class="rpd-contact-section-header">
			<p class="rpd-contact-pill"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</header>

		<?php if ( is_array( $methods ) && ! empty( $methods ) ) : ?>
			<div class="rpd-contact-method-grid">
				<?php foreach ( $methods as $method ) : ?>
					<?php
					$style = isset( $method['style'] ) ? sanitize_html_class( $method['style'] ) : 'purple';
					$icon  = isset( $method['icon'] ) ? sanitize_html_class( $method['icon'] ) : 'email';
					$label = isset( $method['label'] ) ? $method['label'] : '';
					$title = isset( $method['title'] ) ? $method['title'] : '';
					$text  = isset( $method['body'] ) ? $method['body'] : '';
					$url   = isset( $method['url'] ) ? $method['url'] : '';
					?>
					<?php if ( $label || $title || $text ) : ?>
						<?php if ( $url ) : ?>
							<a class="rpd-contact-method-card rpd-contact-method-card--<?php echo esc_attr( $style ); ?>" href="<?php echo esc_url( $url ); ?>">
						<?php else : ?>
							<div class="rpd-contact-method-card rpd-contact-method-card--<?php echo esc_attr( $style ); ?>">
						<?php endif; ?>
							<span class="rpd-contact-icon rpd-contact-icon--<?php echo esc_attr( $style ); ?> rpd-contact-icon--<?php echo esc_attr( $icon ); ?>" aria-hidden="true"></span>
							<?php if ( $label ) : ?>
								<p><?php echo esc_html( $label ); ?></p>
							<?php endif; ?>
							<?php if ( $title ) : ?>
								<h3><?php echo nl2br( esc_html( $title ) ); ?></h3>
							<?php endif; ?>
							<?php if ( $text ) : ?>
								<span><?php echo esc_html( $text ); ?></span>
							<?php endif; ?>
						<?php if ( $url ) : ?>
							</a>
						<?php else : ?>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<div class="rpd-contact-support-strip">
			<span class="rpd-contact-icon rpd-contact-icon--support" aria-hidden="true"></span>
			<div>
				<h3><?php echo esc_html( $support_title ); ?></h3>
				<p><?php echo wp_kses_post( str_replace( $support_email, '<strong>' . esc_html( $support_email ) . '</strong>', esc_html( $support_body ) ) ); ?></p>
			</div>
			<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( 'mailto:' . $support_email ); ?>"><?php esc_html_e( 'Email Support', 'rocketpd' ); ?></a>
		</div>
	</div>
</section>
