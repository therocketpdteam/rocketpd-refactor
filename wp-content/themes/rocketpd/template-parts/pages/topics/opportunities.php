<?php
/**
 * Topic Index opportunities.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$opportunities = function_exists( 'rocketpd_get_topic_opportunities' ) ? rocketpd_get_topic_opportunities() : array();
?>

<section class="rpd-topics-opportunities rpd-topics-section">
	<div class="rpd-container">
		<header class="rpd-topics-section__header">
			<p class="rpd-section-header__eyebrow"><?php esc_html_e( 'Upcoming Learning Opportunities', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'Live cohorts, webinars, and courses launching soon.', 'rocketpd' ); ?></h2>
		</header>
		<div class="rpd-topics-opportunity-grid">
			<?php foreach ( $opportunities as $opportunity ) : ?>
				<?php $icon = false !== strpos( $opportunity['format'], 'Webinar' ) ? 'webinar' : ( false !== strpos( $opportunity['format'], 'Cohort' ) ? 'users' : 'cap' ); ?>
				<a class="rpd-topics-opportunity-card rpd-topic-format--<?php echo esc_attr( $opportunity['tone'] ); ?>" href="<?php echo esc_url( $opportunity['href'] ); ?>">
					<header>
						<span><?php echo esc_html( $opportunity['format'] ); ?></span>
						<strong><?php echo esc_html( $opportunity['price'] ); ?></strong>
					</header>
					<span class="rpd-topics-icon-shell" aria-hidden="true">
						<?php echo rocketpd_topic_icon_svg( $icon, 'rpd-topics-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</span>
					<h3><?php echo esc_html( $opportunity['title'] ); ?></h3>
					<p><?php echo esc_html( $opportunity['expert'] ); ?></p>
					<span class="rpd-topics-opportunity-card__date"><?php echo esc_html( $opportunity['date'] ); ?></span>
					<footer><span><?php echo esc_html( $opportunity['topic'] ); ?></span><strong><?php esc_html_e( 'View', 'rocketpd' ); ?> →</strong></footer>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
