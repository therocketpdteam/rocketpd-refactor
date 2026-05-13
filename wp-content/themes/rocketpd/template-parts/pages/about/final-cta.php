<?php
/**
 * About final CTA section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$headline        = rocketpd_get_field( 'rpd_about_final_headline', __( "Join the RocketPD Professional Learning Community Today — It's Free.", 'rocketpd' ) );
$body            = rocketpd_get_field( 'rpd_about_final_body', __( 'Start exploring resources, connecting with peers, and taking control of your professional growth.', 'rocketpd' ) );
$primary_label   = rocketpd_get_field( 'rpd_about_final_primary_label', __( 'Join the Community', 'rocketpd' ) );
$primary_url     = rocketpd_get_field( 'rpd_about_final_primary_url', home_url( '/' ) );
$secondary_label = rocketpd_get_field( 'rpd_about_final_secondary_label', __( 'Book a Conversation', 'rocketpd' ) );
$secondary_url   = rocketpd_get_field( 'rpd_about_final_secondary_url', home_url( '/contact/' ) );
?>

<section class="rpd-about-final-cta rpd-about-section">
	<div class="rpd-container rpd-about-final-cta__inner">
		<h2><?php echo esc_html( $headline ); ?></h2>

		<?php if ( $body ) : ?>
			<p><?php echo esc_html( $body ); ?></p>
		<?php endif; ?>

		<?php if ( ( $primary_label && $primary_url ) || ( $secondary_label && $secondary_url ) ) : ?>
			<div class="rpd-about-final-cta__actions">
				<?php if ( $primary_label && $primary_url ) : ?>
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?></a>
				<?php endif; ?>

				<?php if ( $secondary_label && $secondary_url ) : ?>
					<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
