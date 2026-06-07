<?php
/**
 * Cohorts Index seed data and helpers.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return true on the Cohorts Index template/page.
 *
 * @return bool
 */
function rocketpd_is_cohorts_context() {
	return is_page_template( 'page-templates/template-cohorts.php' ) || is_page( 'cohorts' );
}

/**
 * Return Cohort status display metadata.
 *
 * @return array
 */
function rocketpd_get_cohort_status_meta() {
	return array(
		'registration-open' => array(
			'label' => __( 'Registration Open', 'rocketpd' ),
			'tone'  => 'emerald',
		),
		'nearly-full'       => array(
			'label' => __( 'Nearly Full', 'rocketpd' ),
			'tone'  => 'gold',
		),
		'waitlist'          => array(
			'label' => __( 'Waitlist Open', 'rocketpd' ),
			'tone'  => 'magenta',
		),
		'closed'            => array(
			'label' => __( 'Registration Closed', 'rocketpd' ),
			'tone'  => 'lavender',
		),
		'new'               => array(
			'label' => __( 'New Cohort', 'rocketpd' ),
			'tone'  => 'blue',
		),
	);
}

/**
 * Return one Cohort status record.
 *
 * @param string $status Status key.
 * @return array
 */
function rocketpd_get_cohort_status( $status ) {
	$statuses = rocketpd_get_cohort_status_meta();

	return isset( $statuses[ $status ] ) ? $statuses[ $status ] : $statuses['registration-open'];
}

/**
 * Return Cohort Index fallback data.
 *
 * @return array
 */
function rocketpd_get_cohorts() {
	$base      = '/wp-content/uploads/';
	$image_for = function ( $slug ) {
		if ( ! function_exists( 'rocketpd_get_instructor_by_slug' ) ) {
			return '';
		}

		$instructor = rocketpd_get_instructor_by_slug( $slug );

		return ! empty( $instructor['headshot'] ) ? $instructor['headshot'] : '';
	};

	$kim_image     = $image_for( 'kim-marshall' ) ?: $base . '2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg';

	return array(
		array(
			'slug'                     => 'rethinking-teacher-supervision-coaching-evaluation',
			'title'                    => __( 'Rethinking Teacher Supervision, Coaching & Evaluation', 'rocketpd' ),
			'cohort_subtitle'          => __( 'Design a modern mini-observation system with Kim Marshall.', 'rocketpd' ),
			'cohort_short_description' => __( 'An 8-session deep-dive cohort with Kim Marshall: design and implement a sustainable mini-observation system with weekly expert coaching.', 'rocketpd' ),
			'cohort_topic'             => __( 'Teacher Evaluation', 'rocketpd' ),
			'cohort_audience'          => array( __( 'Principals', 'rocketpd' ), __( 'District Leaders', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ) ),
			'cohort_status'            => 'registration-open',
			'featured_toggle'          => true,
			'start_date'               => '2026-09-15',
			'end_date'                 => '2026-11-03',
			'session_count'            => 8,
			'session_count_label'      => __( '8 live sessions', 'rocketpd' ),
			'total_hours'              => __( '12 hours', 'rocketpd' ),
			'format_label'             => __( '90 min · Live via Zoom', 'rocketpd' ),
			'price_type'               => 'paid',
			'price_label'              => __( '$795/person', 'rocketpd' ),
			'price_amount'             => 795,
			'instructor'               => array(
				'name'     => __( 'Kim Marshall', 'rocketpd' ),
				'title'    => __( 'Marshall Memo Founder · K-12 Leadership', 'rocketpd' ),
				'headshot' => $kim_image,
			),
			'card_image'               => $kim_image,
			'sponsor_enabled'          => false,
			'sponsor_name'             => '',
			'href'                     => home_url( '/cohorts/rethinking-teacher-supervision-coaching-evaluation/' ),
		),
	);
}

/**
 * Return fallback cohorts sorted for display.
 *
 * @return array
 */
function rocketpd_get_sorted_cohorts() {
	$cohorts = rocketpd_get_cohorts();

	usort(
		$cohorts,
		function ( $a, $b ) {
			if ( ! empty( $a['featured_toggle'] ) !== ! empty( $b['featured_toggle'] ) ) {
				return ! empty( $a['featured_toggle'] ) ? -1 : 1;
			}

			return strcmp( $a['start_date'] ?? '', $b['start_date'] ?? '' );
		}
	);

	return $cohorts;
}

/**
 * Return featured cohorts.
 *
 * @return array
 */
function rocketpd_get_featured_cohorts() {
	return array_values(
		array_filter(
			rocketpd_get_sorted_cohorts(),
			function ( $cohort ) {
				return ! empty( $cohort['featured_toggle'] );
			}
		)
	);
}

/**
 * Return unique Cohort filter values.
 *
 * @param string $key Cohort key.
 * @return array
 */
function rocketpd_get_cohort_filter_values( $key ) {
	$values = array();

	foreach ( rocketpd_get_cohorts() as $cohort ) {
		$value = $cohort[ $key ] ?? '';

		if ( is_array( $value ) ) {
			$values = array_merge( $values, $value );
			continue;
		}

		if ( $value ) {
			$values[] = $value;
		}
	}

	$values = array_unique( array_filter( $values ) );
	sort( $values );

	return $values;
}

/**
 * Return a session-count length bucket.
 *
 * @param int $count Session count.
 * @return string
 */
function rocketpd_get_cohort_length_bucket( $count ) {
	$count = (int) $count;

	if ( $count <= 3 ) {
		return '1-3';
	}

	if ( $count <= 5 ) {
		return '4-5';
	}

	return '6+';
}

/**
 * Format a Cohort start date.
 *
 * @param string $date Date string.
 * @return string
 */
function rocketpd_format_cohort_start_date( $date ) {
	$timestamp = strtotime( $date );

	return $timestamp ? date_i18n( 'M j, Y', $timestamp ) : '';
}
