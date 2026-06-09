<?php
/**
 * Single post bottom CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_id  = get_the_ID();
$enabled  = rocketpd_post_field( 'bottom_cta_enabled', true, $post_id );
$variant  = rocketpd_post_field( 'bottom_cta_variant', 'community', $post_id );
$variant  = $variant ?: 'community';

if ( ! $enabled || 'hidden' === $variant ) {
	return;
}

$defaults = array(
	'community'  => array(
		'title'           => __( 'Join the RocketPD Community', 'rocketpd' ),
		'body'            => __( 'Get practical, expert-led K-12 professional learning built around the way educators actually learn.', 'rocketpd' ),
		'primary_label'   => __( 'Join the Community', 'rocketpd' ),
		'primary_url'     => rocketpd_post_get_community_url(),
		'secondary_label' => __( 'Explore courses', 'rocketpd' ),
		'secondary_url'   => home_url( '/launchpad/courses/' ),
	),
	'newsletter' => array(
		'title'           => __( 'Practical PD, straight to your inbox', 'rocketpd' ),
		'body'            => __( 'Join 40,000+ educators getting research-backed strategies, free resources, and expert-led learning from RocketPD.', 'rocketpd' ),
		'primary_label'   => __( 'Subscribe', 'rocketpd' ),
		'primary_url'     => home_url( '/newsletter/' ),
		'secondary_label' => '',
		'secondary_url'   => '',
	),
	'custom'     => array(
		'title'           => '',
		'body'            => '',
		'primary_label'   => '',
		'primary_url'     => '',
		'secondary_label' => '',
		'secondary_url'   => '',
	),
);

$data = isset( $defaults[ $variant ] ) ? $defaults[ $variant ] : $defaults['community'];

foreach ( array( 'title', 'body', 'primary_label', 'primary_url', 'secondary_label', 'secondary_url' ) as $key ) {
	$value = rocketpd_post_field( 'bottom_cta_' . $key, '', $post_id );

	if ( $value ) {
		$data[ $key ] = $value;
	}
}

if ( empty( $data['title'] ) || empty( $data['primary_label'] ) || empty( $data['primary_url'] ) ) {
	return;
}
?>

<section class="rpd-post-cta rpd-post-cta--<?php echo esc_attr( sanitize_html_class( $variant ) ); ?>">
	<div class="rpd-post-cta__orb" aria-hidden="true"></div>
	<div class="rpd-post-container rpd-post-container--narrow">
		<div class="rpd-post-cta__icon" aria-hidden="true"><?php echo rocketpd_get_icon( 'mail', 26 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
		<h2><?php echo esc_html( $data['title'] ); ?></h2>
		<?php if ( $data['body'] ) : ?>
			<p><?php echo esc_html( $data['body'] ); ?></p>
		<?php endif; ?>

		<?php if ( 'newsletter' === $variant ) : ?>
			<form class="rpd-post-cta__form" action="<?php echo esc_url( $data['primary_url'] ); ?>" method="post">
				<label class="screen-reader-text" for="rpd-post-newsletter-email"><?php esc_html_e( 'Email address', 'rocketpd' ); ?></label>
				<input id="rpd-post-newsletter-email" name="email" type="email" placeholder="<?php esc_attr_e( 'you@school.edu', 'rocketpd' ); ?>" required>
				<button class="rpd-post-btn rpd-post-btn--gold" type="submit"><?php echo esc_html( $data['primary_label'] ); ?></button>
			</form>
			<p class="rpd-post-cta__fine"><?php esc_html_e( 'No spam. Unsubscribe anytime.', 'rocketpd' ); ?></p>
		<?php else : ?>
			<div class="rpd-post-cta__actions">
				<a class="rpd-post-btn rpd-post-btn--gold" href="<?php echo esc_url( $data['primary_url'] ); ?>"><?php echo esc_html( $data['primary_label'] ); ?></a>
				<?php if ( $data['secondary_label'] && $data['secondary_url'] ) : ?>
					<a class="rpd-post-btn rpd-post-btn--outline-light" href="<?php echo esc_url( $data['secondary_url'] ); ?>"><?php echo esc_html( $data['secondary_label'] ); ?></a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
