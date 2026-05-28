<?php
/**
 * Course detail page shell.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<main id="primary" class="rpd-site-main rpd-course-detail-page">
	<?php
	get_template_part( 'template-parts/pages/course-detail/breadcrumb' );
	get_template_part( 'template-parts/pages/course-detail/hero' );
	get_template_part( 'template-parts/pages/course-detail/outcomes' );
	get_template_part( 'template-parts/pages/course-detail/audience' );
	get_template_part( 'template-parts/pages/course-detail/included' );
	get_template_part( 'template-parts/pages/course-detail/instructor' );
	get_template_part( 'template-parts/pages/course-detail/resources' );
	get_template_part( 'template-parts/pages/course-detail/pricing' );
	get_template_part( 'template-parts/pages/course-detail/related' );
	get_template_part( 'template-parts/pages/course-detail/faq' );
	get_template_part( 'template-parts/pages/course-detail/final-cta' );
	?>
</main>
