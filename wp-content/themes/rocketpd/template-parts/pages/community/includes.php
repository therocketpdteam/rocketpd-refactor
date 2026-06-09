<?php
/**
 * Community included resources section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = rocketpd_community_get_rows(
	'rpd_community_included_cards',
	array(
		array( 'icon' => 'book', 'accent' => 'magenta', 'title' => __( 'Curated Guide Library', 'rocketpd' ), 'description' => __( 'Actionable resources built around real school challenges.', 'rocketpd' ) ),
		array( 'icon' => 'clipboard', 'accent' => 'purple', 'title' => __( 'Practical Playbooks', 'rocketpd' ), 'description' => __( 'Step-by-step strategies you can use immediately.', 'rocketpd' ) ),
		array( 'icon' => 'calendar', 'accent' => 'magenta', 'title' => __( 'Live Webinars & Expert Sessions', 'rocketpd' ), 'description' => __( 'Timely conversations with leading K–12 voices.', 'rocketpd' ) ),
		array( 'icon' => 'mic', 'accent' => 'purple', 'title' => __( 'Podcasts & Interviews', 'rocketpd' ), 'description' => __( 'Insights from educators, authors, and school leaders.', 'rocketpd' ) ),
		array( 'icon' => 'coffee', 'accent' => 'magenta', 'title' => __( 'Virtual Meet-Ups & Office Hours', 'rocketpd' ), 'description' => __( 'Connect, ask questions, and learn with others.', 'rocketpd' ) ),
		array( 'icon' => 'star', 'accent' => 'purple', 'title' => __( 'Priority Cohort Access', 'rocketpd' ), 'description' => __( 'Be the first to hear about and register for upcoming live-virtual cohorts.', 'rocketpd' ) ),
		array( 'icon' => 'tag', 'accent' => 'magenta', 'title' => __( 'Member Pricing', 'rocketpd' ), 'description' => __( 'Discounted access to expert-led courses and live experiences.', 'rocketpd' ) ),
		array( 'icon' => 'message', 'accent' => 'purple', 'title' => __( 'Discussion Spaces', 'rocketpd' ), 'description' => __( 'Share ideas, ask questions, and learn from peers.', 'rocketpd' ) ),
	),
	array( 'title' )
);
?>

<section class="rpd-community-included rpd-community-section rpd-community-section--tint">
	<div class="rpd-container">
		<header class="rpd-community-section-header">
			<p class="rpd-community-eyebrow"><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_included_eyebrow', __( "What's Included", 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_included_heading', __( 'What you get as a member', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_included_sub', __( 'Everything you need to grow your practice — at no cost.', 'rocketpd' ) ) ); ?></p>
		</header>
		<div class="rpd-community-card-grid rpd-community-card-grid--four">
			<?php foreach ( $cards as $card ) : ?>
				<article class="rpd-community-feature-card rpd-community-feature-card--<?php echo esc_attr( sanitize_html_class( $card['accent'] ?? 'magenta' ) ); ?>">
					<span class="rpd-community-icon" aria-hidden="true"><?php rocketpd_community_icon( $card['icon'] ?? 'book' ); ?></span>
					<h3><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $card['description'] ?? '' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
