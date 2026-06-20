<?php
/**
 * About hero section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$default_headline = __( 'The Community for Educator Growth.', 'rocketpd' );
$default_intro    = __( 'Every educator can name a teacher who changed their life.', 'rocketpd' );
$default_body     = __( "Educators are among society's greatest assets — but the work has never been harder.\n\nBetween staffing challenges, evolving student needs, and rapid technological change, schools need professional learning that supports real growth, not just compliance.\n\nRocketPD exists to help educators grow, collaborate, and turn learning into meaningful outcomes in their schools.", 'rocketpd' );

$mode = rocketpd_get_field( 'rpd_about_hero_mode', 'defaults' );

if ( 'hidden' === $mode ) {
	return;
}

if ( 'custom' === $mode ) {
	$headline = rocketpd_get_field( 'rpd_about_hero_headline', $default_headline );
	$intro    = rocketpd_get_field( 'rpd_about_hero_intro', $default_intro );
	$body     = rocketpd_get_field( 'rpd_about_hero_body', $default_body );
} else {
	$headline = $default_headline;
	$intro    = $default_intro;
	$body     = $default_body;
}
?>

<section class="rpd-about-hero rpd-about-section">
	<div class="rpd-container rpd-about-hero__inner">
		<h1><?php echo esc_html( $headline ); ?></h1>

		<?php if ( $intro ) : ?>
			<p class="rpd-about-hero__intro"><?php echo esc_html( $intro ); ?></p>
		<?php endif; ?>

		<?php if ( $body ) : ?>
			<div class="rpd-about-copy rpd-about-hero__body">
				<?php echo wp_kses_post( wpautop( $body ) ); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
