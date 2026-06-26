<?php
/**
 * Empowered Educator Experience — infographic image.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_ee_infographic_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$image_id  = ( 'custom' === $mode ) ? rocketpd_get_field( 'rpd_ee_infographic_image', 1691 ) : 1691;
$image_alt = rocketpd_get_field( 'rpd_ee_infographic_alt', __( 'Empowered Educator Experience — program overview infographic', 'rocketpd' ) );
?>

<section class="rpd-ee-infographic" aria-label="<?php esc_attr_e( 'Program overview infographic', 'rocketpd' ); ?>">
	<?php echo wp_get_attachment_image( $image_id, 'full', false, array( 'alt' => esc_attr( $image_alt ) ) ); ?>
</section>
