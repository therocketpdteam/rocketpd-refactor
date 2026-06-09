<?php
/**
 * LaunchPad Plus gap/problem section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tools = rocketpd_lpp_get_field(
	'rpd_lpp_problem_tools',
	array(
		array( 'label' => __( 'PD Day slides', 'rocketpd' ), 'type' => 'pdf' ),
		array( 'label' => __( 'Onboarding folder', 'rocketpd' ), 'type' => 'drive' ),
		array( 'label' => __( 'Webinar recording', 'rocketpd' ), 'type' => 'youtube' ),
		array( 'label' => __( 'Compliance modules', 'rocketpd' ), 'type' => 'lms' ),
		array( 'label' => __( 'Conference notes', 'rocketpd' ), 'type' => 'email' ),
		array( 'label' => __( 'Coaching protocols', 'rocketpd' ), 'type' => 'doc' ),
	)
);
?>

<section class="rpd-lpp-problem rpd-lpp-section">
	<div class="rpd-container rpd-lpp-problem__grid">
		<div>
			<p class="rpd-lpp-eyebrow"><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_problem_eyebrow', __( 'The Gap', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_problem_headline', __( 'When Professional Learning Needs More Than Access.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_problem_body_1', __( 'Access to high-quality professional learning is important — but many districts need a better way to organize and deliver it across teams.', 'rocketpd' ) ) ); ?></p>
			<p><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_problem_body_2', __( 'LaunchPad+ provides a centralized, branded platform where districts can bring together professional learning content, internal resources, and educator growth in one place.', 'rocketpd' ) ) ); ?></p>
			<p class="rpd-lpp-strong"><?php echo esc_html( rocketpd_lpp_get_field( 'rpd_lpp_problem_closing', __( "Built on RocketPD's LaunchPad platform, LaunchPad+ helps districts move beyond one-time PD and create a more consistent, accessible learning experience for staff.", 'rocketpd' ) ) ); ?></p>
		</div>
		<div class="rpd-lpp-unified" aria-hidden="true">
			<p><?php esc_html_e( 'Today: Scattered Across Tools', 'rocketpd' ); ?></p>
			<div class="rpd-lpp-tool-cloud">
				<?php foreach ( $tools as $index => $tool ) : ?>
					<?php
					$type  = isset( $tool['type'] ) ? $tool['type'] : '';
					$label = isset( $tool['label'] ) ? $tool['label'] : '';
					?>
					<?php if ( $label ) : ?>
						<span class="rpd-lpp-tool-cloud__item rpd-lpp-tool-cloud__item--<?php echo esc_attr( (string) ( $index + 1 ) ); ?>"><b><?php echo esc_html( strtoupper( $type ) ); ?></b><?php echo esc_html( $label ); ?></span>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<span class="rpd-lpp-down"><?php rocketpd_lpp_icon( 'arrow' ); ?></span>
			<div class="rpd-lpp-platform-card">
				<header><strong><?php esc_html_e( 'RU Riverside Unified Professional Learning', 'rocketpd' ); ?></strong><span><?php esc_html_e( 'Powered by RocketPD', 'rocketpd' ); ?></span></header>
				<div>
					<?php foreach ( array( 'Courses' => 'library', 'Resources' => 'folder', 'Certificates' => 'check', 'Users & Roles' => 'users', 'Analytics' => 'chart', 'Branding' => 'palette' ) as $label => $icon ) : ?>
						<span><?php rocketpd_lpp_icon( $icon ); ?><?php echo esc_html( $label ); ?></span>
					<?php endforeach; ?>
				</div>
				<footer><?php esc_html_e( 'One Branded Platform · One Place · One Library', 'rocketpd' ); ?></footer>
			</div>
		</div>
	</div>
</section>
