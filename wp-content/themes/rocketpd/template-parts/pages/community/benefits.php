<?php
/**
 * Community member benefits banner.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = rocketpd_community_get_rows(
	'rpd_community_perks_items',
	array(
		array( 'icon' => 'bell', 'title' => __( 'Early invitations', 'rocketpd' ), 'desc' => __( 'First look at new learning experiences as they launch.', 'rocketpd' ) ),
		array( 'icon' => 'ticket', 'title' => __( 'Priority registration', 'rocketpd' ), 'desc' => __( 'Reserve your spot in live-virtual cohorts before public release.', 'rocketpd' ) ),
		array( 'icon' => 'sparkles', 'title' => __( 'Exclusive pricing', 'rocketpd' ), 'desc' => __( 'Special rates on select courses and programs.', 'rocketpd' ) ),
	),
	array( 'title' )
);
?>

<section class="rpd-community-benefits rpd-community-section">
	<div class="rpd-container">
		<div class="rpd-community-benefits__panel">
			<div class="rpd-community-benefits__copy">
				<p class="rpd-community-badge"><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_perks_badge', __( 'Member Perks', 'rocketpd' ) ) ); ?></p>
				<h2><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_perks_heading', __( 'Member benefits', 'rocketpd' ) ) ); ?></h2>
				<p><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_perks_body', __( "As part of the RocketPD Community, you'll also receive perks that give you a clear path to go deeper — when you're ready.", 'rocketpd' ) ) ); ?></p>
				<a class="rpd-community-btn rpd-community-btn--gold" href="<?php echo esc_url( rocketpd_community_get_field( 'rpd_community_perks_cta_url', '#' ) ); ?>"><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_perks_cta_label', __( 'Join Free', 'rocketpd' ) ) ); ?><?php rocketpd_community_icon( 'arrow' ); ?></a>
			</div>
			<div class="rpd-community-benefits__cards">
				<?php foreach ( $items as $item ) : ?>
					<article>
						<span class="rpd-community-icon" aria-hidden="true"><?php rocketpd_community_icon( $item['icon'] ?? 'sparkles' ); ?></span>
						<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
						<p><?php echo esc_html( $item['desc'] ?? '' ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
