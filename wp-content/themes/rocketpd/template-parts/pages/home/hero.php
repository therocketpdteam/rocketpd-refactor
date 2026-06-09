<?php
/**
 * Home hero section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow         = rocketpd_get_field( 'rpd_home_hero_eyebrow', __( 'For K-12 Educators & Leaders', 'rocketpd' ) );
$headline        = rocketpd_get_field( 'rpd_home_hero_headline', __( 'The Community for Educator Growth.', 'rocketpd' ) );
$body            = rocketpd_get_field( 'rpd_home_hero_body', __( 'RocketPD helps schools support educator growth, strengthen retention, and turn professional learning into real outcomes for teachers and students.', 'rocketpd' ) );
$primary_label   = rocketpd_get_field( 'rpd_home_hero_primary_label', __( 'Join the Community', 'rocketpd' ) );
$primary_url     = rocketpd_get_field( 'rpd_home_hero_primary_url', home_url( '/community/' ) );
$secondary_label = rocketpd_get_field( 'rpd_home_hero_secondary_label', __( 'Explore LaunchPad', 'rocketpd' ) );
$secondary_url   = rocketpd_get_field( 'rpd_home_hero_secondary_url', home_url( '/launchpad/' ) );
$image           = rocketpd_get_field( 'rpd_home_hero_image' );
$stat_value      = rocketpd_get_field( 'rpd_home_hero_stat_value', __( '40,000+', 'rocketpd' ) );
$stat_label      = rocketpd_get_field( 'rpd_home_hero_stat_label', __( 'Educators joined', 'rocketpd' ) );
$headline_markup = str_replace( 'Community for', 'Community<br class="rpd-home-hero__break"> for', esc_html( $headline ) );
?>

<section class="rpd-home-hero rpd-home-section">
	<div class="rpd-container rpd-home-hero__grid">
		<div class="rpd-home-hero__copy">
			<p class="rpd-home-pill"><?php echo esc_html( $eyebrow ); ?></p>
			<h1><?php echo wp_kses( $headline_markup, array( 'br' => array( 'class' => true ) ) ); ?></h1>
			<p><?php echo esc_html( $body ); ?></p>
			<div class="rpd-home-actions">
				<?php if ( $primary_label && $primary_url ) : ?>
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?></a>
				<?php endif; ?>
				<?php if ( $secondary_label && $secondary_url ) : ?>
					<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
				<?php endif; ?>
			</div>
		</div>
		<div class="rpd-home-hero__media">
			<span class="rpd-home-hero__depth" aria-hidden="true"></span>
			<?php
			$image_markup = rocketpd_get_image_markup( $image, 'rpd-home-hero__image', __( 'Educator standing in a classroom', 'rocketpd' ) );
			if ( $image_markup ) {
				echo $image_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} else {
				?>
				<div class="rpd-home-image-fallback rpd-home-image-fallback--classroom" role="img" aria-label="<?php esc_attr_e( 'Educator standing in a classroom', 'rocketpd' ); ?>"></div>
				<?php
			}
			?>
			<div class="rpd-home-hero-stat">
				<span class="rpd-home-hero-stat__icon" aria-hidden="true"></span>
				<strong><?php echo esc_html( $stat_value ); ?></strong>
				<small><?php echo esc_html( $stat_label ); ?></small>
			</div>
		</div>
	</div>
</section>
