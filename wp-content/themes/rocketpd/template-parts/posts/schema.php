<?php
/**
 * Post JSON-LD structured data.
 *
 * Outputs Article, BreadcrumbList, and (conditionally) FAQPage schemas
 * as a single <script type="application/ld+json"> block inline in the body.
 *
 * ACF fields used:
 *   rpd_post_dek                — description fallback to excerpt
 *   rpd_post_featured_instructor — WP_Post object; author.name fallback to post author
 *   rpd_post_faq_enabled        — true/false toggle
 *   rpd_post_faq_items          — repeater: question (text), answer (wysiwyg)
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// --- Shared data ---
$post_id    = get_the_ID();
$title      = get_the_title();
$permalink  = get_permalink();
$site_name  = get_bloginfo( 'name' );
$thumb_url  = get_the_post_thumbnail_url( $post_id, 'large' ) ?: '';
$date_pub   = get_the_date( 'c' );
$date_mod   = get_the_modified_date( 'c' );
$dek        = rocketpd_get_field( 'rpd_post_dek', '' );

if ( ! $dek ) {
	$dek = get_the_excerpt();
}

// Author: prefer featured instructor, fall back to post author.
$instructor = rocketpd_get_field( 'rpd_post_featured_instructor', null );
$author_name = ( $instructor instanceof WP_Post )
	? get_the_title( $instructor->ID )
	: get_the_author();

// --- Article ---
$schemas = array();

$article = array(
	'@type'            => 'Article',
	'headline'         => $title,
	'description'      => wp_strip_all_tags( $dek ),
	'url'              => $permalink,
	'mainEntityOfPage' => array(
		'@type' => 'WebPage',
		'@id'   => $permalink,
	),
	'datePublished'    => $date_pub,
	'dateModified'     => $date_mod,
	'author'           => array(
		'@type' => 'Person',
		'name'  => $author_name,
	),
	'publisher'        => array(
		'@type' => 'Organization',
		'name'  => $site_name,
	),
);

if ( $thumb_url ) {
	$article['image'] = $thumb_url;
}

$schemas[] = $article;

// --- BreadcrumbList ---
$schemas[] = array(
	'@type'           => 'BreadcrumbList',
	'itemListElement' => array(
		array(
			'@type'    => 'ListItem',
			'position' => 1,
			'name'     => __( 'Home', 'rocketpd' ),
			'item'     => home_url( '/' ),
		),
		array(
			'@type'    => 'ListItem',
			'position' => 2,
			'name'     => __( 'Blog', 'rocketpd' ),
			'item'     => home_url( '/blog/' ),
		),
		array(
			'@type'    => 'ListItem',
			'position' => 3,
			'name'     => $title,
		),
	),
);

// --- FAQPage (conditional) ---
$faq_enabled = rocketpd_get_field( 'rpd_post_faq_enabled', false );

if ( $faq_enabled ) {
	$faq_items = rocketpd_get_repeater_rows( 'rpd_post_faq_items', array(), array( 'question' ) );

	if ( ! empty( $faq_items ) ) {
		$faq_entities = array();

		foreach ( $faq_items as $item ) {
			$question = isset( $item['question'] ) ? $item['question'] : '';
			$answer   = isset( $item['answer'] ) ? wp_strip_all_tags( $item['answer'] ) : '';

			if ( ! $question ) {
				continue;
			}

			$faq_entities[] = array(
				'@type'          => 'Question',
				'name'           => $question,
				'acceptedAnswer' => array(
					'@type' => 'Answer',
					'text'  => $answer,
				),
			);
		}

		if ( ! empty( $faq_entities ) ) {
			$schemas[] = array(
				'@type'      => 'FAQPage',
				'mainEntity' => $faq_entities,
			);
		}
	}
}

// --- Output ---
$ld_json = array_map( function( $schema ) {
	return array_merge( array( '@context' => 'https://schema.org' ), $schema );
}, $schemas );
?>
<script type="application/ld+json">
<?php echo wp_json_encode( $ld_json, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT ); ?>
</script>
