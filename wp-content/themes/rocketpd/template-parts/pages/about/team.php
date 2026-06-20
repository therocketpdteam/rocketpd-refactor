<?php
/**
 * About team section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_about_team_mode', 'defaults' );

if ( 'hidden' === $mode ) {
	return;
}

$people = function_exists( 'rocketpd_get_members_by_type' ) ? rocketpd_get_members_by_type( 'team' ) : array();

if ( ! $people ) {
	return;
}

$default_eyebrow  = __( 'THE TEAM', 'rocketpd' );
$default_headline = __( 'The people behind the platform.', 'rocketpd' );

if ( 'custom' === $mode ) {
	$eyebrow  = rocketpd_get_field( 'rpd_about_team_eyebrow', $default_eyebrow );
	$headline = rocketpd_get_field( 'rpd_about_team_headline', $default_headline );
} else {
	$eyebrow  = $default_eyebrow;
	$headline = $default_headline;
}
?>

<section class="rpd-about-team rpd-about-section rpd-about-band">
	<div class="rpd-container">
		<header class="rpd-about-section-header">
			<p class="rpd-about-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
		</header>

		<?php if ( is_array( $people ) && ! empty( $people ) ) : ?>
			<div class="rpd-about-people-grid rpd-about-people-grid--team">
				<?php foreach ( $people as $person ) : ?>
					<?php get_template_part( 'template-parts/components/member-card', null, array( 'member' => $person ) ); ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
