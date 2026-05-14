<?php
/**
 * Topic Index benefits.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$benefits = function_exists( 'rocketpd_get_topic_benefits' ) ? rocketpd_get_topic_benefits() : array();
?>

<section class="rpd-topics-benefits rpd-topics-section">
	<div class="rpd-container">
		<header class="rpd-topics-section__header">
			<p class="rpd-topics-kicker"><?php esc_html_e( 'Why RocketPD Topic Hubs', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'More Than Articles. Real Professional Learning.', 'rocketpd' ); ?></h2>
			<span><?php esc_html_e( 'RocketPD topic hubs connect educators to expert-led learning, practical frameworks, community conversations, and implementation-focused resources designed to support real work in schools.', 'rocketpd' ); ?></span>
		</header>
		<div class="rpd-topics-benefit-grid">
			<?php foreach ( $benefits as $benefit ) : ?>
				<article class="rpd-topics-benefit-card">
					<span class="rpd-topics-icon-shell" aria-hidden="true">
						<?php echo rocketpd_topic_icon_svg( $benefit['icon'], 'rpd-topics-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</span>
					<h3><?php echo esc_html( $benefit['title'] ); ?></h3>
					<p><?php echo esc_html( $benefit['body'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
