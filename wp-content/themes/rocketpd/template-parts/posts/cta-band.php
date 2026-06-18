<?php
/**
 * Post bottom CTA band.
 *
 * ACF fields used:
 *   rpd_post_bottom_cta_enabled         — true/false toggle
 *   rpd_post_bottom_cta_variant         — 'community' | 'newsletter' | 'custom' | 'hidden'
 *   rpd_post_bottom_cta_title           — headline (custom variant)
 *   rpd_post_bottom_cta_body            — supporting copy (custom variant)
 *   rpd_post_bottom_cta_primary_label   — primary button label
 *   rpd_post_bottom_cta_primary_url     — primary button URL
 *   rpd_post_bottom_cta_secondary_label — secondary button label
 *   rpd_post_bottom_cta_secondary_url   — secondary button URL
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_post_bottom_cta_mode', 'hidden' );

if ( 'hidden' === $mode ) {
	return;
}

$variant = ( 'custom' === $mode )
	? rocketpd_get_field( 'rpd_post_bottom_cta_variant', 'community' )
	: 'community';

// Resolve content by variant.
switch ( $variant ) {
	case 'newsletter':
		$title           = 'Stay in the loop.';
		$body            = 'Get the best K-12 professional learning ideas delivered to your inbox monthly.';
		$primary_label   = 'Subscribe Free';
		$primary_url     = rocketpd_get_option( 'rpd_newsletter_url', 'https://rocketpd.com/newsletter/' );
		$secondary_label = '';
		$secondary_url   = '';
		break;

	case 'custom':
		$title           = rocketpd_get_field( 'rpd_post_bottom_cta_title', '' );
		$body            = rocketpd_get_field( 'rpd_post_bottom_cta_body', '' );
		$primary_label   = rocketpd_get_field( 'rpd_post_bottom_cta_primary_label', '' );
		$primary_url     = rocketpd_get_field( 'rpd_post_bottom_cta_primary_url', '' );
		$secondary_label = rocketpd_get_field( 'rpd_post_bottom_cta_secondary_label', '' );
		$secondary_url   = rocketpd_get_field( 'rpd_post_bottom_cta_secondary_url', '' );
		break;

	case 'community':
	default:
		$title           = 'Ready to go deeper?';
		$body            = 'Join the RocketPD Learning Community — expert-led professional development built for K-12 educators.';
		$primary_label   = 'Explore RocketPD';
		$primary_url     = rocketpd_get_option( 'rpd_community_url', 'https://rocketpd.com/' );
		$secondary_label = 'Browse Free Guides';
		$secondary_url   = rocketpd_get_option( 'rpd_guides_url', 'https://rocketpd.com/k-12-guides/' );
		break;
}

if ( ! $title && ! $body ) {
	return;
}
?>

<section class="rpd-post-cta-band rpd-post-cta-band--<?php echo esc_attr( $variant ); ?>" aria-label="<?php esc_attr_e( 'Call to action', 'rocketpd' ); ?>">
	<div class="rpd-container rpd-post-cta-band__inner">
		<div class="rpd-post-cta-band__copy">
			<?php if ( $title ) : ?>
				<h2 class="rpd-post-cta-band__title"><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( $body ) : ?>
				<p class="rpd-post-cta-band__body"><?php echo esc_html( $body ); ?></p>
			<?php endif; ?>
		</div>
		<div class="rpd-post-cta-band__actions">
			<?php if ( $primary_label && $primary_url ) : ?>
				<a class="rpd-btn rpd-btn--primary" href="<?php echo esc_url( $primary_url ); ?>">
					<?php echo esc_html( $primary_label ); ?>
				</a>
			<?php endif; ?>
			<?php if ( $secondary_label && $secondary_url ) : ?>
				<a class="rpd-btn rpd-btn--outline" href="<?php echo esc_url( $secondary_url ); ?>">
					<?php echo esc_html( $secondary_label ); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>
