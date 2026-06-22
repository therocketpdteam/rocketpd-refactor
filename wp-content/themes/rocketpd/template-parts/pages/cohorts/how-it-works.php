<?php
/**
 * How cohorts work.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_cohorts_how_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_kicker   = __( 'How It Works', 'rocketpd' );
$default_headline = __( 'From registration to real classroom change in four steps.', 'rocketpd' );
$default_steps    = array(
	array( 'title' => __( 'Choose a cohort aligned to your goals', 'rocketpd' ),        'body' => __( 'Filter by topic, audience, or length. Find the program that matches the work in front of you.', 'rocketpd' ) ),
	array( 'title' => __( 'Join live expert-led sessions', 'rocketpd' ),                'body' => __( 'Show up to interactive sessions via Zoom - no pre-recorded webinars, no one-way slide decks.', 'rocketpd' ) ),
	array( 'title' => __( 'Apply strategies between sessions', 'rocketpd' ),            'body' => __( 'Each cohort includes structured between-session work designed for real classrooms.', 'rocketpd' ) ),
	array( 'title' => __( 'Access recordings, resources, certificate', 'rocketpd' ),    'body' => __( 'Catch any session you miss, download every workbook, and earn documentation for PD credit.', 'rocketpd' ) ),
);

if ( 'custom' === $mode ) {
	$kicker    = rocketpd_get_field( 'rpd_cohorts_how_kicker', $default_kicker );
	$headline  = rocketpd_get_field( 'rpd_cohorts_how_headline', $default_headline );
	$acf_steps = rocketpd_get_field( 'rpd_cohorts_how_steps', null );
	$steps     = is_array( $acf_steps ) && ! empty( $acf_steps ) ? $acf_steps : $default_steps;
} else {
	$kicker   = $default_kicker;
	$headline = $default_headline;
	$steps    = $default_steps;
}
?>

<section class="rpd-cohorts-section rpd-cohorts-how">
	<div class="rpd-container">
		<header class="rpd-cohorts-section__header">
			<p class="rpd-cohorts-kicker"><?php echo esc_html( $kicker ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
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
