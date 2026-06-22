<?php
/**
 * Cohorts hero.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_cohorts_hero_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_eyebrow = __( 'Live-Virtual Cohorts · 2026 Lineup', 'rocketpd' );
$default_headline = __( 'Live-Virtual Cohorts for Educator Growth', 'rocketpd' );
$default_body     = __( 'Learn directly from nationally recognized K-12 experts in interactive, practical cohorts designed to help educators apply new strategies, collaborate with peers, and turn professional learning into real outcomes.', 'rocketpd' );

if ( 'custom' === $mode ) {
	$eyebrow  = rocketpd_get_field( 'rpd_cohorts_hero_eyebrow', $default_eyebrow );
	$headline = rocketpd_get_field( 'rpd_cohorts_hero_headline', $default_headline );
	$body     = rocketpd_get_field( 'rpd_cohorts_hero_body', $default_body );
} else {
	$eyebrow  = $default_eyebrow;
	$headline = $default_headline;
	$body     = $default_body;
}

$featured = array_slice( rocketpd_get_featured_cohorts(), 0, 3 );
?>

<section class="rpd-cohorts-hero">
	<span class="rpd-cohorts-orb rpd-cohorts-orb--blue" aria-hidden="true"></span>
	<span class="rpd-cohorts-orb rpd-cohorts-orb--magenta" aria-hidden="true"></span>
	<div class="rpd-container rpd-cohorts-hero__grid">
		<div class="rpd-cohorts-hero__copy">
			<p class="rpd-cohorts-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h1><?php echo esc_html( $headline ); ?></h1>
			<p><?php echo esc_html( $body ); ?></p>
			<div class="rpd-cohorts-actions">
				<a class="rpd-btn rpd-btn--gold" href="#cohort-gallery"><?php esc_html_e( 'Explore Upcoming Cohorts', 'rocketpd' ); ?> <span aria-hidden="true">&rarr;</span></a>
				<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( home_url( '/community/' ) ); ?>"><?php esc_html_e( 'Join the RocketPD Community', 'rocketpd' ); ?></a>
			</div>
			<div class="rpd-cohorts-stats" aria-label="<?php esc_attr_e( 'RocketPD cohort stats', 'rocketpd' ); ?>">
				<div><strong><?php esc_html_e( '18+', 'rocketpd' ); ?></strong><span><?php esc_html_e( 'Cohort Instructors', 'rocketpd' ); ?></span></div>
				<div><strong><?php esc_html_e( '40K+', 'rocketpd' ); ?></strong><span><?php esc_html_e( 'Educators', 'rocketpd' ); ?></span></div>
				<div><strong><?php esc_html_e( '850+', 'rocketpd' ); ?></strong><span><?php esc_html_e( 'Districts Reached', 'rocketpd' ); ?></span></div>
			</div>
		</div>
		<div class="rpd-cohorts-hero__cards" aria-hidden="true">
			<?php foreach ( $featured as $index => $cohort ) : ?>
				<div class="rpd-cohorts-floating-card-wrap rpd-cohorts-floating-card-wrap--<?php echo esc_attr( $index + 1 ); ?>">
					<?php get_template_part( 'template-parts/pages/cohorts/floating-card', null, array( 'cohort' => $cohort ) ); ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
