<?php
/**
 * District team CTA.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$perks = array(
	array( 'icon' => 'users', 'label' => __( 'Unlimited team seats', 'rocketpd' ) ),
	array( 'icon' => 'award', 'label' => __( 'Certificates included', 'rocketpd' ) ),
	array( 'icon' => 'calendar', 'label' => __( 'Custom cohort scheduling', 'rocketpd' ) ),
	array( 'icon' => 'headphones', 'label' => __( 'Dedicated success partner', 'rocketpd' ) ),
);
?>

<section class="rpd-cohorts-district">
	<div class="rpd-container rpd-cohorts-district__grid">
		<div>
			<p class="rpd-cohorts-dark-kicker"><?php esc_html_e( 'For Schools & Districts', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'Bring Cohort Learning to Your Team.', 'rocketpd' ); ?></h2>
			<p><?php esc_html_e( 'Districts use RocketPD cohorts to support leadership teams, PLCs, instructional initiatives, onboarding cycles, and strategic professional learning priorities.', 'rocketpd' ); ?></p>
			<div class="rpd-cohorts-actions">
				<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a Conversation', 'rocketpd' ); ?> <span aria-hidden="true">-&gt;</span></a>
				<a class="rpd-btn rpd-btn--outline-white" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'See Team Pricing', 'rocketpd' ); ?></a>
			</div>
		</div>
		<div class="rpd-cohorts-perk-grid">
			<?php foreach ( $perks as $perk ) : ?>
				<div>
					<span aria-hidden="true"><?php echo rocketpd_topic_icon_svg( $perk['icon'], 'rpd-cohorts-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					<strong><?php echo esc_html( $perk['label'] ); ?></strong>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
