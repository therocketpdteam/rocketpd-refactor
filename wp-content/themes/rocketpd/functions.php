<?php
/**
 * RocketPD theme functions.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rocketpd_includes = array(
	'setup',
	'enqueue',
	'acf',
	'acf-options',
	'post-types',
	'taxonomies',
	'helpers',
	'breadcrumbs',
	'instructors',
	'courses',
	'learning-experiences',
	'course-detail',
	'cohorts',
	'cohort-detail',
	'topics',
	'topic-detail',
	'posts',
	'icons',
	'template-tags',
	'nav',
	'shortcodes',
	'gravity-forms',
);

foreach ( $rocketpd_includes as $rocketpd_file ) {
	$rocketpd_path = get_template_directory() . '/inc/' . $rocketpd_file . '.php';

	if ( file_exists( $rocketpd_path ) ) {
		require_once $rocketpd_path;
	}
}
