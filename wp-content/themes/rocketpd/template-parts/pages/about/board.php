<?php
/**
 * About board section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$board = rocketpd_about_get_rows(
	'board',
	array(
		array( 'initials' => 'JG', 'gradient' => 'board-one', 'name' => __( 'John Gamba', 'rocketpd' ), 'role' => __( 'Entrepreneur in Residence & Director of Special Programs', 'rocketpd' ), 'org' => __( 'University of Pennsylvania, Graduate School of Education', 'rocketpd' ) ),
		array( 'initials' => 'SC', 'gradient' => 'board-two', 'name' => __( 'Shannon Cox', 'rocketpd' ), 'role' => __( 'Superintendent', 'rocketpd' ), 'org' => __( 'Montgomery County Educational Service Center, Ohio', 'rocketpd' ) ),
		array( 'initials' => 'LB', 'gradient' => 'board-three', 'name' => __( 'Dr. Luvelle Brown', 'rocketpd' ), 'role' => __( 'Superintendent', 'rocketpd' ), 'org' => __( 'Ithaca City School District, New York', 'rocketpd' ) ),
		array( 'initials' => 'SM', 'gradient' => 'board-four', 'name' => __( 'Dr. Stephen Murley', 'rocketpd' ), 'role' => __( 'Former Superintendent', 'rocketpd' ), 'org' => __( 'Green Bay Area School District, Wisconsin', 'rocketpd' ) ),
	),
	array( 'name' )
);
?>

<section class="rpd-about-board rpd-about-section" aria-labelledby="rpd-about-board-title">
	<div class="rpd-container">
		<header class="rpd-about-section-header">
			<p class="rpd-about-eyebrow"><?php echo esc_html( rocketpd_about_get_field( 'board_eyebrow', __( 'Our Board', 'rocketpd' ) ) ); ?></p>
			<h2 id="rpd-about-board-title"><?php echo esc_html( rocketpd_about_get_field( 'board_heading', __( 'Guided by the people who have led the work.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_about_get_field( 'board_intro', __( 'Our board brings deep operating experience from public school districts and higher-education research institutions across the country.', 'rocketpd' ) ) ); ?></p>
		</header>
		<div class="rpd-about-board__grid">
			<?php foreach ( $board as $person ) : ?>
				<?php get_template_part( 'template-parts/pages/about/person-card', null, array( 'person' => $person, 'variant' => 'board' ) ); ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
