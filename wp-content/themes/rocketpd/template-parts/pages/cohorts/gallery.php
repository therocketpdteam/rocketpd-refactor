<?php
/**
 * Cohort Gallery.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_cohorts_gallery_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_kicker   = __( 'Cohort Gallery', 'rocketpd' );
$default_headline = __( 'Find the right cohort for your next step.', 'rocketpd' );
$default_body     = __( 'Browse all upcoming cohorts. Filter by topic, audience, length, status, or price.', 'rocketpd' );

if ( 'custom' === $mode ) {
	$kicker   = rocketpd_get_field( 'rpd_cohorts_gallery_kicker', $default_kicker );
	$headline = rocketpd_get_field( 'rpd_cohorts_gallery_headline', $default_headline );
	$body     = rocketpd_get_field( 'rpd_cohorts_gallery_body', $default_body );
} else {
	$kicker   = $default_kicker;
	$headline = $default_headline;
	$body     = $default_body;
}

$cohorts   = rocketpd_get_sorted_cohorts();
$topics    = rocketpd_get_cohort_filter_values( 'cohort_topic' );
$audiences = rocketpd_get_cohort_filter_values( 'cohort_audience' );
$statuses  = rocketpd_get_cohort_status_meta();
?>

<section class="rpd-cohorts-section rpd-cohorts-gallery" id="cohort-gallery" data-rpd-cohorts>
	<div class="rpd-container">
		<header class="rpd-cohorts-section__header">
			<p class="rpd-cohorts-kicker"><?php echo esc_html( $kicker ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<span><?php echo esc_html( $body ); ?></span>
		</header>

		<div class="rpd-cohorts-filter-card">
			<label class="rpd-cohorts-search">
				<span><?php esc_html_e( 'Search', 'rocketpd' ); ?></span>
				<input type="search" data-rpd-cohort-search placeholder="<?php esc_attr_e( 'Search cohorts, instructors, topics...', 'rocketpd' ); ?>">
			</label>

			<label>
				<span><?php esc_html_e( 'Topic', 'rocketpd' ); ?></span>
				<select data-rpd-cohort-select="topic">
					<option value="all"><?php esc_html_e( 'All Topics', 'rocketpd' ); ?></option>
					<?php foreach ( $topics as $topic ) : ?>
						<option value="<?php echo esc_attr( $topic ); ?>"><?php echo esc_html( $topic ); ?></option>
					<?php endforeach; ?>
				</select>
			</label>

			<label>
				<span><?php esc_html_e( 'Audience', 'rocketpd' ); ?></span>
				<select data-rpd-cohort-select="audience">
					<option value="all"><?php esc_html_e( 'All Audiences', 'rocketpd' ); ?></option>
					<?php foreach ( $audiences as $audience ) : ?>
						<option value="<?php echo esc_attr( $audience ); ?>"><?php echo esc_html( $audience ); ?></option>
					<?php endforeach; ?>
				</select>
			</label>

			<label>
				<span><?php esc_html_e( 'Status', 'rocketpd' ); ?></span>
				<select data-rpd-cohort-select="status">
					<option value="all"><?php esc_html_e( 'All Statuses', 'rocketpd' ); ?></option>
					<?php foreach ( $statuses as $key => $status ) : ?>
						<option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $status['label'] ); ?></option>
					<?php endforeach; ?>
				</select>
			</label>

			<div class="rpd-cohorts-pill-group" aria-label="<?php esc_attr_e( 'Filter by length', 'rocketpd' ); ?>">
				<span><?php esc_html_e( 'Length', 'rocketpd' ); ?></span>
				<button class="is-active" type="button" data-rpd-cohort-filter="length" data-value="all" aria-pressed="true"><?php esc_html_e( 'All Lengths', 'rocketpd' ); ?></button>
				<button type="button" data-rpd-cohort-filter="length" data-value="1-3" aria-pressed="false"><?php esc_html_e( '1-3 sessions', 'rocketpd' ); ?></button>
				<button type="button" data-rpd-cohort-filter="length" data-value="4-5" aria-pressed="false"><?php esc_html_e( '4-5 sessions', 'rocketpd' ); ?></button>
				<button type="button" data-rpd-cohort-filter="length" data-value="6+" aria-pressed="false"><?php esc_html_e( '6+ sessions', 'rocketpd' ); ?></button>
			</div>

			<div class="rpd-cohorts-pill-group" aria-label="<?php esc_attr_e( 'Filter by price', 'rocketpd' ); ?>">
				<span><?php esc_html_e( 'Price', 'rocketpd' ); ?></span>
				<button class="is-active" type="button" data-rpd-cohort-filter="price" data-value="all" aria-pressed="true"><?php esc_html_e( 'Any Price', 'rocketpd' ); ?></button>
				<button type="button" data-rpd-cohort-filter="price" data-value="free" aria-pressed="false"><?php esc_html_e( 'Free / Sponsored', 'rocketpd' ); ?></button>
				<button type="button" data-rpd-cohort-filter="price" data-value="paid" aria-pressed="false"><?php esc_html_e( 'Paid', 'rocketpd' ); ?></button>
			</div>
		</div>

		<div class="rpd-cohorts-filter-status">
			<p data-rpd-cohort-status aria-live="polite"><?php printf( esc_html__( 'Showing %1$d of %2$d cohorts', 'rocketpd' ), esc_html( count( $cohorts ) ), esc_html( count( $cohorts ) ) ); ?></p>
			<button type="button" data-rpd-cohort-clear hidden><?php esc_html_e( 'Clear all filters', 'rocketpd' ); ?></button>
		</div>

		<div class="rpd-cohorts-card-grid rpd-cohorts-card-grid--gallery">
			<?php foreach ( $cohorts as $cohort ) : ?>
				<?php get_template_part( 'template-parts/pages/cohorts/cohort-card', null, array( 'cohort' => $cohort ) ); ?>
			<?php endforeach; ?>
		</div>

		<div class="rpd-cohorts-load-more" data-rpd-cohort-load-more hidden>
			<button class="rpd-btn rpd-btn--outline-purple" type="button"><?php esc_html_e( 'Show more cohorts', 'rocketpd' ); ?> <span aria-hidden="true">&darr;</span></button>
		</div>

		<div class="rpd-cohorts-empty" data-rpd-cohort-empty hidden>
			<h3><?php esc_html_e( 'No cohorts match those filters.', 'rocketpd' ); ?></h3>
			<p><?php esc_html_e( 'Try a broader topic, audience, or price filter.', 'rocketpd' ); ?></p>
			<button class="rpd-btn rpd-btn--outline-purple" type="button" data-rpd-cohort-clear><?php esc_html_e( 'Clear all filters', 'rocketpd' ); ?></button>
		</div>
	</div>
</section>
