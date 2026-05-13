<?php
/**
 * Home final CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$headline        = rocketpd_get_field( 'rpd_home_final_headline', __( "Join the RocketPD Professional Learning Community Today - It's Free.", 'rocketpd' ) );
$body            = rocketpd_get_field( 'rpd_home_final_body', __( 'Start exploring resources, connecting with peers, and taking control of your professional growth.', 'rocketpd' ) );
$primary_label   = rocketpd_get_field( 'rpd_home_final_primary_label', __( 'Join the Community', 'rocketpd' ) );
$primary_url     = rocketpd_get_field( 'rpd_home_final_primary_url', home_url( '/community/' ) );
$secondary_label = rocketpd_get_field( 'rpd_home_final_secondary_label', __( 'Book a Conversation', 'rocketpd' ) );
$secondary_url   = rocketpd_get_field( 'rpd_home_final_secondary_url', home_url( '/contact/' ) );
?>

<section class="rpd-home-final rpd-home-section">
	<div class="rpd-container rpd-home-final__inner">
		<h2><?php echo esc_html( $headline ); ?></h2>
		<p><?php echo esc_html( $body ); ?></p>
		<div class="rpd-home-actions rpd-home-actions--center">
			<?php if ( $primary_label && $primary_url ) : ?>
				<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?></a>
			<?php endif; ?>
			<?php if ( $secondary_label && $secondary_url ) : ?>
				<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</section>
