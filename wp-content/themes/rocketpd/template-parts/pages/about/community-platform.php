<?php
/**
 * About community and platform section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$default_eyebrow  = __( 'Who We Are', 'rocketpd' );
$default_headline = __( "RocketPD is building the nation's most engaged professional learning community for educators, school leaders, and districts.", 'rocketpd' );
$default_body     = __( 'Our mission is to empower educators to grow, collaborate, and improve student outcomes through meaningful professional learning experiences.', 'rocketpd' );
$default_heading  = __( 'We believe professional learning should:', 'rocketpd' );
$default_closing  = __( 'Because when educators feel supported, schools thrive.', 'rocketpd' );
$default_beliefs  = array(
	array( 'icon' => 'rocket', 'text' => __( 'Create agency for educators', 'rocketpd' ) ),
	array( 'icon' => 'heart',  'text' => __( 'Strengthen school communities', 'rocketpd' ) ),
	array( 'icon' => 'globe',  'text' => __( 'Support career growth (without the paperwork)', 'rocketpd' ) ),
	array( 'icon' => 'target', 'text' => __( 'Align to real school challenges', 'rocketpd' ) ),
);

$mode = rocketpd_get_field( 'rpd_about_platform_mode', 'defaults' );

if ( 'hidden' === $mode ) {
	return;
}

if ( 'custom' === $mode ) {
	$eyebrow  = rocketpd_get_field( 'rpd_about_platform_eyebrow', $default_eyebrow );
	$headline = rocketpd_get_field( 'rpd_about_platform_headline', $default_headline );
	$body     = rocketpd_get_field( 'rpd_about_platform_body', $default_body );
	$heading  = rocketpd_get_field( 'rpd_about_platform_card_heading', $default_heading );
	$closing  = rocketpd_get_field( 'rpd_about_platform_closing', $default_closing );
	$beliefs  = rocketpd_get_field( 'rpd_about_platform_beliefs', $default_beliefs );
} else {
	$eyebrow  = $default_eyebrow;
	$headline = $default_headline;
	$body     = $default_body;
	$heading  = $default_heading;
	$closing  = $default_closing;
	$beliefs  = $default_beliefs;
}
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
						<?php
						$text      = isset( $belief['text'] ) ? $belief['text'] : '';
						$icon_name = isset( $belief['icon'] ) ? $belief['icon'] : 'check';
						?>
						<?php if ( $text ) : ?>
							<li><span aria-hidden="true"><?php echo rocketpd_get_icon( $icon_name, 16 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><?php echo esc_html( $text ); ?></li>
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
