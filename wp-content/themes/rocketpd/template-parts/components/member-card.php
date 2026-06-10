<?php
/**
 * Member card component.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$member      = isset( $args['member'] ) && is_array( $args['member'] ) ? $args['member'] : array();
$name        = $member['name'] ?? '';
$initials    = $member['initials'] ?? '';
$type        = ! empty( $member['type'] ) ? sanitize_key( $member['type'] ) : 'team';
$title       = $member['title'] ?? ( $member['role'] ?? '' );
$tagline     = $member['tagline'] ?? '';
$bio         = $member['bio'] ?? '';
$association = $member['association'] ?? '';
$headshot    = $member['headshot'] ?? ( $member['image'] ?? '' );
$gradient    = ! empty( $member['gradient'] ) ? $member['gradient'] : ( $member['accent'] ?? 'purple' );
$accent      = sanitize_html_class( $gradient );
$image_alt   = $name ? sprintf( __( 'Portrait of %s', 'rocketpd' ), $name ) : __( 'RocketPD member portrait', 'rocketpd' );
$image_markup = $headshot ? rocketpd_get_image_markup( $headshot, 'rpd-about-person-card__image', $image_alt ) : '';

if ( ! in_array( $type, array( 'founder', 'team', 'board' ), true ) ) {
	$type = 'team';
}

if ( ! $name && ! $title && ! $tagline && ! $bio && ! $association ) {
	return;
}
?>

<article class="rpd-about-person-card rpd-about-person-card--<?php echo esc_attr( $type ); ?> rpd-about-person-card--<?php echo esc_attr( $accent ); ?>">
	<div class="rpd-about-person-card__visual">
		<?php if ( $image_markup ) : ?>
			<?php echo wp_kses_post( $image_markup ); ?>
		<?php elseif ( $initials ) : ?>
			<span><?php echo esc_html( $initials ); ?></span>
		<?php endif; ?>
	</div>
	<div class="rpd-about-person-card__body">
		<?php if ( $name ) : ?>
			<h3><?php echo esc_html( $name ); ?></h3>
		<?php endif; ?>
		<?php if ( $title ) : ?>
			<p class="rpd-about-person-card__title"><?php echo esc_html( $title ); ?></p>
		<?php endif; ?>
		<?php if ( 'founder' === $type && $tagline ) : ?>
			<p class="rpd-about-person-card__tagline"><?php echo esc_html( $tagline ); ?></p>
		<?php endif; ?>
		<?php if ( 'founder' === $type && $bio ) : ?>
			<p class="rpd-about-person-card__bio"><?php echo esc_html( $bio ); ?></p>
		<?php endif; ?>
		<?php if ( 'board' === $type && $association ) : ?>
			<p class="rpd-about-person-card__association"><?php echo esc_html( $association ); ?></p>
		<?php endif; ?>
	</div>
</article>
