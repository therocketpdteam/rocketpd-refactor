<?php
/**
 * Topic detail upcoming opportunities.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topic = $args['topic'] ?? array();
$items = $topic['opportunities'] ?? array();
?>

<section class="rpd-topic-opportunities rpd-topic-detail-section rpd-topic-detail-anchor" id="upcoming-learning">
	<div class="rpd-container">
		<header class="rpd-topic-detail-section__header">
			<p class="rpd-topic-detail-kicker"><?php esc_html_e( 'Upcoming Learning Opportunities', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'Live cohorts, webinars, and courses tagged to this topic.', 'rocketpd' ); ?></h2>
		</header>
		<div class="rpd-topic-opportunity-grid">
			<?php foreach ( $items as $item ) : ?>
				<a class="rpd-topic-opportunity-card rpd-topic-format--<?php echo esc_attr( $item['tone'] ?? 'blue' ); ?>" href="<?php echo esc_url( $item['href'] ?? '#' ); ?>">
					<header><span><?php echo esc_html( $item['format'] ?? '' ); ?></span><strong><?php echo esc_html( $item['price'] ?? '' ); ?></strong></header>
					<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $item['meta'] ?? '' ); ?></p>
					<footer><?php esc_html_e( 'View Details', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></footer>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
