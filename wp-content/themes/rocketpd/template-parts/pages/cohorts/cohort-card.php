<?php
/**
 * Cohort card.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohort      = $args['cohort'] ?? array();
$instructor  = $cohort['instructor'] ?? array();
$audiences   = $cohort['cohort_audience'] ?? array();
$search_text = strtolower(
	implode(
		' ',
		array_merge(
			array(
				$cohort['title'] ?? '',
				$cohort['cohort_topic'] ?? '',
				$cohort['cohort_short_description'] ?? '',
				$cohort['cohort_status'] ?? '',
				$cohort['price_type'] ?? '',
				$instructor['name'] ?? '',
			),
			is_array( $audiences ) ? $audiences : array()
		)
	)
);
?>

<article
	class="rpd-cohort-card"
	data-rpd-cohort-card
	data-topic="<?php echo esc_attr( $cohort['cohort_topic'] ?? '' ); ?>"
	data-audiences="<?php echo esc_attr( implode( '|', (array) $audiences ) ); ?>"
	data-status="<?php echo esc_attr( $cohort['cohort_status'] ?? '' ); ?>"
	data-length="<?php echo esc_attr( rocketpd_get_cohort_length_bucket( $cohort['session_count'] ?? 1 ) ); ?>"
	data-price="<?php echo esc_attr( $cohort['price_type'] ?? '' ); ?>"
	data-search="<?php echo esc_attr( $search_text ); ?>"
>
	<div class="rpd-cohort-card__media">
		<?php if ( ! empty( $cohort['card_image'] ) ) : ?>
			<img src="<?php echo esc_url( $cohort['card_image'] ); ?>" alt="<?php echo esc_attr( $cohort['title'] ?? '' ); ?>" loading="lazy">
		<?php endif; ?>
		<span class="rpd-cohort-card__type"><?php esc_html_e( 'Live-Virtual Cohort', 'rocketpd' ); ?></span>
		<span class="rpd-cohort-card__price"><?php echo esc_html( $cohort['price_label'] ?? '' ); ?></span>
		<span class="rpd-cohort-card__calendar" aria-hidden="true">
			<svg viewBox="0 0 24 24" fill="none"><path d="M7 3v4M17 3v4M4 9h16M6 5h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
		</span>
		<span class="rpd-cohort-card__date"><?php printf( esc_html__( 'Starts %1$s · %2$s', 'rocketpd' ), esc_html( rocketpd_format_cohort_start_date( $cohort['start_date'] ?? '' ) ), esc_html( $cohort['session_count_label'] ?? '' ) ); ?></span>
	</div>
	<div class="rpd-cohort-card__body">
		<div class="rpd-cohort-card__meta">
			<?php get_template_part( 'template-parts/pages/cohorts/status-pill', null, array( 'status' => $cohort['cohort_status'] ?? 'registration-open' ) ); ?>
			<span><?php echo esc_html( $cohort['cohort_topic'] ?? '' ); ?></span>
		</div>
		<h3><?php echo esc_html( $cohort['title'] ?? '' ); ?></h3>
		<div class="rpd-cohort-card__instructor">
			<?php if ( ! empty( $instructor['headshot'] ) ) : ?>
				<img src="<?php echo esc_url( $instructor['headshot'] ); ?>" alt="">
			<?php endif; ?>
			<span>
				<strong><?php printf( esc_html__( 'with %s', 'rocketpd' ), esc_html( $instructor['name'] ?? '' ) ); ?></strong>
				<em><?php echo esc_html( $instructor['title'] ?? '' ); ?></em>
			</span>
		</div>
		<p><?php echo esc_html( $cohort['cohort_short_description'] ?? '' ); ?></p>
		<?php if ( ! empty( $cohort['sponsor_enabled'] ) && ! empty( $cohort['sponsor_name'] ) ) : ?>
			<span class="rpd-cohort-card__sponsor"><?php echo esc_html( $cohort['sponsor_name'] ); ?></span>
		<?php endif; ?>
		<footer>
			<span><?php echo esc_html( $cohort['format_label'] ?? '' ); ?></span>
			<a href="<?php echo esc_url( $cohort['href'] ?? '#' ); ?>"><?php esc_html_e( 'View Cohort', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></a>
		</footer>
	</div>
</article>
