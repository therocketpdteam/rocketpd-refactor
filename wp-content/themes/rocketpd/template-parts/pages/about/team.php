<?php
/**
 * About team section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$team = rocketpd_about_get_rows(
	'team',
	array(
		array( 'initials' => 'GG', 'gradient' => 'team-one', 'name' => __( 'Gerardo Grosso', 'rocketpd' ), 'role' => __( 'Operations & Accounts', 'rocketpd' ) ),
		array( 'initials' => 'PU', 'gradient' => 'team-two', 'name' => __( 'Patricia Useche', 'rocketpd' ), 'role' => __( 'Customer Success & Implementation', 'rocketpd' ) ),
		array( 'initials' => 'KA', 'gradient' => 'team-three', 'name' => __( 'Kevin Adkins', 'rocketpd' ), 'role' => __( 'Visual Designer', 'rocketpd' ) ),
	),
	array( 'name' )
);
?>

<section class="rpd-about-team rpd-about-section rpd-about-band" aria-labelledby="rpd-about-team-title">
	<div class="rpd-container">
		<header class="rpd-about-section-header">
			<p class="rpd-about-eyebrow"><?php echo esc_html( rocketpd_about_get_field( 'team_eyebrow', __( 'The Team', 'rocketpd' ) ) ); ?></p>
			<h2 id="rpd-about-team-title"><?php echo esc_html( rocketpd_about_get_field( 'team_heading', __( 'The people behind the platform.', 'rocketpd' ) ) ); ?></h2>
		</header>
		<div class="rpd-about-team__grid">
			<?php foreach ( $team as $person ) : ?>
				<?php get_template_part( 'template-parts/pages/about/person-card', null, array( 'person' => $person, 'variant' => 'team' ) ); ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
