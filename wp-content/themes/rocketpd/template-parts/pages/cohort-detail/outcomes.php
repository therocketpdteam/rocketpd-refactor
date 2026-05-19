<?php
/**
 * Cohort outcomes.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohort   = function_exists( 'rocketpd_get_current_cohort_detail' ) ? rocketpd_get_current_cohort_detail() : array();
$outcomes = $cohort['outcomes'] ?? array();
?>

<section class="rpd-cohort-outcomes">
	<div class="rpd-container">
		<header class="rpd-cohort-section-header">
			<p class="rpd-cohort-kicker"><?php esc_html_e( "What you'll leave with", 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'Concrete outcomes by the final session.', 'rocketpd' ); ?></h2>
		</header>
		<div class="rpd-cohort-outcomes__grid">
			<?php foreach ( $outcomes as $index => $outcome ) : ?>
				<article class="rpd-cohort-outcome-card">
					<span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3><?php echo esc_html( $outcome['title'] ?? $outcome['outcome_title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $outcome['description'] ?? $outcome['outcome_description'] ?? '' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
