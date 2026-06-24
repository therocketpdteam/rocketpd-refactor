<?php
/**
 * Cohort event snapshot bar.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohort = function_exists( 'rocketpd_get_current_cohort_detail' ) ? rocketpd_get_current_cohort_detail() : array();
$items  = array(
	array( 'icon' => 'calendar', 'label' => __( 'Starts', 'rocketpd' ), 'value' => rocketpd_format_cohort_detail_date( $cohort['startDate'] ?? '' ) ),
	array( 'icon' => 'video',    'label' => __( 'Sessions', 'rocketpd' ), 'value' => $cohort['sessionCountLabel'] ?? '' ),
	array( 'icon' => 'clock',    'label' => __( 'Time', 'rocketpd' ), 'value' => $cohort['cadenceLabel'] ?? '' ),
	array( 'icon' => 'award',    'label' => __( 'Credit', 'rocketpd' ), 'value' => $cohort['certificateLabel'] ?? __( 'Certificate included', 'rocketpd' ) ),
);
?>

<section class="rpd-cohort-snapshot-bar" aria-label="<?php esc_attr_e( 'Event snapshot', 'rocketpd' ); ?>">
	<div class="rpd-container rpd-cohort-snapshot-bar__grid">
		<?php foreach ( $items as $item ) : ?>
			<div class="rpd-cohort-snapshot-bar__item">
				<span aria-hidden="true"><?php echo rocketpd_get_icon( $item['icon'] ?? 'check', 18 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
				<div>
					<strong><?php echo esc_html( $item['label'] ); ?></strong>
					<em><?php echo esc_html( $item['value'] ); ?></em>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
