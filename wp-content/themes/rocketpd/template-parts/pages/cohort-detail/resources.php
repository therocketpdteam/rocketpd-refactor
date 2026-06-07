<?php
/**
 * Cohort free resources.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohort    = function_exists( 'rocketpd_get_current_cohort_detail' ) ? rocketpd_get_current_cohort_detail() : array();
$resources = function_exists( 'rocketpd_get_enabled_cohort_detail_resources' ) ? rocketpd_get_enabled_cohort_detail_resources( $cohort ) : array();
$instructor = $cohort['instructor'] ?? array();
$guide     = $resources['guide'] ?? array();
$cards     = array_filter(
	$resources,
	function ( $resource, $key ) {
		return 'guide' !== $key && is_array( $resource ) && ( ! empty( $resource['title'] ) || ! empty( $resource['summary'] ) );
	},
	ARRAY_FILTER_USE_BOTH
);

if ( ! $resources ) {
	return;
}
?>

<section class="rpd-cohort-resources" id="free-resources">
	<div class="rpd-container">
		<header class="rpd-cohort-section-header">
			<p class="rpd-cohort-kicker"><?php esc_html_e( 'Free resources', 'rocketpd' ); ?></p>
			<h2><?php printf( esc_html__( 'Free resources from %s.', 'rocketpd' ), esc_html( $instructor['name'] ?? __( 'your instructor', 'rocketpd' ) ) ); ?></h2>
			<span><?php printf( esc_html__( 'Want a head start? These free resources from %s are the best way to preview the ideas you will practice in the cohort.', 'rocketpd' ), esc_html( $instructor['name'] ?? __( 'your instructor', 'rocketpd' ) ) ); ?></span>
		</header>
		<?php if ( $guide && ( ! empty( $guide['title'] ) || ! empty( $guide['summary'] ) ) ) : ?>
			<article class="rpd-cohort-featured-resource">
				<div>
					<p><?php esc_html_e( 'Featured Free Guide', 'rocketpd' ); ?></p>
					<h3><?php echo esc_html( $guide['title'] ?? '' ); ?></h3>
					<span><?php echo esc_html( $guide['meta'] ?? '' ); ?></span>
				</div>
				<div>
					<p><?php echo esc_html( $guide['summary'] ?? '' ); ?></p>
					<?php if ( ! empty( $guide['href'] ) ) : ?>
						<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $guide['href'] ); ?>"><?php esc_html_e( 'Get the Free Guide', 'rocketpd' ); ?></a>
					<?php endif; ?>
				</div>
			</article>
		<?php endif; ?>
		<?php if ( $cards ) : ?>
			<div class="rpd-cohort-resource-grid">
			<?php foreach ( $cards as $resource ) : ?>
				<article class="rpd-cohort-resource-card">
					<p><?php echo esc_html( $resource['meta'] ?? '' ); ?></p>
					<h3><?php echo esc_html( $resource['title'] ?? '' ); ?></h3>
					<span><?php echo esc_html( $resource['summary'] ?? '' ); ?></span>
					<?php if ( ! empty( $resource['href'] ) ) : ?>
						<a href="<?php echo esc_url( $resource['href'] ); ?>"><?php esc_html_e( 'Open resource', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></a>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
