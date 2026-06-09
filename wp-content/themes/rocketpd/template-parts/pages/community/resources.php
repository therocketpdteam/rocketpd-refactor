<?php
/**
 * Community resource library section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = rocketpd_community_get_rows(
	'rpd_community_resources_cards',
	array(
		array( 'type' => __( 'Guide', 'rocketpd' ), 'icon' => 'book', 'accent' => 'magenta', 'title' => __( 'High-Impact Instructional Strategies', 'rocketpd' ), 'meta' => __( '12 min read · 18 pages', 'rocketpd' ), 'tag' => __( 'Instruction', 'rocketpd' ), 'url' => '#' ),
		array( 'type' => __( 'Playbook', 'rocketpd' ), 'icon' => 'clipboard', 'accent' => 'purple', 'title' => __( 'Leading Schoolwide Systems Change', 'rocketpd' ), 'meta' => __( 'Step-by-step · 6 modules', 'rocketpd' ), 'tag' => __( 'Leadership', 'rocketpd' ), 'url' => '#' ),
		array( 'type' => __( 'Webinar', 'rocketpd' ), 'icon' => 'play', 'accent' => 'magenta', 'title' => __( "MTSS in Action: A Principal's Perspective", 'rocketpd' ), 'meta' => __( 'Recorded · 52 min', 'rocketpd' ), 'tag' => __( 'Leadership', 'rocketpd' ), 'url' => '#' ),
		array( 'type' => __( 'Tool', 'rocketpd' ), 'icon' => 'wrench', 'accent' => 'purple', 'title' => __( 'Classroom Engagement Self-Assessment', 'rocketpd' ), 'meta' => __( 'Editable PDF · 4 pages', 'rocketpd' ), 'tag' => __( 'Instruction', 'rocketpd' ), 'url' => '#' ),
	),
	array( 'title' )
);
?>

<section class="rpd-community-resources rpd-community-section">
	<div class="rpd-container">
		<header class="rpd-community-section-header">
			<p class="rpd-community-eyebrow"><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_resources_eyebrow', __( 'Resource Library', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_resources_heading', __( 'Real resources. Real classrooms. Zero cost.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_resources_sub', __( "Explore a growing library — new resources are added regularly, so there's always something relevant to explore.", 'rocketpd' ) ) ); ?></p>
		</header>
		<div class="rpd-community-resource-grid">
			<?php foreach ( $cards as $card ) : ?>
				<a class="rpd-community-resource-card rpd-community-resource-card--<?php echo esc_attr( sanitize_html_class( $card['accent'] ?? 'magenta' ) ); ?>" href="<?php echo esc_url( $card['url'] ?? '#' ); ?>">
					<div class="rpd-community-resource-card__top">
						<span><?php echo esc_html( $card['type'] ?? '' ); ?></span>
						<i aria-hidden="true"><?php rocketpd_community_icon( $card['icon'] ?? 'book' ); ?></i>
					</div>
					<div class="rpd-community-resource-card__body">
						<p><?php echo esc_html( $card['tag'] ?? '' ); ?></p>
						<h3><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
						<small><?php rocketpd_community_icon( 'clock' ); ?><?php echo esc_html( $card['meta'] ?? '' ); ?></small>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
		<div class="rpd-community-centered-action">
			<a class="rpd-community-btn rpd-community-btn--outline" href="<?php echo esc_url( rocketpd_community_get_field( 'rpd_community_resources_button_url', '#' ) ); ?>"><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_resources_button_label', __( 'Browse the Resource Library', 'rocketpd' ) ) ); ?><?php rocketpd_community_icon( 'arrow' ); ?></a>
		</div>
	</div>
</section>
