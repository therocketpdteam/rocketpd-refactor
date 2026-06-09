<?php
/**
 * About person card.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$person   = isset( $args['person'] ) && is_array( $args['person'] ) ? $args['person'] : array();
$variant  = isset( $args['variant'] ) ? sanitize_html_class( $args['variant'] ) : 'team';
$name     = $person['name'] ?? '';
$initials = $person['initials'] ?? '';
$gradient = isset( $person['gradient'] ) ? sanitize_html_class( $person['gradient'] ) : 'purple';
$headshot = $person['headshot'] ?? '';
$image    = rocketpd_about_image_url( $headshot, '', 'large' );

if ( ! $name ) {
	return;
}
?>

<article class="rpd-about-person-card rpd-about-person-card--<?php echo esc_attr( $variant ); ?>">
	<div class="rpd-about-person-card__visual rpd-about-person-card__visual--<?php echo esc_attr( $gradient ); ?>">
		<?php if ( $image ) : ?>
			<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( sprintf( __( '%s, %s', 'rocketpd' ), $name, $person['title'] ?? ( $person['role'] ?? '' ) ) ); ?>">
		<?php else : ?>
			<span aria-hidden="true"><?php echo esc_html( $initials ); ?></span>
		<?php endif; ?>
	</div>
	<div class="rpd-about-person-card__body">
		<h3><?php echo esc_html( $name ); ?></h3>
		<?php if ( ! empty( $person['title'] ) ) : ?>
			<p class="rpd-about-person-card__title"><?php echo esc_html( $person['title'] ); ?></p>
		<?php endif; ?>
		<?php if ( ! empty( $person['role_line'] ) ) : ?>
			<p class="rpd-about-person-card__specialty"><?php echo esc_html( $person['role_line'] ); ?></p>
		<?php endif; ?>
		<?php if ( ! empty( $person['role'] ) ) : ?>
			<p class="rpd-about-person-card__role"><?php echo esc_html( $person['role'] ); ?></p>
		<?php endif; ?>
		<?php if ( ! empty( $person['org'] ) ) : ?>
			<p class="rpd-about-person-card__org"><?php echo esc_html( $person['org'] ); ?></p>
		<?php endif; ?>
		<?php if ( ! empty( $person['bio'] ) ) : ?>
			<p><?php echo esc_html( $person['bio'] ); ?></p>
		<?php endif; ?>
	</div>
</article>
