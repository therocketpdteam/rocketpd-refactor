<?php
/**
 * District team CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_cohorts_district_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_kicker          = __( 'For Schools & Districts', 'rocketpd' );
$default_headline        = __( 'Bring Cohort Learning to Your Team.', 'rocketpd' );
$default_body            = __( 'Districts use RocketPD cohorts to support leadership teams, PLCs, instructional initiatives, onboarding cycles, and strategic professional learning priorities.', 'rocketpd' );
$default_primary_label   = __( 'Book a Conversation', 'rocketpd' );
$default_primary_url     = home_url( '/contact/' );
$default_secondary_label = __( 'See Team Pricing', 'rocketpd' );
$default_secondary_url   = home_url( '/contact/' );
$default_perks           = array(
	array( 'icon' => 'users',       'label' => __( 'Unlimited team seats', 'rocketpd' ) ),
	array( 'icon' => 'award',       'label' => __( 'Certificates included', 'rocketpd' ) ),
	array( 'icon' => 'calendar',    'label' => __( 'Custom cohort scheduling', 'rocketpd' ) ),
	array( 'icon' => 'headphones',  'label' => __( 'Dedicated success partner', 'rocketpd' ) ),
);

if ( 'custom' === $mode ) {
	$kicker          = rocketpd_get_field( 'rpd_cohorts_district_kicker', $default_kicker );
	$headline        = rocketpd_get_field( 'rpd_cohorts_district_headline', $default_headline );
	$body            = rocketpd_get_field( 'rpd_cohorts_district_body', $default_body );
	$primary_label   = rocketpd_get_field( 'rpd_cohorts_district_primary_label', $default_primary_label );
	$primary_url     = rocketpd_get_field( 'rpd_cohorts_district_primary_url', $default_primary_url );
	$secondary_label = rocketpd_get_field( 'rpd_cohorts_district_secondary_label', $default_secondary_label );
	$secondary_url   = rocketpd_get_field( 'rpd_cohorts_district_secondary_url', $default_secondary_url );
	$acf_perks = rocketpd_get_field( 'rpd_cohorts_district_perks', null );
	if ( is_array( $acf_perks ) && ! empty( $acf_perks ) ) {
		$default_icons = array( 'users', 'award', 'calendar', 'headphones' );
		$perks = array_map(
			function( $acf_perk, $i ) use ( $default_icons ) {
				return array( 'icon' => $default_icons[ $i ] ?? 'check', 'label' => $acf_perk['label'] );
			},
			$acf_perks,
			array_keys( $acf_perks )
		);
	} else {
		$perks = $default_perks;
	}
} else {
	$kicker          = $default_kicker;
	$headline        = $default_headline;
	$body            = $default_body;
	$primary_label   = $default_primary_label;
	$primary_url     = $default_primary_url;
	$secondary_label = $default_secondary_label;
	$secondary_url   = $default_secondary_url;
	$perks           = $default_perks;
}
?>

<section class="rpd-cohorts-district">
	<div class="rpd-container rpd-cohorts-district__grid">
		<div>
			<p class="rpd-cohorts-dark-kicker"><?php echo esc_html( $kicker ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
			<div class="rpd-cohorts-actions">
				<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?> <span aria-hidden="true">&rarr;</span></a>
				<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
			</div>
		</div>
		<div class="rpd-cohorts-perk-grid">
			<?php foreach ( $perks as $perk ) : ?>
				<div>
					<span aria-hidden="true"><?php echo rocketpd_get_icon( $perk['icon'], 24 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					<strong><?php echo esc_html( $perk['label'] ); ?></strong>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
