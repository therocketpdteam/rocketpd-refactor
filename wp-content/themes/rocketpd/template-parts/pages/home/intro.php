<?php
/**
 * Home intro statement.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_home_intro_mode', 'defaults' );

if ( 'hidden' === $mode ) {
	return;
}

$default_headline = __( 'Learning, Meet Doing.', 'rocketpd' );
$default_body     = __( "Professional learning shouldn't happen in a vacuum. It should happen inside the work. RocketPD connects you with peers, experts, and resources to solve real challenges in your school today.", 'rocketpd' );

if ( 'custom' === $mode ) {
	$headline = rocketpd_get_field( 'rpd_home_intro_headline', $default_headline );
	$body     = rocketpd_get_field( 'rpd_home_intro_body', $default_body );
} else {
	$headline = $default_headline;
	$body     = $default_body;
}
?>

<section class="rpd-home-intro rpd-home-section">
	<div class="rpd-container rpd-home-section-header">
		<h2><?php echo esc_html( $headline ); ?></h2>
		<p><?php echo esc_html( $body ); ?></p>
	</div>
</section>
