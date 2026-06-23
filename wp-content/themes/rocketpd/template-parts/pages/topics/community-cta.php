<?php
/**
 * Topic Index community CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$perks = function_exists( 'rocketpd_get_topic_community_perks' ) ? rocketpd_get_topic_community_perks() : array();
?>

<section class="rpd-topics-community">
	<div class="rpd-container rpd-topics-community__inner">
		<div>
			<p class="rpd-section-header__eyebrow"><?php esc_html_e( 'RocketPD Community', 'rocketpd' ); ?></p>
			<h2><?php echo esc_html( rocketpd_get_field( 'rpd_topics_community_headline', __( 'Keep Learning Beyond the Search.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_get_field( 'rpd_topics_community_body', __( "Join the RocketPD community to access free professional learning resources, expert-led conversations, and practical tools connected to the topics shaping today's schools.", 'rocketpd' ) ) ); ?></p>
			<div>
				<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( home_url( '/community/' ) ); ?>"><?php esc_html_e( 'Join the Community', 'rocketpd' ); ?> →</a>
				<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( home_url( '/resources/' ) ); ?>"><?php esc_html_e( 'Explore Resources', 'rocketpd' ); ?></a>
			</div>
		</div>
		<div class="rpd-topics-community__perks">
			<?php foreach ( $perks as $perk ) : ?>
				<div>
					<span class="rpd-topics-icon-shell" aria-hidden="true">
						<?php echo rocketpd_topic_icon_svg( $perk['icon'], 'rpd-topics-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</span>
					<span><?php echo esc_html( $perk['label'] ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
