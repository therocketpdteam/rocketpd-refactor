<?php
/**
 * Template Name: RocketPD Trust Cycle Guide
 * Description: ACF-powered RocketPD Trust Cycle Guide page template.
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
	<main id="primary" class="rpd-site-main rpd-trust-page">
		<?php
		get_template_part( 'template-parts/pages/trust-cycle-guide/hero' );
		get_template_part( 'template-parts/pages/trust-cycle-guide/model' );
		get_template_part( 'template-parts/pages/trust-cycle-guide/retention' );
		get_template_part( 'template-parts/pages/trust-cycle-guide/continuous-learning' );
		get_template_part( 'template-parts/pages/trust-cycle-guide/practice-cycle' );
		get_template_part( 'template-parts/pages/trust-cycle-guide/engagement' );
		get_template_part( 'template-parts/pages/trust-cycle-guide/practices' );
		get_template_part( 'template-parts/pages/trust-cycle-guide/districts' );
		get_template_part( 'template-parts/pages/trust-cycle-guide/rocketpd-fit' );
		get_template_part( 'template-parts/pages/trust-cycle-guide/starting-point' );
		get_template_part( 'template-parts/pages/trust-cycle-guide/initiative' );
		get_template_part( 'template-parts/pages/trust-cycle-guide/final-cta' );
		?>
	</main>
	<?php
}

get_footer();
