<?php
/**
 * How cohorts work.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$steps = array(
	array( 'title' => __( 'Choose a cohort aligned to your goals', 'rocketpd' ), 'body' => __( 'Filter by topic, audience, or length. Find the program that matches the work in front of you.', 'rocketpd' ) ),
	array( 'title' => __( 'Join live expert-led sessions', 'rocketpd' ), 'body' => __( 'Show up to interactive sessions via Zoom - no pre-recorded webinars, no one-way slide decks.', 'rocketpd' ) ),
	array( 'title' => __( 'Apply strategies between sessions', 'rocketpd' ), 'body' => __( 'Each cohort includes structured between-session work designed for real classrooms.', 'rocketpd' ) ),
	array( 'title' => __( 'Access recordings, resources, certificate', 'rocketpd' ), 'body' => __( 'Catch any session you miss, download every workbook, and earn documentation for PD credit.', 'rocketpd' ) ),
);
?>

<section class="rpd-cohorts-section rpd-cohorts-how">
	<div class="rpd-container">
		<header class="rpd-cohorts-section__header">
			<p class="rpd-cohorts-kicker"><?php esc_html_e( 'How It Works', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'From registration to real classroom change in four steps.', 'rocketpd' ); ?></h2>
		</header>
		<div class="rpd-cohorts-step-grid">
			<?php foreach ( $steps as $index => $step ) : ?>
				<article>
					<span><?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
					<h3><?php echo esc_html( $step['title'] ); ?></h3>
					<p><?php echo esc_html( $step['body'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
