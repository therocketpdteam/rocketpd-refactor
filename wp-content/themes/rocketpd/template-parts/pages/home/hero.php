<?php
/**
 * Home hero section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_home_hero_mode', 'defaults' );

if ( 'hidden' === $mode ) {
	return;
}

$default_eyebrow         = __( 'For K-12 Educators & Leaders', 'rocketpd' );
$default_headline        = __( 'The Community for Educator Growth.', 'rocketpd' );
$default_body            = __( 'RocketPD helps schools support educator growth, strengthen retention, and turn professional learning into real outcomes for teachers and students.', 'rocketpd' );
$default_primary_label   = __( 'Join the Community', 'rocketpd' );
$default_primary_url     = home_url( '/community/' );
$default_secondary_label = __( 'Explore LaunchPad', 'rocketpd' );
$default_secondary_url   = home_url( '/launchpad/' );
$default_stat_value      = __( '40,000+', 'rocketpd' );
$default_stat_label      = __( 'Educators joined', 'rocketpd' );

if ( 'custom' === $mode ) {
	$eyebrow         = rocketpd_get_field( 'rpd_home_hero_eyebrow', $default_eyebrow );
	$headline        = rocketpd_get_field( 'rpd_home_hero_headline', $default_headline );
	$body            = rocketpd_get_field( 'rpd_home_hero_body', $default_body );
	$primary_label   = rocketpd_get_field( 'rpd_home_hero_primary_label', $default_primary_label );
	$primary_url     = rocketpd_get_field( 'rpd_home_hero_primary_url', $default_primary_url );
	$secondary_label = rocketpd_get_field( 'rpd_home_hero_secondary_label', $default_secondary_label );
	$secondary_url   = rocketpd_get_field( 'rpd_home_hero_secondary_url', $default_secondary_url );
	$image           = rocketpd_get_field( 'rpd_home_hero_image' );
	$stat_value      = rocketpd_get_field( 'rpd_home_hero_stat_value', $default_stat_value );
	$stat_label      = rocketpd_get_field( 'rpd_home_hero_stat_label', $default_stat_label );
} else {
	$eyebrow         = $default_eyebrow;
	$headline        = $default_headline;
	$body            = $default_body;
	$primary_label   = $default_primary_label;
	$primary_url     = $default_primary_url;
	$secondary_label = $default_secondary_label;
	$secondary_url   = $default_secondary_url;
	$image           = null;
	$stat_value      = $default_stat_value;
	$stat_label      = $default_stat_label;
}

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
				<img src="/wp-content/uploads/2026/06/teacher-classroom-professional-development-scaled.jpg" class="rpd-home-hero__image" alt="<?php esc_attr_e( 'Smiling teacher standing confidently in a classroom with students working in the background', 'rocketpd' ); ?>" loading="eager" />
				<?php
			}
			?>
			<div class="rpd-home-hero-stat">
				<span class="rpd-home-hero-stat__icon" aria-hidden="true"><?php echo rocketpd_get_icon( 'users', 20 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
				<strong><?php echo esc_html( $stat_value ); ?></strong>
				<small><?php echo esc_html( $stat_label ); ?></small>
			</div>
		</div>
	</div>
</section>
