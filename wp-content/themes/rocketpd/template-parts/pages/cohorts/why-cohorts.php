<?php
/**
 * Why Cohorts section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_cohorts_why_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_kicker   = __( 'Why Cohorts', 'rocketpd' );
$default_headline = __( 'More Than a Webinar. A Professional Learning Experience.', 'rocketpd' );
$default_body     = __( 'RocketPD cohorts give educators and school leaders direct access to trusted experts, practical frameworks, and peer collaboration across multiple live sessions.', 'rocketpd' );
$default_cards    = array(
	array( 'icon' => 'lightbulb',       'title' => __( 'Learn from trusted K-12 experts', 'rocketpd' ),   'body' => __( 'Cohorts are led by nationally recognized authors, researchers, and practitioners.', 'rocketpd' ) ),
	array( 'icon' => 'sparkles',        'title' => __( 'Apply between sessions', 'rocketpd' ),             'body' => __( 'Each session ends with a practical action - not a homework worksheet.', 'rocketpd' ) ),
	array( 'icon' => 'message-circle',  'title' => __( 'Collaborate with peers', 'rocketpd' ),             'body' => __( 'Small-group breakouts and async discussion connect you to educators solving the same problems.', 'rocketpd' ) ),
	array( 'icon' => 'shield',          'title' => __( 'Earn credit where applicable', 'rocketpd' ),       'body' => __( 'Recordings, certificates, and CEU documentation are included so you can submit for credit at your district.', 'rocketpd' ) ),
);

if ( 'custom' === $mode ) {
	$kicker   = rocketpd_get_field( 'rpd_cohorts_why_kicker', $default_kicker );
	$headline = rocketpd_get_field( 'rpd_cohorts_why_headline', $default_headline );
	$body     = rocketpd_get_field( 'rpd_cohorts_why_body', $default_body );
	$acf_cards = rocketpd_get_field( 'rpd_cohorts_why_cards', null );
	$cards    = is_array( $acf_cards ) && ! empty( $acf_cards ) ? $acf_cards : $default_cards;
} else {
	$kicker   = $default_kicker;
	$headline = $default_headline;
	$body     = $default_body;
	$cards    = $default_cards;
}
?>

<section class="rpd-cohorts-section rpd-cohorts-why">
	<div class="rpd-container">
		<header class="rpd-cohorts-section__header">
			<p class="rpd-cohorts-kicker"><?php echo esc_html( $kicker ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<span><?php echo esc_html( $body ); ?></span>
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
