<?php
/**
 * Template Name: RocketPD Topic Detail Legacy Compatibility
 * Description: Compatibility wrapper for current /topic/{slug}/ page assignments.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * Temporary compatibility for existing topic child pages assigned to
 * topics-template.php. Reassign pages to "RocketPD Topic Detail" when
 * convenient, then this wrapper can be retired.
 */
get_template_part( 'page-templates/template-topic-detail' );
