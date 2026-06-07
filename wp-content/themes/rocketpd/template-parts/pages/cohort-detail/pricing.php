<?php
/**
 * Cohort pricing and registration.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohort      = function_exists( 'rocketpd_get_current_cohort_detail' ) ? rocketpd_get_current_cohort_detail() : array();
$status      = function_exists( 'rocketpd_get_cohort_detail_status' ) ? rocketpd_get_cohort_detail_status( $cohort['status'] ?? 'registration-open' ) : array();
$primary_url = function_exists( 'rocketpd_get_cohort_detail_primary_href' ) ? rocketpd_get_cohort_detail_primary_href( $cohort ) : '#';
$primary     = function_exists( 'rocketpd_get_cohort_detail_primary_label' ) ? rocketpd_get_cohort_detail_primary_label( $cohort ) : __( 'Register for Cohort', 'rocketpd' );
$team        = $cohort['teamOptions'] ?? array();
$included    = array_values(
	array_filter(
		$cohort['included'] ?? array(),
		function ( $item ) {
			return is_array( $item ) && ! empty( $item['label'] ?? $item['included_item_label'] ?? '' );
		}
	)
);
$tiers       = array_values(
	array_filter(
		$team['team_pricing_tiers'] ?? array(),
		function ( $tier ) {
			return is_array( $tier ) && ( ! empty( $tier['tier_label'] ) || ! empty( $tier['tier_price'] ) );
		}
	)
);
$capabilities = array_values(
	array_filter(
		$team['team_capabilities'] ?? array(),
		function ( $item ) {
			return is_array( $item ) && ! empty( $item['capability_label'] );
		}
	)
);
$price_type  = $cohort['priceType'] ?? 'paid';
$price       = 'free' === $price_type ? __( 'Free', 'rocketpd' ) : ( 'sponsored' === $price_type ? __( 'Sponsored', 'rocketpd' ) : ( $cohort['priceAmount'] ?? '' ) );
$support_url = function_exists( 'rocketpd_get_cohort_detail_support_href' ) ? rocketpd_get_cohort_detail_support_href( $cohort ) : home_url( '/contact/?source=cohort-support' );
?>

<section class="rpd-cohort-pricing" id="pricing">
	<div class="rpd-container">
		<header class="rpd-cohort-section-header rpd-cohort-section-header--center">
			<p class="rpd-cohort-kicker"><?php esc_html_e( 'Pricing & Registration', 'rocketpd' ); ?></p>
			<h2><?php printf( esc_html__( 'Reserve your seat in %s.', 'rocketpd' ), esc_html( $cohort['title'] ?? __( 'this cohort', 'rocketpd' ) ) ); ?></h2>
		</header>
		<div class="rpd-cohort-pricing__grid">
			<article class="rpd-cohort-pricing-card rpd-cohort-pricing-card--primary">
				<span class="rpd-cohort-pricing-card__pill"><?php esc_html_e( 'Individual Seat', 'rocketpd' ); ?></span>
				<h3><?php esc_html_e( 'One seat in the live cohort', 'rocketpd' ); ?></h3>
				<strong><?php echo esc_html( $price ); ?></strong>
				<p><?php echo esc_html( $cohort['priceMeta'] ?? '' ); ?></p>
				<ul>
					<?php foreach ( array_slice( $included, 0, 6 ) as $item ) : ?>
						<li><?php echo esc_html( $item['label'] ?? $item['included_item_label'] ?? '' ); ?></li>
					<?php endforeach; ?>
				</ul>
				<?php if ( 'closed' === ( $cohort['status'] ?? '' ) && ! empty( $cohort['closedMessage'] ) ) : ?>
					<div class="rpd-cohort-pricing-card__closed"><?php echo esc_html( $cohort['closedMessage'] ); ?></div>
				<?php endif; ?>
				<a class="rpd-btn rpd-btn--gold rpd-btn--full" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary ); ?></a>
				<?php if ( ! empty( $cohort['invoiceNote'] ) ) : ?>
					<small><?php echo esc_html( $cohort['invoiceNote'] ); ?></small>
				<?php endif; ?>
			</article>

			<article class="rpd-cohort-pricing-card rpd-cohort-pricing-card--team">
				<span class="rpd-cohort-pricing-card__pill"><?php echo esc_html( $team['team_eyebrow'] ?? __( 'Team & District Options', 'rocketpd' ) ); ?></span>
				<h3><?php echo esc_html( $team['team_headline'] ?? __( 'Bringing a team?', 'rocketpd' ) ); ?></h3>
				<p><?php echo esc_html( $team['team_body'] ?? '' ); ?></p>
				<?php if ( $tiers ) : ?>
					<div class="rpd-cohort-team-tiers">
						<?php foreach ( $tiers as $tier ) : ?>
							<div>
								<span><?php echo esc_html( $tier['tier_label'] ?? '' ); ?></span>
								<strong><?php echo esc_html( $tier['tier_price'] ?? '' ); ?></strong>
								<em><?php echo esc_html( $tier['tier_unit'] ?? '' ); ?></em>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				<?php if ( $capabilities ) : ?>
					<ul class="rpd-cohort-team-checklist">
						<?php foreach ( $capabilities as $item ) : ?>
							<li><?php echo esc_html( $item['capability_label'] ?? '' ); ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				<?php if ( ! empty( $team['team_ideal_for'] ) ) : ?>
					<small><?php echo esc_html( $team['team_ideal_for'] ); ?></small>
				<?php endif; ?>
				<a class="rpd-btn rpd-btn--outline-purple rpd-btn--full" href="<?php echo esc_url( $team['team_cta_url'] ?? home_url( '/contact/' ) ); ?>"><?php echo esc_html( $team['team_cta_label'] ?? __( 'Talk With RocketPD', 'rocketpd' ) ); ?></a>
			</article>
		</div>

		<aside class="rpd-cohort-support-banner">
			<span aria-hidden="true"></span>
			<div>
				<h3><?php esc_html_e( 'Not sure if this cohort is right for you - or which option fits your team?', 'rocketpd' ); ?></h3>
				<p><?php esc_html_e( 'We can help you choose the right registration path, group setup, or invoice workflow.', 'rocketpd' ); ?></p>
			</div>
			<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $support_url ); ?>"><?php esc_html_e( 'Book a Call', 'rocketpd' ); ?></a>
		</aside>
	</div>
</section>
