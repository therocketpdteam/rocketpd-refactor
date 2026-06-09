<?php
/**
 * Single post structured data.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_id    = get_the_ID();
$dek        = rocketpd_post_field( 'dek', get_the_excerpt(), $post_id );
$hero_image = rocketpd_post_get_hero_image( $post_id );
$schemas    = array(
	array(
		'@context'      => 'https://schema.org',
		'@type'         => 'Article',
		'headline'      => wp_strip_all_tags( get_the_title() ),
		'description'   => wp_strip_all_tags( $dek ),
		'datePublished' => get_the_date( DATE_W3C ),
		'dateModified'  => get_the_modified_date( DATE_W3C ),
		'author'        => array(
			'@type' => 'Person',
			'name'  => get_the_author(),
		),
		'publisher'     => array(
			'@type' => 'Organization',
			'name'  => 'RocketPD',
			'url'   => home_url( '/' ),
		),
		'mainEntityOfPage' => array(
			'@type' => 'WebPage',
			'@id'   => get_permalink(),
		),
		'image'         => $hero_image['url'] ? array( esc_url_raw( $hero_image['url'] ) ) : array(),
	),
	array(
		'@context'        => 'https://schema.org',
		'@type'           => 'BreadcrumbList',
		'itemListElement' => array(
			array(
				'@type'    => 'ListItem',
				'position' => 1,
				'name'     => 'RocketPD',
				'item'     => home_url( '/' ),
			),
			array(
				'@type'    => 'ListItem',
				'position' => 2,
				'name'     => 'Blog',
				'item'     => get_post_type_archive_link( 'post' ) ?: home_url( '/blog/' ),
			),
			array(
				'@type'    => 'ListItem',
				'position' => 3,
				'name'     => wp_strip_all_tags( get_the_title() ),
				'item'     => get_permalink(),
			),
		),
	),
);

$faq_items = rocketpd_post_get_faq_items( $post_id );

if ( ! empty( $faq_items ) ) {
	$faq_schema = array(
		'@context'   => 'https://schema.org',
		'@type'      => 'FAQPage',
		'mainEntity' => array(),
	);

	foreach ( $faq_items as $item ) {
		$faq_schema['mainEntity'][] = array(
			'@type'          => 'Question',
			'name'           => wp_strip_all_tags( $item['question'] ),
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => wp_kses_post( $item['answer'] ),
			),
		);
	}

	$schemas[] = $faq_schema;
}
?>

<script type="application/ld+json"><?php echo wp_json_encode( $schemas, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>
