<?php
/**
 * Instructor Index final CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$headline = rocketpd_get_field( 'rpd_instructors_final_headline', __( 'Find the right expert for your team.', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_instructors_final_body', __( 'Browse the community, explore by topic, or talk with RocketPD about custom programs for your school or district.', 'rocketpd' ) );
$primary = rocketpd_get_field( 'rpd_instructors_final_primary_label', __( 'Explore the Community', 'rocketpd' ) );
$primary_url = rocketpd_get_field( 'rpd_instructors_final_primary_url', home_url( '/community/' ) );
$secondary = rocketpd_get_field( 'rpd_instructors_final_secondary_label', __( 'Talk With RocketPD', 'rocketpd' ) );
$secondary_url = rocketpd_get_field( 'rpd_instructors_final_secondary_url', home_url( '/contact/' ) );
?>

<section class="rpd-instructors-final">
	<div class="rpd-container rpd-instructors-final__inner">
		<h2><?php echo esc_html( $headline ); ?></h2>
		<p><?php echo esc_html( $body ); ?></p>
		<div class="rpd-instructors-final__actions">
			<?php if ( $primary && $primary_url ) : ?>
				<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary ); ?></a>
			<?php endif; ?>
			<?php if ( $secondary && $secondary_url ) : ?>
				<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</section>
