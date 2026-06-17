<?php
/**
 * Post sidebar CTA.
 *
 * ACF fields used:
 *   rpd_post_sidebar_cta_enabled — true/false toggle
 *   rpd_post_sidebar_cta_title   — headline
 *   rpd_post_sidebar_cta_body    — supporting copy
 *   rpd_post_sidebar_cta_label   — button label
 *   rpd_post_sidebar_cta_url     — button URL; falls back to global community URL
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$enabled = rocketpd_get_field( 'rpd_post_sidebar_cta_enabled', true );

if ( ! $enabled ) {
	return;
}

$title = rocketpd_get_field( 'rpd_post_sidebar_cta_title', 'Join the RocketPD Community' );
$body  = rocketpd_get_field( 'rpd_post_sidebar_cta_body', 'Get practical, expert-led K-12 professional learning delivered the way educators actually learn.' );
$label = rocketpd_get_field( 'rpd_post_sidebar_cta_label', 'Join Free' );
$url   = rocketpd_get_field( 'rpd_post_sidebar_cta_url', '' );

if ( ! $url ) {
	$url = rocketpd_get_option( 'rpd_community_url', 'https://rocketpd.com/community/' );
}
?>

<div class="rpd-post-sidebar__cta">
	<?php if ( $title ) : ?>
		<h3 class="rpd-post-sidebar__cta-title"><?php echo esc_html( $title ); ?></h3>
	<?php endif; ?>

	<?php if ( $body ) : ?>
		<p class="rpd-post-sidebar__cta-body"><?php echo esc_html( $body ); ?></p>
	<?php endif; ?>

	<?php if ( $label && $url ) : ?>
		<a class="rpd-btn rpd-btn--primary rpd-btn--full" href="<?php echo esc_url( $url ); ?>">
			<?php echo esc_html( $label ); ?>
		</a>
	<?php endif; ?>
</div>
