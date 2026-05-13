<?php
/**
 * Home membership cards.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$headline = rocketpd_get_field( 'rpd_home_membership_headline', __( 'A Membership for Every Stage', 'rocketpd' ) );
$body     = rocketpd_get_field( 'rpd_home_membership_body', __( 'Join as an individual or bring your whole district.', 'rocketpd' ) );
$fallback_plans = array(
	array( 'title' => __( 'Community', 'rocketpd' ), 'price' => __( 'Free', 'rocketpd' ), 'subtitle' => __( 'Join the conversation', 'rocketpd' ), 'bullets' => "Access to free events\nCommunity forums\nWeekly newsletter", 'cta_label' => __( 'Join Free', 'rocketpd' ), 'cta_url' => home_url( '/community/' ), 'badge' => '', 'featured' => 0 ),
	array( 'title' => __( 'Pro Learning', 'rocketpd' ), 'price' => __( 'A la carte', 'rocketpd' ), 'subtitle' => __( 'Per course or cohort', 'rocketpd' ), 'bullets' => "Everything in Community\nExpert-led workshops\nCertificate of completion", 'cta_label' => __( 'Browse Courses', 'rocketpd' ), 'cta_url' => home_url( '/resources/' ), 'badge' => '', 'featured' => 0 ),
	array( 'title' => __( 'LaunchPad District', 'rocketpd' ), 'price' => __( 'Annual', 'rocketpd' ), 'subtitle' => __( 'For schools & districts', 'rocketpd' ), 'bullets' => "Unlimited staff access\nPrivate district cohorts\nEngagement analytics\nDedicated success manager", 'cta_label' => __( 'Get a Quote', 'rocketpd' ), 'cta_url' => home_url( '/contact/' ), 'badge' => __( 'Most Popular', 'rocketpd' ), 'featured' => 1 ),
	array( 'title' => __( 'LaunchPad+', 'rocketpd' ), 'price' => __( 'Premium', 'rocketpd' ), 'subtitle' => __( 'Custom implementation', 'rocketpd' ), 'bullets' => "Everything in District\nCustom course creation\nExecutive coaching", 'cta_label' => __( 'Contact Us', 'rocketpd' ), 'cta_url' => home_url( '/contact/' ), 'badge' => '', 'featured' => 0 ),
);
$plans          = rocketpd_get_field( 'rpd_home_membership_plans', $fallback_plans );
$plans    = array_filter(
	is_array( $plans ) ? $plans : array(),
	function ( $plan ) {
		return is_array( $plan ) && ! empty( $plan['title'] );
	}
);
$plans    = $plans ? $plans : $fallback_plans;
?>

<section class="rpd-home-membership rpd-home-section rpd-home-section--soft">
	<div class="rpd-container">
		<header class="rpd-home-section-header">
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</header>
		<div class="rpd-home-plan-grid">
			<?php foreach ( $plans as $plan ) : ?>
				<article class="rpd-home-plan<?php echo ! empty( $plan['featured'] ) ? ' rpd-home-plan--featured' : ''; ?>">
					<?php if ( ! empty( $plan['badge'] ) ) : ?>
						<p class="rpd-home-plan__badge"><?php echo esc_html( $plan['badge'] ); ?></p>
					<?php endif; ?>
					<h3><?php echo esc_html( $plan['title'] ); ?></h3>
					<strong><?php echo esc_html( $plan['price'] ?? '' ); ?></strong>
					<?php if ( ! empty( $plan['subtitle'] ) ) : ?>
						<p><?php echo esc_html( $plan['subtitle'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $plan['bullets'] ) ) : ?>
						<ul>
							<?php foreach ( preg_split( '/\r\n|\r|\n/', $plan['bullets'] ) as $bullet ) : ?>
								<?php if ( $bullet ) : ?>
									<li><?php echo esc_html( $bullet ); ?></li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<?php if ( ! empty( $plan['cta_label'] ) && ! empty( $plan['cta_url'] ) ) : ?>
						<a class="rpd-btn <?php echo ! empty( $plan['featured'] ) ? 'rpd-btn--gold' : 'rpd-btn--outline-purple'; ?>" href="<?php echo esc_url( $plan['cta_url'] ); ?>"><?php echo esc_html( $plan['cta_label'] ); ?></a>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
