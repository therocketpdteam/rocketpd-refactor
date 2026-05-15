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
?>

<section class="rpd-topic-expert rpd-topic-detail-section rpd-topic-detail-anchor" id="featured-expert">
	<div class="rpd-container rpd-topic-expert__grid">
		<div class="rpd-topic-expert__media">
			<img src="<?php echo esc_url( $expert['image'] ?? '' ); ?>" alt="<?php echo esc_attr( $expert['name'] ?? __( 'Featured expert', 'rocketpd' ) ); ?>" loading="lazy">
			<span><?php esc_html_e( 'Featured Expert', 'rocketpd' ); ?></span>
		</div>
		<div class="rpd-topic-expert__copy">
			<p class="rpd-topic-detail-kicker"><?php esc_html_e( 'Featured Expert on This Topic', 'rocketpd' ); ?></p>
			<h2><?php echo esc_html( $expert['name'] ?? '' ); ?></h2>
			<p class="rpd-topic-expert__title"><?php echo esc_html( $expert['title'] ?? '' ); ?></p>
			<blockquote>
				<span aria-hidden="true">”</span>
				<p><?php echo esc_html( $expert['quote'] ?? '' ); ?></p>
			</blockquote>
			<p><?php echo esc_html( $expert['bio'] ?? '' ); ?></p>
			<div class="rpd-topic-expert__links">
				<a href="<?php echo esc_url( $expert['linkedin'] ?? '#' ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'LinkedIn', 'rocketpd' ); ?></a>
				<a href="<?php echo esc_url( $expert['website'] ?? '#' ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Marshall Memo', 'rocketpd' ); ?></a>
			</div>
			<div class="rpd-topic-detail-actions">
				<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $expert['cohortHref'] ?? '#' ); ?>"><?php esc_html_e( "See Kim's Cohort", 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></a>
				<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $expert['profileHref'] ?? '#' ); ?>"><?php esc_html_e( 'View Full Profile', 'rocketpd' ); ?></a>
			</div>
		</div>
	</div>
</section>
