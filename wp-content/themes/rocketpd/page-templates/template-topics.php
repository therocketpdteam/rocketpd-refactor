<?php
/**
 * Template Name: RocketPD Topics
 * Description: Topic Index and discovery hub.
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
	<main id="primary" class="rpd-site-main rpd-topics-page">
		<?php
		get_template_part( 'template-parts/pages/topics/hero' );
		get_template_part( 'template-parts/pages/topics/benefits' );
		get_template_part( 'template-parts/pages/topics/featured' );
		get_template_part( 'template-parts/pages/topics/gallery' );
		get_template_part( 'template-parts/pages/topics/resources' );
		get_template_part( 'template-parts/pages/topics/opportunities' );
		get_template_part( 'template-parts/pages/topics/community-cta' );
		get_template_part( 'template-parts/pages/topics/faq' );
		get_template_part( 'template-parts/pages/topics/final-cta' );

		if ( function_exists( 'rocketpd_print_topics_schema' ) ) {
			rocketpd_print_topics_schema();
		}
		?>
	</main>
	<?php
}

get_footer();
