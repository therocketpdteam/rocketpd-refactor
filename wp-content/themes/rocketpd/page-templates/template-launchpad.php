<?php
/**
 * Template Name: RocketPD LaunchPad
 * Description: Replit-handoff rebuild of the RocketPD LaunchPad page.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'rocketpd_lp_value_is_blank' ) ) {
	/**
	 * Determine whether a LaunchPad ACF value is effectively blank.
	 *
	 * ACF repeaters can return rows whose subfields are all empty. Treat those
	 * as blank so the Replit fallback content still renders.
	 *
	 * @param mixed $value Value to inspect.
	 * @return bool
	 */
	function rocketpd_lp_value_is_blank( $value ) {
		if ( null === $value || false === $value ) {
			return true;
		}

		if ( is_string( $value ) ) {
			return '' === trim( $value );
		}

		if ( is_array( $value ) ) {
			if ( empty( $value ) ) {
				return true;
			}

			foreach ( $value as $item ) {
				if ( ! rocketpd_lp_value_is_blank( $item ) ) {
					return false;
				}
			}

			return true;
		}

		return false;
	}
}

if ( ! function_exists( 'rocketpd_lp_get_field' ) ) {
	/**
	 * Return LaunchPad field content, falling back when saved values are blank.
	 *
	 * @param string $field_name ACF field name.
	 * @param mixed  $fallback   Fallback value.
	 * @return mixed
	 */
	function rocketpd_lp_get_field( $field_name, $fallback = '' ) {
		$value = function_exists( 'rocketpd_get_field' ) ? rocketpd_get_field( $field_name, null ) : null;

		if ( rocketpd_lp_value_is_blank( $value ) ) {
			return $fallback;
		}

		return $value;
	}
}

if ( ! function_exists( 'rocketpd_lp_asset' ) ) {
	/**
	 * Get a LaunchPad image URI.
	 *
	 * @param string $file Asset file name.
	 * @return string
	 */
	function rocketpd_lp_asset( $file ) {
		return get_template_directory_uri() . '/assets/images/launchpad/' . ltrim( $file, '/' );
	}
}

if ( ! function_exists( 'rocketpd_lp_image_url' ) ) {
	/**
	 * Resolve an ACF image value to a URL.
	 *
	 * @param mixed   $image    ACF image field value.
	 * @param string  $fallback Fallback URL.
	 * @param string  $size     Image size.
	 * @return string
	 */
	function rocketpd_lp_image_url( $image, $fallback = '', $size = 'large' ) {
		if ( is_array( $image ) ) {
			if ( ! empty( $image['sizes'][ $size ] ) ) {
				return $image['sizes'][ $size ];
			}

			if ( ! empty( $image['url'] ) ) {
				return $image['url'];
			}
		}

		if ( is_numeric( $image ) ) {
			$url = wp_get_attachment_image_url( (int) $image, $size );
			if ( $url ) {
				return $url;
			}
		}

		if ( is_string( $image ) && '' !== $image ) {
			if ( 0 === strpos( $image, 'http' ) || 0 === strpos( $image, '/' ) ) {
				return $image;
			}

			return rocketpd_lp_asset( $image );
		}

		return $fallback;
	}
}

if ( ! function_exists( 'rocketpd_lp_icon' ) ) {
	/**
	 * Render a small inline icon.
	 *
	 * @param string $name Icon key.
	 * @return void
	 */
	function rocketpd_lp_icon( $name = 'sparkles' ) {
		$paths = array(
			'arrow'      => '<path d="M5 12h14"></path><path d="m13 5 7 7-7 7"></path>',
			'award'      => '<circle cx="12" cy="8" r="6"></circle><path d="M15.5 13 17 22l-5-3-5 3 1.5-9"></path>',
			'book'       => '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M4 4.5A2.5 2.5 0 0 1 6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5Z"></path>',
			'briefcase'  => '<rect x="2" y="7" width="20" height="14" rx="2"></rect><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"></path><path d="M2 12h20"></path>',
			'building'   => '<rect x="4" y="3" width="16" height="18" rx="2"></rect><path d="M9 21v-4h6v4"></path><path d="M8 7h.01M12 7h.01M16 7h.01M8 11h.01M12 11h.01M16 11h.01M8 15h.01M16 15h.01"></path>',
			'calendar'   => '<rect x="3" y="4" width="18" height="18" rx="2"></rect><path d="M16 2v4M8 2v4M3 10h18"></path>',
			'chart'      => '<path d="M3 3v18h18"></path><path d="M7 16V9M12 16V5M17 16v-3"></path>',
			'check'      => '<path d="m20 6-11 11-5-5"></path>',
			'clipboard'  => '<rect x="8" y="2" width="8" height="4" rx="1"></rect><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><path d="m9 14 2 2 4-4"></path>',
			'compass'    => '<circle cx="12" cy="12" r="10"></circle><path d="m16 8-2 6-6 2 2-6 6-2Z"></path>',
			'file'       => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"></path><path d="M14 2v6h6"></path><path d="M16 13H8M16 17H8M10 9H8"></path>',
			'graduation' => '<path d="M22 10 12 5 2 10l10 5 10-5Z"></path><path d="M6 12v5c3 2 9 2 12 0v-5"></path>',
			'heart'      => '<path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 1 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z"></path>',
			'layers'     => '<path d="m12 2 9 5-9 5-9-5 9-5Z"></path><path d="m3 12 9 5 9-5"></path><path d="m3 17 9 5 9-5"></path>',
			'library'    => '<path d="M16 6 8 3v18l8-3V6Z"></path><path d="M16 6h3a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-3"></path><path d="M8 6H5a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h3"></path>',
			'lightbulb'  => '<path d="M15 14c.2-1 .7-1.7 1.4-2.5A6 6 0 1 0 7.6 11.5C8.3 12.3 8.8 13 9 14"></path><path d="M9 18h6M10 22h4M10 14h4"></path>',
			'network'    => '<circle cx="12" cy="5" r="3"></circle><circle cx="5" cy="19" r="3"></circle><circle cx="19" cy="19" r="3"></circle><path d="M10.5 7.5 6.5 16M13.5 7.5l4 8.5M8 19h8"></path>',
			'play'       => '<circle cx="12" cy="12" r="10"></circle><path d="m10 8 6 4-6 4V8Z"></path>',
			'quote'      => '<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.75-2-2-2H4c-1.25 0-2 .75-2 2v6c0 1.25.75 2 2 2h2c0 4-1 6-3 8Z"></path><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.75-2-2-2h-4c-1.25 0-2 .75-2 2v6c0 1.25.75 2 2 2h2c0 4-1 6-3 8Z"></path>',
			'search'     => '<circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path>',
			'shield'     => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"></path><path d="m9 12 2 2 4-4"></path>',
			'sparkles'   => '<path d="m12 3 1.8 5.2L19 10l-5.2 1.8L12 17l-1.8-5.2L5 10l5.2-1.8L12 3Z"></path><path d="m19 15 .8 2.2L22 18l-2.2.8L19 21l-.8-2.2L16 18l2.2-.8L19 15Z"></path>',
			'target'     => '<circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle>',
			'trend'      => '<path d="m3 17 6-6 4 4 8-8"></path><path d="M14 7h7v7"></path>',
			'users'      => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>',
			'workflow'   => '<path d="M6 3v6a3 3 0 0 0 3 3h6"></path><path d="M18 21v-6a3 3 0 0 0-3-3H9"></path><circle cx="6" cy="3" r="2"></circle><circle cx="18" cy="21" r="2"></circle><circle cx="18" cy="12" r="2"></circle>',
			'x'          => '<path d="M18 6 6 18M6 6l12 12"></path>',
			'zap'        => '<path d="M13 2 3 14h8l-1 8 11-14h-8l1-6Z"></path>',
		);
		$path  = isset( $paths[ $name ] ) ? $paths[ $name ] : $paths['sparkles'];

		echo '<svg class="rpd-lp-svg" aria-hidden="true" focusable="false" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

get_header();

while ( have_posts() ) {
	the_post();
	?>
	<main id="primary" class="rpd-site-main rpd-launchpad-page">
		<?php
		get_template_part( 'template-parts/pages/launchpad/section', '02-hero' );
		get_template_part( 'template-parts/pages/launchpad/section', '03-trust' );
		get_template_part( 'template-parts/pages/launchpad/section', '04-problem' );
		get_template_part( 'template-parts/pages/launchpad/section', '05-evolution' );
		get_template_part( 'template-parts/pages/launchpad/section', '06-product-experience' );
		get_template_part( 'template-parts/pages/launchpad/section', '07-whats-inside' );
		get_template_part( 'template-parts/pages/launchpad/section', '08-implementation' );
		get_template_part( 'template-parts/pages/launchpad/section', '09-outcomes' );
		get_template_part( 'template-parts/pages/launchpad/section', '10-stories' );
		get_template_part( 'template-parts/pages/launchpad/section', '11-community' );
		get_template_part( 'template-parts/pages/launchpad/section', '17-courses' );
		get_template_part( 'template-parts/pages/launchpad/section', '13-transition' );
		get_template_part( 'template-parts/pages/launchpad/section', '14-comparison' );
		get_template_part( 'template-parts/pages/launchpad/section', '12-instructors' );
		get_template_part( 'template-parts/pages/launchpad/section', '15-partners' );
		get_template_part( 'template-parts/pages/launchpad/section', '16-final-cta' );
		?>
	</main>
	<?php
}

get_footer();
