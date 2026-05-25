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
						<svg class="rpd-topic-overview-quote__icon" viewBox="0 0 64 48" aria-hidden="true" focusable="false">
							<path d="M23.5 7.5C15.2 13 10 21 10 30.5c0 6 3.8 10 9 10 4.8 0 8.5-3.5 8.5-8.2 0-4.3-3.1-7.4-7.2-7.9.9-4.7 4.6-8.8 10.2-12.2L23.5 7.5Z" />
							<path d="M50.5 7.5C42.2 13 37 21 37 30.5c0 6 3.8 10 9 10 4.8 0 8.5-3.5 8.5-8.2 0-4.3-3.1-7.4-7.2-7.9.9-4.7 4.6-8.8 10.2-12.2L50.5 7.5Z" />
						</svg>
						<div>
							<p><?php echo esc_html( $section['quote']['text'] ); ?></p>
							<cite><?php echo esc_html( $section['quote']['attribution'] ?? '' ); ?></cite>
						</div>
					</blockquote>
				<?php endif; ?>
			<?php endforeach; ?>
		</article>
		<aside class="rpd-topic-overview__rail">
			<div class="rpd-topic-side-card rpd-topic-side-card--dark">
				<p>
					<?php echo rocketpd_topic_icon_svg( 'bulb', 'rpd-topic-side-card__kicker-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php esc_html_e( 'Key Takeaways', 'rocketpd' ); ?>
				</p>
				<ul>
					<?php foreach ( $takeaways as $takeaway ) : ?>
						<li>
							<span class="rpd-topic-takeaway-check" aria-hidden="true"></span>
							<span><?php echo esc_html( $takeaway ); ?></span>
						</li>
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
					<p>
						<svg aria-hidden="true" focusable="false" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.15" stroke-linecap="round" stroke-linejoin="round">
							<path d="M12 3v11" />
							<path d="m7 10 5 5 5-5" />
							<path d="M5 19h14" />
						</svg>
						<?php esc_html_e( 'Free Download', 'rocketpd' ); ?>
					</p>
					<h3><?php echo esc_html( $overview['download']['title'] ); ?></h3>
					<span><?php echo esc_html( $overview['download']['body'] ); ?></span>
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $overview['download']['href'] ); ?>"><?php echo esc_html( $overview['download']['label'] ); ?> <span aria-hidden="true">-&gt;</span></a>
				</div>
			<?php endif; ?>
		</aside>
	</div>
</section>
