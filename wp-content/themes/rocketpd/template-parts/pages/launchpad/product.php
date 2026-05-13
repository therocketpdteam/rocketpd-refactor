<?php
/**
 * LaunchPad product experience.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_launchpad_product_eyebrow', __( 'Product Experience', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_launchpad_product_headline', __( 'A Better Learning Experience for Educators.', 'rocketpd' ) );
$intro = rocketpd_get_field( 'rpd_launchpad_product_intro', __( 'LaunchPad is designed around how educators actually learn and work. Educators can:', 'rocketpd' ) );
$bullets = rocketpd_get_field(
	'rpd_launchpad_product_bullets',
	array(
		array( 'text' => __( 'Access a curated library of expert-led courses', 'rocketpd' ) ),
		array( 'text' => __( 'Quickly find relevant content through search and topic organization', 'rocketpd' ) ),
		array( 'text' => __( 'Move at their own pace or as part of a team', 'rocketpd' ) ),
		array( 'text' => __( 'Track progress and return to learning anytime', 'rocketpd' ) ),
		array( 'text' => __( 'Apply what they learn immediately in their role', 'rocketpd' ) ),
	)
);
$closing = rocketpd_get_field( 'rpd_launchpad_product_closing', __( 'This creates a consistent, high-quality learning experience across your entire team — without adding time or complexity.', 'rocketpd' ) );
?>

<section class="rpd-lp-product rpd-lp-section" id="explore">
	<div class="rpd-container rpd-lp-product__grid">
		<div>
			<p class="rpd-lp-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $intro ); ?></p>
			<ul class="rpd-lp-checks">
				<?php foreach ( $bullets as $bullet ) : ?>
					<?php $text = isset( $bullet['text'] ) ? $bullet['text'] : ''; ?>
					<?php if ( $text ) : ?>
						<li><?php echo esc_html( $text ); ?></li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
			<p><?php echo esc_html( $closing ); ?></p>
		</div>
		<div class="rpd-lp-product-ui" aria-label="<?php esc_attr_e( 'LaunchPad product interface preview', 'rocketpd' ); ?>">
			<div class="rpd-lp-ui-panel rpd-lp-ui-panel--search">
				<label><?php esc_html_e( 'Search & Filter', 'rocketpd' ); ?></label>
				<div><?php esc_html_e( 'Search courses, topics, instructors...', 'rocketpd' ); ?></div>
				<p><span><?php esc_html_e( 'Reading', 'rocketpd' ); ?></span><span><?php esc_html_e( 'Leadership', 'rocketpd' ); ?></span><span><?php esc_html_e( 'Coaching', 'rocketpd' ); ?></span><span><?php esc_html_e( 'Family Engagement', 'rocketpd' ); ?></span></p>
			</div>
			<div class="rpd-lp-ui-panel rpd-lp-ui-panel--course">
				<div class="rpd-lp-ui-thumb"><span aria-hidden="true">▶</span></div>
				<small><?php esc_html_e( 'Course Card', 'rocketpd' ); ?></small>
				<strong><?php esc_html_e( 'Closing Learning Gaps with Beth Estill', 'rocketpd' ); ?></strong>
				<a href="#launchpad-demo"><?php esc_html_e( 'Start Course', 'rocketpd' ); ?> →</a>
			</div>
			<div class="rpd-lp-ui-panel rpd-lp-ui-panel--progress">
				<strong><?php esc_html_e( 'Continue Learning', 'rocketpd' ); ?></strong>
				<?php foreach ( array( 'Family Engagement' => '45', 'School Culture' => '22', 'Blended Learning' => '78' ) as $name => $pct ) : ?>
					<div class="rpd-lp-progress-row rpd-lp-progress-row--<?php echo esc_attr( $pct ); ?>"><span><?php echo esc_html( $name ); ?></span><b></b></div>
				<?php endforeach; ?>
			</div>
			<div class="rpd-lp-ui-panel rpd-lp-ui-panel--cert">
				<small><?php esc_html_e( 'Certificates', 'rocketpd' ); ?></small>
				<strong><?php esc_html_e( 'Earned this term: 3 of 5', 'rocketpd' ); ?></strong>
				<b></b>
				<p><?php esc_html_e( 'Latest: Reading Instruction · 2 PD credits', 'rocketpd' ); ?></p>
			</div>
			<div class="rpd-lp-ui-panel rpd-lp-ui-panel--workbook">
				<small><?php esc_html_e( 'Workbook', 'rocketpd' ); ?></small>
				<strong><?php esc_html_e( 'Reflection Workbook', 'rocketpd' ); ?></strong>
				<p><?php esc_html_e( 'Step 4 of 6 · Last edited yesterday', 'rocketpd' ); ?></p>
				<a href="#launchpad-demo"><?php esc_html_e( 'Continue', 'rocketpd' ); ?> →</a>
			</div>
		</div>
	</div>
</section>
