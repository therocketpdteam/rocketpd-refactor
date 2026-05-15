<?php
/**
 * Cohort status pill.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$status = $args['status'] ?? 'registration-open';
$meta   = function_exists( 'rocketpd_get_cohort_status' ) ? rocketpd_get_cohort_status( $status ) : array( 'label' => $status, 'tone' => 'emerald' );
?>

<span class="rpd-cohort-status rpd-cohort-status--<?php echo esc_attr( $meta['tone'] ?? 'emerald' ); ?>">
	<span aria-hidden="true"></span><?php echo esc_html( $meta['label'] ?? '' ); ?>
</span>
