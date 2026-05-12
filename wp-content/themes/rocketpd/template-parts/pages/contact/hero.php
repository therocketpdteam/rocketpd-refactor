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
$jesse_url     = rocketpd_get_option( 'rpd_jesse_schedule_url', home_url( '/contact/#jesse' ) );
$eyebrow       = rocketpd_get_field( 'rpd_contact_hero_eyebrow', __( 'Contact RocketPD', 'rocketpd' ) );
$headline      = rocketpd_get_field( 'rpd_contact_hero_headline', __( "We're here.\nWhat do you need?", 'rocketpd' ) );
$highlight     = rocketpd_get_field( 'rpd_contact_hero_highlight', __( 'here', 'rocketpd' ) );
$body          = rocketpd_get_field( 'rpd_contact_hero_body', __( "Whether you're an educator looking for a community, a school leader exploring options, or a current member who needs a hand — pick a door below and we'll meet you there.", 'rocketpd' ) );
$trust_items   = rocketpd_get_field(
	'rpd_contact_hero_trust_items',
	array(
		array( 'text' => __( 'Replies within 1 business day', 'rocketpd' ) ),
		array( 'text' => __( 'Real humans, every time', 'rocketpd' ) ),
	)
);
$direct_rows   = rocketpd_get_field(
	'rpd_contact_direct_rows',
	array(
		array(
			'style' => 'gold',
			'label' => __( 'Call', 'rocketpd' ),
			'value' => $phone_display,
			'url'   => 'tel:' . preg_replace( '/[^0-9+]/', '', $phone_tel ),
			'icon'  => 'phone',
		),
		array(
			'style' => 'purple',
			'label' => __( 'Email', 'rocketpd' ),
			'value' => $email,
			'url'   => 'mailto:' . $email,
			'icon'  => 'email',
		),
		array(
			'style' => 'pink',
			'label' => __( 'Book Time', 'rocketpd' ),
			'value' => __( 'With Jesse, in 20 min', 'rocketpd' ),
			'url'   => $jesse_url,
			'icon'  => 'calendar',
		),
	)
);

if ( $highlight && false !== stripos( $headline, $highlight ) ) {
	$headline_html = preg_replace( '/' . preg_quote( $highlight, '/' ) . '/i', '<span>$0</span>', esc_html( $headline ), 1 );
} else {
	$headline_html = esc_html( $headline );
}
?>

<section class="rpd-contact-hero rpd-contact-section">
	<div class="rpd-container rpd-contact-hero__grid">
		<div class="rpd-contact-hero__copy">
			<p class="rpd-contact-pill"><?php echo esc_html( $eyebrow ); ?></p>
			<h1><?php echo wp_kses_post( nl2br( $headline_html ) ); ?></h1>
			<p class="rpd-contact-lede"><?php echo esc_html( $body ); ?></p>

			<?php if ( is_array( $trust_items ) && ! empty( $trust_items ) ) : ?>
				<ul class="rpd-contact-trust-list">
					<?php foreach ( $trust_items as $item ) : ?>
						<?php $text = isset( $item['text'] ) ? $item['text'] : ''; ?>
						<?php if ( $text ) : ?>
							<li><?php echo esc_html( $text ); ?></li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>

		<?php if ( is_array( $direct_rows ) && ! empty( $direct_rows ) ) : ?>
			<aside class="rpd-contact-direct-card" aria-label="<?php esc_attr_e( 'Reach RocketPD directly', 'rocketpd' ); ?>">
				<p class="rpd-contact-direct-card__eyebrow"><?php esc_html_e( 'Reach us directly', 'rocketpd' ); ?></p>
				<?php foreach ( $direct_rows as $row ) : ?>
					<?php
					$style = isset( $row['style'] ) ? sanitize_html_class( $row['style'] ) : 'purple';
					$label = isset( $row['label'] ) ? $row['label'] : '';
					$value = isset( $row['value'] ) ? $row['value'] : '';
					$url   = isset( $row['url'] ) ? $row['url'] : '';
					$icon  = isset( $row['icon'] ) ? sanitize_html_class( $row['icon'] ) : 'email';
					?>
					<?php if ( $label && $value && $url ) : ?>
						<a class="rpd-contact-direct-row" href="<?php echo esc_url( $url ); ?>">
							<span class="rpd-contact-icon rpd-contact-icon--<?php echo esc_attr( $style ); ?> rpd-contact-icon--<?php echo esc_attr( $icon ); ?>" aria-hidden="true"></span>
							<span>
								<span class="rpd-contact-direct-row__label"><?php echo esc_html( $label ); ?></span>
								<span class="rpd-contact-direct-row__value"><?php echo esc_html( $value ); ?></span>
							</span>
							<span class="rpd-contact-arrow" aria-hidden="true">→</span>
						</a>
					<?php endif; ?>
				<?php endforeach; ?>
			</aside>
		<?php endif; ?>
	</div>
</section>
