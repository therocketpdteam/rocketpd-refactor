<?php
/**
 * Instructor detail breadcrumb.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$instructor = function_exists( 'rocketpd_get_current_instructor_detail' ) ? rocketpd_get_current_instructor_detail() : array();
$name       = $instructor['name'] ?? get_the_title();
?>

<nav class="rpd-instructor-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rocketpd' ); ?>">
	<div class="rpd-container">
		<ol>
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'RocketPD', 'rocketpd' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/instructor/' ) ); ?>"><?php esc_html_e( 'Instructors', 'rocketpd' ); ?></a></li>
			<li aria-current="page"><?php echo esc_html( $name ); ?></li>
		</ol>
	</div>
</nav>
