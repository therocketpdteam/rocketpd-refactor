<?php
/**
 * Community included resources section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = rocketpd_get_field( 'rpd_community_includes_eyebrow', __( "What's included", 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_community_includes_headline', __( 'What you get as a member', 'rocketpd' ) );
$body     = rocketpd_get_field( 'rpd_community_includes_body', __( 'Everything you need to grow your practice - at no cost.', 'rocketpd' ) );
$items    = rocketpd_get_repeater_rows(
	'rpd_community_include_items',
	array(
		array( 'icon' => 'book', 'title' => __( 'Curated Guide Library', 'rocketpd' ), 'body' => __( 'Actionable resources built around real school challenges.', 'rocketpd' ) ),
		array( 'icon' => 'clipboard', 'title' => __( 'Practical Playbooks', 'rocketpd' ), 'body' => __( 'Step-by-step strategies you can use immediately.', 'rocketpd' ) ),
		array( 'icon' => 'calendar', 'title' => __( 'Live Webinars & Expert Sessions', 'rocketpd' ), 'body' => __( 'Timely conversations with leading K-12 voices.', 'rocketpd' ) ),
		array( 'icon' => 'mic', 'title' => __( 'Podcasts & Interviews', 'rocketpd' ), 'body' => __( 'Insights from educators, authors, and school leaders.', 'rocketpd' ) ),
		array( 'icon' => 'cup', 'title' => __( 'Virtual Meet-Ups & Office Hours', 'rocketpd' ), 'body' => __( 'Connect, ask questions, and learn with others.', 'rocketpd' ) ),
		array( 'icon' => 'star', 'title' => __( 'Priority Cohort Access', 'rocketpd' ), 'body' => __( 'Be the first to hear about and register for upcoming live-virtual cohorts.', 'rocketpd' ) ),
		array( 'icon' => 'tag', 'title' => __( 'Member Pricing', 'rocketpd' ), 'body' => __( 'Discounted access to expert-led courses and live experiences.', 'rocketpd' ) ),
		array( 'icon' => 'chat', 'title' => __( 'Discussion Spaces', 'rocketpd' ), 'body' => __( 'Share ideas, ask questions, and learn from peers.', 'rocketpd' ) ),
	),
	array( 'title' )
);
?>

<section class="rpd-community-includes rpd-community-section rpd-community-section--lavender">
	<div class="rpd-container">
		<header class="rpd-community-section-header">
			<p class="rpd-community-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</header>
		<div class="rpd-community-card-grid rpd-community-card-grid--four">
			<?php foreach ( $items as $item ) : ?>
				<?php if ( empty( $item['title'] ) ) { continue; } ?>
				<article class="rpd-community-feature-card">
					<span class="rpd-community-icon rpd-community-icon--<?php echo esc_attr( sanitize_html_class( $item['icon'] ?? 'book' ) ); ?>" aria-hidden="true"></span>
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<?php if ( ! empty( $item['body'] ) ) : ?>
						<p><?php echo esc_html( $item['body'] ); ?></p>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
