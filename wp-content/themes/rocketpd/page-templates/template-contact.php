<?php
/**
 * Template Name: RocketPD Contact
 * Description: ACF-powered RocketPD Contact page template.
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
	<main id="primary" class="rpd-site-main rpd-contact-page">
		<?php
		get_template_part( 'template-parts/pages/contact/hero' );
		get_template_part( 'template-parts/pages/contact/doors' );
		get_template_part( 'template-parts/pages/contact/jesse' );
		get_template_part( 'template-parts/pages/contact/reach' );
		get_template_part( 'template-parts/pages/contact/form' );
		get_template_part( 'template-parts/pages/contact/faq' );
		get_template_part( 'template-parts/pages/contact/final-cta' );
		?>
	</main>
	<?php
}

get_footer();
