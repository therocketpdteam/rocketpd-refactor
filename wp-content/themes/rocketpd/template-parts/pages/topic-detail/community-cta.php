<?php
/**
 * Topic detail community CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topic = $args['topic'] ?? array();
$cta   = $topic['communityCta'] ?? array();
?>

<section class="rpd-topic-community">
	<div class="rpd-container rpd-topic-community__grid">
		<div>
			<p class="rpd-topic-dark-kicker">
				<?php echo rocketpd_topic_icon_svg( 'users', 'rpd-topic-dark-kicker__icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<?php esc_html_e( 'RocketPD Community', 'rocketpd' ); ?>
			</p>
			<h2><?php echo esc_html( $cta['headline'] ?? '' ); ?></h2>
			<p><?php echo esc_html( $cta['body'] ?? '' ); ?></p>
			<div class="rpd-topic-detail-actions">
				<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( home_url( '/community/' ) ); ?>"><?php esc_html_e( 'Join the Community', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></a>
				<a class="rpd-btn rpd-btn--outline-white" href="#upcoming-learning"><?php esc_html_e( 'Explore Related Learning', 'rocketpd' ); ?></a>
			</div>
		</div>
		<div class="rpd-topic-community__perks">
			<?php foreach ( $cta['perks'] ?? array() as $perk ) : ?>
				<div>
					<span aria-hidden="true"><?php echo rocketpd_topic_icon_svg( $perk['icon'] ?? 'spark', 'rpd-topic-detail-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					<strong><?php echo esc_html( $perk['label'] ?? '' ); ?></strong>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
