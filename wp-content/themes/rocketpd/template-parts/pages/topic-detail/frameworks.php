<?php
/**
 * Topic detail frameworks.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topic      = $args['topic'] ?? array();
$frameworks = $topic['frameworks'] ?? array();
?>

<section class="rpd-topic-frameworks rpd-topic-detail-section rpd-topic-detail-anchor" id="practical-strategies">
	<div class="rpd-container">
		<header class="rpd-topic-detail-section__header">
			<p class="rpd-topic-detail-kicker"><?php esc_html_e( 'Practical Strategies & Frameworks', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'Implementation-ready frameworks for the work in front of you.', 'rocketpd' ); ?></h2>
			<span><?php esc_html_e( 'Each framework below is editable through ACF repeater fields, so the editorial team can add, remove, or reorder strategies without touching the design.', 'rocketpd' ); ?></span>
		</header>
		<div class="rpd-topic-card-grid">
			<?php foreach ( $frameworks as $framework ) : ?>
				<a class="rpd-topic-framework-card" href="<?php echo esc_url( $framework['href'] ?? '#' ); ?>">
					<span class="rpd-topic-solid-icon" aria-hidden="true"><?php echo rocketpd_topic_icon_svg( $framework['icon'] ?? 'spark', 'rpd-topic-detail-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					<h3><?php echo esc_html( $framework['title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $framework['body'] ?? '' ); ?></p>
					<strong><?php esc_html_e( 'Open framework', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></strong>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
