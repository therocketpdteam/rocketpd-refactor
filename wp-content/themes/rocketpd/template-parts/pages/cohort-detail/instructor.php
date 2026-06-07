<?php
/**
 * Cohort instructor block.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohort     = function_exists( 'rocketpd_get_current_cohort_detail' ) ? rocketpd_get_current_cohort_detail() : array();
$instructor = $cohort['instructor'] ?? array();
$headshot   = function_exists( 'rocketpd_get_image_markup' ) ? rocketpd_get_image_markup( $instructor['headshot'] ?? '', 'rpd-cohort-instructor__image', $instructor['name'] ?? '' ) : '';
?>

<section class="rpd-cohort-instructor">
	<div class="rpd-container">
		<p class="rpd-cohort-kicker"><?php esc_html_e( 'Meet your instructor', 'rocketpd' ); ?></p>
		<article class="rpd-cohort-instructor__card">
			<div class="rpd-cohort-instructor__portrait">
				<?php echo $headshot; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
			<div class="rpd-cohort-instructor__content">
				<h2><?php printf( esc_html__( 'Led by %s.', 'rocketpd' ), esc_html( $instructor['name'] ?? '' ) ); ?></h2>
				<strong><?php echo esc_html( $instructor['title'] ?? '' ); ?></strong>
				<p><?php echo esc_html( $instructor['bio'] ?? '' ); ?></p>
				<?php if ( ! empty( $instructor['quote'] ) ) : ?>
					<blockquote><?php echo esc_html( $instructor['quote'] ); ?></blockquote>
				<?php endif; ?>
				<?php if ( ! empty( $instructor['specialties'] ) && is_array( $instructor['specialties'] ) ) : ?>
					<div class="rpd-cohort-specialties">
						<?php foreach ( $instructor['specialties'] as $specialty ) : ?>
							<span><?php echo esc_html( $specialty ); ?></span>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				<div class="rpd-cohort-instructor__links">
					<?php if ( ! empty( $instructor['href'] ) ) : ?>
						<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $instructor['href'] ); ?>"><?php esc_html_e( 'View Instructor Page', 'rocketpd' ); ?></a>
					<?php endif; ?>
					<?php foreach ( $instructor['links'] ?? array() as $link ) : ?>
						<?php if ( empty( $link['href'] ) || empty( $link['label'] ) ) : ?>
							<?php continue; ?>
						<?php endif; ?>
						<a href="<?php echo esc_url( $link['href'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $link['label'] ); ?></a>
					<?php endforeach; ?>
				</div>
			</div>
		</article>
	</div>
</section>
