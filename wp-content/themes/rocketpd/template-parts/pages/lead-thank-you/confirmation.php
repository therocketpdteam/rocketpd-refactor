<?php
/**
 * Lead Thank You confirmation section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow         = rocketpd_get_field( 'rpd_lead_thank_eyebrow', __( 'Download ready', 'rocketpd' ) );
$headline        = rocketpd_get_field( 'rpd_lead_thank_headline', __( 'Your guide is ready.', 'rocketpd' ) );
$fallback_body   = __( 'Thanks for requesting Learning Meet Doing. Use the button below to open the guide, then keep exploring practical professional learning with RocketPD.', 'rocketpd' );
$content         = trim( get_the_content() );
$body            = $content ? apply_filters( 'the_content', $content ) : wpautop( $fallback_body );
$download_label  = rocketpd_get_field( 'rpd_lead_thank_download_label', __( 'Download the Guide', 'rocketpd' ) );
$download_url    = rocketpd_get_field( 'rpd_lead_thank_download_url', home_url( '/k-12-guides/learning-meet-doing/' ) );
$secondary_label = rocketpd_get_field( 'rpd_lead_thank_secondary_label', __( 'Explore RocketPD', 'rocketpd' ) );
$secondary_url   = rocketpd_get_field( 'rpd_lead_thank_secondary_url', home_url( '/' ) );
$next_label      = rocketpd_get_field( 'rpd_lead_thank_next_label', __( 'What happens next', 'rocketpd' ) );
$next_title      = rocketpd_get_field( 'rpd_lead_thank_next_title', __( 'Keep the momentum going.', 'rocketpd' ) );
$next_body       = rocketpd_get_field( 'rpd_lead_thank_next_body', __( 'Use the guide with your team, share it with a colleague, or explore RocketPD LaunchPad when you are ready for a fuller professional learning experience.', 'rocketpd' ) );
$proof           = rocketpd_get_field( 'rpd_lead_thank_proof', __( 'Free guide - Practical next steps - Built for K-12 teams', 'rocketpd' ) );
?>

<section class="rpd-lead-thank-confirmation">
	<div class="rpd-container rpd-lead-thank-confirmation__grid">
		<div class="rpd-lead-thank-confirmation__copy">
			<p class="rpd-lead-thank-pill"><?php echo esc_html( $eyebrow ); ?></p>
			<h1><?php echo esc_html( $headline ); ?></h1>
			<div class="rpd-lead-thank-confirmation__body">
				<?php echo wp_kses_post( $body ); ?>
			</div>
			<div class="rpd-lead-thank-actions">
				<?php if ( $download_label && $download_url ) : ?>
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $download_url ); ?>"><?php echo esc_html( $download_label ); ?> <span aria-hidden="true">&rarr;</span></a>
				<?php endif; ?>
				<?php if ( $secondary_label && $secondary_url ) : ?>
					<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
				<?php endif; ?>
			</div>
			<?php if ( $proof ) : ?>
				<p class="rpd-lead-thank-confirmation__proof"><?php echo esc_html( $proof ); ?></p>
			<?php endif; ?>
		</div>
		<aside class="rpd-lead-thank-card" aria-label="<?php esc_attr_e( 'Recommended next step', 'rocketpd' ); ?>">
			<p><?php echo esc_html( $next_label ); ?></p>
			<h2><?php echo esc_html( $next_title ); ?></h2>
			<p><?php echo esc_html( $next_body ); ?></p>
			<div class="rpd-lead-thank-card__rings" aria-hidden="true">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</aside>
	</div>
</section>
