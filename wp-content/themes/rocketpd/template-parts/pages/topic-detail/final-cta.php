<?php
/**
 * Topic detail final CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topic = $args['topic'] ?? array();
$cta   = $topic['finalCta'] ?? array();
?>

<section class="rpd-topic-final-cta">
	<div class="rpd-container">
		<h2><?php echo esc_html( $cta['headline'] ?? '' ); ?></h2>
		<p><?php echo esc_html( $cta['body'] ?? '' ); ?></p>
		<div class="rpd-topic-detail-actions">
			<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $cta['primaryHref'] ?? '#related-resources' ); ?>"><?php echo esc_html( $cta['primaryLabel'] ?? __( 'Browse Related Resources', 'rocketpd' ) ); ?> <span aria-hidden="true">-&gt;</span></a>
			<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $cta['secondaryHref'] ?? home_url( '/topics/' ) ); ?>"><?php echo esc_html( $cta['secondaryLabel'] ?? __( 'All Topics', 'rocketpd' ) ); ?></a>
		</div>
	</div>
</section>
