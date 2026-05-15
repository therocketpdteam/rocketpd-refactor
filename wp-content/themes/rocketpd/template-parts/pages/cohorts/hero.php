<?php
/**
 * Cohorts hero.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$featured = array_slice( rocketpd_get_featured_cohorts(), 0, 3 );
?>

<section class="rpd-cohorts-hero">
	<span class="rpd-cohorts-orb rpd-cohorts-orb--blue" aria-hidden="true"></span>
	<span class="rpd-cohorts-orb rpd-cohorts-orb--magenta" aria-hidden="true"></span>
	<div class="rpd-container rpd-cohorts-hero__grid">
		<div class="rpd-cohorts-hero__copy">
			<p class="rpd-cohorts-eyebrow"><?php esc_html_e( 'Live-Virtual Cohorts · 2026 Lineup', 'rocketpd' ); ?></p>
			<h1><?php esc_html_e( 'Live-Virtual Cohorts for Educator Growth', 'rocketpd' ); ?></h1>
			<p><?php esc_html_e( 'Learn directly from nationally recognized K-12 experts in interactive, practical cohorts designed to help educators apply new strategies, collaborate with peers, and turn professional learning into real outcomes.', 'rocketpd' ); ?></p>
			<div class="rpd-cohorts-actions">
				<a class="rpd-btn rpd-btn--gold" href="#cohort-gallery"><?php esc_html_e( 'Explore Upcoming Cohorts', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></a>
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
