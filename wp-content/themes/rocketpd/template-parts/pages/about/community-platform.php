<?php
/**
 * About mission section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$beliefs = rocketpd_about_get_rows(
	'beliefs',
	array(
		array( 'icon' => 'Rocket', 'text' => __( 'create agency for educators', 'rocketpd' ) ),
		array( 'icon' => 'Heart', 'text' => __( 'strengthen school communities', 'rocketpd' ) ),
		array( 'icon' => 'Globe', 'text' => __( 'support career growth (without the paperwork)', 'rocketpd' ) ),
		array( 'icon' => 'Target', 'text' => __( 'align to real school challenges', 'rocketpd' ) ),
	),
	array( 'text' )
);
?>

<section class="rpd-about-mission rpd-about-section rpd-about-band" aria-labelledby="rpd-about-mission-title">
	<div class="rpd-container rpd-about-mission__inner">
		<p class="rpd-about-badge"><?php echo esc_html( rocketpd_about_get_field( 'mission_badge', __( 'Who We Are', 'rocketpd' ) ) ); ?></p>
		<h2 id="rpd-about-mission-title"><?php echo esc_html( rocketpd_about_get_field( 'mission_heading', __( "RocketPD is building the nation's most engaged professional learning community for educators, school leaders, and districts.", 'rocketpd' ) ) ); ?></h2>
		<p class="rpd-about-mission__body"><?php echo esc_html( rocketpd_about_get_field( 'mission_body', __( 'Our mission is to empower educators to grow, collaborate, and improve student outcomes through meaningful professional learning experiences.', 'rocketpd' ) ) ); ?></p>
		<div class="rpd-about-belief-card">
			<h3><?php echo esc_html( rocketpd_about_get_field( 'belief_heading', __( 'We believe professional learning should:', 'rocketpd' ) ) ); ?></h3>
			<div class="rpd-about-beliefs">
				<?php foreach ( $beliefs as $belief ) : ?>
					<div>
						<span aria-hidden="true"><?php rocketpd_about_icon( $belief['icon'] ?? 'Target' ); ?></span>
						<p><?php echo esc_html( $belief['text'] ?? '' ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
			<p class="rpd-about-belief-card__closing"><?php echo esc_html( rocketpd_about_get_field( 'belief_closing', __( 'Because when educators feel supported, schools thrive.', 'rocketpd' ) ) ); ?></p>
		</div>
	</div>
</section>
