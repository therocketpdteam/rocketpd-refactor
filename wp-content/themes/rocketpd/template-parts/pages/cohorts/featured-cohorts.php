<?php
/**
 * Featured cohorts.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohorts = array_slice( rocketpd_get_featured_cohorts(), 0, 3 );
?>

<section class="rpd-cohorts-section rpd-cohorts-featured" id="featured-cohorts">
	<div class="rpd-container">
		<header class="rpd-cohorts-section__header rpd-cohorts-section__header--split">
			<div>
				<p class="rpd-cohorts-kicker"><?php esc_html_e( 'Featured Cohorts', 'rocketpd' ); ?></p>
				<h2><?php esc_html_e( 'Three flagship cohorts kicking off this fall.', 'rocketpd' ); ?></h2>
			</div>
			<a href="#cohort-gallery"><?php esc_html_e( 'See full cohort lineup', 'rocketpd' ); ?> <span aria-hidden="true">&rarr;</span></a>
		</header>
		<div class="rpd-cohorts-card-grid">
			<?php foreach ( $cohorts as $cohort ) : ?>
				<?php get_template_part( 'template-parts/pages/cohorts/cohort-card', null, array( 'cohort' => $cohort ) ); ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
