<?php
/**
 * Community final CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$trust_items = rocketpd_community_get_rows(
	'rpd_community_cta_trust_items',
	array(
		array( 'item' => __( 'Always free', 'rocketpd' ) ),
		array( 'item' => __( 'No credit card', 'rocketpd' ) ),
		array( 'item' => __( 'Instant access', 'rocketpd' ) ),
	),
	array( 'item' )
);
?>

<section class="rpd-community-final rpd-community-section">
	<div class="rpd-community-glow rpd-community-glow--magenta"></div>
	<div class="rpd-community-glow rpd-community-glow--gold"></div>
	<div class="rpd-container rpd-community-final__inner">
		<p class="rpd-community-final__badge"><?php rocketpd_community_icon( 'rocket' ); ?><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_cta_badge', __( 'Join 40,000+ Educators', 'rocketpd' ) ) ); ?></p>
		<h2><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_cta_heading', __( 'Join the RocketPD Community', 'rocketpd' ) ) ); ?></h2>
		<p><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_cta_subhead', __( 'Start exploring practical professional learning — at no cost.', 'rocketpd' ) ) ); ?></p>
		<div class="rpd-community-actions rpd-community-actions--center">
			<a class="rpd-community-btn rpd-community-btn--gold" href="<?php echo esc_url( rocketpd_community_get_field( 'rpd_community_cta_primary_url', '#' ) ); ?>"><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_cta_primary_label', __( "Join the Community — It's Free", 'rocketpd' ) ) ); ?><?php rocketpd_community_icon( 'arrow' ); ?></a>
			<a class="rpd-community-btn rpd-community-btn--white" href="<?php echo esc_url( rocketpd_community_get_field( 'rpd_community_cta_secondary_url', '#' ) ); ?>"><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_cta_secondary_label', __( 'Explore Resources', 'rocketpd' ) ) ); ?></a>
		</div>
		<ul class="rpd-community-trust-list rpd-community-trust-list--light">
			<?php foreach ( $trust_items as $item ) : ?>
				<li><?php rocketpd_community_icon( 'check' ); ?><?php echo esc_html( $item['item'] ?? '' ); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
