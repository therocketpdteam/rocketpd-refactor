<?php
/**
 * Template Name: RocketPD Lead Thank You
 * Description: Confirmation page for RocketPD guide downloads.
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
	<main id="primary" class="rpd-site-main rpd-lead-thank-page">
		<?php get_template_part( 'template-parts/pages/lead-thank-you/confirmation' ); ?>
	</main>
	<?php
}

get_footer();
