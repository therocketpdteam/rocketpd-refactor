<?php
/**
 * Cohort detail hero.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohort      = function_exists( 'rocketpd_get_current_cohort_detail' ) ? rocketpd_get_current_cohort_detail() : array();
$status      = function_exists( 'rocketpd_get_cohort_detail_status' ) ? rocketpd_get_cohort_detail_status( $cohort['status'] ?? 'registration-open' ) : array();
$instructor  = $cohort['instructor'] ?? array();
$primary_url = function_exists( 'rocketpd_get_cohort_detail_primary_href' ) ? rocketpd_get_cohort_detail_primary_href( $cohort ) : '#';
$primary     = function_exists( 'rocketpd_get_cohort_detail_primary_label' ) ? rocketpd_get_cohort_detail_primary_label( $cohort ) : __( 'Register for Cohort', 'rocketpd' );
$secondary   = $cohort['secondaryCta'] ?? array();
$headshot    = function_exists( 'rocketpd_get_image_markup' ) ? rocketpd_get_image_markup( $instructor['headshot'] ?? '', 'rpd-cohort-hero__instructor-image', $instructor['name'] ?? '' ) : '';
$snapshot    = array(
	array( 'icon' => 'calendar', 'label' => __( 'Dates', 'rocketpd' ), 'value' => trim( rocketpd_format_cohort_detail_date( $cohort['startDate'] ?? '' ) . ' - ' . rocketpd_format_cohort_detail_date( $cohort['endDate'] ?? '' ) ) ),
	array( 'icon' => 'video',    'label' => __( 'Sessions', 'rocketpd' ), 'value' => $cohort['sessionCountLabel'] ?? '' ),
	array( 'icon' => 'clock',    'label' => __( 'Time Commitment', 'rocketpd' ), 'value' => trim( ( $cohort['sessionLength'] ?? '' ) . ' - ' . ( $cohort['totalHours'] ?? '' ) ) ),
	array( 'icon' => 'globe',    'label' => __( 'Format', 'rocketpd' ), 'value' => trim( ( $cohort['formatLabel'] ?? '' ) . ' - ' . ( $cohort['cadenceLabel'] ?? '' ) ) ),
	array( 'icon' => 'award',    'label' => __( 'Certificate', 'rocketpd' ), 'value' => $cohort['certificateLabel'] ?? __( 'Certificate of Completion', 'rocketpd' ) ),
	array( 'icon' => 'users',    'label' => __( 'Audience', 'rocketpd' ), 'value' => implode( ', ', array_map( function ( $item ) { return $item['label'] ?? $item['audience_label'] ?? ''; }, $cohort['audience'] ?? array() ) ) ),
);
?>

<section class="rpd-cohort-hero">
	<div class="rpd-container rpd-cohort-hero__grid">
		<div class="rpd-cohort-hero__content">
			<div class="rpd-cohort-pill-row" aria-label="<?php esc_attr_e( 'Cohort metadata', 'rocketpd' ); ?>">
				<span><?php echo esc_html( $cohort['formatLabel'] ?? __( 'Live-Virtual Cohort', 'rocketpd' ) ); ?></span>
				<span class="rpd-cohort-status-pill rpd-cohort-status-pill--<?php echo esc_attr( $status['tone'] ?? 'emerald' ); ?>"><?php echo esc_html( $status['label'] ?? '' ); ?></span>
				<span><?php echo esc_html( $cohort['topic'] ?? '' ); ?></span>
			</div>
			<h1><?php echo esc_html( $cohort['title'] ?? '' ); ?></h1>
			<div class="rpd-cohort-hero__instructor">
				<?php echo $headshot; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<div>
					<strong><?php printf( esc_html__( 'with %s', 'rocketpd' ), esc_html( $instructor['name'] ?? '' ) ); ?></strong>
					<span><?php echo esc_html( $instructor['roleLine'] ?? $instructor['title'] ?? '' ); ?></span>
				</div>
			</div>
			<p class="rpd-cohort-hero__promise"><?php echo esc_html( $cohort['shortDescription'] ?? '' ); ?></p>
			<div class="rpd-cohort-hero__commerce">
				<div class="rpd-cohort-price-chip">
					<?php
					$price_raw    = $cohort['priceAmount'] ?? '';
					$price_symbol = '';
					$price_number = $price_raw;
					if ( $price_raw && ! ctype_digit( substr( $price_raw, 0, 1 ) ) ) {
						$price_symbol = substr( $price_raw, 0, 1 );
						$price_number = substr( $price_raw, 1 );
					}
					$meta_parts = array_map( 'trim', explode( '·', $cohort['priceMeta'] ?? '' ) );
					?>
					<strong class="rpd-cohort-price-chip__price">
						<?php if ( $price_symbol ) : ?>
							<span class="rpd-cohort-price-chip__symbol"><?php echo esc_html( $price_symbol ); ?></span>
						<?php endif; ?>
						<span class="rpd-cohort-price-chip__amount"><?php echo esc_html( $price_number ); ?></span>
					</strong>
					<div class="rpd-cohort-price-chip__meta">
						<?php foreach ( $meta_parts as $i => $part ) : ?>
							<?php if ( trim( $part ) ) : ?>
								<span class="rpd-cohort-price-chip__meta-<?php echo 0 === $i ? 'primary' : 'secondary'; ?>"><?php echo esc_html( trim( $part ) ); ?></span>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="rpd-cohort-hero__actions">
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary ); ?></a>
					<?php if ( ! empty( $secondary['label'] ) && ! empty( $secondary['href'] ) ) : ?>
						<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $secondary['href'] ); ?>"><?php echo esc_html( $secondary['label'] ); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<aside class="rpd-cohort-snapshot-card" aria-label="<?php esc_attr_e( 'Cohort snapshot', 'rocketpd' ); ?>">
			<p class="rpd-cohort-kicker"><?php esc_html_e( 'Cohort Snapshot', 'rocketpd' ); ?></p>
			<ul>
				<?php foreach ( $snapshot as $item ) : ?>
					<?php if ( empty( $item['value'] ) ) : ?>
						<?php continue; ?>
					<?php endif; ?>
					<li>
						<span aria-hidden="true"><?php echo rocketpd_get_icon( $item['icon'] ?? 'check', 18 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						<div>
							<strong><?php echo esc_html( $item['label'] ); ?></strong>
							<em><?php echo esc_html( $item['value'] ); ?></em>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if ( ! empty( $cohort['registrationFillsBy'] ) ) : ?>
				<p class="rpd-cohort-snapshot-card__note"><?php echo esc_html( $cohort['registrationFillsBy'] ); ?></p>
			<?php endif; ?>
		</aside>
	</div>
</section>
