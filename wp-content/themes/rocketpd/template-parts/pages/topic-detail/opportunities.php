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
$opportunity_icon_map = array(
	'live-virtual-cohort' => 'users',
	'free-webinar'        => 'webinar',
	'self-paced'          => 'screen',
);
?>

<section class="rpd-topic-opportunities rpd-topic-detail-section rpd-topic-detail-anchor" id="upcoming-learning">
	<div class="rpd-container">
		<header class="rpd-topic-detail-section__header">
			<p class="rpd-topic-detail-kicker"><?php esc_html_e( 'Upcoming Learning Opportunities', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'Live cohorts, webinars, and courses tagged to this topic.', 'rocketpd' ); ?></h2>
		</header>
		<div class="rpd-topic-opportunity-grid">
			<?php foreach ( $items as $item ) : ?>
				<?php
				$format_label = $item['format'] ?? '';
				$format_key   = sanitize_title( $format_label );
				$format_icon  = $opportunity_icon_map[ $format_key ] ?? 'calendar';
				?>
				<a class="rpd-topic-opportunity-card rpd-topic-format--<?php echo esc_attr( $item['tone'] ?? 'blue' ); ?>" href="<?php echo esc_url( $item['href'] ?? '#' ); ?>">
					<header>
						<span class="rpd-topic-opportunity-card__format">
							<span class="rpd-topic-type-icon" aria-hidden="true"><?php echo rocketpd_topic_icon_svg( $format_icon, 'rpd-topic-type-icon__svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
							<span><?php echo esc_html( $format_label ); ?></span>
						</span>
						<strong><?php echo esc_html( $item['price'] ?? '' ); ?></strong>
					</header>
					<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $item['meta'] ?? '' ); ?></p>
					<footer><?php esc_html_e( 'View Details', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></footer>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
