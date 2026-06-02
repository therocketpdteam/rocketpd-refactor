<?php
/**
 * Topic detail featured expert.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topic  = $args['topic'] ?? array();
$expert = $topic['featuredExpert'] ?? array();
$quote  = trim( (string) ( $expert['quote'] ?? '' ), " \t\n\r\0\x0B\"'“”‘’" );
?>

<section class="rpd-topic-expert rpd-topic-detail-section rpd-topic-detail-anchor" id="featured-expert">
	<div class="rpd-container rpd-topic-expert__grid">
		<div class="rpd-topic-expert__media">
			<img src="<?php echo esc_url( $expert['image'] ?? '' ); ?>" alt="<?php echo esc_attr( $expert['name'] ?? __( 'Featured expert', 'rocketpd' ) ); ?>" loading="lazy">
			<span>
				<svg aria-hidden="true" focusable="false" viewBox="0 0 24 24">
					<path d="m12 3 2.7 5.5 6.1.9-4.4 4.3 1 6.1L12 16.9l-5.4 2.9 1-6.1-4.4-4.3 6.1-.9L12 3Z" />
				</svg>
				<?php esc_html_e( 'Featured Expert', 'rocketpd' ); ?>
			</span>
		</div>
		<div class="rpd-topic-expert__copy">
			<p class="rpd-topic-detail-kicker"><?php esc_html_e( 'Featured Expert on This Topic', 'rocketpd' ); ?></p>
			<h2><?php echo esc_html( $expert['name'] ?? '' ); ?></h2>
			<p class="rpd-topic-expert__title"><?php echo esc_html( $expert['title'] ?? '' ); ?></p>
			<blockquote>
				<svg class="rpd-topic-expert__quote-icon" viewBox="0 0 64 48" aria-hidden="true" focusable="false">
					<path d="M23.5 7.5C15.2 13 10 21 10 30.5c0 6 3.8 10 9 10 4.8 0 8.5-3.5 8.5-8.2 0-4.3-3.1-7.4-7.2-7.9.9-4.7 4.6-8.8 10.2-12.2L23.5 7.5Z" />
					<path d="M50.5 7.5C42.2 13 37 21 37 30.5c0 6 3.8 10 9 10 4.8 0 8.5-3.5 8.5-8.2 0-4.3-3.1-7.4-7.2-7.9.9-4.7 4.6-8.8 10.2-12.2L50.5 7.5Z" />
				</svg>
				<div>
					<p><?php echo esc_html( $quote ); ?></p>
					<cite><?php echo esc_html( $expert['quoteAttribution'] ?? '' ); ?></cite>
				</div>
			</blockquote>
			<p><?php echo esc_html( $expert['bio'] ?? '' ); ?></p>
			<div class="rpd-topic-expert__links">
				<a href="<?php echo esc_url( $expert['linkedin'] ?? '#' ); ?>" target="_blank" rel="noopener noreferrer">
					<svg aria-hidden="true" focusable="false" viewBox="0 0 24 24">
						<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6Z" />
						<rect x="2" y="9" width="4" height="12" />
						<circle cx="4" cy="4" r="2" />
					</svg>
					<?php esc_html_e( 'LinkedIn', 'rocketpd' ); ?>
				</a>
				<a href="<?php echo esc_url( $expert['website'] ?? '#' ); ?>" target="_blank" rel="noopener noreferrer">
					<svg aria-hidden="true" focusable="false" viewBox="0 0 24 24">
						<circle cx="12" cy="12" r="9" />
						<path d="M3 12h18M12 3c2.2 2.4 3.3 5.4 3.3 9S14.2 18.6 12 21M12 3c-2.2 2.4-3.3 5.4-3.3 9S9.8 18.6 12 21" />
					</svg>
					<span class="rpd-sr-only"><?php esc_html_e( 'Website', 'rocketpd' ); ?></span>
				</a>
			</div>
			<div class="rpd-topic-detail-actions">
				<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $expert['cohortHref'] ?? '#' ); ?>"><?php printf( esc_html__( "See %s's Cohort", 'rocketpd' ), esc_html( explode( ' ', trim( $expert['name'] ?? 'Expert' ) )[0] ) ); ?> <span aria-hidden="true">-&gt;</span></a>
				<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $expert['profileHref'] ?? '#' ); ?>"><?php esc_html_e( 'View Full Profile', 'rocketpd' ); ?></a>
			</div>
		</div>
	</div>
</section>
