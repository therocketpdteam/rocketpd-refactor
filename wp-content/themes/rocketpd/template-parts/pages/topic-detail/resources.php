<?php
/**
 * Topic detail related resources.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topic     = $args['topic'] ?? array();
$resources = $topic['resources'] ?? array();
?>

<section class="rpd-topic-resources rpd-topic-detail-section rpd-topic-detail-anchor" id="related-resources">
	<div class="rpd-container">
		<header class="rpd-topic-detail-section__header rpd-topic-detail-section__header--split">
			<div>
				<p class="rpd-topic-detail-kicker"><?php esc_html_e( 'Related Resources', 'rocketpd' ); ?></p>
				<h2><?php echo wp_kses_post( sprintf( __( 'Everything tagged with <span>%s</span>.', 'rocketpd' ), esc_html( $topic['title'] ?? '' ) ) ); ?></h2>
			</div>
			<a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>"><?php esc_html_e( 'View all 42 resources', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></a>
		</header>
		<div class="rpd-topic-resource-grid">
			<?php foreach ( $resources as $resource ) : ?>
				<a class="rpd-topic-resource-card rpd-topic-format--<?php echo esc_attr( $resource['tone'] ?? 'purple' ); ?>" href="<?php echo esc_url( $resource['href'] ?? '#' ); ?>">
					<header><span><?php echo esc_html( $resource['type'] ?? '' ); ?></span><small><?php echo esc_html( $resource['meta'] ?? '' ); ?></small></header>
					<h3><?php echo esc_html( $resource['title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $resource['description'] ?? '' ); ?></p>
					<footer><span><?php echo esc_html( $resource['instructor'] ?? '' ); ?></span><strong><?php esc_html_e( 'Open', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></strong></footer>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
