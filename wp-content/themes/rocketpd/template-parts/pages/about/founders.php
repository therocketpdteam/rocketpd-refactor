<?php
/**
 * About founders section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = rocketpd_get_field( 'rpd_about_founders_eyebrow', __( 'MEET THE FOUNDERS', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_about_founders_headline', __( 'Built by educators, for educators.', 'rocketpd' ) );
$body     = rocketpd_get_field( 'rpd_about_founders_body', __( "RocketPD's three co-founders bring decades of K-12 experience — and a personal connection to the educators who shaped them.", 'rocketpd' ) );
$people   = rocketpd_get_field(
	'rpd_about_founders_people',
	array(
		array(
			'name'      => __( 'Corey Murray', 'rocketpd' ),
			'initials'  => __( 'CM', 'rocketpd' ),
			'role'      => __( 'CO-FOUNDER', 'rocketpd' ),
			'specialty' => __( 'K-12 program strategy, audience & content', 'rocketpd' ),
			'bio'       => __( "A proud product of K-12 public schools, and someone with Cerebral Palsy, Corey credits the educators in his life with teaching him how to turn his differences into strengths. A former education journalist and K-12 content marketing executive, Corey works with RocketPD's roster of thought leaders to design and produce impactful learning experiences.", 'rocketpd' ),
			'accent'    => 'purple',
		),
		array(
			'name'      => __( 'Jesse Leib', 'rocketpd' ),
			'initials'  => __( 'JL', 'rocketpd' ),
			'role'      => __( 'CO-FOUNDER', 'rocketpd' ),
			'specialty' => __( 'Thought leader & district relationships', 'rocketpd' ),
			'bio'       => __( 'Having struggled with a severe attention deficit and hyperactivity disorder throughout school, Jesse credits the educators in his life with helping him stay the course. With more than 20 years working with K-12 school leaders, Jesse has dedicated his career to helping school district leaders explore innovative opportunities in technology and learning.', 'rocketpd' ),
			'accent'    => 'navy',
		),
		array(
			'name'      => __( 'Chris Dekmar', 'rocketpd' ),
			'initials'  => __( 'CD', 'rocketpd' ),
			'role'      => __( 'CO-FOUNDER', 'rocketpd' ),
			'specialty' => __( 'Operations & program management', 'rocketpd' ),
			'bio'       => __( "After chasing his dreams in the school band, and later earning his MBA at the University of West Georgia, Chris went on to lead sales operations for an education technology startup before launching his own digital marketing agency. At RocketPD, he runs the team that keeps the lights on and the machinery humming.", 'rocketpd' ),
			'accent'    => 'gold',
		),
	)
);
?>

<section class="rpd-about-founders rpd-about-section">
	<div class="rpd-container">
		<header class="rpd-about-section-header">
			<p class="rpd-about-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<?php if ( $body ) : ?>
				<p><?php echo esc_html( $body ); ?></p>
			<?php endif; ?>
		</header>

		<?php if ( is_array( $people ) && ! empty( $people ) ) : ?>
			<div class="rpd-about-people-grid rpd-about-people-grid--founders">
				<?php foreach ( $people as $person ) : ?>
					<?php get_template_part( 'template-parts/pages/about/person-card', null, array( 'person' => $person ) ); ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
