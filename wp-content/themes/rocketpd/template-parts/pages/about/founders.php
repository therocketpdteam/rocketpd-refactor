<?php
/**
 * About founders section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$founders = rocketpd_about_get_rows(
	'founders',
	array(
		array( 'initials' => 'CM', 'gradient' => 'founder-one', 'name' => __( 'Corey Murray', 'rocketpd' ), 'title' => __( 'Co-Founder', 'rocketpd' ), 'role_line' => __( 'K-12 program strategy, audience & content', 'rocketpd' ), 'bio' => __( "A proud product of K-12 public schools, and someone with Cerebral Palsy, Corey credits the educators in his life with teaching him how to turn his differences into strengths. A former education journalist and K-12 content marketing executive, Corey works with RocketPD's roster of thought leaders to design and produce impactful learning experiences.", 'rocketpd' ) ),
		array( 'initials' => 'JL', 'gradient' => 'founder-two', 'name' => __( 'Jesse Leib', 'rocketpd' ), 'title' => __( 'Co-Founder', 'rocketpd' ), 'role_line' => __( 'Thought leader & district relationships', 'rocketpd' ), 'bio' => __( 'Having struggled with a severe attention deficit and hyperactivity disorder throughout school, Jesse credits the educators in his life with helping him stay the course. With more than 20 years working with K-12 school leaders, Jesse has dedicated his career to helping school district leaders explore innovative opportunities in technology and learning. At RocketPD, he works with districts to connect them to new learning opportunities.', 'rocketpd' ) ),
		array( 'initials' => 'CD', 'gradient' => 'founder-three', 'name' => __( 'Chris Dekmar', 'rocketpd' ), 'title' => __( 'Co-Founder', 'rocketpd' ), 'role_line' => __( 'Operations & program management', 'rocketpd' ), 'bio' => __( 'After chasing his dreams in the school band, and later earning his MBA at the University of West Georgia, Chris went on to lead sales operations for an education technology startup in Vermont before launching his own digital marketing agency. At RocketPD, he runs the team that keeps the lights on and the machinery humming.', 'rocketpd' ) ),
	),
	array( 'name' )
);
?>

<section class="rpd-about-founders rpd-about-section" aria-labelledby="rpd-about-founders-title">
	<div class="rpd-container">
		<header class="rpd-about-section-header">
			<p class="rpd-about-eyebrow"><?php echo esc_html( rocketpd_about_get_field( 'founders_eyebrow', __( 'Meet the Founders', 'rocketpd' ) ) ); ?></p>
			<h2 id="rpd-about-founders-title"><?php echo esc_html( rocketpd_about_get_field( 'founders_heading', __( 'Built by educators, for educators.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_about_get_field( 'founders_intro', __( "RocketPD's three co-founders bring decades of K-12 experience — and a personal connection to the educators who shaped them.", 'rocketpd' ) ) ); ?></p>
		</header>
		<div class="rpd-about-founders__grid">
			<?php foreach ( $founders as $founder ) : ?>
				<?php get_template_part( 'template-parts/pages/about/person-card', null, array( 'person' => $founder, 'variant' => 'founder' ) ); ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
