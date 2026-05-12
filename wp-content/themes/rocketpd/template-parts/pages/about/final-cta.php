<?php
/**
 * About final CTA section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_about_final_eyebrow', __( 'Ready to see what fits?', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_about_final_headline', __( 'Explore professional development options with RocketPD.', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_about_final_body', __( 'Whether you are building a district-wide plan or looking for a better way to support educators, RocketPD can help you find the right next step.', 'rocketpd' ) );
$primary_label = rocketpd_get_field( 'rpd_about_final_primary_label', __( 'Explore LaunchPad', 'rocketpd' ) );
$primary_url = rocketpd_get_field( 'rpd_about_final_primary_url', home_url( '/launchpad/' ) );
$secondary_label = rocketpd_get_field( 'rpd_about_final_secondary_label', __( 'Contact RocketPD', 'rocketpd' ) );
$secondary_url = rocketpd_get_field( 'rpd_about_final_secondary_url', home_url( '/contact/' ) );
?>

<section class="rpd-about-final rpd-section">
	<div class="rpd-container rpd-about-final__inner">
		<p class="rpd-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
		<h2><?php echo esc_html( $headline ); ?></h2>
		<p><?php echo esc_html( $body ); ?></p>
		<div class="rpd-cluster rpd-about-final__actions">
			<?php if ( $primary_label && $primary_url ) : ?>
				<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?></a>
			<?php endif; ?>
			<?php if ( $secondary_label && $secondary_url ) : ?>
				<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</section>
