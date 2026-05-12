<?php
/**
 * Contact Jesse section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$jesse_url = rocketpd_get_option( 'rpd_jesse_schedule_url' );
$eyebrow   = rocketpd_get_field( 'rpd_contact_jesse_eyebrow', __( 'Talk to a real human', 'rocketpd' ) );
$headline  = rocketpd_get_field( 'rpd_contact_jesse_headline', __( 'Twenty minutes with Jesse beats a 50-page deck.', 'rocketpd' ) );
$body      = rocketpd_get_field( 'rpd_contact_jesse_body', __( "Tell him what you're trying to do. He'll tell you what fits, what doesn't, and what to try next.", 'rocketpd' ) );
$name      = rocketpd_get_field( 'rpd_contact_jesse_name', __( 'Jesse', 'rocketpd' ) );
$title     = rocketpd_get_field( 'rpd_contact_jesse_title', __( 'Co-founder, RocketPD', 'rocketpd' ) );
?>

<section class="rpd-contact-jesse rpd-section">
	<div class="rpd-container rpd-contact-jesse__grid">
		<div>
			<p class="rpd-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p class="rpd-lede"><?php echo esc_html( $body ); ?></p>
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
		</aside>
	</div>
</section>
