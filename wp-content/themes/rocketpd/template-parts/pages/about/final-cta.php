<?php
/**
 * About final CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$primary   = rocketpd_about_get_field( 'cta_primary', array( 'title' => __( 'Join the Community', 'rocketpd' ), 'url' => '#' ) );
$secondary = rocketpd_about_get_field( 'cta_secondary', array( 'title' => __( 'Book a Conversation', 'rocketpd' ), 'url' => '#' ) );
?>

<section class="rpd-about-final rpd-about-section rpd-about-section--dark" aria-labelledby="rpd-about-cta-title">
	<div class="rpd-about-orb rpd-about-orb--purple"></div>
	<div class="rpd-about-orb rpd-about-orb--magenta"></div>
	<div class="rpd-container rpd-about-final__inner">
		<h2 id="rpd-about-cta-title"><?php echo esc_html( rocketpd_about_get_field( 'cta_heading', __( "Join the RocketPD Professional Learning Community Today — It's Free.", 'rocketpd' ) ) ); ?></h2>
		<p><?php echo esc_html( rocketpd_about_get_field( 'cta_subhead', __( 'Start exploring resources, connecting with peers, and taking control of your professional growth.', 'rocketpd' ) ) ); ?></p>
		<div class="rpd-about-final__actions">
			<a class="rpd-about-btn rpd-about-btn--gold" href="<?php echo esc_url( $primary['url'] ?? '#' ); ?>"><?php echo esc_html( $primary['title'] ?? __( 'Join the Community', 'rocketpd' ) ); ?></a>
			<a class="rpd-about-btn rpd-about-btn--outline" href="<?php echo esc_url( $secondary['url'] ?? '#' ); ?>"><?php echo esc_html( $secondary['title'] ?? __( 'Book a Conversation', 'rocketpd' ) ); ?></a>
		</div>
	</div>
</section>
