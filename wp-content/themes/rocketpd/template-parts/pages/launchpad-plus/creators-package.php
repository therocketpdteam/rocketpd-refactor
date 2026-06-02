<?php
/**
 * LaunchPad Plus creator package.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bullets = rocketpd_lpp_get_field(
	'rpd_lpp_creator_bullets',
	array(
		array( 'text' => __( 'Produce high-quality asynchronous courses', 'rocketpd' ) ),
		array( 'text' => __( 'Align content to district initiatives', 'rocketpd' ) ),
		array( 'text' => __( 'Host and reuse that content over time', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-lpp-creator rpd-lpp-section">
	<div class="rpd-container rpd-lpp-creator__grid">
		<div>
			<p class="rpd-lpp-eyebrow"><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_creator_eyebrow', __( "Creator's Package", 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_creator_headline', __( 'Create and Scale Your Own Professional Learning Content.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_creator_body_1', __( 'Many districts have strong internal expertise but limited ways to scale it.', 'rocketpd' ) ) ); ?></p>
			<p><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_creator_body_2', __( "With LaunchPad+ and RocketPD's Creator's Package, districts can:", 'rocketpd' ) ) ); ?></p>
			<ul class="rpd-lpp-checks">
				<?php foreach ( $bullets as $bullet ) : ?>
					<?php $text = isset( $bullet['text'] ) ? $bullet['text'] : ''; ?>
					<?php if ( $text ) : ?>
						<li><?php echo esc_html( $text ); ?></li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="rpd-lpp-package-card">
			<header><span><?php esc_html_e( "Creator's Package", 'rocketpd' ); ?></span><b><?php esc_html_e( 'Example Package', 'rocketpd' ); ?></b><h3><?php esc_html_e( 'Six-course district build', 'rocketpd' ); ?></h3></header>
			<ul><?php foreach ( array( 'Six custom courses produced with RocketPD', 'Hosted inside your LaunchPad+ platform', 'Ongoing access and support' ) as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul>
			<p><?php esc_html_e( 'Example district-built courses', 'rocketpd' ); ?></p>
			<div><?php foreach ( array( 'RU Strategic Plan', 'MTSS at RU', 'RU Onboarding', 'RU Coaching', 'RU Family Engage.', 'RU Tech Stack' ) as $course ) : ?><span><b><?php esc_html_e( 'RU', 'rocketpd' ); ?></b><?php echo esc_html( $course ); ?></span><?php endforeach; ?></div>
			<footer><?php esc_html_e( 'Final scope and pricing tailored per district during onboarding.', 'rocketpd' ); ?></footer>
		</div>
	</div>
	<div class="rpd-container">
		<p class="rpd-lpp-centered-note"><?php echo wp_kses_post( rocketpd_lpp_get_field( 'rpd_lpp_creator_closing', __( 'This allows districts to <strong>build a reusable library of professional learning aligned to their goals.</strong>', 'rocketpd' ) ) ); ?></p>
	</div>
</section>
