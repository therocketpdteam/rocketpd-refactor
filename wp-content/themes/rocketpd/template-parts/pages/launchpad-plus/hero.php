<?php
/**
 * LaunchPad Plus hero.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$demo_url       = rocketpd_get_option( 'rpd_walkthrough_url', home_url( '/contact/' ) );
$eyebrow        = rocketpd_get_field( 'rpd_lpp_hero_eyebrow', __( 'RocketPD LaunchPad+', 'rocketpd' ) );
$headline       = rocketpd_get_field( 'rpd_lpp_hero_headline', __( 'LaunchPad+', 'rocketpd' ) );
$subheadline    = rocketpd_get_field( 'rpd_lpp_hero_subheadline', __( 'A Branded Professional Learning Platform for Your District', 'rocketpd' ) );
$body           = rocketpd_get_field( 'rpd_lpp_hero_body', __( "Bring your district's professional learning into one place - combining RocketPD's expert-led content with your own resources inside a fully branded platform.", 'rocketpd' ) );
$primary_label  = rocketpd_get_field( 'rpd_lpp_hero_primary_label', __( 'Schedule a LaunchPad+ Demo', 'rocketpd' ) );
$primary_url    = rocketpd_get_field( 'rpd_lpp_hero_primary_url', $demo_url );
$secondary_label = rocketpd_get_field( 'rpd_lpp_hero_secondary_label', __( 'Explore LaunchPad', 'rocketpd' ) );
$secondary_url  = rocketpd_get_field( 'rpd_lpp_hero_secondary_url', home_url( '/launchpad/' ) );
?>

<section class="rpd-lpp-hero rpd-lpp-section">
	<div class="rpd-container rpd-lpp-hero__grid">
		<div class="rpd-lpp-hero__copy">
			<p class="rpd-lpp-pill rpd-lpp-pill--gold"><?php echo esc_html( $eyebrow ); ?></p>
			<h1><?php echo esc_html( $headline ); ?></h1>
			<p class="rpd-lpp-hero__subheadline"><?php echo esc_html( $subheadline ); ?></p>
			<p class="rpd-lpp-hero__body"><?php echo esc_html( $body ); ?></p>
			<div class="rpd-lpp-actions">
				<?php if ( $primary_label && $primary_url ) : ?>
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?> <span aria-hidden="true">→</span></a>
				<?php endif; ?>
				<?php if ( $secondary_label && $secondary_url ) : ?>
					<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
				<?php endif; ?>
			</div>
		</div>
		<div class="rpd-lpp-hero-ui" aria-label="<?php esc_attr_e( 'LaunchPad Plus branded platform preview', 'rocketpd' ); ?>">
			<div class="rpd-lpp-browser">
				<div class="rpd-lpp-browser__bar"><span></span><span></span><span></span><b><?php esc_html_e( 'pd.riverside-usd.org', 'rocketpd' ); ?></b></div>
				<div class="rpd-lpp-platform-preview">
					<header><strong><?php esc_html_e( 'RU Riverside Unified', 'rocketpd' ); ?></strong><span><?php esc_html_e( 'Powered by RocketPD', 'rocketpd' ); ?></span></header>
					<nav><span><?php esc_html_e( 'Dashboard', 'rocketpd' ); ?></span><span><?php esc_html_e( 'Course Library', 'rocketpd' ); ?></span><span><?php esc_html_e( 'District Resources', 'rocketpd' ); ?></span><span><?php esc_html_e( 'Cohorts', 'rocketpd' ); ?></span></nav>
					<div class="rpd-lpp-preview-grid">
						<div class="rpd-lpp-stat"><?php esc_html_e( 'Courses in progress', 'rocketpd' ); ?><strong>412</strong></div>
						<div class="rpd-lpp-stat"><?php esc_html_e( 'Certificates earned', 'rocketpd' ); ?><strong>318</strong></div>
						<div class="rpd-lpp-library">
							<?php foreach ( array( 'School Culture', 'Reading Inst.', 'RU Onboarding', 'Family Engage.', 'MTSS at RU', 'UDL Basics' ) as $tile ) : ?>
								<span><?php echo esc_html( $tile ); ?></span>
							<?php endforeach; ?>
						</div>
						<div class="rpd-lpp-resource-list">
							<?php foreach ( array( 'Strategic Plan 2026', 'MTSS Framework', 'Supt. PD Webinar', 'Onboarding Hub' ) as $resource ) : ?>
								<span><?php echo esc_html( $resource ); ?></span>
							<?php endforeach; ?>
						</div>
					</div>
					<footer><b></b><?php esc_html_e( 'Onboarding cohort - Fall 26', 'rocketpd' ); ?><span><?php esc_html_e( '68% complete', 'rocketpd' ); ?></span></footer>
				</div>
			</div>
			<div class="rpd-lpp-float rpd-lpp-float--domain"><span><?php esc_html_e( 'Subdomain', 'rocketpd' ); ?></span><strong><?php esc_html_e( 'pd.riverside-usd.org', 'rocketpd' ); ?></strong></div>
			<div class="rpd-lpp-float rpd-lpp-float--library"><span><?php esc_html_e( 'Library', 'rocketpd' ); ?></span><strong><?php esc_html_e( 'RocketPD + 11 internal courses', 'rocketpd' ); ?></strong></div>
		</div>
	</div>
</section>
