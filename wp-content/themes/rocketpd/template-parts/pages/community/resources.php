<?php
/**
 * Community resource library section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$resources_url = rocketpd_get_field( 'rpd_community_resources_url', home_url( '/resources/' ) );
$eyebrow       = rocketpd_get_field( 'rpd_community_resources_eyebrow', __( 'Resource library', 'rocketpd' ) );
$headline      = rocketpd_get_field( 'rpd_community_resources_headline', __( 'Real resources. Real classrooms. Zero cost.', 'rocketpd' ) );
$body          = rocketpd_get_field( 'rpd_community_resources_body', __( "Explore a growing library - new resources are added regularly, so there's always something relevant to explore.", 'rocketpd' ) );
$button_label  = rocketpd_get_field( 'rpd_community_resources_button_label', __( 'Browse the Resource Library', 'rocketpd' ) );
$button_url    = rocketpd_get_field( 'rpd_community_resources_button_url', $resources_url );
$cards         = rocketpd_get_repeater_rows(
	'rpd_community_resource_cards',
	array(
		array( 'type' => __( 'Guide', 'rocketpd' ), 'category' => __( 'Instruction', 'rocketpd' ), 'title' => __( 'High-Impact Instructional Strategies', 'rocketpd' ), 'meta' => __( '12 min read - 18 pages', 'rocketpd' ), 'icon' => 'book' ),
		array( 'type' => __( 'Playbook', 'rocketpd' ), 'category' => __( 'Leadership', 'rocketpd' ), 'title' => __( 'Leading Schoolwide Systems Change', 'rocketpd' ), 'meta' => __( 'Step-by-step - 6 modules', 'rocketpd' ), 'icon' => 'clipboard' ),
		array( 'type' => __( 'Webinar', 'rocketpd' ), 'category' => __( 'Leadership', 'rocketpd' ), 'title' => __( "MTSS in Action: A Principal's Perspective", 'rocketpd' ), 'meta' => __( 'Recorded - 52 min', 'rocketpd' ), 'icon' => 'play' ),
		array( 'type' => __( 'Tool', 'rocketpd' ), 'category' => __( 'Instruction', 'rocketpd' ), 'title' => __( 'Classroom Engagement Self-Assessment', 'rocketpd' ), 'meta' => __( 'Editable PDF - 4 pages', 'rocketpd' ), 'icon' => 'tool' ),
	),
	array( 'title' )
);
?>

<section class="rpd-community-resources rpd-community-section">
	<div class="rpd-container">
		<header class="rpd-community-section-header">
			<p class="rpd-community-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</header>
		<div class="rpd-community-resource-grid">
			<?php foreach ( $cards as $card ) : ?>
				<?php if ( empty( $card['title'] ) ) { continue; } ?>
				<article class="rpd-community-resource-card">
					<div class="rpd-community-resource-card__top">
						<?php if ( ! empty( $card['type'] ) ) : ?>
							<span><?php echo esc_html( $card['type'] ); ?></span>
						<?php endif; ?>
						<i class="rpd-community-icon rpd-community-icon--<?php echo esc_attr( sanitize_html_class( $card['icon'] ?? 'book' ) ); ?>" aria-hidden="true"></i>
					</div>
					<div class="rpd-community-resource-card__body">
						<?php if ( ! empty( $card['category'] ) ) : ?>
							<p><?php echo esc_html( $card['category'] ); ?></p>
						<?php endif; ?>
						<h3><?php echo esc_html( $card['title'] ); ?></h3>
						<?php if ( ! empty( $card['meta'] ) ) : ?>
							<small><?php echo esc_html( $card['meta'] ); ?></small>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
		<?php if ( $button_label && $button_url ) : ?>
			<div class="rpd-community-centered-action">
				<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $button_url ); ?>"><?php echo esc_html( $button_label ); ?> <span aria-hidden="true">→</span></a>
			</div>
		<?php endif; ?>
	</div>
</section>
