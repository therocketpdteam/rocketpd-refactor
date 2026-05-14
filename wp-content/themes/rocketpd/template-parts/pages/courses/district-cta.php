<?php
/**
 * Courses district CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow         = rocketpd_get_field( 'rpd_courses_cta_eyebrow', __( 'For Schools & Districts', 'rocketpd' ) );
$headline        = rocketpd_get_field( 'rpd_courses_cta_headline', __( 'Want to bring RocketPD to your school or district?', 'rocketpd' ) );
$body            = rocketpd_get_field( 'rpd_courses_cta_body', __( 'RocketPD helps schools and districts connect professional learning to strategic priorities through expert-led courses, cohorts, and customized implementation support.', 'rocketpd' ) );
$primary_label   = rocketpd_get_field( 'rpd_courses_cta_primary_label', __( 'Talk With RocketPD', 'rocketpd' ) );
$primary_url     = rocketpd_get_field( 'rpd_courses_cta_primary_url', home_url( '/contact/' ) );
$secondary_label = rocketpd_get_field( 'rpd_courses_cta_secondary_label', __( 'See District Pricing', 'rocketpd' ) );
$secondary_url   = rocketpd_get_field( 'rpd_courses_cta_secondary_url', home_url( '/launchpad/' ) );
$perks           = rocketpd_get_repeater_rows(
	'rpd_courses_cta_perks',
	array(
		array( 'icon' => 'graduation', 'text' => __( 'Unlimited team access', 'rocketpd' ) ),
		array( 'icon' => 'award', 'text' => __( 'Certificates included', 'rocketpd' ) ),
		array( 'icon' => 'calendar', 'text' => __( 'Custom cohort scheduling', 'rocketpd' ) ),
		array( 'icon' => 'headphones', 'text' => __( 'Dedicated success partner', 'rocketpd' ) ),
	),
	array( 'text' )
);
?>

<section class="rpd-courses-district-cta">
	<span class="rpd-courses-orb rpd-courses-orb--blue" aria-hidden="true"></span>
	<span class="rpd-courses-orb rpd-courses-orb--magenta" aria-hidden="true"></span>
	<div class="rpd-container rpd-courses-district-cta__inner">
		<div>
			<p><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<span><?php echo esc_html( $body ); ?></span>
			<div class="rpd-courses-district-cta__actions">
				<?php if ( $primary_label && $primary_url ) : ?>
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?><span aria-hidden="true">-&gt;</span></a>
				<?php endif; ?>
				<?php if ( $secondary_label && $secondary_url ) : ?>
					<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
				<?php endif; ?>
			</div>
		</div>
		<?php if ( $perks ) : ?>
			<div class="rpd-courses-district-cta__perks">
				<?php foreach ( $perks as $perk ) : ?>
					<article>
						<i data-icon="<?php echo esc_attr( $perk['icon'] ?? 'spark' ); ?>" aria-hidden="true"></i>
						<strong><?php echo esc_html( $perk['text'] ?? '' ); ?></strong>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
