<?php
/**
 * Template Name: RocketPD LaunchPad Plus
 * Description: ACF-powered RocketPD LaunchPad Plus page template.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'rocketpd_lpp_get_field' ) ) {
	/**
	 * Return LaunchPad Plus field content, falling back when saved values are blank.
	 *
	 * @param string $field_name ACF field name.
	 * @param mixed  $fallback   Fallback value.
	 * @param int    $post_id    Optional post ID.
	 * @return mixed
	 */
	function rocketpd_lpp_get_field( $field_name, $fallback = '', $post_id = 0 ) {
		$value = function_exists( 'rocketpd_get_field' ) ? rocketpd_get_field( $field_name, null, $post_id ) : null;

		if ( null === $value || false === $value ) {
			return $fallback;
		}

		if ( is_string( $value ) && '' === trim( $value ) ) {
			return $fallback;
		}

		if ( is_array( $value ) && empty( $value ) && is_array( $fallback ) && ! empty( $fallback ) ) {
			return $fallback;
		}

		return $value;
	}
}

get_header();

while ( have_posts() ) {
	the_post();
	?>
	<main id="primary" class="rpd-site-main rpd-lpp-page">
		<?php
		get_template_part( 'template-parts/pages/launchpad-plus/hero' );
		get_template_part( 'template-parts/pages/launchpad-plus/problem' );
		get_template_part( 'template-parts/pages/launchpad-plus/platform' );
		get_template_part( 'template-parts/pages/launchpad-plus/pillars' );
		get_template_part( 'template-parts/pages/launchpad-plus/includes' );
		get_template_part( 'template-parts/pages/launchpad-plus/visibility' );
		get_template_part( 'template-parts/pages/launchpad-plus/implementation' );
		get_template_part( 'template-parts/pages/launchpad-plus/creators-package' );
		get_template_part( 'template-parts/pages/launchpad-plus/experiences' );
		get_template_part( 'template-parts/pages/launchpad-plus/comparison' );
		get_template_part( 'template-parts/pages/launchpad-plus/final-cta' );
		?>
	</main>
	<?php
}

get_footer();
