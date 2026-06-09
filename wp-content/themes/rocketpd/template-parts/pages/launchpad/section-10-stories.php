<?php
/**
 * LaunchPad stories.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$featured = rocketpd_lp_get_field(
	'stories_featured',
	array(
		'video_url' => 'https://youtu.be/RQ8chrTTjIo',
		'thumbnail' => rocketpd_lp_asset( 'testimonial-1-thumb.jpg' ),
		'duration' => '2:14',
		'quote' => '"We have professional learning that is personalized to our professional learning goals."',
		'name' => 'District Leader',
		'role' => 'Professional Learning Director',
	)
);
$all = rocketpd_lp_get_field( 'stories_all_link', array( 'title' => __( 'See all customer stories', 'rocketpd' ), 'url' => '#' ) );
?>
<section class="rpd-lp-section rpd-lp-stories">
	<div class="rpd-container">
		<header class="rpd-lp-section-header rpd-lp-section-header--center"><p class="rpd-lp-eyebrow"><?php echo esc_html( rocketpd_lp_get_field( 'stories_eyebrow', __( 'Hear from Districts', 'rocketpd' ) ) ); ?></p><h2><?php echo esc_html( rocketpd_lp_get_field( 'stories_h2', __( 'Real stories from district leaders.', 'rocketpd' ) ) ); ?></h2><p><?php echo esc_html( rocketpd_lp_get_field( 'stories_subhead', __( 'Hear how districts use LaunchPad to support educator growth and engagement at scale.', 'rocketpd' ) ) ); ?></p></header>
		<div class="rpd-lp-stories__grid">
			<a class="rpd-lp-story-card rpd-lp-story-card--featured" href="<?php echo esc_url( $featured['video_url'] ?? '#' ); ?>">
				<div class="rpd-lp-story-card__media"><img src="<?php echo esc_url( rocketpd_lp_image_url( $featured['thumbnail'] ?? '', rocketpd_lp_asset( 'testimonial-1-thumb.jpg' ) ) ); ?>" alt="<?php esc_attr_e( 'District leader testimonial about RocketPD LaunchPad', 'rocketpd' ); ?>"><span><?php esc_html_e( 'Featured', 'rocketpd' ); ?></span><b><?php rocketpd_lp_icon( 'play' ); ?></b><em><?php echo esc_html( $featured['duration'] ?? '2:14' ); ?></em></div>
				<div class="rpd-lp-story-card__body"><?php rocketpd_lp_icon( 'quote' ); ?><h3><?php echo esc_html( $featured['quote'] ?? '' ); ?></h3><p><strong><?php echo esc_html( $featured['name'] ?? '' ); ?></strong><small><?php echo esc_html( $featured['role'] ?? '' ); ?></small></p><span><?php esc_html_e( 'Watch story', 'rocketpd' ); ?> →</span></div>
			</a>
			<article class="rpd-lp-story-card rpd-lp-story-card--empty"><?php rocketpd_lp_icon( 'play' ); ?><h3><?php esc_html_e( 'Add district testimonial', 'rocketpd' ); ?></h3><p><?php esc_html_e( 'Drop in a YouTube/Vimeo URL via the WP video block — thumbnail and play overlay render automatically.', 'rocketpd' ); ?></p><span><?php esc_html_e( 'Open slot', 'rocketpd' ); ?></span></article>
		</div>
		<p class="rpd-lp-link-row"><a href="<?php echo esc_url( $all['url'] ?? '#' ); ?>"><?php echo esc_html( $all['title'] ?? __( 'See all customer stories', 'rocketpd' ) ); ?> →</a></p>
	</div>
</section>
