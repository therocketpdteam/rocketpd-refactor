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

if ( ! function_exists( 'rocketpd_lpp_icon' ) ) {
	/**
	 * Render a small decorative icon for LaunchPad Plus page motifs.
	 *
	 * @param string $name Icon name.
	 * @return void
	 */
	function rocketpd_lpp_icon( $name = 'sparkles' ) {
		$paths = array(
			'building' => '<rect x="4" y="3" width="16" height="18" rx="2"></rect><path d="M9 21v-4h6v4"></path><path d="M8 7h.01M12 7h.01M16 7h.01M8 11h.01M12 11h.01M16 11h.01M8 15h.01M16 15h.01"></path>',
			'arrow' => '<path d="M5 12h14"></path><path d="m13 5 7 7-7 7"></path>',
			'globe' => '<circle cx="12" cy="12" r="9"></circle><path d="M3 12h18M12 3a15 15 0 0 1 0 18M12 3a15 15 0 0 0 0 18"></path>',
			'layers' => '<path d="m12 2 9 5-9 5-9-5 9-5Z"></path><path d="m3 12 9 5 9-5"></path><path d="m3 17 9 5 9-5"></path>',
			'library' => '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M4 4.5A2.5 2.5 0 0 1 6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5Z"></path>',
			'upload' => '<path d="M12 3v12"></path><path d="m17 8-5-5-5 5"></path><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2"></path>',
			'folder' => '<path d="M3 7a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"></path>',
			'users' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>',
			'chart' => '<path d="M3 3v18h18"></path><path d="M7 16V9M12 16V5M17 16v-3"></path>',
			'graduation' => '<path d="M22 10 12 5 2 10l10 5 10-5Z"></path><path d="M6 12v5c3 2 9 2 12 0v-5"></path>',
			'settings' => '<circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06A1.7 1.7 0 0 0 15 19.4a1.7 1.7 0 0 0-1 .6V22a2 2 0 1 1-4 0v-.09a1.7 1.7 0 0 0-1-.6 1.7 1.7 0 0 0-1.88.34l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.7 1.7 0 0 0 4.6 15a1.7 1.7 0 0 0-.6-1H2a2 2 0 1 1 0-4h.09a1.7 1.7 0 0 0 .6-1 1.7 1.7 0 0 0-.34-1.88l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06A1.7 1.7 0 0 0 9 4.6a1.7 1.7 0 0 0 1-.6V2a2 2 0 1 1 4 0v.09a1.7 1.7 0 0 0 1 .6 1.7 1.7 0 0 0 1.88-.34l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.7 1.7 0 0 0 19.4 9c.2.34.4.67.6 1H22a2 2 0 1 1 0 4h-.09a1.7 1.7 0 0 0-.6 1Z"></path>',
			'zap' => '<path d="M13 2 3 14h8l-1 8 11-14h-8l1-6Z"></path>',
			'palette' => '<circle cx="13.5" cy="6.5" r=".5"></circle><circle cx="17.5" cy="10.5" r=".5"></circle><circle cx="8.5" cy="7.5" r=".5"></circle><circle cx="6.5" cy="12.5" r=".5"></circle><path d="M12 2a10 10 0 0 0 0 20h1.5a2.5 2.5 0 0 0 0-5H12a2 2 0 0 1 0-4h4a6 6 0 0 0 0-12Z"></path>',
			'eye' => '<path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"></path><circle cx="12" cy="12" r="3"></circle>',
			'trend' => '<path d="m3 17 6-6 4 4 8-8"></path><path d="M14 7h7v7"></path>',
			'network' => '<circle cx="12" cy="5" r="3"></circle><circle cx="5" cy="19" r="3"></circle><circle cx="19" cy="19" r="3"></circle><path d="M10.5 7.5 6.5 16M13.5 7.5l4 8.5M8 19h8"></path>',
			'workflow' => '<path d="M6 3v6a3 3 0 0 0 3 3h6"></path><path d="M18 21v-6a3 3 0 0 0-3-3H9"></path><circle cx="6" cy="3" r="2"></circle><circle cx="18" cy="21" r="2"></circle><circle cx="18" cy="12" r="2"></circle>',
			'compass' => '<circle cx="12" cy="12" r="10"></circle><path d="m16 8-2 6-6 2 2-6 6-2Z"></path>',
			'sparkles' => '<path d="m12 3 1.8 5.2L19 10l-5.2 1.8L12 17l-1.8-5.2L5 10l5.2-1.8L12 3Z"></path><path d="m19 15 .8 2.2L22 18l-2.2.8L19 21l-.8-2.2L16 18l2.2-.8L19 15Z"></path>',
			'video' => '<path d="m22 8-6 4 6 4V8Z"></path><rect x="2" y="6" width="14" height="12" rx="2"></rect>',
			'shield' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"></path><path d="m9 12 2 2 4-4"></path>',
			'check' => '<path d="m20 6-11 11-5-5"></path>',
			'x' => '<path d="M18 6 6 18M6 6l12 12"></path>',
			'calendar' => '<rect x="3" y="4" width="18" height="18" rx="2"></rect><path d="M16 2v4M8 2v4M3 10h18"></path>',
		);
		$path = isset( $paths[ $name ] ) ? $paths[ $name ] : $paths['sparkles'];
		echo '<svg class="rpd-lpp-svg" aria-hidden="true" focusable="false" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
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
