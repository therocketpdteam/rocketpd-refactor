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
		'icon'     => 'P',
		'label'    => __( 'Call', 'rocketpd' ),
		'value'    => $phone_display,
		'url'      => 'tel:' . preg_replace( '/[^0-9+]/', '', $phone_tel ),
	),
	array(
		'modifier' => '',
		'icon'     => '@',
		'label'    => __( 'Email', 'rocketpd' ),
		'value'    => $email,
		'url'      => 'mailto:' . $email,
	),
	array(
		'modifier' => 'deep',
		'icon'     => 'T',
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

			<?php foreach ( $quick_items as $item ) : ?>
				<?php
				if ( empty( $item['url'] ) || empty( $item['value'] ) ) {
					continue;
				}

				$chip_class = ! empty( $item['modifier'] ) ? ' rpd-contact-quick__chip--' . sanitize_html_class( $item['modifier'] ) : '';
				?>
				<a class="rpd-contact-quick__item" href="<?php echo esc_url( $item['url'] ); ?>"<?php echo ! empty( $item['target'] ) ? ' target="_blank" rel="noopener"' : ''; ?>>
					<span class="rpd-contact-quick__chip<?php echo esc_attr( $chip_class ); ?>" aria-hidden="true"><?php echo esc_html( $item['icon'] ); ?></span>
					<span>
						<span class="rpd-contact-quick__label"><?php echo esc_html( $item['label'] ); ?></span>
						<span class="rpd-contact-quick__value"><?php echo esc_html( $item['value'] ); ?></span>
					</span>
				</a>
			<?php endforeach; ?>
		</aside>
	</div>
</section>
