<?php
/**
 * About team section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = rocketpd_get_field( 'rpd_about_team_eyebrow', __( 'THE TEAM', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_about_team_headline', __( 'The people behind the platform.', 'rocketpd' ) );
$people   = rocketpd_get_field(
	'rpd_about_team_people',
	array(
		array(
			'name'     => __( 'Gerardo Grosso', 'rocketpd' ),
			'initials' => __( 'GG', 'rocketpd' ),
			'role'     => __( 'OPERATIONS & ACCOUNTS', 'rocketpd' ),
			'accent'   => 'blue',
		),
		array(
			'name'     => __( 'Patricia Useche', 'rocketpd' ),
			'initials' => __( 'PU', 'rocketpd' ),
			'role'     => __( 'CUSTOMER SUCCESS & IMPLEMENTATION', 'rocketpd' ),
			'accent'   => 'pink',
		),
		array(
			'name'     => __( 'Kevin Adkins', 'rocketpd' ),
			'initials' => __( 'KA', 'rocketpd' ),
			'role'     => __( 'VISUAL DESIGNER', 'rocketpd' ),
			'accent'   => 'sand',
		),
	)
);
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
					<?php get_template_part( 'template-parts/pages/about/person-card', null, array( 'person' => $person ) ); ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
