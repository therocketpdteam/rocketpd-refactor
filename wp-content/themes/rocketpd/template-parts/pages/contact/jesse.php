<?php
/**
 * Contact Jesse section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$jesse_url = rocketpd_get_option( 'rpd_jesse_schedule_url', home_url( '/contact/#jesse' ) );
$eyebrow   = rocketpd_get_field( 'rpd_contact_jesse_eyebrow', __( 'Talk to a real human', 'rocketpd' ) );
$headline  = rocketpd_get_field( 'rpd_contact_jesse_headline', __( 'Twenty minutes with Jesse beats a 50-page deck.', 'rocketpd' ) );
$body      = rocketpd_get_field( 'rpd_contact_jesse_body', __( "Jesse's been inside more PD rollouts than just about anyone. Tell him what you're trying to do — he'll tell you what's worked, what hasn't, and whether RocketPD even fits.", 'rocketpd' ) );
$name      = rocketpd_get_field( 'rpd_contact_jesse_name', __( 'Jesse', 'rocketpd' ) );
$title     = rocketpd_get_field( 'rpd_contact_jesse_title', __( 'Co-founder, RocketPD', 'rocketpd' ) );
$meta      = rocketpd_get_field(
	'rpd_contact_jesse_meta',
	array(
		array(
			'title' => __( '20 minutes', 'rocketpd' ),
			'body'  => __( 'No pitch deck', 'rocketpd' ),
			'icon'  => 'clock',
		),
		array(
			'title' => __( 'Just you & Jesse', 'rocketpd' ),
			'body'  => __( 'No SDR handoff', 'rocketpd' ),
			'icon'  => 'people',
		),
		array(
			'title' => __( 'You leave with', 'rocketpd' ),
			'body'  => __( 'A real next step', 'rocketpd' ),
			'icon'  => 'spark',
		),
	)
);
$best_for  = rocketpd_get_field(
	'rpd_contact_jesse_best_for',
	array(
		array( 'text' => __( 'School & district leaders exploring options', 'rocketpd' ) ),
		array( 'text' => __( "Coordinators planning next year's PD", 'rocketpd' ) ),
		array( 'text' => __( 'Anyone trying to build a real PD program', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-contact-jesse rpd-contact-section" id="jesse">
	<div class="rpd-container rpd-contact-jesse__grid">
		<div class="rpd-contact-jesse__copy">
			<p class="rpd-contact-pill"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p class="rpd-contact-lede"><?php echo esc_html( $body ); ?></p>

			<?php if ( is_array( $meta ) && ! empty( $meta ) ) : ?>
				<div class="rpd-contact-meta">
					<?php foreach ( $meta as $item ) : ?>
						<?php
						$meta_title = isset( $item['title'] ) ? $item['title'] : '';
						$meta_body  = isset( $item['body'] ) ? $item['body'] : '';
						$meta_icon  = isset( $item['icon'] ) ? sanitize_html_class( $item['icon'] ) : 'clock';
						?>
						<?php if ( $meta_title || $meta_body ) : ?>
							<div class="rpd-contact-meta__item">
								<span class="rpd-contact-mini-icon rpd-contact-mini-icon--<?php echo esc_attr( $meta_icon ); ?>" aria-hidden="true"></span>
								<span>
									<strong><?php echo esc_html( $meta_title ); ?></strong>
									<small><?php echo esc_html( $meta_body ); ?></small>
								</span>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<div class="rpd-contact-actions">
				<?php if ( $jesse_url ) : ?>
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $jesse_url ); ?>"><?php esc_html_e( 'Book Time with Jesse', 'rocketpd' ); ?> <span aria-hidden="true">→</span></a>
				<?php endif; ?>
				<a class="rpd-btn rpd-btn--outline-purple" href="#walkthrough-form"><?php esc_html_e( 'Send a Form Instead', 'rocketpd' ); ?></a>
			</div>
		</div>

		<aside class="rpd-contact-profile-card">
			<div class="rpd-contact-profile-card__head">
				<div class="rpd-contact-profile-card__avatar" aria-hidden="true"><?php echo esc_html( substr( $name, 0, 1 ) ); ?></div>
				<div>
					<h3><?php echo esc_html( $name ); ?></h3>
					<p><?php echo esc_html( $title ); ?></p>
				</div>
			</div>

			<?php if ( is_array( $best_for ) && ! empty( $best_for ) ) : ?>
				<div class="rpd-contact-profile-card__box">
					<p><?php esc_html_e( 'Best For', 'rocketpd' ); ?></p>
					<ul class="rpd-contact-check-list">
						<?php foreach ( $best_for as $item ) : ?>
							<?php $text = isset( $item['text'] ) ? $item['text'] : ''; ?>
							<?php if ( $text ) : ?>
								<li><?php echo esc_html( $text ); ?></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<div class="rpd-contact-profile-card__foot">
				<span><?php esc_html_e( 'Pick any open slot', 'rocketpd' ); ?></span>
				<span><?php esc_html_e( '20 min', 'rocketpd' ); ?></span>
			</div>
		</aside>
	</div>
</section>
