<?php
/**
 * About community and platform section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = rocketpd_get_field( 'rpd_about_platform_eyebrow', __( 'Who We Are', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_about_platform_headline', __( "RocketPD is building the nation's most engaged professional learning community for educators, school leaders, and districts.", 'rocketpd' ) );
$body     = rocketpd_get_field( 'rpd_about_platform_body', __( 'Our mission is to empower educators to grow, collaborate, and improve student outcomes through meaningful professional learning experiences.', 'rocketpd' ) );
$heading  = rocketpd_get_field( 'rpd_about_platform_card_heading', __( 'We believe professional learning should:', 'rocketpd' ) );
$closing  = rocketpd_get_field( 'rpd_about_platform_closing', __( 'Because when educators feel supported, schools thrive.', 'rocketpd' ) );
$beliefs  = rocketpd_get_field(
	'rpd_about_platform_beliefs',
	array(
		array( 'text' => __( 'create agency for educators', 'rocketpd' ) ),
		array( 'text' => __( 'strengthen school communities', 'rocketpd' ) ),
		array( 'text' => __( 'support career growth (without the paperwork)', 'rocketpd' ) ),
		array( 'text' => __( 'align to real school challenges', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-about-platform rpd-about-section rpd-about-band">
	<div class="rpd-container rpd-about-platform__inner">
		<p class="rpd-about-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
		<h2><?php echo esc_html( $headline ); ?></h2>

		<?php if ( $body ) : ?>
			<p class="rpd-about-platform__body"><?php echo esc_html( $body ); ?></p>
		<?php endif; ?>

		<div class="rpd-about-belief-card">
			<?php if ( $heading ) : ?>
				<h3><?php echo esc_html( $heading ); ?></h3>
			<?php endif; ?>

			<?php if ( is_array( $beliefs ) && ! empty( $beliefs ) ) : ?>
				<ul class="rpd-about-beliefs">
					<?php foreach ( $beliefs as $belief ) : ?>
						<?php $text = isset( $belief['text'] ) ? $belief['text'] : ''; ?>
						<?php if ( $text ) : ?>
							<li><?php echo esc_html( $text ); ?></li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if ( $closing ) : ?>
				<p><?php echo esc_html( $closing ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>
