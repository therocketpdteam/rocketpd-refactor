<?php
/**
 * Topic detail overview.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topic     = $args['topic'] ?? array();
$overview  = $topic['overview'] ?? array();
$intro     = rocketpd_topic_detail_list_text( $overview['intro'] ?? array(), 'paragraph' );
$takeaways = rocketpd_topic_detail_list_text( $overview['takeaways'] ?? array() );
?>

<section class="rpd-topic-overview rpd-topic-detail-section rpd-topic-detail-anchor" id="topic-overview">
	<div class="rpd-container rpd-topic-overview__grid">
		<article class="rpd-topic-overview__content">
			<p class="rpd-topic-detail-kicker"><?php esc_html_e( 'Topic Overview', 'rocketpd' ); ?></p>
			<h2><?php echo esc_html( $overview['headline'] ?? '' ); ?></h2>
			<?php foreach ( $intro as $paragraph ) : ?>
				<p><?php echo wp_kses_post( $paragraph ); ?></p>
			<?php endforeach; ?>

			<?php foreach ( $overview['sections'] ?? array() as $section ) : ?>
				<h3><?php echo esc_html( $section['heading'] ?? '' ); ?></h3>
				<?php foreach ( rocketpd_topic_detail_list_text( $section['body'] ?? array(), 'paragraph' ) as $paragraph ) : ?>
					<p><?php echo wp_kses_post( $paragraph ); ?></p>
				<?php endforeach; ?>
				<?php if ( ! empty( $section['callout']['title'] ) || ! empty( $section['callout']['body'] ) ) : ?>
					<div class="rpd-topic-overview-callout">
						<span aria-hidden="true"><?php echo rocketpd_topic_icon_svg( $section['callout']['icon'] ?? 'spark', 'rpd-topic-detail-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						<div>
							<strong><?php echo esc_html( $section['callout']['title'] ?? '' ); ?></strong>
							<p><?php echo esc_html( $section['callout']['body'] ?? '' ); ?></p>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $section['quote']['text'] ) ) : ?>
					<blockquote class="rpd-topic-overview-quote">
						<p><?php echo esc_html( $section['quote']['text'] ); ?></p>
						<cite><?php echo esc_html( $section['quote']['attribution'] ?? '' ); ?></cite>
					</blockquote>
				<?php endif; ?>
			<?php endforeach; ?>
		</article>
		<aside class="rpd-topic-overview__rail">
			<div class="rpd-topic-side-card rpd-topic-side-card--dark">
				<p><?php esc_html_e( 'Key Takeaways', 'rocketpd' ); ?></p>
				<ul>
					<?php foreach ( $takeaways as $takeaway ) : ?>
						<li><?php echo esc_html( $takeaway ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="rpd-topic-side-card">
				<p><?php esc_html_e( 'By the numbers', 'rocketpd' ); ?></p>
				<?php foreach ( $overview['sideStats'] ?? array() as $stat ) : ?>
					<div class="rpd-topic-side-stat"><strong><?php echo esc_html( $stat['value'] ); ?></strong><span><?php echo esc_html( $stat['label'] ); ?></span></div>
				<?php endforeach; ?>
			</div>
			<?php if ( ! empty( $overview['download'] ) ) : ?>
				<div class="rpd-topic-side-card rpd-topic-side-card--download">
					<p><?php esc_html_e( 'Free Download', 'rocketpd' ); ?></p>
					<h3><?php echo esc_html( $overview['download']['title'] ); ?></h3>
					<span><?php echo esc_html( $overview['download']['body'] ); ?></span>
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $overview['download']['href'] ); ?>"><?php echo esc_html( $overview['download']['label'] ); ?> <span aria-hidden="true">-&gt;</span></a>
				</div>
			<?php endif; ?>
		</aside>
	</div>
</section>
