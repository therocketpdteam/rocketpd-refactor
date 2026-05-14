<?php
/**
 * Course detail pricing.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course  = function_exists( 'rocketpd_get_current_course_detail' ) ? rocketpd_get_current_course_detail() : array();
$format  = $course['format'] ?? 'self-paced';
$pricing = $course['pricing'][ $format ] ?? array();

if ( ! $pricing ) {
	return;
}
?>

<section class="rpd-course-pricing" id="pricing">
	<div class="rpd-container">
		<header class="rpd-course-section-header rpd-course-section-header--center">
			<p><?php esc_html_e( 'Start learning today', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'Choose the plan that fits.', 'rocketpd' ); ?></h2>
			<span><?php esc_html_e( 'Available for individuals and teams - with special pricing for teams of 5 or more.', 'rocketpd' ); ?></span>
		</header>
		<div class="rpd-course-pricing__grid">
			<?php foreach ( $pricing as $tier ) : ?>
				<article class="rpd-course-pricing-card<?php echo ! empty( $tier['highlighted'] ) ? ' is-featured' : ''; ?>">
					<?php if ( ! empty( $tier['highlighted'] ) ) : ?>
						<span class="rpd-course-pricing-card__ribbon"><?php esc_html_e( 'Most Popular', 'rocketpd' ); ?></span>
					<?php endif; ?>
					<p><?php echo esc_html( $tier['eyebrow'] ?? '' ); ?></p>
					<h3><?php echo esc_html( $tier['title'] ?? '' ); ?></h3>
					<strong><?php echo esc_html( $tier['price'] ?? '' ); ?></strong>
					<span><?php echo esc_html( $tier['priceMeta'] ?? '' ); ?></span>
					<?php if ( ! empty( $tier['bullets'] ) && is_array( $tier['bullets'] ) ) : ?>
						<ul>
							<?php foreach ( $tier['bullets'] as $bullet ) : ?>
								<li><i aria-hidden="true"></i><?php echo esc_html( $bullet ); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<a class="rpd-btn <?php echo ! empty( $tier['highlighted'] ) ? 'rpd-btn--gold' : 'rpd-btn--outline-purple'; ?>" href="<?php echo esc_url( $tier['ctaHref'] ?? '#' ); ?>"><?php echo esc_html( $tier['ctaLabel'] ?? __( 'Learn More', 'rocketpd' ) ); ?></a>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
