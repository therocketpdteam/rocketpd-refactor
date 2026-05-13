<?php
/**
 * Home intro statement.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$headline = rocketpd_get_field( 'rpd_home_intro_headline', __( 'Learning, Meet Doing.', 'rocketpd' ) );
$body     = rocketpd_get_field( 'rpd_home_intro_body', __( "Professional learning shouldn't happen in a vacuum. It should happen inside the work. RocketPD connects you with peers, experts, and resources to solve real challenges in your school today.", 'rocketpd' ) );
?>

<section class="rpd-home-intro rpd-home-section">
	<div class="rpd-container rpd-home-section-header">
		<h2><?php echo esc_html( $headline ); ?></h2>
		<p><?php echo esc_html( $body ); ?></p>
	</div>
</section>
