<?php
/**
 * Cohort included items.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohort   = function_exists( 'rocketpd_get_current_cohort_detail' ) ? rocketpd_get_current_cohort_detail() : array();
$included = $cohort['included'] ?? array();
?>

<section class="rpd-cohort-included">
	<div class="rpd-container rpd-cohort-included__grid">
		<div>
			<p class="rpd-cohort-kicker"><?php esc_html_e( "What's included", 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'Everything included with your cohort seat', 'rocketpd' ); ?></h2>
			<div class="rpd-cohort-included__items">
				<?php foreach ( $included as $item ) : ?>
					<div class="rpd-cohort-included__item">
						<span aria-hidden="true"></span>
						<p><?php echo esc_html( $item['label'] ?? $item['included_item_label'] ?? '' ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="rpd-cohort-device-visual" aria-hidden="true">
			<div class="rpd-cohort-device-visual__screen">
				<div class="rpd-cohort-device-visual__brand"><?php esc_html_e( 'LaunchPad', 'rocketpd' ); ?><span>&raquo;</span></div>
				<div class="rpd-cohort-device-visual__phone">
					<span></span>
					<strong><?php esc_html_e( 'My cohorts', 'rocketpd' ); ?></strong>
					<em><?php echo esc_html( $cohort['title'] ?? __( 'Live cohort', 'rocketpd' ) ); ?></em>
				</div>
				<div class="rpd-cohort-device-visual__laptop">
					<div>
						<span><?php esc_html_e( 'Session recordings + cohort toolkit', 'rocketpd' ); ?></span>
					</div>
				</div>
				<div class="rpd-cohort-device-visual__book">
					<span><?php esc_html_e( 'Guide', 'rocketpd' ); ?></span>
				</div>
			</div>
		</div>
	</div>
</section>
