<?php
/**
 * Topic detail breadcrumb.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topic = $args['topic'] ?? array();
?>

<nav class="rpd-topic-detail-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'rocketpd' ); ?>">
	<div class="rpd-container">
		<ol>
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'RocketPD', 'rocketpd' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/topic/' ) ); ?>"><?php esc_html_e( 'Topics', 'rocketpd' ); ?></a></li>
			<li><span aria-current="page"><?php echo esc_html( $topic['title'] ?? get_the_title() ); ?></span></li>
		</ol>
	</div>
</nav>
