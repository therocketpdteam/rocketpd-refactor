<?php
/**
 * Instructor related experts.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$instructor = function_exists( 'rocketpd_get_current_instructor_detail' ) ? rocketpd_get_current_instructor_detail() : array();
$experts    = isset( $instructor['related_experts'] ) && is_array( $instructor['related_experts'] ) ? $instructor['related_experts'] : array();

if ( ! $experts ) {
	return;
}
?>

<section class="rpd-instructor-related">
	<div class="rpd-container">
		<header class="rpd-instructor-section-header">
			<p class="rpd-instructor-section-kicker"><?php esc_html_e( 'Explore related experts', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'Related experts you might explore.', 'rocketpd' ); ?></h2>
		</header>
		<div class="rpd-instructor-related__grid">
			<?php foreach ( $experts as $expert ) : ?>
				<article class="rpd-instructor-related-card rpd-interactive-card">
					<div class="rpd-instructor-related-card__image rpd-interactive-card__media">
						<?php if ( ! empty( $expert['headshot'] ) ) : ?>
							<img class="rpd-interactive-card__image" src="<?php echo esc_url( $expert['headshot'] ); ?>" alt="<?php echo esc_attr( $expert['name'] ?? '' ); ?>">
						<?php endif; ?>
					</div>
					<div>
						<h3><?php echo esc_html( $expert['name'] ?? '' ); ?></h3>
						<p><?php echo esc_html( $expert['authority'] ?? '' ); ?></p>
						<?php if ( ! empty( $expert['slug'] ) ) : ?>
							<a class="rpd-interactive-card__cta" href="<?php echo esc_url( home_url( '/instructors/' . $expert['slug'] . '/' ) ); ?>"><?php esc_html_e( 'Explore expert', 'rocketpd' ); ?> <span aria-hidden="true">→</span></a>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
