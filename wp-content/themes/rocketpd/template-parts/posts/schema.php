<?php
/**
 * Post JSON-LD structured data — intentionally empty.
 *
 * Schema for single posts is handled entirely by Yoast SEO, which outputs a
 * connected schema graph (@id cross-references) covering Article, WebPage,
 * BreadcrumbList, Person, ImageObject, and WebSite. Yoast also auto-populates
 * keywords from tags and articleSection from categories, and keeps the schema
 * current as the spec evolves.
 *
 * Duplicating any of those types here would produce two competing definitions
 * for the same page, which can suppress rich results rather than improve them.
 *
 * If Yoast is ever removed, rebuild this file to output Article,
 * BreadcrumbList (Home → Blog → Post Title), and FAQPage (conditional on
 * rpd_post_faq_enabled / rpd_post_faq_items) as a single JSON-LD block.
 * Wire it back in by adding a get_template_part() call in single-post.php
 * immediately after the_post().
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
