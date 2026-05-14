<?php
/**
 * Template Name: RocketPD Instructors
 * Description: RocketPD Instructor Index template.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) {
	the_post();
	?>
	<main id="primary" class="rpd-site-main rpd-instructors-page">
		<?php
		get_template_part( 'template-parts/pages/instructors/hero' );
		get_template_part( 'template-parts/pages/instructors/trust-band' );
		get_template_part( 'template-parts/pages/instructors/discovery' );
		get_template_part( 'template-parts/pages/instructors/learning-ways' );
		get_template_part( 'template-parts/pages/instructors/social-proof' );
		get_template_part( 'template-parts/pages/instructors/final-cta' );
		?>
	</main>
	<?php
}

get_footer();
