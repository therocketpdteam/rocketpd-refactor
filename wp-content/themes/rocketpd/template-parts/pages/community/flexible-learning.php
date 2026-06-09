<?php
/**
 * Community flexible learning section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = rocketpd_community_get_rows(
	'rpd_community_flex_cards',
	array(
		array( 'icon' => 'sparkles', 'time' => __( '5 min', 'rocketpd' ), 'title' => __( 'Drop in for a quick idea', 'rocketpd' ), 'desc' => __( 'Browse a tip or strategy you can use today.', 'rocketpd' ) ),
		array( 'icon' => 'play', 'time' => __( '45 min', 'rocketpd' ), 'title' => __( 'Attend a live webinar', 'rocketpd' ), 'desc' => __( 'Join a real-time conversation with K–12 experts.', 'rocketpd' ) ),
		array( 'icon' => 'coffee', 'time' => __( '30 min', 'rocketpd' ), 'title' => __( 'Join a meet-up or office hours', 'rocketpd' ), 'desc' => __( 'Connect with educators facing similar challenges.', 'rocketpd' ) ),
		array( 'icon' => 'compass', 'time' => __( 'Anytime', 'rocketpd' ), 'title' => __( 'Explore at your own pace', 'rocketpd' ), 'desc' => __( 'Read a guide, listen to a podcast, save what helps.', 'rocketpd' ) ),
	),
	array( 'title' )
);
?>

<section class="rpd-community-flex rpd-community-section">
	<div class="rpd-container">
		<header class="rpd-community-section-header">
			<p class="rpd-community-eyebrow"><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_flex_eyebrow', __( 'However You Show Up', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_flex_heading', __( 'Learn in ways that fit your schedule.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_flex_sub', __( "Whether you have five minutes or an hour, there's a way to engage.", 'rocketpd' ) ) ); ?></p>
		</header>
		<div class="rpd-community-card-grid rpd-community-card-grid--four">
			<?php foreach ( $cards as $card ) : ?>
				<article class="rpd-community-mode-card">
					<span class="rpd-community-icon" aria-hidden="true"><?php rocketpd_community_icon( $card['icon'] ?? 'sparkles' ); ?></span>
					<p><?php echo esc_html( $card['time'] ?? '' ); ?></p>
					<h3><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
					<span><?php echo esc_html( $card['desc'] ?? '' ); ?></span>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
