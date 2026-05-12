<?php
/**
 * About hero section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$headline = rocketpd_get_field( 'rpd_about_hero_headline', __( 'The Community for Educator Growth.', 'rocketpd' ) );
$intro    = rocketpd_get_field( 'rpd_about_hero_intro', __( 'Every educator can name a teacher who changed their life.', 'rocketpd' ) );
$body     = rocketpd_get_field(
	'rpd_about_hero_body',
	__(
		"Educators are among society's greatest assets — but the work has never been harder.\n\nBetween staffing challenges, evolving student needs, and rapid technological change, schools need professional learning that supports real growth, not just compliance.\n\nRocketPD exists to help educators grow, collaborate, and turn learning into meaningful outcomes in their schools.",
		'rocketpd'
	)
);
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
