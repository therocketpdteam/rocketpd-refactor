<?php
/**
 * Empowered Educator Experience — challenge/solution section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$stat      = rocketpd_get_field( 'rpd_ee_diff_stat', __( 'There is a reason only 29% of educators say the professional development they receive at school meets their needs.', 'rocketpd' ) );
$stat_src  = rocketpd_get_field( 'rpd_ee_diff_stat_source', __( 'Gates Foundation, 2014', 'rocketpd' ) );
$stat_url  = rocketpd_get_field( 'rpd_ee_diff_stat_url', 'https://s3.amazonaws.com/edtech-production/reports/Gates-PDMarketResearch-Dec5.pdf' );

$chal_head = rocketpd_get_field( 'rpd_ee_diff_challenge_heading', __( 'The challenge', 'rocketpd' ) );
$chal_body = rocketpd_get_field( 'rpd_ee_diff_challenge_body', __( 'Three days of training at the district service center might check the box on state compliance, but most educators say that type of training, by itself, is ineffective and inconvenient.

Fully asynchronous training is more convenient, but doesn\'t always feature the collaboration and job-embedded practice that educators value, or need, especially with job-related stress and attrition at all-time highs.', 'rocketpd' ) );

$soln_head = rocketpd_get_field( 'rpd_ee_diff_solution_heading', __( 'The solution', 'rocketpd' ) );
$soln_body = rocketpd_get_field( 'rpd_ee_diff_solution_body', __( 'Research shows that committed teachers and staff are the single-most influential resource in the quest to close historic learning gaps and level the playing field for all students.

The best (perhaps only) way to help your team reach its full potential is through a practical mix of live and asynchronous experiences that support the needs of the individual, while furthering the broader goals of the organization.', 'rocketpd' ) );
$soln_src  = rocketpd_get_field( 'rpd_ee_diff_solution_source', __( 'RAND.org', 'rocketpd' ) );
$soln_url  = rocketpd_get_field( 'rpd_ee_diff_solution_url', 'https://www.rand.org/education-and-labor/projects/measuring-teacher-effectiveness/teachers-matter.html' );
?>

<section class="rpd-ee-diff rpd-ee-section">
	<div class="rpd-ee-container">
		<div class="rpd-ee-diff__stat">
			<?php if ( $stat ) : ?>
				<h2><?php echo esc_html( $stat ); ?></h2>
			<?php endif; ?>
			<?php if ( $stat_src ) : ?>
				<a class="rpd-ee-diff__stat-source" href="<?php echo esc_url( $stat_url ); ?>" target="_blank" rel="noopener">
					<?php echo esc_html( $stat_src ); ?>
				</a>
			<?php endif; ?>
		</div>

		<div class="rpd-ee-diff__cards">
			<div class="rpd-ee-card">
				<div class="rpd-ee-card__heading"><?php echo esc_html( $chal_head ); ?></div>
				<div class="rpd-ee-card__body">
					<?php foreach ( explode( "\n\n", $chal_body ) as $para ) : ?>
						<?php if ( trim( $para ) ) : ?>
							<p><?php echo esc_html( trim( $para ) ); ?></p>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="rpd-ee-card rpd-ee-card--solution">
				<div class="rpd-ee-card__heading"><?php echo esc_html( $soln_head ); ?></div>
				<div class="rpd-ee-card__body">
					<?php foreach ( explode( "\n\n", $soln_body ) as $para ) : ?>
						<?php if ( trim( $para ) ) : ?>
							<p><?php echo esc_html( trim( $para ) ); ?></p>
						<?php endif; ?>
					<?php endforeach; ?>
					<?php if ( $soln_src && $soln_url ) : ?>
						<span class="rpd-ee-card__source">
							Source: <a href="<?php echo esc_url( $soln_url ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $soln_src ); ?></a>
						</span>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
