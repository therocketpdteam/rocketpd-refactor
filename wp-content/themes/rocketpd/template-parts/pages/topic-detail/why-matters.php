<?php
/**
 * Topic detail why matters section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topic = $args['topic'] ?? array();
$cards = $topic['whyMatters'] ?? array();
?>

<section class="rpd-topic-why rpd-topic-detail-section rpd-topic-detail-anchor" id="why-this-matters">
	<div class="rpd-container">
		<header class="rpd-topic-detail-section__header">
			<p class="rpd-topic-detail-kicker"><?php esc_html_e( 'Why This Topic Matters', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'Better supervision is a retention, equity, and instructional growth lever.', 'rocketpd' ); ?></h2>
		</header>
		<div class="rpd-topic-card-grid">
			<?php foreach ( $cards as $card ) : ?>
				<article class="rpd-topic-strategy-card">
					<span class="rpd-topic-gradient-icon" aria-hidden="true"><?php echo rocketpd_topic_icon_svg( $card['icon'] ?? 'spark', 'rpd-topic-detail-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					<h3><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $card['body'] ?? '' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
