<?php
/**
 * LaunchPad problem section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_lp_get_field( 'lp_problem_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_eyebrow      = __( 'The Problem', 'rocketpd' );
$default_h2           = __( "Professional learning shouldn't live outside the work educators do every day.", 'rocketpd' );
$default_before       = array( 'Annual workshops', 'Onboarding binders', 'Conference takeaways', 'Faculty meetings', 'Coaching notes', 'PLC handouts' );
$default_after        = array( 'Course library', 'Credit & certificates', 'Implementation playbooks', 'Progress dashboards', 'Team learning', 'Workbooks & resources' );
$default_after_footer = __( 'One Professional Learning System', 'rocketpd' );

if ( 'custom' === $mode ) {
	$eyebrow      = rocketpd_lp_get_field( 'problem_eyebrow', $default_eyebrow );
	$h2           = rocketpd_lp_get_field( 'problem_h2', $default_h2 );
	$body_html    = rocketpd_lp_get_field( 'problem_body', '' );
	$acf_before   = rocketpd_lp_get_field( 'problem_before_items', null );
	$before       = is_array( $acf_before ) && ! empty( $acf_before ) ? $acf_before : $default_before;
	$acf_after    = rocketpd_lp_get_field( 'problem_after_items', null );
	$after        = is_array( $acf_after ) && ! empty( $acf_after ) ? $acf_after : $default_after;
	$after_footer = rocketpd_lp_get_field( 'problem_after_footer', $default_after_footer );
} else {
	$eyebrow      = $default_eyebrow;
	$h2           = $default_h2;
	$body_html    = '';
	$before       = $default_before;
	$after        = $default_after;
	$after_footer = $default_after_footer;
}
?>
<section class="rpd-lp-section rpd-lp-problem">
	<div class="rpd-container rpd-lp-split">
		<div>
			<p class="rpd-lp-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $h2 ); ?></h2>
			<?php if ( 'custom' === $mode && ! empty( $body_html ) ) : ?>
				<div class="rpd-lp-wysiwyg"><?php echo wp_kses_post( $body_html ); ?></div>
			<?php else : ?>
				<p><?php esc_html_e( "LaunchPad is RocketPD's professional learning and staff engagement platform — designed to help districts support educator growth in flexible, practical, and sustainable ways.", 'rocketpd' ); ?></p>
				<p><?php esc_html_e( 'Instead of one-time workshops or disconnected training experiences, LaunchPad makes it possible to integrate professional learning directly into onboarding, PLCs, faculty meetings, and individual growth pathways.', 'rocketpd' ); ?></p>
				<p><strong><?php esc_html_e( 'With LaunchPad, learning becomes part of the work — not separate from it.', 'rocketpd' ); ?></strong></p>
			<?php endif; ?>
		</div>
		<div class="rpd-lp-problem__visual">
			<div class="rpd-lp-before">
				<h3><?php esc_html_e( 'Today: Disconnected', 'rocketpd' ); ?></h3>
				<?php foreach ( $before as $item ) : ?>
					<div class="rpd-lp-before__card"><?php rocketpd_lp_icon( 'x' ); ?><?php echo esc_html( is_array( $item ) ? ( $item['label'] ?? '' ) : $item ); ?></div>
				<?php endforeach; ?>
			</div>
			<div class="rpd-lp-arrow-badge" aria-hidden="true"><?php rocketpd_lp_icon( 'arrow' ); ?></div>
			<div class="rpd-lp-after">
				<h3><?php esc_html_e( 'With LaunchPad', 'rocketpd' ); ?></h3>
				<div class="rpd-lp-after__logo">RocketPD</div>
				<?php foreach ( $after as $item ) : ?>
					<div class="rpd-lp-after__row"><?php rocketpd_lp_icon( 'check' ); ?><?php echo esc_html( is_array( $item ) ? ( $item['label'] ?? '' ) : $item ); ?></div>
				<?php endforeach; ?>
				<strong><?php echo esc_html( $after_footer ); ?></strong>
			</div>
		</div>
	</div>
</section>
