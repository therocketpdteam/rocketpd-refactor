<?php
/**
 * Hero floating cohort card.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohort     = $args['cohort'] ?? array();
$instructor = $cohort['instructor'] ?? array();
?>

<article class="rpd-cohorts-floating-card" aria-hidden="true">
	<?php if ( ! empty( $cohort['card_image'] ) ) : ?>
		<img src="<?php echo esc_url( $cohort['card_image'] ); ?>" alt="" loading="lazy">
	<?php endif; ?>
	<span class="rpd-cohorts-floating-card__type"><?php esc_html_e( 'Live Cohort', 'rocketpd' ); ?></span>
	<span class="rpd-cohorts-floating-card__price"><?php echo esc_html( $cohort['price_label'] ?? '' ); ?></span>
	<div>
		<?php get_template_part( 'template-parts/pages/cohorts/status-pill', null, array( 'status' => $cohort['cohort_status'] ?? 'registration-open' ) ); ?>
		<h3><?php echo esc_html( $cohort['title'] ?? '' ); ?></h3>
		<p><?php echo esc_html( $instructor['name'] ?? '' ); ?></p>
	</div>
</article>
