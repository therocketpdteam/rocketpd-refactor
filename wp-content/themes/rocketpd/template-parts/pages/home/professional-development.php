<?php
/**
 * Home professional development section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$image    = rocketpd_get_field( 'rpd_home_pd_image' );
$headline = rocketpd_get_field( 'rpd_home_pd_headline', __( 'More Than Professional Development.', 'rocketpd' ) );
$body     = rocketpd_get_field( 'rpd_home_pd_body', __( "Most PD is a generic event—something you attend once and forget. RocketPD is a connected ecosystem. We believe that the best professional learning feels like a vibrant teacher's lounge crossed with a serious professional society.\n\nHere, you're not just taking courses. You're joining a nationwide network of passionate educators sharing what works, wrestling with what doesn't, and pushing the boundaries of what's possible in our schools.", 'rocketpd' ) );
?>

<section class="rpd-home-pd rpd-home-section">
	<div class="rpd-container rpd-home-split rpd-home-split--image-left">
		<div class="rpd-home-pd__media">
			<?php
			$image_markup = rocketpd_get_image_markup( $image, 'rpd-home-pd__image', __( 'Educators talking in a school hallway', 'rocketpd' ) );
			if ( $image_markup ) {
				echo $image_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} else {
				?>
				<div class="rpd-home-image-fallback rpd-home-image-fallback--hallway" role="img" aria-label="<?php esc_attr_e( 'Educators talking in a school hallway', 'rocketpd' ); ?>"></div>
				<?php
			}
			?>
		</div>
		<div class="rpd-home-pd__copy">
			<h2><?php echo esc_html( $headline ); ?></h2>
			<?php foreach ( preg_split( '/\r\n\r\n|\n\n|\r\r/', $body ) as $paragraph ) : ?>
				<?php if ( trim( $paragraph ) ) : ?>
					<p><?php echo esc_html( trim( $paragraph ) ); ?></p>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
