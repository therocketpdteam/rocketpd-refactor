<?php
/**
 * LaunchPad Plus visibility section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bullets = rocketpd_lpp_get_field(
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
			<p class="rpd-lpp-eyebrow"><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_visibility_eyebrow', __( 'Built for Leaders', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_visibility_headline', __( 'Visibility Into Participation and Progress.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_visibility_body', __( 'LaunchPad+ provides district leaders with a clearer view of how professional learning is being used across the district.', 'rocketpd' ) ) ); ?></p>
			<ul class="rpd-lpp-checks rpd-lpp-checks--icon">
				<?php foreach ( $bullets as $index => $bullet ) : ?>
					<?php $text = isset( $bullet['text'] ) ? $bullet['text'] : ''; ?>
					<?php if ( $text ) : ?>
						<li><span aria-hidden="true"><?php rocketpd_lpp_icon( array( 'chart', 'eye', 'trend' )[ $index ] ?? 'check' ); ?></span><?php echo esc_html( $text ); ?></li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
			<p><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_visibility_closing', __( 'This helps districts better manage and support professional learning over time.', 'rocketpd' ) ) ); ?></p>
		</div>
		<div class="rpd-lpp-analytics" aria-hidden="true">
			<div class="rpd-lpp-browser__bar"><span></span><span></span><span></span><b><?php esc_html_e( 'pd.riverside-usd.org/admin/analytics', 'rocketpd' ); ?></b></div>
			<div class="rpd-lpp-analytics__body">
				<header><div><small><?php esc_html_e( 'Admin · Analytics', 'rocketpd' ); ?></small><h3><?php esc_html_e( 'Professional Learning Activity', 'rocketpd' ); ?></h3></div><span><?php rocketpd_lpp_icon( 'calendar' ); ?><?php esc_html_e( 'Last 30 days', 'rocketpd' ); ?></span></header>
				<div class="rpd-lpp-analytics__stats">
					<?php foreach ( array( 'Active learners' => array( '1,247', '+8.2%' ), 'Enrollments' => array( '2,894', '+14%' ), 'Completions' => array( '1,142', '+22%' ), 'Avg. progress' => array( '64%', '+5pt' ) ) as $label => $values ) : ?>
						<span><?php echo esc_html( $label ); ?><b><?php echo esc_html( $values[0] ); ?></b><em><?php echo esc_html( $values[1] ); ?></em></span>
					<?php endforeach; ?>
				</div>
				<div class="rpd-lpp-chart">
					<header><strong><?php esc_html_e( 'Course Activity by Week', 'rocketpd' ); ?></strong><span><i></i><?php esc_html_e( 'Enrollments', 'rocketpd' ); ?><i></i><?php esc_html_e( 'Completions', 'rocketpd' ); ?></span></header>
					<div class="rpd-lpp-chart__bars">
						<?php foreach ( array( 62, 78, 54, 88, 72, 96 ) as $index => $height ) : ?>
							<span><b style="<?php echo esc_attr( '--h:' . $height . '%' ); ?>"></b><i style="<?php echo esc_attr( '--h:' . max( 28, $height - 18 ) . '%' ); ?>"></i><em><?php echo esc_html( 'W' . ( $index + 1 ) ); ?></em></span>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="rpd-lpp-donut"><svg viewBox="0 0 120 120" aria-hidden="true" focusable="false"><circle cx="60" cy="60" r="45"></circle><circle cx="60" cy="60" r="45"></circle></svg><strong>78%</strong><span><?php esc_html_e( 'avg. completion rate', 'rocketpd' ); ?></span></div>
				<table class="rpd-lpp-course-bars">
					<thead><tr><th><?php esc_html_e( 'Top Courses by Participation', 'rocketpd' ); ?></th><th><?php esc_html_e( 'Source', 'rocketpd' ); ?></th><th><?php esc_html_e( 'Enrolled', 'rocketpd' ); ?></th><th><?php esc_html_e( 'Complete', 'rocketpd' ); ?></th></tr></thead>
					<tbody>
						<?php foreach ( array( array( 'School Culture & Engagement', 'RPD', '312', '81%' ), array( 'RU New Teacher Onboarding 2026', 'RU', '248', '92%' ), array( 'Reading Instruction Foundations', 'RPD', '196', '64%' ), array( 'MTSS Implementation at RU', 'RU', '174', '58%' ) ) as $row ) : ?>
							<tr><th><?php echo esc_html( $row[0] ); ?></th><td><?php echo esc_html( $row[1] ); ?></td><td><?php echo esc_html( $row[2] ); ?></td><td><span style="<?php echo esc_attr( '--p:' . $row[3] ); ?>"></span><?php echo esc_html( $row[3] ); ?></td></tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
