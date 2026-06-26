<?php
/**
 * Solutions — hero section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_sol_hero_mode', 'defaults' );

if ( 'hidden' === $mode ) {
	return;
}

$eyebrow  = rocketpd_get_field( 'rpd_sol_hero_eyebrow', __( 'Professional Learning', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_sol_hero_headline', __( 'Solutions', 'rocketpd' ) );
$sub      = rocketpd_get_field( 'rpd_sol_hero_sub', __( 'Empower your team with access to expert-led live-virtual and video-based professional development.', 'rocketpd' ) );
?>

<section class="rpd-sol-hero rpd-sol-section">
	<div class="rpd-sol-container">
		<div class="rpd-sol-hero__inner">
			<?php if ( $eyebrow ) : ?>
				<p class="rpd-sol-pill"><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>
			<?php if ( $headline ) : ?>
				<h1><?php echo esc_html( $headline ); ?></h1>
			<?php endif; ?>
			<?php if ( $sub ) : ?>
				<p class="rpd-sol-hero__sub"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>
