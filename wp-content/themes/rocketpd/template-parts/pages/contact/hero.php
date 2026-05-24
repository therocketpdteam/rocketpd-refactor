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
$jesse_url     = rocketpd_get_option( 'rpd_jesse_schedule_url', 'https://rocketpd.com/jesse-schedule/' );
$eyebrow       = rocketpd_get_field( 'rpd_contact_hero_eyebrow', __( 'Contact RocketPD', 'rocketpd' ) );
$headline      = rocketpd_get_field( 'rpd_contact_hero_headline', __( "We're here. What do you need?", 'rocketpd' ) );
$headline_html = preg_replace(
	'/\bhere\b/i',
	'<span class="rpd-contact-hero__headline-accent">$0</span>',
	esc_html( $headline ),
	1
);
$body          = rocketpd_get_field( 'rpd_contact_hero_body', __( "Whether you're an educator looking for community, a school leader exploring options, or a current member who needs a hand, pick a door below and we'll meet you there.", 'rocketpd' ) );
$fallback_trust_items = array(
	array( 'text' => __( 'Replies within 1 business day', 'rocketpd' ) ),
	array( 'text' => __( 'Real humans, every time', 'rocketpd' ) ),
);
$trust_items          = rocketpd_get_repeater_rows(
	'rpd_contact_hero_trust_items',
	$fallback_trust_items,
	array( 'text' )
);

if ( count( $trust_items ) < 2 ) {
	$trust_items = $fallback_trust_items;
}

$quick_items = array(
	array(
		'modifier' => 'gold',
		'icon'     => 'phone',
		'label'    => __( 'Call', 'rocketpd' ),
		'value'    => $phone_display,
		'url'      => 'tel:' . preg_replace( '/[^0-9+]/', '', $phone_tel ),
	),
	array(
		'modifier' => '',
		'icon'     => 'mail',
		'label'    => __( 'Email', 'rocketpd' ),
		'value'    => $email,
		'url'      => 'mailto:' . $email,
	),
	array(
		'modifier' => 'deep',
		'icon'     => 'calendar',
		'label'    => __( 'Book time', 'rocketpd' ),
		'value'    => __( 'With Jesse, in 20 min', 'rocketpd' ),
		'url'      => $jesse_url,
		'target'   => '_blank',
	),
);
?>

<section class="rpd-contact-hero rpd-section">
	<div class="rpd-container rpd-contact-hero__grid">
		<div class="rpd-contact-hero__copy">
			<p class="rpd-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h1><?php echo wp_kses( nl2br( $headline_html ), array( 'br' => array(), 'span' => array( 'class' => array() ) ) ); ?></h1>
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

			<?php foreach ( $quick_items as $item ) : ?>
				<?php
				if ( empty( $item['url'] ) || empty( $item['value'] ) ) {
					continue;
				}

				$chip_class = ! empty( $item['modifier'] ) ? ' rpd-contact-quick__chip--' . sanitize_html_class( $item['modifier'] ) : '';
				$icon       = isset( $item['icon'] ) ? $item['icon'] : 'mail';
				?>
				<a class="rpd-contact-quick__item" href="<?php echo esc_url( $item['url'] ); ?>"<?php echo ! empty( $item['target'] ) ? ' target="_blank" rel="noopener"' : ''; ?>>
					<span class="rpd-contact-quick__chip<?php echo esc_attr( $chip_class ); ?>" aria-hidden="true">
						<?php if ( 'phone' === $icon ) : ?>
							<svg viewBox="0 0 24 24" focusable="false"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.72 19.72 0 0 1-8.59-3.05 19.35 19.35 0 0 1-6-6A19.72 19.72 0 0 1 2.18 4.18 2 2 0 0 1 4.16 2h3a2 2 0 0 1 2 1.72c.13.96.35 1.9.66 2.8a2 2 0 0 1-.45 2.11L8.1 9.9a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.31 1.84.53 2.8.66A2 2 0 0 1 22 16.92Z"/></svg>
						<?php elseif ( 'calendar' === $icon ) : ?>
							<svg viewBox="0 0 24 24" focusable="false"><path d="M8 2v4M16 2v4M3.5 9.25h17M5.5 4h13a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2h-13a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Z"/><path d="M12 13v3l2 1"/></svg>
						<?php else : ?>
							<svg viewBox="0 0 24 24" focusable="false"><path d="M4 5h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z"/><path d="m22 7-10 6L2 7"/></svg>
						<?php endif; ?>
					</span>
					<span>
						<span class="rpd-contact-quick__label"><?php echo esc_html( $item['label'] ); ?></span>
						<span class="rpd-contact-quick__value"><?php echo esc_html( $item['value'] ); ?></span>
					</span>
					<span class="rpd-contact-quick__arrow" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
					</span>
				</a>
			<?php endforeach; ?>
		</aside>
	</div>
</section>
