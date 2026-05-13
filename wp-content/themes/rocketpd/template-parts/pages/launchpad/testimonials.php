<?php
/**
 * LaunchPad testimonials section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$video_url = rocketpd_get_field( 'rpd_launchpad_testimonial_video_url', 'https://youtu.be/RQ8chrTTjIo' );
?>

<section class="rpd-lp-testimonials rpd-lp-section">
	<div class="rpd-container">
		<header class="rpd-lp-section-header rpd-lp-section-header--center">
			<p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_testimonials_eyebrow', __( 'Hear from Districts', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_testimonials_headline', __( 'Real stories from district leaders.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_testimonials_intro', __( 'Hear how districts use LaunchPad to support educator growth and engagement at scale.', 'rocketpd' ) ) ); ?></p>
		</header>
		<div class="rpd-lp-testimonials__grid">
			<a class="rpd-lp-video-card" href="<?php echo esc_url( $video_url ); ?>">
				<div class="rpd-lp-video-card__thumb">
					<span class="rpd-lp-video-card__badge"><?php esc_html_e( 'Featured', 'rocketpd' ); ?></span>
					<span class="rpd-lp-play" aria-hidden="true">▶</span>
					<span class="rpd-lp-video-card__duration"><?php esc_html_e( '2:14', 'rocketpd' ); ?></span>
				</div>
				<div class="rpd-lp-video-card__body">
					<blockquote><?php echo esc_html( rocketpd_get_field( 'rpd_launchpad_testimonial_quote', __( 'We have professional learning that is personalized to our professional learning goals.', 'rocketpd' ) ) ); ?></blockquote>
					<p><?php esc_html_e( 'District Leader', 'rocketpd' ); ?><span><?php esc_html_e( 'Professional Learning Director', 'rocketpd' ); ?></span></p>
					<strong><?php esc_html_e( 'Watch story', 'rocketpd' ); ?> →</strong>
				</div>
			</a>
			<article class="rpd-lp-open-slot">
				<span class="rpd-lp-play" aria-hidden="true">▶</span>
				<h3><?php esc_html_e( 'Add district testimonial', 'rocketpd' ); ?></h3>
				<p><?php esc_html_e( 'Drop in a YouTube/Vimeo URL via the ACF video block when another story is ready.', 'rocketpd' ); ?></p>
				<strong><?php esc_html_e( 'Open slot', 'rocketpd' ); ?></strong>
			</article>
		</div>
	</div>
</section>
