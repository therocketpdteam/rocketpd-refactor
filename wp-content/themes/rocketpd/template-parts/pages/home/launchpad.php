<?php
/**
 * Home LaunchPad feature band.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$label      = rocketpd_get_field( 'rpd_home_launchpad_label', __( 'Introducing LaunchPad', 'rocketpd' ) );
$headline   = rocketpd_get_field( 'rpd_home_launchpad_headline', __( "Professional Growth That Fits Your School's Reality.", 'rocketpd' ) );
$body       = rocketpd_get_field( 'rpd_home_launchpad_body', __( 'LaunchPad is our comprehensive platform for district-wide professional learning. It combines our vibrant community with powerful tools to track progress, align with district goals, and foster meaningful collaboration among your staff.', 'rocketpd' ) );
$cta_label  = rocketpd_get_field( 'rpd_home_launchpad_cta_label', __( 'Learn about LaunchPad', 'rocketpd' ) );
$cta_url    = rocketpd_get_field( 'rpd_home_launchpad_cta_url', home_url( '/launchpad/' ) );
$image      = rocketpd_get_field( 'rpd_home_launchpad_image' );
$card_label = rocketpd_get_field( 'rpd_home_launchpad_card_label', __( 'Upcoming Cohort', 'rocketpd' ) );
$card_body  = rocketpd_get_field( 'rpd_home_launchpad_card_body', __( 'School Leadership', 'rocketpd' ) );
?>

<section class="rpd-home-launchpad rpd-home-section">
	<div class="rpd-container rpd-home-split">
		<div class="rpd-home-launchpad__copy">
			<p class="rpd-home-badge"><?php echo esc_html( $label ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
			<?php if ( $cta_label && $cta_url ) : ?>
				<a class="rpd-home-text-link" href="<?php echo esc_url( $cta_url ); ?>"><?php echo esc_html( $cta_label ); ?> <span aria-hidden="true">&rarr;</span></a>
			<?php endif; ?>
		</div>
		<div class="rpd-home-launchpad__media">
			<?php
			$image_markup = rocketpd_get_image_markup( $image, 'rpd-home-launchpad__image', __( 'Educators collaborating around a laptop', 'rocketpd' ) );
			if ( $image_markup ) {
				echo $image_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} else {
				?>
				<div class="rpd-home-image-fallback rpd-home-image-fallback--team" role="img" aria-label="<?php esc_attr_e( 'Educators collaborating around a laptop', 'rocketpd' ); ?>"></div>
				<?php
			}
			?>
			<div class="rpd-home-cohort-card">
				<span aria-hidden="true">[]</span>
				<strong><?php echo esc_html( $card_label ); ?></strong>
				<small><?php echo esc_html( $card_body ); ?></small>
			</div>
		</div>
	</div>
</section>
