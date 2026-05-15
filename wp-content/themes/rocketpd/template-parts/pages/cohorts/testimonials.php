<?php
/**
 * Cohort testimonials.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$testimonials = array(
	array( 'quote' => __( "This wasn't another sit-and-get PD. By session 3 my whole leadership team was running mini-observations the same way - and our teachers noticed.", 'rocketpd' ), 'name' => __( 'Dr. Renee Williamson', 'rocketpd' ), 'role' => __( 'Principal · Park Ridge Public Schools', 'rocketpd' ) ),
	array( 'quote' => __( 'The between-session structure is what made the difference. We did not just learn the framework - we implemented it, came back, and refined it together.', 'rocketpd' ), 'name' => __( 'Marcus Hill', 'rocketpd' ), 'role' => __( 'Director of Teaching & Learning · Greenville USD', 'rocketpd' ) ),
	array( 'quote' => __( 'Best PD I have done in 22 years. Live, practical, and we walked away with documents and routines we still use today.', 'rocketpd' ), 'name' => __( 'Jenna Crowe', 'rocketpd' ), 'role' => __( 'Instructional Coach · Burlington School District', 'rocketpd' ) ),
);
?>

<section class="rpd-cohorts-section rpd-cohorts-testimonials">
	<div class="rpd-container">
		<header class="rpd-cohorts-section__header">
			<p class="rpd-cohorts-kicker"><?php esc_html_e( 'From Cohort Participants', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'What educators say after a RocketPD cohort.', 'rocketpd' ); ?></h2>
		</header>
		<div class="rpd-cohorts-testimonial-grid">
			<?php foreach ( $testimonials as $item ) : ?>
				<article>
					<span aria-hidden="true">“</span>
					<p><?php echo esc_html( $item['quote'] ); ?></p>
					<footer><strong><?php echo esc_html( $item['name'] ); ?></strong><small><?php echo esc_html( $item['role'] ); ?></small></footer>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
