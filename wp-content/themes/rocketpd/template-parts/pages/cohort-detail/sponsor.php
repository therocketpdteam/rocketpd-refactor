<?php
/**
 * Cohort sponsor block.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohort = function_exists( 'rocketpd_get_current_cohort_detail' ) ? rocketpd_get_current_cohort_detail() : array();

if ( ! function_exists( 'rocketpd_cohort_detail_has_sponsor' ) || ! rocketpd_cohort_detail_has_sponsor( $cohort ) ) {
	return;
}

$sponsor = $cohort['sponsor'];
$logo    = function_exists( 'rocketpd_get_image_markup' ) ? rocketpd_get_image_markup( $sponsor['logo'] ?? '', 'rpd-cohort-sponsor__logo', $sponsor['name'] ?? '' ) : '';
?>

<section class="rpd-cohort-sponsor">
	<div class="rpd-container">
		<article class="rpd-cohort-sponsor__card">
			<div class="rpd-cohort-sponsor__mark">
				<?php if ( $logo ) : ?>
					<?php echo $logo; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<?php else : ?>
					<span><?php echo esc_html( substr( $sponsor['name'] ?? 'S', 0, 1 ) ); ?></span>
				<?php endif; ?>
			</div>
			<div>
				<p class="rpd-cohort-kicker"><?php esc_html_e( 'Sponsor-supported cohort', 'rocketpd' ); ?></p>
				<h2><?php echo esc_html( $sponsor['name'] ?? '' ); ?></h2>
				<p><?php echo esc_html( $sponsor['description'] ?? '' ); ?></p>
			</div>
			<?php if ( ! empty( $sponsor['url'] ) && ! empty( $sponsor['cta_label'] ) ) : ?>
				<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $sponsor['url'] ); ?>"><?php echo esc_html( $sponsor['cta_label'] ); ?></a>
			<?php endif; ?>
		</article>
	</div>
</section>
