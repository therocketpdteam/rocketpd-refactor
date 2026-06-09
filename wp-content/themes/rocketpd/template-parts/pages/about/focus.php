<?php
/**
 * About focus cards section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = rocketpd_about_get_rows(
	'focus_cards',
	array(
		array( 'icon' => 'Users', 'accent' => 'purple', 'title' => __( 'Building an engaged professional learning community', 'rocketpd' ), 'body' => __( 'Connecting educators, leaders, and experts in a shared space for growth and collaboration.', 'rocketpd' ) ),
		array( 'icon' => 'GraduationCap', 'accent' => 'magenta', 'title' => __( 'Delivering practical learning on strategic topics', 'rocketpd' ), 'body' => __( 'Providing expert-led courses, cohorts, and resources aligned to real district priorities.', 'rocketpd' ) ),
		array( 'icon' => 'Target', 'accent' => 'gold', 'title' => __( 'Helping schools turn learning into outcomes', 'rocketpd' ), 'body' => __( 'Supporting implementation so professional learning improves practice, retention, and student success.', 'rocketpd' ) ),
	),
	array( 'title' )
);
?>

<section class="rpd-about-focus rpd-about-section rpd-about-band" aria-labelledby="rpd-about-focus-title">
	<div class="rpd-container">
		<h2 id="rpd-about-focus-title" class="rpd-about-section-title"><?php echo esc_html( rocketpd_about_get_field( 'focus_heading', __( 'At RocketPD, we focus on three things:', 'rocketpd' ) ) ); ?></h2>
		<div class="rpd-about-focus__grid">
			<?php foreach ( $cards as $card ) : ?>
				<article class="rpd-about-focus-card rpd-about-focus-card--<?php echo esc_attr( sanitize_html_class( $card['accent'] ?? 'purple' ) ); ?>">
					<span class="rpd-about-icon" aria-hidden="true"><?php rocketpd_about_icon( $card['icon'] ?? 'Target' ); ?></span>
					<h3><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $card['body'] ?? '' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
