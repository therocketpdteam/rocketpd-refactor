<?php
/**
 * LaunchPad product experience.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_lp_get_field( 'lp_product_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_eyebrow = __( 'Product Experience', 'rocketpd' );
$default_h2      = __( 'A Better Learning Experience for Educators.', 'rocketpd' );
$default_lead    = __( 'LaunchPad is designed around how educators actually learn and work. Educators can:', 'rocketpd' );
$default_closing = __( 'This creates a consistent, high-quality learning experience across your entire team — without adding time or complexity.', 'rocketpd' );
$default_bullets = array(
	'Access a curated library of expert-led courses',
	'Quickly find relevant content through search and topic organization',
	'Move at their own pace or as part of a team',
	'Track progress and return to learning anytime',
	'Apply what they learn immediately in their role',
);

if ( 'custom' === $mode ) {
	$eyebrow     = rocketpd_lp_get_field( 'product_eyebrow', $default_eyebrow );
	$h2          = rocketpd_lp_get_field( 'product_h2', $default_h2 );
	$lead        = rocketpd_lp_get_field( 'product_lead', $default_lead );
	$closing     = rocketpd_lp_get_field( 'product_closing', $default_closing );
	$acf_bullets = rocketpd_lp_get_field( 'product_bullets', null );
	$bullets     = is_array( $acf_bullets ) && ! empty( $acf_bullets ) ? $acf_bullets : $default_bullets;
} else {
	$eyebrow = $default_eyebrow;
	$h2      = $default_h2;
	$lead    = $default_lead;
	$closing = $default_closing;
	$bullets = $default_bullets;
}
?>
<section class="rpd-lp-section rpd-lp-product" id="explore">
	<div class="rpd-container rpd-lp-split rpd-lp-split--wide">
		<div>
			<p class="rpd-lp-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $h2 ); ?></h2>
			<p><?php echo esc_html( $lead ); ?></p>
			<ul class="rpd-lp-check-list"><?php foreach ( $bullets as $bullet ) : ?><li><?php echo esc_html( is_array( $bullet ) ? ( $bullet['text'] ?? '' ) : $bullet ); ?></li><?php endforeach; ?></ul>
			<p><?php echo esc_html( $closing ); ?></p>
		</div>
		<div class="rpd-lp-ui-collage" aria-label="<?php esc_attr_e( 'LaunchPad product interface collage', 'rocketpd' ); ?>">
			<div class="rpd-lp-ui rpd-lp-ui--search"><strong><?php esc_html_e( 'Search & Filter', 'rocketpd' ); ?></strong><div><?php rocketpd_lp_icon( 'search' ); ?><?php esc_html_e( 'Search courses, topics, instructors...', 'rocketpd' ); ?></div><p><span><?php esc_html_e( 'Reading', 'rocketpd' ); ?></span><span><?php esc_html_e( 'Leadership', 'rocketpd' ); ?></span><span><?php esc_html_e( 'Coaching', 'rocketpd' ); ?></span><span><?php esc_html_e( 'Family Engagement', 'rocketpd' ); ?></span><span><?php esc_html_e( 'Onboarding', 'rocketpd' ); ?></span><span><?php esc_html_e( 'Well-being', 'rocketpd' ); ?></span></p></div>
			<div class="rpd-lp-ui rpd-lp-ui--course"><div class="rpd-lp-video-thumb"><img src="<?php echo esc_url( rocketpd_lp_asset( 'inst-gonzalez.jpeg' ) ); ?>" alt="Jennifer Gonzalez"><?php rocketpd_lp_icon( 'play' ); ?><span>0%</span></div><small><?php esc_html_e( 'Teaching Efficacy', 'rocketpd' ); ?></small><strong><?php esc_html_e( 'Fine-Tune Your Lessons with Jennifer Gonzalez', 'rocketpd' ); ?></strong><em><?php esc_html_e( '5 modules · 1 hr', 'rocketpd' ); ?></em><a href="#explore"><?php esc_html_e( 'Start Course →', 'rocketpd' ); ?></a></div>
			<div class="rpd-lp-ui rpd-lp-ui--progress"><strong><?php esc_html_e( 'Continue Learning', 'rocketpd' ); ?></strong><?php foreach ( array( 'Blended Learning' => 78, 'Family Engagement' => 45, 'School Culture' => 22 ) as $label => $pct ) : ?><p><span><?php echo esc_html( $label . ' ' . $pct . '%' ); ?></span><i style="--pct:<?php echo esc_attr( (string) $pct ); ?>%"></i></p><?php endforeach; ?></div>
			<div class="rpd-lp-ui rpd-lp-ui--cert"><small><?php esc_html_e( 'Earned this term · 3 of 5', 'rocketpd' ); ?></small><strong><?php esc_html_e( 'Certificates', 'rocketpd' ); ?></strong><p><?php esc_html_e( 'Latest: Reading Instruction · 2 PD credits', 'rocketpd' ); ?></p></div>
			<div class="rpd-lp-ui rpd-lp-ui--workbook"><?php rocketpd_lp_icon( 'file' ); ?><strong><?php esc_html_e( 'Reflection Workbook', 'rocketpd' ); ?></strong><p><?php esc_html_e( 'Step 4 of 6 · Last edited yesterday', 'rocketpd' ); ?></p><a href="#explore"><?php esc_html_e( 'Continue', 'rocketpd' ); ?></a></div>
		</div>
	</div>
</section>
