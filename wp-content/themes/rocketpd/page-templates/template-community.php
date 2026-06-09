<?php
/**
 * Template Name: RocketPD Community
 * Description: ACF-powered RocketPD Community page template.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'rocketpd_community_value_is_blank' ) ) {
	/**
	 * Check whether a Community field value is effectively blank.
	 *
	 * @param mixed $value Value to inspect.
	 * @return bool
	 */
	function rocketpd_community_value_is_blank( $value ) {
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
				if ( ! rocketpd_community_value_is_blank( $item ) ) {
					return false;
				}
			}

			return true;
		}

		return false;
	}
}

if ( ! function_exists( 'rocketpd_community_get_field' ) ) {
	/**
	 * Get a Community ACF field with a complete fallback.
	 *
	 * @param string $field_name Field name.
	 * @param mixed  $fallback   Fallback value.
	 * @return mixed
	 */
	function rocketpd_community_get_field( $field_name, $fallback = '' ) {
		$value = function_exists( 'rocketpd_get_field' ) ? rocketpd_get_field( $field_name, null ) : null;

		return rocketpd_community_value_is_blank( $value ) ? $fallback : $value;
	}
}

if ( ! function_exists( 'rocketpd_community_get_rows' ) ) {
	/**
	 * Get meaningful Community repeater rows with fallback rows.
	 *
	 * @param string $field_name Field name.
	 * @param array  $fallback   Fallback rows.
	 * @param array  $keys       Keys that make a row meaningful.
	 * @return array
	 */
	function rocketpd_community_get_rows( $field_name, $fallback = array(), $keys = array() ) {
		$rows = rocketpd_community_get_field( $field_name, $fallback );

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
				if ( isset( $row[ $key ] ) && ! rocketpd_community_value_is_blank( $row[ $key ] ) ) {
					$filtered[] = $row;
					break;
				}
			}
		}

		return $filtered ?: $fallback;
	}
}

if ( ! function_exists( 'rocketpd_community_icon' ) ) {
	/**
	 * Render a decorative inline icon.
	 *
	 * @param string $name Icon key.
	 * @return void
	 */
	function rocketpd_community_icon( $name = 'sparkles' ) {
		$paths = array(
			'arrow'        => '<path d="M5 12h14"></path><path d="m13 5 7 7-7 7"></path>',
			'bell'         => '<path d="M10.3 21a2 2 0 0 0 3.4 0"></path><path d="M4 17h16"></path><path d="M5.5 17c1.1-1.4 1.5-2.8 1.5-5a5 5 0 0 1 10 0c0 2.2.4 3.6 1.5 5"></path>',
			'book'         => '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M4 4.5A2.5 2.5 0 0 1 6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5Z"></path>',
			'building'     => '<rect x="4" y="3" width="16" height="18" rx="2"></rect><path d="M9 21v-4h6v4"></path><path d="M8 7h.01M12 7h.01M16 7h.01M8 11h.01M12 11h.01M16 11h.01M8 15h.01M16 15h.01"></path>',
			'calendar'     => '<rect x="3" y="4" width="18" height="18" rx="2"></rect><path d="M16 2v4M8 2v4M3 10h18"></path>',
			'check'        => '<path d="m20 6-11 11-5-5"></path>',
			'clipboard'    => '<rect x="8" y="2" width="8" height="4" rx="1"></rect><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><path d="m9 14 2 2 4-4"></path>',
			'clock'        => '<circle cx="12" cy="12" r="10"></circle><path d="M12 6v6l4 2"></path>',
			'coffee'       => '<path d="M10 2v2M14 2v2M16 8H4v7a4 4 0 0 0 4 4h5a4 4 0 0 0 4-4v-1h1a3 3 0 0 0 0-6h-1Z"></path><path d="M6 2v2"></path>',
			'compass'      => '<circle cx="12" cy="12" r="10"></circle><path d="m16 8-2 6-6 2 2-6 6-2Z"></path>',
			'graduation'   => '<path d="M22 10 12 5 2 10l10 5 10-5Z"></path><path d="M6 12v5c3 2 9 2 12 0v-5"></path>',
			'heart'        => '<path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 1 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z"></path>',
			'message'      => '<path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4Z"></path>',
			'mic'          => '<path d="M12 2a3 3 0 0 0-3 3v7a3 3 0 0 0 6 0V5a3 3 0 0 0-3-3Z"></path><path d="M19 10v2a7 7 0 0 1-14 0v-2"></path><path d="M12 19v3"></path>',
			'play'         => '<circle cx="12" cy="12" r="10"></circle><path d="m10 8 6 4-6 4V8Z"></path>',
			'rocket'       => '<path d="M4.5 16.5c-1.5 1.3-2 3.3-2 5 1.7 0 3.7-.5 5-2"></path><path d="M9 15 6 18"></path><path d="M15 9l-6 6"></path><path d="M9 15H4l5-10c2-3 6-3 11-3 0 5 0 9-3 11L7 18v-5"></path>',
			'send'         => '<path d="m22 2-7 20-4-9-9-4 20-7Z"></path><path d="M22 2 11 13"></path>',
			'sparkles'     => '<path d="m12 3 1.8 5.2L19 10l-5.2 1.8L12 17l-1.8-5.2L5 10l5.2-1.8L12 3Z"></path><path d="m19 15 .8 2.2L22 18l-2.2.8L19 21l-.8-2.2L16 18l2.2-.8L19 15Z"></path>',
			'star'         => '<path d="m12 2 3.1 6.3 6.9 1-5 4.9 1.2 6.8-6.2-3.3L5.8 21 7 14.2 2 9.3l6.9-1L12 2Z"></path>',
			'tag'          => '<path d="M12 2H2v10l9.3 9.3a2.4 2.4 0 0 0 3.4 0l6.6-6.6a2.4 2.4 0 0 0 0-3.4Z"></path><circle cx="7" cy="7" r="1"></circle>',
			'ticket'       => '<path d="M2 9a3 3 0 0 0 0 6v3a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-3a3 3 0 0 0 0-6V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"></path><path d="M13 5v2M13 17v2M13 11v2"></path>',
			'trend'        => '<path d="m3 17 6-6 4 4 8-8"></path><path d="M14 7h7v7"></path>',
			'users'        => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>',
			'wrench'       => '<path d="M14.7 6.3a4 4 0 0 0-5.4 5.4L3 18l3 3 6.3-6.3a4 4 0 0 0 5.4-5.4l-3 3-2-2 3-3Z"></path>',
		);
		$path  = isset( $paths[ $name ] ) ? $paths[ $name ] : $paths['sparkles'];

		echo '<svg class="rpd-community-svg" aria-hidden="true" focusable="false" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

get_header();

while ( have_posts() ) {
	the_post();
	?>
	<main id="primary" class="rpd-site-main rpd-community-page rpd-community">
		<?php
		get_template_part( 'template-parts/pages/community/hero' );
		get_template_part( 'template-parts/pages/community/intro' );
		get_template_part( 'template-parts/pages/community/includes' );
		get_template_part( 'template-parts/pages/community/benefits' );
		get_template_part( 'template-parts/pages/community/practice' );
		get_template_part( 'template-parts/pages/community/resources' );
		get_template_part( 'template-parts/pages/community/flexible-learning' );
		get_template_part( 'template-parts/pages/community/topic-request' );
		get_template_part( 'template-parts/pages/community/pathways' );
		get_template_part( 'template-parts/pages/community/network' );
		get_template_part( 'template-parts/pages/community/final-cta' );
		?>
	</main>
	<?php
}

get_footer();
