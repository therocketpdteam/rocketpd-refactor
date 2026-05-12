<?php
/**
 * Contact hero section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$phone_display = rocketpd_get_option( 'rpd_phone_display', '(855) 757-6253' );
$phone_tel     = rocketpd_get_option( 'rpd_phone_tel', '8557576253' );
$email         = rocketpd_get_option( 'rpd_general_email', 'info@rocketpd.com' );
$jesse_url     = rocketpd_get_option( 'rpd_jesse_schedule_url' );
$eyebrow       = rocketpd_get_field( 'rpd_contact_hero_eyebrow', __( 'Contact RocketPD', 'rocketpd' ) );
$headline      = rocketpd_get_field( 'rpd_contact_hero_headline', __( "We're here. What do you need?", 'rocketpd' ) );
$body          = rocketpd_get_field( 'rpd_contact_hero_body', __( "Whether you're an educator looking for community, a school leader exploring options, or a current member who needs a hand, pick a door below and we'll meet you there.", 'rocketpd' ) );
$trust_items   = rocketpd_get_field(
	'rpd_contact_hero_trust_items',
	array(
		array( 'text' => __( 'Replies within 1 business day', 'rocketpd' ) ),
		array( 'text' => __( 'Real humans, every time', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-contact-hero rpd-section">
	<div class="rpd-container rpd-contact-hero__grid">
		<div class="rpd-contact-hero__copy">
			<p class="rpd-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h1><?php echo nl2br( esc_html( $headline ) ); ?></h1>
			<p class="rpd-lede"><?php echo esc_html( $body ); ?></p>

			<?php if ( is_array( $trust_items ) && ! empty( $trust_items ) ) : ?>
				<ul class="rpd-contact-hero__trust">
					<?php foreach ( $trust_items as $item ) : ?>
						<?php $text = isset( $item['text'] ) ? $item['text'] : ''; ?>
						<?php if ( $text ) : ?>
							<li><?php echo esc_html( $text ); ?></li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>

		<aside class="rpd-lifted-card rpd-contact-quick" aria-label="<?php esc_attr_e( 'Reach RocketPD directly', 'rocketpd' ); ?>">
			<p class="rpd-contact-quick__eyebrow"><?php esc_html_e( 'Reach us directly', 'rocketpd' ); ?></p>

			<a class="rpd-contact-quick__item" href="<?php echo esc_url( 'tel:' . preg_replace( '/[^0-9+]/', '', $phone_tel ) ); ?>">
				<span class="rpd-contact-quick__chip rpd-contact-quick__chip--gold" aria-hidden="true">P</span>
				<span>
					<span class="rpd-contact-quick__label"><?php esc_html_e( 'Call', 'rocketpd' ); ?></span>
					<span class="rpd-contact-quick__value"><?php echo esc_html( $phone_display ); ?></span>
				</span>
			</a>

			<a class="rpd-contact-quick__item" href="<?php echo esc_url( 'mailto:' . $email ); ?>">
				<span class="rpd-contact-quick__chip" aria-hidden="true">@</span>
				<span>
					<span class="rpd-contact-quick__label"><?php esc_html_e( 'Email', 'rocketpd' ); ?></span>
					<span class="rpd-contact-quick__value"><?php echo esc_html( $email ); ?></span>
				</span>
			</a>

			<?php if ( $jesse_url ) : ?>
				<a class="rpd-contact-quick__item" href="<?php echo esc_url( $jesse_url ); ?>" target="_blank" rel="noopener">
					<span class="rpd-contact-quick__chip rpd-contact-quick__chip--deep" aria-hidden="true">T</span>
					<span>
						<span class="rpd-contact-quick__label"><?php esc_html_e( 'Book time', 'rocketpd' ); ?></span>
						<span class="rpd-contact-quick__value"><?php esc_html_e( 'With Jesse, in 20 min', 'rocketpd' ); ?></span>
					</span>
				</a>
			<?php endif; ?>
		</aside>
	</div>
</section>
