<?php
/**
 * Topic detail hero.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topic  = $args['topic'] ?? array();
$expert = $topic['featuredExpert'] ?? array();
$toc    = $topic['toc'] ?? array();
$stats  = $topic['stats'] ?? array();
?>

<section class="rpd-topic-detail-hero rpd-topic-detail-anchor" id="top">
	<span class="rpd-topic-detail-orb rpd-topic-detail-orb--blue" aria-hidden="true"></span>
	<span class="rpd-topic-detail-orb rpd-topic-detail-orb--magenta" aria-hidden="true"></span>
	<div class="rpd-container rpd-topic-detail-hero__grid">
		<div class="rpd-topic-detail-hero__copy">
			<div class="rpd-topic-detail-pill-row">
				<span class="rpd-topic-pill rpd-topic-pill--category"><?php echo esc_html( $topic['categoryLabel'] ?? __( 'Leadership', 'rocketpd' ) ); ?></span>
				<span class="rpd-topic-pill rpd-topic-pill--hub"><?php echo esc_html( $topic['badge'] ?? __( 'Topic Hub', 'rocketpd' ) ); ?></span>
			</div>
			<h1><?php echo esc_html( $topic['title'] ?? get_the_title() ); ?></h1>
			<p><?php echo esc_html( $topic['subtitle'] ?? '' ); ?></p>
			<div class="rpd-topic-detail-actions">
				<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $topic['primaryCta']['href'] ?? home_url( '/community/' ) ); ?>"><?php echo esc_html( $topic['primaryCta']['label'] ?? __( 'Join the Community', 'rocketpd' ) ); ?> <span aria-hidden="true">-&gt;</span></a>
				<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $topic['secondaryCta']['href'] ?? '#related-resources' ); ?>"><?php echo esc_html( $topic['secondaryCta']['label'] ?? __( 'Explore Resources', 'rocketpd' ) ); ?></a>
			</div>
			<a class="rpd-topic-expert-chip" href="<?php echo esc_url( $expert['profileHref'] ?? home_url( '/instructors/kim-marshall/' ) ); ?>">
				<img src="<?php echo esc_url( $expert['image'] ?? '' ); ?>" alt="<?php echo esc_attr( $expert['name'] ?? __( 'Featured expert', 'rocketpd' ) ); ?>" loading="lazy">
				<span><em><?php esc_html_e( 'Featured Expert', 'rocketpd' ); ?></em><strong><?php echo esc_html( $expert['name'] ?? '' ); ?></strong><small><?php echo esc_html( $expert['title'] ?? '' ); ?></small></span>
				<b><?php esc_html_e( 'Read bio', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></b>
			</a>
		</div>
		<aside class="rpd-topic-detail-toc" aria-label="<?php esc_attr_e( 'Topic page navigation', 'rocketpd' ); ?>">
			<p><?php esc_html_e( 'On this page', 'rocketpd' ); ?></p>
			<ol>
				<?php foreach ( $toc as $item ) : ?>
					<li><a href="<?php echo esc_url( $item['href'] ); ?>"><span><?php echo esc_html( $item['number'] ); ?></span><?php echo esc_html( $item['label'] ); ?></a></li>
				<?php endforeach; ?>
			</ol>
			<div class="rpd-topic-detail-toc__stats">
				<?php foreach ( $stats as $stat ) : ?>
					<div><strong><?php echo esc_html( $stat['value'] ); ?></strong><span><?php echo esc_html( $stat['label'] ); ?></span></div>
				<?php endforeach; ?>
			</div>
		</aside>
	</div>
</section>
