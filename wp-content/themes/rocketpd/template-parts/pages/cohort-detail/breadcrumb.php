<?php
/**
 * Cohort detail breadcrumb.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohort = function_exists( 'rocketpd_get_current_cohort_detail' ) ? rocketpd_get_current_cohort_detail() : array();
?>

<nav class="rpd-cohort-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rocketpd' ); ?>">
	<div class="rpd-container">
		<ol>
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'RocketPD', 'rocketpd' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/cohorts/' ) ); ?>"><?php esc_html_e( 'Cohorts', 'rocketpd' ); ?></a></li>
			<li aria-current="page"><?php echo esc_html( $cohort['title'] ?? get_the_title() ); ?></li>
		</ol>
	</div>
</nav>
