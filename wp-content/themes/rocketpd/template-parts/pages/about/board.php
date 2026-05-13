<?php
/**
 * About board section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = rocketpd_get_field( 'rpd_about_board_eyebrow', __( 'OUR BOARD', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_about_board_headline', __( 'Guided by the people who have led the work.', 'rocketpd' ) );
$body     = rocketpd_get_field( 'rpd_about_board_body', __( 'Our board brings deep operating experience from public school districts and higher-education research institutions across the country.', 'rocketpd' ) );
$people   = rocketpd_get_field(
	'rpd_about_board_people',
	array(
		array(
			'name'     => __( 'John Gamba', 'rocketpd' ),
			'initials' => __( 'JG', 'rocketpd' ),
			'role'     => __( 'ENTREPRENEUR IN RESIDENCE & DIRECTOR OF SPECIAL PROGRAMS', 'rocketpd' ),
			'bio'      => __( 'University of Pennsylvania, Graduate School of Education', 'rocketpd' ),
			'accent'   => 'navy',
		),
		array(
			'name'     => __( 'Shannon Cox', 'rocketpd' ),
			'initials' => __( 'SC', 'rocketpd' ),
			'role'     => __( 'SUPERINTENDENT', 'rocketpd' ),
			'bio'      => __( 'Montgomery County Educational Service Center, Ohio', 'rocketpd' ),
			'accent'   => 'plum',
		),
		array(
			'name'     => __( 'Dr. Luvelle Brown', 'rocketpd' ),
			'initials' => __( 'LB', 'rocketpd' ),
			'role'     => __( 'SUPERINTENDENT', 'rocketpd' ),
			'bio'      => __( 'Ithaca City School District, New York', 'rocketpd' ),
			'accent'   => 'purple',
		),
		array(
			'name'     => __( 'Dr. Stephen Murley', 'rocketpd' ),
			'initials' => __( 'SM', 'rocketpd' ),
			'role'     => __( 'FORMER SUPERINTENDENT', 'rocketpd' ),
			'bio'      => __( 'Green Bay Area School District, Wisconsin', 'rocketpd' ),
			'accent'   => 'sand',
		),
	)
);
?>

<section class="rpd-about-board rpd-about-section">
	<div class="rpd-container">
		<header class="rpd-about-section-header">
			<p class="rpd-about-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<?php if ( $body ) : ?>
				<p><?php echo esc_html( $body ); ?></p>
			<?php endif; ?>
		</header>

		<?php if ( is_array( $people ) && ! empty( $people ) ) : ?>
			<div class="rpd-about-people-grid rpd-about-people-grid--board">
				<?php foreach ( $people as $person ) : ?>
					<?php get_template_part( 'template-parts/pages/about/person-card', null, array( 'person' => $person ) ); ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
