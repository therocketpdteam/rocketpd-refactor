<?php
/**
 * Topic detail page shell.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topic = function_exists( 'rocketpd_get_current_topic_detail' ) ? rocketpd_get_current_topic_detail() : array();
$args  = array( 'topic' => $topic );
?>

<main id="primary" class="rpd-site-main rpd-topic-detail-page">
	<?php
	get_template_part( 'template-parts/pages/topic-detail/breadcrumb', null, $args );
	get_template_part( 'template-parts/pages/topic-detail/hero', null, $args );
	get_template_part( 'template-parts/pages/topic-detail/overview', null, $args );
	get_template_part( 'template-parts/pages/topic-detail/why-matters', null, $args );
	get_template_part( 'template-parts/pages/topic-detail/featured-expert', null, $args );
	get_template_part( 'template-parts/pages/topic-detail/resources', null, $args );
	get_template_part( 'template-parts/pages/topic-detail/opportunities', null, $args );
	get_template_part( 'template-parts/pages/topic-detail/frameworks', null, $args );
	get_template_part( 'template-parts/pages/topic-detail/faq', null, $args );
	get_template_part( 'template-parts/pages/topic-detail/community-cta', null, $args );
	get_template_part( 'template-parts/pages/topic-detail/final-cta', null, $args );
	?>
</main>
