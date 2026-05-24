<?php
/**
 * Contact Jesse section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$jesse_url = rocketpd_get_option( 'rpd_jesse_schedule_url', 'https://rocketpd.com/jesse-schedule/' );
$eyebrow   = rocketpd_get_field( 'rpd_contact_jesse_eyebrow', __( 'Talk to a real human', 'rocketpd' ) );
$headline  = rocketpd_get_field( 'rpd_contact_jesse_headline', __( 'Twenty minutes with Jesse beats a 50-page deck.', 'rocketpd' ) );
$body      = rocketpd_get_field( 'rpd_contact_jesse_body', __( "Tell him what you're trying to do. He'll tell you what fits, what doesn't, and what to try next.", 'rocketpd' ) );
$name      = rocketpd_get_field( 'rpd_contact_jesse_name', __( 'Jesse', 'rocketpd' ) );
$title     = rocketpd_get_field( 'rpd_contact_jesse_title', __( 'Co-founder, RocketPD', 'rocketpd' ) );
$metadata  = array(
	array(
		'label' => __( '20 minutes', 'rocketpd' ),
		'body'  => __( 'No pitch deck', 'rocketpd' ),
		'icon'  => 'clock',
	),
	array(
		'label' => __( 'Just you & Jesse', 'rocketpd' ),
		'body'  => __( 'No SDR handoff', 'rocketpd' ),
		'icon'  => 'conversation',
	),
	array(
		'label' => __( 'You leave with', 'rocketpd' ),
		'body'  => __( 'A real next step', 'rocketpd' ),
		'icon'  => 'next-step',
	),
);
?>

<section class="rpd-contact-jesse rpd-section">
	<div class="rpd-container rpd-contact-jesse__grid">
		<div>
			<p class="rpd-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p class="rpd-lede"><?php echo esc_html( $body ); ?></p>
			<div class="rpd-contact-jesse__meta">
				<?php foreach ( $metadata as $item ) : ?>
					<div>
						<span class="rpd-contact-jesse__meta-icon" aria-hidden="true">
							<?php if ( 'conversation' === $item['icon'] ) : ?>
								<svg viewBox="0 0 24 24" focusable="false"><path d="M7 18a7 7 0 1 1 6.3 3.95L10 22l.8-2.7A6.97 6.97 0 0 1 7 18Z"/><path d="M8 10h8M8 14h5"/></svg>
							<?php elseif ( 'next-step' === $item['icon'] ) : ?>
								<svg viewBox="0 0 24 24" focusable="false"><path d="M4 12h14"/><path d="m13 7 5 5-5 5"/><path d="m5 17 3 3 5-8"/></svg>
							<?php else : ?>
								<svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="8"/><path d="M12 7v5l3 2"/></svg>
							<?php endif; ?>
						</span>
						<span>
							<strong><?php echo esc_html( $item['label'] ); ?></strong>
							<span><?php echo esc_html( $item['body'] ); ?></span>
						</span>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="rpd-cluster rpd-contact-jesse__actions">
				<?php if ( $jesse_url ) : ?>
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $jesse_url ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Book Time with Jesse', 'rocketpd' ); ?></a>
				<?php endif; ?>
				<a class="rpd-btn rpd-btn--outline-purple" href="#walkthrough-form"><?php esc_html_e( 'Send a Form Instead', 'rocketpd' ); ?></a>
			</div>
		</div>

		<aside class="rpd-lifted-card rpd-contact-profile">
			<div class="rpd-contact-profile__avatar" aria-hidden="true"><?php echo esc_html( substr( $name, 0, 1 ) ); ?></div>
			<h3><?php echo esc_html( $name ); ?></h3>
			<p><?php echo esc_html( $title ); ?></p>
			<div class="rpd-contact-profile__box">
				<p class="rpd-contact-profile__label"><?php esc_html_e( 'Best for', 'rocketpd' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'School and district leaders exploring options', 'rocketpd' ); ?></li>
					<li><?php esc_html_e( "Coordinators planning next year's PD", 'rocketpd' ); ?></li>
					<li><?php esc_html_e( 'Anyone trying to build a real PD program', 'rocketpd' ); ?></li>
				</ul>
			</div>
			<div class="rpd-contact-profile__booking">
				<span class="rpd-contact-profile__booking-label">
					<span class="rpd-contact-profile__booking-icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><path d="M8 3v4M16 3v4"/><path d="M4 9h16"/><path d="M6 5h12a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z"/><path d="M8 13h.01M12 13h.01M16 13h.01M8 17h.01M12 17h.01"/></svg>
					</span>
					<?php esc_html_e( 'Pick a time that works for you', 'rocketpd' ); ?>
				</span>
				<strong><?php esc_html_e( '20 min', 'rocketpd' ); ?></strong>
			</div>
		</aside>
	</div>
</section>
