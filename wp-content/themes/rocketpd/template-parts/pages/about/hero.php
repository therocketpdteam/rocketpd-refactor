<?php
/**
 * About hero.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading    = rocketpd_about_get_field( 'hero_heading', __( 'The Community <br>for Educator Growth.', 'rocketpd' ) );
$paragraphs = rocketpd_about_get_rows(
	'hero_paragraphs',
	array(
		array( 'paragraph' => __( 'Every educator can name a teacher who changed their life.', 'rocketpd' ) ),
		array( 'paragraph' => __( "Educators are among society's greatest assets — but the work has never been harder. Between staffing challenges, evolving student needs, and rapid technological change, schools need professional learning that supports real growth, not just compliance.", 'rocketpd' ) ),
		array( 'paragraph' => __( 'RocketPD exists to help educators grow, collaborate, and turn learning into meaningful outcomes in their schools.', 'rocketpd' ) ),
	),
	array( 'paragraph' )
);
?>

<section class="rpd-about-hero rpd-about-section" aria-labelledby="rpd-about-hero-title">
	<div class="rpd-container rpd-about-hero__inner">
		<h1 id="rpd-about-hero-title"><?php echo wp_kses( $heading, array( 'br' => array() ) ); ?></h1>
		<div class="rpd-about-hero__body">
			<?php foreach ( $paragraphs as $paragraph ) : ?>
				<p><?php echo esc_html( $paragraph['paragraph'] ?? '' ); ?></p>
			<?php endforeach; ?>
		</div>
	</div>
</section>
