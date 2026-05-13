<?php
/**
 * Lead Magnet hero section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow         = rocketpd_get_field( 'rpd_lead_hero_eyebrow', __( 'Free guide for district leaders', 'rocketpd' ) );
$headline        = rocketpd_get_field( 'rpd_lead_hero_headline', __( "Professional Learning Isn't Working Like It Should", 'rocketpd' ) );
$highlight       = rocketpd_get_field( 'rpd_lead_hero_highlight_text', __( "Isn't Working", 'rocketpd' ) );
$body            = rocketpd_get_field( 'rpd_lead_hero_body', __( 'See how districts are connecting learning to daily practice - building educator confidence, improving retention, and driving meaningful results.', 'rocketpd' ) );
$guide_label     = rocketpd_get_field( 'rpd_lead_guide_label', __( 'Download the guide', 'rocketpd' ) );
$guide_title     = rocketpd_get_field( 'rpd_lead_guide_title', __( 'Learning Meet Doing', 'rocketpd' ) );
$guide_body      = rocketpd_get_field( 'rpd_lead_guide_body', __( 'How innovative K-12 districts are connecting learning to daily practice to build educator confidence, strengthen retention, and move the needle on organizational goals.', 'rocketpd' ) );
$primary_label   = rocketpd_get_field( 'rpd_lead_primary_label', __( 'Download the Guide', 'rocketpd' ) );
$primary_url     = rocketpd_get_field( 'rpd_lead_primary_url', '#rpd-lead-download' );
$secondary_label = rocketpd_get_field( 'rpd_lead_secondary_label', __( 'See What This Looks Like in Practice', 'rocketpd' ) );
$secondary_url   = rocketpd_get_field( 'rpd_lead_secondary_url', '#rpd-lead-proof' );
$visual_title    = rocketpd_get_field( 'rpd_lead_guide_visual_title', __( 'Learning Meet Doing', 'rocketpd' ) );
$visual_subtitle = rocketpd_get_field( 'rpd_lead_guide_visual_subtitle', __( 'How innovative K-12 districts are connecting learning to daily practice to build educator confidence, strengthen retention, and move the needle on organizational goals.', 'rocketpd' ) );
$fallback_trust  = array(
	array( 'text' => __( 'Free PDF - No spam', 'rocketpd' ) ),
	array( 'text' => __( 'Built from real district experience', 'rocketpd' ) ),
);
$fallback_stats  = array(
	array( 'label' => __( 'Engaged', 'rocketpd' ), 'value' => __( '40,000+ educators', 'rocketpd' ), 'icon' => 'people' ),
	array( 'label' => __( 'Trusted by', 'rocketpd' ), 'value' => __( '850+ districts', 'rocketpd' ), 'icon' => 'building' ),
);
$trust_items     = rocketpd_get_field( 'rpd_lead_trust_items', $fallback_trust );
$floating_stats  = rocketpd_get_field( 'rpd_lead_floating_stats', $fallback_stats );
$trust_items     = array_filter(
	is_array( $trust_items ) ? $trust_items : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['text'] );
	}
);
$floating_stats  = array_filter(
	is_array( $floating_stats ) ? $floating_stats : array(),
	function ( $item ) {
		return is_array( $item ) && ( ! empty( $item['label'] ) || ! empty( $item['value'] ) );
	}
);
$trust_items     = $trust_items ? $trust_items : $fallback_trust;
$floating_stats  = $floating_stats ? $floating_stats : $fallback_stats;
$headline_html   = esc_html( $headline );

if ( $highlight && false !== strpos( $headline, $highlight ) ) {
	$headline_html = str_replace( esc_html( $highlight ), '<span>' . esc_html( $highlight ) . '</span>', $headline_html );
}
?>

<section class="rpd-lead-hero rpd-lead-section">
	<div class="rpd-container rpd-lead-hero__grid">
		<div class="rpd-lead-hero__copy">
			<p class="rpd-lead-pill rpd-lead-pill--purple"><?php echo esc_html( $eyebrow ); ?></p>
			<h1><?php echo wp_kses_post( $headline_html ); ?></h1>
			<p class="rpd-lead-hero__body"><?php echo esc_html( $body ); ?></p>
			<div class="rpd-lead-guide-card">
				<p><?php echo esc_html( $guide_label ); ?></p>
				<h2><?php echo esc_html( $guide_title ); ?></h2>
				<span><?php echo esc_html( $guide_body ); ?></span>
			</div>
			<div class="rpd-lead-actions">
				<?php if ( $primary_label && $primary_url ) : ?>
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?> <span aria-hidden="true">v</span></a>
				<?php endif; ?>
				<?php if ( $secondary_label && $secondary_url ) : ?>
					<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
				<?php endif; ?>
			</div>
			<ul class="rpd-lead-trust-list" aria-label="<?php esc_attr_e( 'Guide details', 'rocketpd' ); ?>">
				<?php foreach ( $trust_items as $item ) : ?>
					<li><?php echo esc_html( $item['text'] ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="rpd-lead-hero__visual">
			<div class="rpd-lead-guide-cover" aria-label="<?php echo esc_attr( $visual_title ); ?>">
				<div class="rpd-lead-guide-cover__brand">Rocket<span></span></div>
				<div>
					<p><?php esc_html_e( 'The RocketPD Guide', 'rocketpd' ); ?></p>
					<h2><?php echo esc_html( $visual_title ); ?></h2>
					<span><?php echo esc_html( $visual_subtitle ); ?></span>
				</div>
				<small><?php esc_html_e( '28-page guide - PDF', 'rocketpd' ); ?></small>
			</div>
			<?php foreach ( $floating_stats as $index => $stat ) : ?>
				<div class="rpd-lead-float-card rpd-lead-float-card--<?php echo esc_attr( (string) ( $index + 1 ) ); ?>">
					<i aria-hidden="true"></i>
					<span><?php echo esc_html( $stat['label'] ?? '' ); ?></span>
					<strong><?php echo esc_html( $stat['value'] ?? '' ); ?></strong>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
