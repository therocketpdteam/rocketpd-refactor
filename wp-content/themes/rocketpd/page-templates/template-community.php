<?php
/**
 * Template Name: RocketPD Community
 * Description: ACF-powered RocketPD Community page template.
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
	<main id="primary" class="rpd-site-main rpd-community-page">
		<?php
		get_template_part( 'template-parts/pages/community/hero' );
		get_template_part( 'template-parts/pages/community/intro' );
		get_template_part( 'template-parts/pages/community/includes' );
		get_template_part( 'template-parts/pages/community/benefits' );
		get_template_part( 'template-parts/pages/community/practice' );
		get_template_part( 'template-parts/pages/community/resources' );
		get_template_part( 'template-parts/pages/community/flexible-learning' );
		get_template_part( 'template-parts/pages/community/topic-request' );
		get_template_part( 'template-parts/pages/community/pathways' );
		get_template_part( 'template-parts/pages/community/network' );
		get_template_part( 'template-parts/pages/community/final-cta' );
		?>
	</main>
	<?php
}

get_footer();
