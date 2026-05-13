<?php
/**
 * Community member benefits banner.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$join_url  = rocketpd_get_field( 'rpd_community_join_url', rocketpd_get_option( 'rpd_community_signup_url', home_url( '/community/' ) ) );
$badge     = rocketpd_get_field( 'rpd_community_benefits_badge', __( 'Member perks', 'rocketpd' ) );
$headline  = rocketpd_get_field( 'rpd_community_benefits_headline', __( 'Member benefits', 'rocketpd' ) );
$body      = rocketpd_get_field( 'rpd_community_benefits_body', __( "As part of the RocketPD Community, you'll also receive perks that give you a clear path to go deeper - when you're ready.", 'rocketpd' ) );
$cta_label = rocketpd_get_field( 'rpd_community_benefits_cta_label', __( 'Join Free', 'rocketpd' ) );
$cta_url   = rocketpd_get_field( 'rpd_community_benefits_cta_url', $join_url );
$items     = rocketpd_get_repeater_rows(
	'rpd_community_benefit_items',
	array(
		array( 'title' => __( 'Early invitations', 'rocketpd' ), 'body' => __( 'First look at new learning experiences as they launch.', 'rocketpd' ) ),
		array( 'title' => __( 'Priority registration', 'rocketpd' ), 'body' => __( 'Reserve your spot in live-virtual cohorts before public release.', 'rocketpd' ) ),
		array( 'title' => __( 'Exclusive pricing', 'rocketpd' ), 'body' => __( 'Special rates on select courses and programs.', 'rocketpd' ) ),
	),
	array( 'title' )
);
?>

<section class="rpd-community-benefits rpd-community-section">
	<div class="rpd-container">
		<div class="rpd-community-benefits__panel">
			<div class="rpd-community-benefits__copy">
				<p class="rpd-community-badge"><?php echo esc_html( $badge ); ?></p>
				<h2><?php echo esc_html( $headline ); ?></h2>
				<p><?php echo esc_html( $body ); ?></p>
				<?php if ( $cta_label && $cta_url ) : ?>
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $cta_url ); ?>"><?php echo esc_html( $cta_label ); ?> <span aria-hidden="true">→</span></a>
				<?php endif; ?>
			</div>
			<div class="rpd-community-benefits__cards">
				<?php foreach ( $items as $item ) : ?>
					<?php if ( empty( $item['title'] ) ) { continue; } ?>
					<article>
						<span class="rpd-community-benefit-icon" aria-hidden="true">⌁</span>
						<h3><?php echo esc_html( $item['title'] ); ?></h3>
						<?php if ( ! empty( $item['body'] ) ) : ?>
							<p><?php echo esc_html( $item['body'] ); ?></p>
						<?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
