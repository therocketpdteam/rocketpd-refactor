<?php
/**
 * Cohort schedule timeline.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohort   = function_exists( 'rocketpd_get_current_cohort_detail' ) ? rocketpd_get_current_cohort_detail() : array();
$schedule = $cohort['schedule'] ?? array();
?>

<section class="rpd-cohort-schedule" id="cohort-schedule">
	<div class="rpd-container">
		<header class="rpd-cohort-section-header">
			<p class="rpd-cohort-kicker"><?php esc_html_e( 'Cohort Schedule', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'Live-virtual program.', 'rocketpd' ); ?></h2>
			<span><?php echo esc_html( trim( ( $cohort['cadenceLabel'] ?? '' ) . ' - ' . ( $cohort['sessionLength'] ?? '' ) . ' - ' . ( $cohort['formatLabel'] ?? '' ) ) ); ?></span>
		</header>
		<ol class="rpd-cohort-timeline">
			<?php foreach ( $schedule as $index => $session ) : ?>
				<?php
				$number = $session['number'] ?? $session['session_number'] ?? ( $index + 1 );
				$date   = $session['date'] ?? $session['session_date'] ?? '';
				?>
				<li class="rpd-cohort-session-card">
					<div class="rpd-cohort-session-card__number"><?php echo esc_html( $number ); ?></div>
					<div class="rpd-cohort-session-card__body">
						<div class="rpd-cohort-session-card__meta">
							<span><?php echo esc_html( rocketpd_format_cohort_detail_date( $date, 'l, M j' ) ); ?></span>
							<span><?php echo esc_html( $session['time'] ?? $session['session_time'] ?? '' ); ?></span>
							<?php if ( ! empty( $session['coming_soon'] ) || ! empty( $session['comingSoon'] ) ) : ?>
								<em><?php esc_html_e( 'Coming Soon', 'rocketpd' ); ?></em>
							<?php endif; ?>
						</div>
						<h3><?php echo esc_html( $session['title'] ?? $session['session_title'] ?? '' ); ?></h3>
						<p><?php echo esc_html( $session['description'] ?? $session['session_description'] ?? '' ); ?></p>
						<?php if ( ! empty( $session['resourceLink'] ) || ! empty( $session['session_resource_link'] ) ) : ?>
							<a href="<?php echo esc_url( $session['resourceLink'] ?? $session['session_resource_link'] ); ?>"><?php esc_html_e( 'Session resource', 'rocketpd' ); ?></a>
						<?php endif; ?>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>
		<p class="rpd-cohort-schedule__note"><?php esc_html_e( "Can't attend live? Sessions are recorded and shared with registered participants.", 'rocketpd' ); ?></p>
	</div>
</section>
