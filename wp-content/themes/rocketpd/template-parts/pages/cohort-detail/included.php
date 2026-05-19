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
			<div><span>LaunchPad</span></div>
			<i></i><b></b><em></em>
		</div>
	</div>
</section>
