<?php
/**
 * LaunchPad Plus visibility section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bullets = rocketpd_get_field(
	'rpd_lpp_visibility_bullets',
	array(
		array( 'text' => __( 'Track course enrollment and completion', 'rocketpd' ) ),
		array( 'text' => __( 'Monitor participation across schools and teams', 'rocketpd' ) ),
		array( 'text' => __( 'Understand which content is being used', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-lpp-visibility rpd-lpp-section">
	<div class="rpd-container rpd-lpp-visibility__grid">
		<div>
			<p class="rpd-lpp-eyebrow"><?php echo esc_html( rocketpd_get_field( 'rpd_lpp_visibility_eyebrow', __( 'Built for Leaders', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_get_field( 'rpd_lpp_visibility_headline', __( 'Visibility Into Participation and Progress.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_get_field( 'rpd_lpp_visibility_body', __( 'LaunchPad+ provides district leaders with a clearer view of how professional learning is being used across the district.', 'rocketpd' ) ) ); ?></p>
			<ul class="rpd-lpp-checks rpd-lpp-checks--icon">
				<?php foreach ( $bullets as $bullet ) : ?>
					<?php $text = isset( $bullet['text'] ) ? $bullet['text'] : ''; ?>
					<?php if ( $text ) : ?>
						<li><?php echo esc_html( $text ); ?></li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
			<p><?php echo esc_html( rocketpd_get_field( 'rpd_lpp_visibility_closing', __( 'This helps districts better manage and support professional learning over time.', 'rocketpd' ) ) ); ?></p>
		</div>
		<div class="rpd-lpp-analytics" aria-label="<?php esc_attr_e( 'Professional learning activity dashboard preview', 'rocketpd' ); ?>">
			<div class="rpd-lpp-browser__bar"><span></span><span></span><span></span><b><?php esc_html_e( 'pd.riverside-usd.org/admin/analytics', 'rocketpd' ); ?></b></div>
			<div class="rpd-lpp-analytics__body">
				<header><small><?php esc_html_e( 'Admin - Analytics', 'rocketpd' ); ?></small><h3><?php esc_html_e( 'Professional Learning Activity', 'rocketpd' ); ?></h3></header>
				<div class="rpd-lpp-analytics__stats"><span><?php esc_html_e( 'Active learners', 'rocketpd' ); ?><b>1,247</b></span><span><?php esc_html_e( 'Enrollments', 'rocketpd' ); ?><b>2,894</b></span><span><?php esc_html_e( 'Completions', 'rocketpd' ); ?><b>1,142</b></span><span><?php esc_html_e( 'Avg. progress', 'rocketpd' ); ?><b>64%</b></span></div>
				<div class="rpd-lpp-chart"><b></b></div>
				<div class="rpd-lpp-donut"><strong>78%</strong><span><?php esc_html_e( 'avg. completion rate', 'rocketpd' ); ?></span></div>
				<div class="rpd-lpp-course-bars"><?php foreach ( array( 'School Culture & Engagement' => '81%', 'RU New Teacher Onboarding 2026' => '92%', 'Reading Instruction Foundations' => '64%', 'MTSS Implementation at RU' => '58%' ) as $name => $pct ) : ?><span><?php echo esc_html( $name ); ?><b><?php echo esc_html( $pct ); ?></b></span><?php endforeach; ?></div>
			</div>
		</div>
	</div>
</section>
