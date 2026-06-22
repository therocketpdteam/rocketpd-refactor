<?php
/**
 * Why Cohorts section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = array(
	array( 'icon' => 'lightbulb', 'title' => __( 'Learn from trusted K-12 experts', 'rocketpd' ), 'body' => __( 'Cohorts are led by nationally recognized authors, researchers, and practitioners.', 'rocketpd' ) ),
	array( 'icon' => 'sparkles', 'title' => __( 'Apply between sessions', 'rocketpd' ), 'body' => __( 'Each session ends with a practical action - not a homework worksheet.', 'rocketpd' ) ),
	array( 'icon' => 'message-circle', 'title' => __( 'Collaborate with peers', 'rocketpd' ), 'body' => __( 'Small-group breakouts and async discussion connect you to educators solving the same problems.', 'rocketpd' ) ),
	array( 'icon' => 'shield', 'title' => __( 'Earn credit where applicable', 'rocketpd' ), 'body' => __( 'Recordings, certificates, and CEU documentation are included so you can submit for credit at your district.', 'rocketpd' ) ),
);
?>

<section class="rpd-cohorts-section rpd-cohorts-why">
	<div class="rpd-container">
		<header class="rpd-cohorts-section__header">
			<p class="rpd-cohorts-kicker"><?php esc_html_e( 'Why Cohorts', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'More Than a Webinar. A Professional Learning Experience.', 'rocketpd' ); ?></h2>
			<span><?php esc_html_e( 'RocketPD cohorts give educators and school leaders direct access to trusted experts, practical frameworks, and peer collaboration across multiple live sessions.', 'rocketpd' ); ?></span>
		</header>
		<div class="rpd-cohorts-value-grid">
			<?php foreach ( $cards as $card ) : ?>
				<article class="rpd-cohorts-value-card">
					<span aria-hidden="true"><?php echo rocketpd_get_icon( $card['icon'], 24 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					<h3><?php echo esc_html( $card['title'] ); ?></h3>
					<p><?php echo esc_html( $card['body'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
