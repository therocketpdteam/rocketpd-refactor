<?php
/**
 * Community flexible learning section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_community_flexible_eyebrow', __( 'However you show up', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_community_flexible_headline', __( 'Learn in ways that fit your schedule.', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_community_flexible_body', __( "Whether you have five minutes or an hour, there's a way to engage.", 'rocketpd' ) );
$items = rocketpd_get_repeater_rows(
	'rpd_community_learning_modes',
	array(
		array( 'time' => __( '5 min', 'rocketpd' ), 'title' => __( 'Drop in for a quick idea', 'rocketpd' ), 'body' => __( 'Browse a tip or strategy you can use today.', 'rocketpd' ), 'icon' => 'spark' ),
		array( 'time' => __( '45 min', 'rocketpd' ), 'title' => __( 'Attend a live webinar', 'rocketpd' ), 'body' => __( 'Join a real-time conversation with K-12 experts.', 'rocketpd' ), 'icon' => 'play' ),
		array( 'time' => __( '30 min', 'rocketpd' ), 'title' => __( 'Join a meet-up or office hours', 'rocketpd' ), 'body' => __( 'Connect with educators facing similar challenges.', 'rocketpd' ), 'icon' => 'cup' ),
		array( 'time' => __( 'Anytime', 'rocketpd' ), 'title' => __( 'Explore at your own pace', 'rocketpd' ), 'body' => __( 'Read a guide, listen to a podcast, save what helps.', 'rocketpd' ), 'icon' => 'compass' ),
	),
	array( 'title' )
);
?>

<section class="rpd-community-flexible rpd-community-section rpd-community-section--lavender">
	<div class="rpd-container">
		<header class="rpd-community-section-header">
			<p class="rpd-community-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</header>
		<div class="rpd-community-card-grid rpd-community-card-grid--four">
			<?php foreach ( $items as $item ) : ?>
				<?php if ( empty( $item['title'] ) ) { continue; } ?>
				<article class="rpd-community-mode-card">
					<span class="rpd-community-icon rpd-community-icon--<?php echo esc_attr( sanitize_html_class( $item['icon'] ?? 'spark' ) ); ?>" aria-hidden="true"></span>
					<?php if ( ! empty( $item['time'] ) ) : ?>
						<p><?php echo esc_html( $item['time'] ); ?></p>
					<?php endif; ?>
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<?php if ( ! empty( $item['body'] ) ) : ?>
						<span><?php echo esc_html( $item['body'] ); ?></span>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
