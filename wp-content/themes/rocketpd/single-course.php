<?php
/**
 * Single Course template.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) {
	the_post();
	get_template_part( 'template-parts/pages/course-detail/index' );
}

get_footer();
