<?php
/**
 * Template Name: RocketPD About
 * Description: ACF-powered RocketPD About page template.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'rocketpd_about_value_is_blank' ) ) {
	/**
	 * Determine whether an About field value is effectively blank.
	 *
	 * @param mixed $value Value to inspect.
	 * @return bool
	 */
	function rocketpd_about_value_is_blank( $value ) {
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
				if ( ! rocketpd_about_value_is_blank( $item ) ) {
					return false;
				}
			}

			return true;
		}

		return false;
	}
}

if ( ! function_exists( 'rocketpd_about_get_field' ) ) {
	/**
	 * Get an About ACF field with handoff fallback content.
	 *
	 * @param string $field_name Field name.
	 * @param mixed  $fallback   Fallback value.
	 * @return mixed
	 */
	function rocketpd_about_get_field( $field_name, $fallback = '' ) {
		$value = function_exists( 'rocketpd_get_field' ) ? rocketpd_get_field( $field_name, null ) : null;

		return rocketpd_about_value_is_blank( $value ) ? $fallback : $value;
	}
}

if ( ! function_exists( 'rocketpd_about_get_rows' ) ) {
	/**
	 * Get meaningful About repeater rows with fallback rows.
	 *
	 * @param string $field_name Field name.
	 * @param array  $fallback   Fallback rows.
	 * @param array  $keys       Keys that make a row meaningful.
	 * @return array
	 */
	function rocketpd_about_get_rows( $field_name, $fallback = array(), $keys = array() ) {
		$rows = rocketpd_about_get_field( $field_name, $fallback );

		if ( ! is_array( $rows ) ) {
			return $fallback;
		}

		$filtered = array();

		foreach ( $rows as $row ) {
			if ( ! is_array( $row ) ) {
				continue;
			}

			$keys_to_check = $keys ?: array_keys( $row );

			foreach ( $keys_to_check as $key ) {
				if ( isset( $row[ $key ] ) && ! rocketpd_about_value_is_blank( $row[ $key ] ) ) {
					$filtered[] = $row;
					break;
				}
			}
		}

		return $filtered ?: $fallback;
	}
}

if ( ! function_exists( 'rocketpd_about_asset' ) ) {
	/**
	 * Return an About page asset URL.
	 *
	 * @param string $file File name.
	 * @return string
	 */
	function rocketpd_about_asset( $file ) {
		return get_template_directory_uri() . '/assets/images/about/' . ltrim( $file, '/' );
	}
}

if ( ! function_exists( 'rocketpd_about_image_url' ) ) {
	/**
	 * Resolve an ACF image field to a URL.
	 *
	 * @param mixed  $image    ACF image value.
	 * @param string $fallback Fallback URL.
	 * @param string $size     Image size.
	 * @return string
	 */
	function rocketpd_about_image_url( $image, $fallback = '', $size = 'large' ) {
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

		if ( is_string( $image ) && '' !== trim( $image ) ) {
			if ( 0 === strpos( $image, 'http' ) || 0 === strpos( $image, '/' ) ) {
				return $image;
			}

			return rocketpd_about_asset( $image );
		}

		return $fallback;
	}
}

if ( ! function_exists( 'rocketpd_about_icon' ) ) {
	/**
	 * Render a decorative inline lucide-style icon.
	 *
	 * @param string $name Icon key.
	 * @return void
	 */
	function rocketpd_about_icon( $name = 'target' ) {
		$normalized = strtolower( preg_replace( '/[^a-zA-Z0-9]+/', '', $name ) );
		$paths      = array(
			'check'         => '<path d="m20 6-11 11-5-5"></path>',
			'globe'         => '<circle cx="12" cy="12" r="10"></circle><path d="M2 12h20"></path><path d="M12 2a15.3 15.3 0 0 1 0 20"></path><path d="M12 2a15.3 15.3 0 0 0 0 20"></path>',
			'graduationcap' => '<path d="M22 10 12 5 2 10l10 5 10-5Z"></path><path d="M6 12v5c3 2 9 2 12 0v-5"></path>',
			'heart'         => '<path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 1 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z"></path>',
			'rocket'        => '<path d="M4.5 16.5c-1.5 1.3-2 3.3-2 5 1.7 0 3.7-.5 5-2"></path><path d="M9 15 6 18"></path><path d="M15 9l-6 6"></path><path d="M9 15H4l5-10c2-3 6-3 11-3 0 5 0 9-3 11L7 18v-5"></path>',
			'target'        => '<circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle>',
			'users'         => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>',
		);
		$path       = isset( $paths[ $normalized ] ) ? $paths[ $normalized ] : $paths['target'];

		echo '<svg class="rpd-about-svg" aria-hidden="true" focusable="false" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

get_header();

while ( have_posts() ) {
	the_post();
	?>
	<main id="primary" class="rpd-site-main rpd-about-page">
		<?php
		get_template_part( 'template-parts/pages/about/hero' );
		get_template_part( 'template-parts/pages/about/intro' );
		get_template_part( 'template-parts/pages/about/focus' );
		get_template_part( 'template-parts/pages/about/checklist' );
		get_template_part( 'template-parts/pages/about/district-leaders' );
		get_template_part( 'template-parts/pages/about/community-platform' );
		get_template_part( 'template-parts/pages/about/founders' );
		get_template_part( 'template-parts/pages/about/team' );
		get_template_part( 'template-parts/pages/about/board' );
		get_template_part( 'template-parts/pages/about/final-cta' );
		?>
	</main>
	<?php
}

get_footer();
