<?php
/**
 * Home LaunchPad feature band.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_home_launchpad_mode', 'defaults' );

if ( 'hidden' === $mode ) {
	return;
}

$default_label      = __( 'Introducing LaunchPad', 'rocketpd' );
$default_headline   = __( "Professional Growth That Fits Your School's Reality.", 'rocketpd' );
$default_body       = __( 'LaunchPad is our comprehensive platform for district-wide professional learning. It combines our vibrant community with powerful tools to track progress, align with district goals, and foster meaningful collaboration among your staff.', 'rocketpd' );
$default_cta_label  = __( 'Learn about LaunchPad', 'rocketpd' );
$default_cta_url    = home_url( '/launchpad/' );
$default_card_label = __( 'Upcoming Cohort', 'rocketpd' );
$default_card_body  = __( 'School Leadership', 'rocketpd' );

if ( 'custom' === $mode ) {
	$label      = rocketpd_get_field( 'rpd_home_launchpad_label', $default_label );
	$headline   = rocketpd_get_field( 'rpd_home_launchpad_headline', $default_headline );
	$body       = rocketpd_get_field( 'rpd_home_launchpad_body', $default_body );
	$cta_label  = rocketpd_get_field( 'rpd_home_launchpad_cta_label', $default_cta_label );
	$cta_url    = rocketpd_get_field( 'rpd_home_launchpad_cta_url', $default_cta_url );
	$image      = rocketpd_get_field( 'rpd_home_launchpad_image' );
	$card_label = rocketpd_get_field( 'rpd_home_launchpad_card_label', $default_card_label );
	$card_body  = rocketpd_get_field( 'rpd_home_launchpad_card_body', $default_card_body );
} else {
	$label      = $default_label;
	$headline   = $default_headline;
	$body       = $default_body;
	$cta_label  = $default_cta_label;
	$cta_url    = $default_cta_url;
	$image      = null;
	$card_label = $default_card_label;
	$card_body  = $default_card_body;
}
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
				<img src="/wp-content/uploads/2026/06/educators-collaborating-laptop-professional-learning-scaled.jpg" class="rpd-home-launchpad__image" alt="<?php esc_attr_e( 'Three educators reviewing data together around a laptop during a professional learning session', 'rocketpd' ); ?>" loading="lazy" />
				<?php
			}
			?>
			<div class="rpd-home-cohort-card">
				<span class="rpd-home-cohort-card__icon" aria-hidden="true"><?php echo rocketpd_get_icon( 'users', 20 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
				<strong><?php echo esc_html( $card_label ); ?></strong>
				<small><?php echo esc_html( $card_body ); ?></small>
			</div>
		</div>
	</div>
</section>
