<?php
/**
 * Topic Index community CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$perks = array(
	array( 'icon' => 'file', 'value' => __( '400+', 'rocketpd' ), 'label' => __( 'free resources', 'rocketpd' ) ),
	array( 'icon' => 'calendar', 'value' => __( 'Weekly', 'rocketpd' ), 'label' => __( 'community events', 'rocketpd' ) ),
	array( 'icon' => 'chat', 'value' => __( 'Educator', 'rocketpd' ), 'label' => __( 'conversations', 'rocketpd' ) ),
	array( 'icon' => 'cap', 'value' => __( 'Direct', 'rocketpd' ), 'label' => __( 'expert access', 'rocketpd' ) ),
);
?>

<section class="rpd-topics-community">
	<div class="rpd-container rpd-topics-community__inner">
		<div>
			<p class="rpd-topics-eyebrow"><?php esc_html_e( 'RocketPD Community', 'rocketpd' ); ?></p>
			<h2><?php echo esc_html( rocketpd_get_field( 'rpd_topics_community_headline', __( 'Keep Learning Beyond the Search.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_get_field( 'rpd_topics_community_body', __( "Join the RocketPD community to access free professional learning resources, expert-led conversations, and practical tools connected to the topics shaping today's schools.", 'rocketpd' ) ) ); ?></p>
			<div>
				<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( home_url( '/community/' ) ); ?>"><?php esc_html_e( 'Join the Community', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></a>
				<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( home_url( '/resources/' ) ); ?>"><?php esc_html_e( 'Explore Resources', 'rocketpd' ); ?></a>
			</div>
		</div>
		<div class="rpd-topics-community__perks">
			<?php foreach ( $perks as $perk ) : ?>
				<div>
					<span class="rpd-topics-icon-shell" aria-hidden="true">
						<?php echo rocketpd_topic_icon_svg( $perk['icon'], 'rpd-topics-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</span>
					<strong><?php echo esc_html( $perk['value'] ); ?></strong>
					<span><?php echo esc_html( $perk['label'] ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
