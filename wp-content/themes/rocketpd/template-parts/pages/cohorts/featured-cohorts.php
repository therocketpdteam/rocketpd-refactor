<?php
/**
 * Featured cohorts.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_cohorts_featured_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_kicker     = __( 'Featured Cohorts', 'rocketpd' );
$default_headline   = __( 'Three flagship cohorts kicking off this fall.', 'rocketpd' );
$default_link_label = __( 'See full cohort lineup', 'rocketpd' );

if ( 'custom' === $mode ) {
	$kicker     = rocketpd_get_field( 'rpd_cohorts_featured_kicker', $default_kicker );
	$headline   = rocketpd_get_field( 'rpd_cohorts_featured_headline', $default_headline );
	$link_label = rocketpd_get_field( 'rpd_cohorts_featured_link_label', $default_link_label );
} else {
	$kicker     = $default_kicker;
	$headline   = $default_headline;
	$link_label = $default_link_label;
}

$cohorts = array_slice( rocketpd_get_featured_cohorts(), 0, 3 );
?>

<section class="rpd-cohorts-section rpd-cohorts-featured" id="featured-cohorts">
	<div class="rpd-container">
		<header class="rpd-cohorts-section__header rpd-cohorts-section__header--split">
			<div>
				<p class="rpd-cohorts-kicker"><?php echo esc_html( $kicker ); ?></p>
				<h2><?php echo esc_html( $headline ); ?></h2>
			</div>
			<a href="#cohort-gallery"><?php echo esc_html( $link_label ); ?> <span aria-hidden="true">&rarr;</span></a>
		</header>
		<div class="rpd-cohorts-card-grid">
			<?php foreach ( $cohorts as $cohort ) : ?>
				<?php get_template_part( 'template-parts/pages/cohorts/cohort-card', null, array( 'cohort' => $cohort ) ); ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
