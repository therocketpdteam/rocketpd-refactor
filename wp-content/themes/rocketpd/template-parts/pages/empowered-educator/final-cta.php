<?php
/**
 * Empowered Educator Experience — final CTA / form section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_ee_cta_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$eyebrow = rocketpd_get_field( 'rpd_ee_cta_eyebrow', __( 'Get started', 'rocketpd' ) );
$heading = rocketpd_get_field( 'rpd_ee_cta_heading', __( 'Want a better way to do PD in your school or district?', 'rocketpd' ) );
$sub     = rocketpd_get_field( 'rpd_ee_cta_sub', __( 'Schedule your 30-min. listening session today.', 'rocketpd' ) );
?>

<section class="rpd-ee-cta rpd-ee-section">
	<div class="rpd-ee-cta__inner">
		<?php if ( $eyebrow ) : ?>
			<p class="rpd-ee-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
		<?php endif; ?>
		<?php if ( $heading ) : ?>
			<h2><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>
		<?php if ( $sub ) : ?>
			<p class="rpd-ee-cta__sub"><?php echo esc_html( $sub ); ?></p>
		<?php endif; ?>
		<div class="rpd-ee-cta__form">
			<script type="text/javascript" src="https://form.jotform.com/jsform/240914871923057"></script>
		</div>
	</div>
</section>
