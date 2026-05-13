<?php
/**
 * Trust Cycle Guide hero section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow         = rocketpd_get_field( 'rpd_trust_hero_eyebrow', __( 'The RocketPD Playbook - Vol. 1, A Practical Guide', 'rocketpd' ) );
$headline        = rocketpd_get_field( 'rpd_trust_hero_headline', __( 'Professional Learning, Meeting Doing.', 'rocketpd' ) );
$body            = rocketpd_get_field( 'rpd_trust_hero_body', __( 'How innovative K-12 districts are connecting learning to daily practice - to build educator confidence, strengthen retention, and move the needle on organizational goals.', 'rocketpd' ) );
$note_title      = rocketpd_get_field( 'rpd_trust_hero_note_title', __( 'Professional learning isn\'t broken.', 'rocketpd' ) );
$note_body       = rocketpd_get_field( 'rpd_trust_hero_note_body', __( 'But the way it is often designed is.', 'rocketpd' ) );
$question        = rocketpd_get_field( 'rpd_trust_hero_question', __( 'What if professional learning actually supported the work teachers do every day?', 'rocketpd' ) );
$question_body   = rocketpd_get_field( 'rpd_trust_hero_question_body', __( 'This guide explores how schools can move from isolated professional development to a continuous system of learning and doing - one that builds educator confidence, engagement, and retention.', 'rocketpd' ) );
$primary_label   = rocketpd_get_field( 'rpd_trust_hero_primary_label', __( 'Read the Guide', 'rocketpd' ) );
$primary_url     = rocketpd_get_field( 'rpd_trust_hero_primary_url', '#rpd-trust-model' );
$secondary_label = rocketpd_get_field( 'rpd_trust_hero_secondary_label', __( 'Watch the video', 'rocketpd' ) );
$secondary_url   = rocketpd_get_field( 'rpd_trust_hero_secondary_url', '#rpd-trust-final' );

$fallback_reality = array(
	array( 'text' => __( 'Educators are busy and pulled in many directions.', 'rocketpd' ) ),
	array( 'text' => __( 'Staff retention is fragile.', 'rocketpd' ) ),
	array( 'text' => __( 'Time is limited.', 'rocketpd' ) ),
	array( 'text' => __( 'Expectations continue to grow.', 'rocketpd' ) ),
);
$fallback_approach = array(
	array( 'text' => __( 'One-time workshops', 'rocketpd' ) ),
	array( 'text' => __( 'Disconnected sessions', 'rocketpd' ) ),
	array( 'text' => __( 'Compliance as the requirement', 'rocketpd' ) ),
	array( 'text' => __( 'Learning rarely reaches classroom practice', 'rocketpd' ) ),
);
$fallback_stats = array(
	array( 'value' => __( '40,000+', 'rocketpd' ), 'label' => __( 'Educators', 'rocketpd' ) ),
	array( 'value' => __( '850+', 'rocketpd' ), 'label' => __( 'Districts', 'rocketpd' ) ),
	array( 'value' => __( '1', 'rocketpd' ), 'label' => __( 'Community Vision', 'rocketpd' ) ),
);

$reality_items  = rocketpd_get_field( 'rpd_trust_hero_reality_items', $fallback_reality );
$approach_items = rocketpd_get_field( 'rpd_trust_hero_approach_items', $fallback_approach );
$stats          = rocketpd_get_field( 'rpd_trust_hero_stats', $fallback_stats );
$reality_items  = array_filter(
	is_array( $reality_items ) ? $reality_items : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['text'] );
	}
);
$approach_items = array_filter(
	is_array( $approach_items ) ? $approach_items : array(),
	function ( $item ) {
		return is_array( $item ) && ! empty( $item['text'] );
	}
);
$stats          = array_filter(
	is_array( $stats ) ? $stats : array(),
	function ( $item ) {
		return is_array( $item ) && ( ! empty( $item['value'] ) || ! empty( $item['label'] ) );
	}
);
$reality_items  = $reality_items ?: $fallback_reality;
$approach_items = $approach_items ?: $fallback_approach;
$stats          = $stats ?: $fallback_stats;
$headline_html  = str_replace( esc_html__( 'Meeting Doing.', 'rocketpd' ), '<span>' . esc_html__( 'Meeting Doing.', 'rocketpd' ) . '</span>', esc_html( $headline ) );
?>

<section class="rpd-trust-hero rpd-trust-section">
	<div class="rpd-trust-container">
		<div class="rpd-trust-kicker"><?php echo esc_html( $eyebrow ); ?></div>
		<h1><?php echo wp_kses_post( $headline_html ); ?></h1>
		<p class="rpd-trust-lede"><?php echo esc_html( $body ); ?></p>
		<aside class="rpd-trust-note">
			<strong><?php echo esc_html( $note_title ); ?></strong>
			<span><?php echo esc_html( $note_body ); ?></span>
		</aside>

		<div class="rpd-trust-hero-cards">
			<article>
				<p><?php esc_html_e( 'What many educators are navigating', 'rocketpd' ); ?></p>
				<h2><?php esc_html_e( 'A difficult reality, every day.', 'rocketpd' ); ?></h2>
				<ul>
					<?php foreach ( $reality_items as $item ) : ?>
						<li><?php echo esc_html( $item['text'] ); ?></li>
					<?php endforeach; ?>
				</ul>
			</article>
			<article class="rpd-trust-card-dark">
				<p><?php esc_html_e( 'What PD should not stay', 'rocketpd' ); ?></p>
				<h2><?php esc_html_e( 'An old approach to learning.', 'rocketpd' ); ?></h2>
				<ul>
					<?php foreach ( $approach_items as $item ) : ?>
						<li><?php echo esc_html( $item['text'] ); ?></li>
					<?php endforeach; ?>
				</ul>
			</article>
		</div>

		<div class="rpd-trust-hero-question">
			<h2><?php echo esc_html( $question ); ?></h2>
			<p><?php echo esc_html( $question_body ); ?></p>
			<div class="rpd-trust-actions">
				<?php if ( $primary_label && $primary_url ) : ?>
					<a class="rpd-btn rpd-btn--purple" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?></a>
				<?php endif; ?>
				<?php if ( $secondary_label && $secondary_url ) : ?>
					<a class="rpd-trust-video-link" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
				<?php endif; ?>
			</div>
		</div>

		<div class="rpd-trust-stat-strip" aria-label="<?php esc_attr_e( 'RocketPD community statistics', 'rocketpd' ); ?>">
			<?php foreach ( $stats as $stat ) : ?>
				<div>
					<strong><?php echo esc_html( $stat['value'] ?? '' ); ?></strong>
					<span><?php echo esc_html( $stat['label'] ?? '' ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
