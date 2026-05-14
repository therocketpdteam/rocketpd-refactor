<?php
/**
 * Single Instructor template.
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
	<main id="primary" class="rpd-site-main rpd-instructor-detail-page">
		<?php
		get_template_part( 'template-parts/pages/instructor-detail/breadcrumb' );
		get_template_part( 'template-parts/pages/instructor-detail/hero' );
		get_template_part( 'template-parts/pages/instructor-detail/authority' );
		get_template_part( 'template-parts/pages/instructor-detail/free-resources' );
		get_template_part( 'template-parts/pages/instructor-detail/professional-learning' );
		get_template_part( 'template-parts/pages/instructor-detail/trust' );
		get_template_part( 'template-parts/pages/instructor-detail/related-experts' );
		get_template_part( 'template-parts/pages/instructor-detail/faq' );
		get_template_part( 'template-parts/pages/instructor-detail/final-cta' );
		?>
	</main>
	<?php
}

get_footer();
