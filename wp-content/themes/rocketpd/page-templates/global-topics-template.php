<?php
/**
 * Template Name: RocketPD Topics Legacy Compatibility
 * Description: Compatibility wrapper for the existing /topic/ page assignment.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * Temporary compatibility for staging/current content that is assigned to the
 * historical global-topics-template.php. Reassign /topic/ to "RocketPD Topics"
 * in WP Admin when convenient, then this wrapper can be retired.
 */
get_template_part( 'page-templates/template-topics' );
