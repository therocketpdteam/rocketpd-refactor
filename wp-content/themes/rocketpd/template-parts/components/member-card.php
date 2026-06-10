<?php
/**
 * Member card component.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$member    = isset( $args['member'] ) && is_array( $args['member'] ) ? $args['member'] : array();
$name      = $member['name'] ?? '';
$initials  = $member['initials'] ?? '';
$role      = $member['role'] ?? '';
$bio       = $member['bio'] ?? '';
$headshot  = $member['headshot'] ?? ( $member['image'] ?? '' );
$links     = isset( $member['links'] ) && is_array( $member['links'] ) ? $member['links'] : array();
$gradient  = ! empty( $member['gradient'] ) ? $member['gradient'] : ( $member['accent'] ?? 'purple' );
$accent    = sanitize_html_class( $gradient );
$image_alt = $name ? sprintf( __( 'Portrait of %s', 'rocketpd' ), $name ) : __( 'RocketPD member portrait', 'rocketpd' );
$image_markup = $headshot ? rocketpd_get_image_markup( $headshot, 'rpd-about-person-card__image', $image_alt ) : '';

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
		<?php if ( $bio ) : ?>
			<p><?php echo esc_html( $bio ); ?></p>
		<?php endif; ?>
		<?php if ( $links ) : ?>
			<div class="rpd-about-person-card__links" aria-label="<?php echo esc_attr( sprintf( __( 'Links for %s', 'rocketpd' ), $name ) ); ?>">
				<?php foreach ( $links as $label => $url ) : ?>
					<?php if ( ! $url ) : ?>
						<?php continue; ?>
					<?php endif; ?>
					<a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( ucwords( str_replace( '_', ' ', $label ) ) ); ?></a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</article>
