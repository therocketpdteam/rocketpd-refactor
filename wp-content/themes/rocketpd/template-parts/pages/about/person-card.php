<?php
/**
 * About person card.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$person    = isset( $args['person'] ) && is_array( $args['person'] ) ? $args['person'] : array();
$name      = isset( $person['name'] ) ? $person['name'] : '';
$initials  = isset( $person['initials'] ) ? $person['initials'] : '';
$role      = isset( $person['role'] ) ? $person['role'] : '';
$specialty = isset( $person['specialty'] ) ? $person['specialty'] : '';
$bio       = isset( $person['bio'] ) ? $person['bio'] : '';
$image     = isset( $person['image'] ) ? $person['image'] : '';
$accent    = isset( $person['accent'] ) ? sanitize_html_class( $person['accent'] ) : 'purple';
$image_alt = $name ? sprintf( __( 'Portrait of %s', 'rocketpd' ), $name ) : __( 'RocketPD team member portrait', 'rocketpd' );
$image_markup = $image ? rocketpd_get_image_markup( $image, 'rpd-about-person-card__image', $image_alt ) : '';

if ( ! $name && ! $role && ! $bio ) {
	return;
}
?>

<article class="rpd-about-person-card rpd-about-person-card--<?php echo esc_attr( $accent ); ?>">
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
		<?php if ( $role ) : ?>
			<p class="rpd-about-person-card__role"><?php echo esc_html( $role ); ?></p>
		<?php endif; ?>
		<?php if ( $specialty ) : ?>
			<p class="rpd-about-person-card__specialty"><?php echo esc_html( $specialty ); ?></p>
		<?php endif; ?>
		<?php if ( $bio ) : ?>
			<p><?php echo esc_html( $bio ); ?></p>
		<?php endif; ?>
	</div>
</article>
