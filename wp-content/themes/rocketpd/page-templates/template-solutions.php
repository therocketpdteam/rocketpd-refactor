<?php
/**
 * Template Name: RocketPD Solutions
 * Description: Solutions overview landing page.
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
	<main id="primary" class="rpd-site-main rpd-sol">
		<?php
		get_template_part( 'template-parts/pages/solutions/hero' );
		get_template_part( 'template-parts/pages/solutions/products' );
		get_template_part( 'template-parts/pages/solutions/contact' );
		get_template_part( 'template-parts/pages/solutions/resources' );
		get_template_part( 'template-parts/pages/solutions/join' );
		?>
	</main>
	<?php
}

get_footer();
