<?php
/**
 * Community final CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$join_url = rocketpd_get_field( 'rpd_community_join_url', rocketpd_get_option( 'rpd_community_signup_url', home_url( '/community/' ) ) );
$resources_url = rocketpd_get_field( 'rpd_community_resources_url', home_url( '/resources/' ) );
$badge = rocketpd_get_field( 'rpd_community_final_badge', __( 'Join 40,000+ educators', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_community_final_headline', __( 'Join the RocketPD Community', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_community_final_body', __( 'Start exploring practical professional learning - at no cost.', 'rocketpd' ) );
$primary_label = rocketpd_get_field( 'rpd_community_final_primary_label', __( "Join the Community - It's Free", 'rocketpd' ) );
$primary_url = rocketpd_get_field( 'rpd_community_final_primary_url', $join_url );
$secondary_label = rocketpd_get_field( 'rpd_community_final_secondary_label', __( 'Explore Resources', 'rocketpd' ) );
$secondary_url = rocketpd_get_field( 'rpd_community_final_secondary_url', $resources_url );
$proofs = rocketpd_get_repeater_rows(
	'rpd_community_final_proofs',
	array(
		array( 'text' => __( 'Always free', 'rocketpd' ) ),
		array( 'text' => __( 'No credit card', 'rocketpd' ) ),
		array( 'text' => __( 'Instant access', 'rocketpd' ) ),
	),
	array( 'text' )
);
?>

<section class="rpd-community-final rpd-community-section">
	<div class="rpd-container rpd-community-final__inner">
		<p class="rpd-community-final__badge">🚀 <?php echo esc_html( $badge ); ?></p>
		<h2><?php echo esc_html( $headline ); ?></h2>
		<p><?php echo esc_html( $body ); ?></p>
		<div class="rpd-community-actions rpd-community-actions--center">
			<?php if ( $primary_label && $primary_url ) : ?>
				<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?> <span aria-hidden="true">→</span></a>
			<?php endif; ?>
			<?php if ( $secondary_label && $secondary_url ) : ?>
				<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
			<?php endif; ?>
		</div>
		<?php if ( $proofs ) : ?>
			<ul class="rpd-community-proof-list rpd-community-proof-list--light">
				<?php foreach ( $proofs as $proof ) : ?>
					<?php if ( ! empty( $proof['text'] ) ) : ?>
						<li><?php echo esc_html( $proof['text'] ); ?></li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
