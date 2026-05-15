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
	$catlin_image  = $image_for( 'dr-catlin-tucker' );
	$aj_image      = $image_for( 'aj-juliani' );
	$luvelle_image = $image_for( 'dr-luvelle-brown' );

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
		array(
			'slug'                     => 'engaging-every-learner',
			'title'                    => __( 'Engaging Every Learner', 'rocketpd' ),
			'cohort_subtitle'          => __( 'Classroom routines that lift engagement for every learner.', 'rocketpd' ),
			'cohort_short_description' => __( 'A 5-session live cohort with Jennifer Gonzalez on classroom routines that lift engagement for every learner - practical, repeatable, and ready for Monday.', 'rocketpd' ),
			'cohort_topic'             => __( 'Student Engagement', 'rocketpd' ),
			'cohort_audience'          => array( __( 'Teachers', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ) ),
			'cohort_status'            => 'registration-open',
			'featured_toggle'          => true,
			'start_date'               => '2026-10-01',
			'end_date'                 => '2026-10-29',
			'session_count'            => 5,
			'session_count_label'      => __( '5 live sessions', 'rocketpd' ),
			'total_hours'              => __( '6.25 hours', 'rocketpd' ),
			'format_label'             => __( '75 min · Live via Zoom', 'rocketpd' ),
			'price_type'               => 'paid',
			'price_label'              => __( '$495/person', 'rocketpd' ),
			'price_amount'             => 495,
			'instructor'               => array(
				'name'     => __( 'Jennifer Gonzalez', 'rocketpd' ),
				'title'    => __( 'Founder · Cult of Pedagogy', 'rocketpd' ),
				'headshot' => '',
			),
			'card_image'               => '',
			'sponsor_enabled'          => false,
			'sponsor_name'             => '',
			'href'                     => home_url( '/cohorts/engaging-every-learner/' ),
		),
		array(
			'slug'                     => 'designing-station-rotation-lessons-that-work',
			'title'                    => __( 'Designing Station-Rotation Lessons That Work', 'rocketpd' ),
			'cohort_subtitle'          => __( 'Build station-rotation lessons that differentiate instruction.', 'rocketpd' ),
			'cohort_short_description' => __( 'A 3-session live cohort with Dr. Catlin Tucker on building station-rotation lessons that differentiate instruction without doubling your prep time.', 'rocketpd' ),
			'cohort_topic'             => __( 'Instructional Design', 'rocketpd' ),
			'cohort_audience'          => array( __( 'Teachers', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ) ),
			'cohort_status'            => 'nearly-full',
			'featured_toggle'          => true,
			'start_date'               => '2026-09-22',
			'end_date'                 => '2026-10-06',
			'session_count'            => 3,
			'session_count_label'      => __( '3 live sessions', 'rocketpd' ),
			'total_hours'              => __( '3 hours', 'rocketpd' ),
			'format_label'             => __( '60 min · Live via Zoom', 'rocketpd' ),
			'price_type'               => 'paid',
			'price_label'              => __( '$295/person', 'rocketpd' ),
			'price_amount'             => 295,
			'instructor'               => array(
				'name'     => __( 'Dr. Catlin Tucker', 'rocketpd' ),
				'title'    => __( 'Bestselling Author · UDL Practitioner', 'rocketpd' ),
				'headshot' => $catlin_image,
			),
			'card_image'               => $catlin_image,
			'sponsor_enabled'          => false,
			'sponsor_name'             => '',
			'href'                     => home_url( '/cohorts/designing-station-rotation-lessons-that-work/' ),
		),
		array(
			'slug'                     => 'adult-well-being-staff-engagement',
			'title'                    => __( 'Adult Well-Being & Staff Engagement', 'rocketpd' ),
			'cohort_subtitle'          => __( 'Keep great teachers in the building.', 'rocketpd' ),
			'cohort_short_description' => __( 'A 3-session live cohort with Carla Tantillo Philibert on building staff well-being practices that keep great teachers in the building.', 'rocketpd' ),
			'cohort_topic'             => __( 'Adult Well-Being', 'rocketpd' ),
			'cohort_audience'          => array( __( 'Principals', 'rocketpd' ), __( 'Leadership Teams', 'rocketpd' ) ),
			'cohort_status'            => 'closed',
			'featured_toggle'          => false,
			'start_date'               => '2026-09-29',
			'end_date'                 => '2026-10-13',
			'session_count'            => 3,
			'session_count_label'      => __( '3 live sessions', 'rocketpd' ),
			'total_hours'              => __( '3 hours', 'rocketpd' ),
			'format_label'             => __( '60 min · Live via Zoom', 'rocketpd' ),
			'price_type'               => 'paid',
			'price_label'              => __( '$295/person', 'rocketpd' ),
			'price_amount'             => 295,
			'instructor'               => array(
				'name'     => __( 'Carla Tantillo Philibert', 'rocketpd' ),
				'title'    => __( 'SEL Author · Wellness Strategist', 'rocketpd' ),
				'headshot' => $base . '2024/02/dr-carla-tantillo-philibert-rocketpd-instructor.jpg',
			),
			'card_image'               => $base . '2024/02/dr-carla-tantillo-philibert-rocketpd-instructor.jpg',
			'sponsor_enabled'          => false,
			'sponsor_name'             => '',
			'href'                     => home_url( '/cohorts/adult-well-being-staff-engagement/' ),
		),
		array(
			'slug'                     => 'building-your-districts-ai-strategy',
			'title'                    => __( "Building Your District's AI Strategy", 'rocketpd' ),
			'cohort_subtitle'          => __( 'A district leadership cohort for year-one AI decisions.', 'rocketpd' ),
			'cohort_short_description' => __( 'A sponsor-funded 4-session live cohort with A.J. Juliani on what district leaders need to decide - and defer - in their first 12 months with AI.', 'rocketpd' ),
			'cohort_topic'             => __( 'AI in Education', 'rocketpd' ),
			'cohort_audience'          => array( __( 'District Leaders', 'rocketpd' ), __( 'Principals', 'rocketpd' ) ),
			'cohort_status'            => 'new',
			'featured_toggle'          => false,
			'start_date'               => '2026-10-14',
			'end_date'                 => '2026-11-04',
			'session_count'            => 4,
			'session_count_label'      => __( '4 live sessions', 'rocketpd' ),
			'total_hours'              => __( '4 hours', 'rocketpd' ),
			'format_label'             => __( '60 min · Live via Zoom', 'rocketpd' ),
			'price_type'               => 'sponsored',
			'price_label'              => __( 'Sponsored — Free Seats', 'rocketpd' ),
			'price_amount'             => 0,
			'instructor'               => array(
				'name'     => __( 'A.J. Juliani', 'rocketpd' ),
				'title'    => __( 'K-12 AI Strategist · Author', 'rocketpd' ),
				'headshot' => $aj_image,
			),
			'card_image'               => $aj_image,
			'sponsor_enabled'          => true,
			'sponsor_name'             => __( 'Sponsored by EdSurge', 'rocketpd' ),
			'href'                     => home_url( '/cohorts/building-your-districts-ai-strategy/' ),
		),
		array(
			'slug'                     => 'designing-blended-learning-classrooms',
			'title'                    => __( 'Designing Blended Learning Classrooms', 'rocketpd' ),
			'cohort_subtitle'          => __( 'UDL-aligned blended learning models educators can implement.', 'rocketpd' ),
			'cohort_short_description' => __( 'A 5-session live cohort with Dr. Catlin Tucker on UDL-aligned blended learning models educators can implement next quarter.', 'rocketpd' ),
			'cohort_topic'             => __( 'Instructional Design', 'rocketpd' ),
			'cohort_audience'          => array( __( 'Teachers', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ), __( 'Principals', 'rocketpd' ) ),
			'cohort_status'            => 'registration-open',
			'featured_toggle'          => false,
			'start_date'               => '2026-11-04',
			'end_date'                 => '2026-12-09',
			'session_count'            => 5,
			'session_count_label'      => __( '5 live sessions', 'rocketpd' ),
			'total_hours'              => __( '6.25 hours', 'rocketpd' ),
			'format_label'             => __( '75 min · Live via Zoom', 'rocketpd' ),
			'price_type'               => 'paid',
			'price_label'              => __( '$495/person', 'rocketpd' ),
			'price_amount'             => 495,
			'instructor'               => array(
				'name'     => __( 'Dr. Catlin Tucker', 'rocketpd' ),
				'title'    => __( 'UDL Practitioner · Author', 'rocketpd' ),
				'headshot' => $catlin_image,
			),
			'card_image'               => $catlin_image,
			'sponsor_enabled'          => false,
			'sponsor_name'             => '',
			'href'                     => home_url( '/cohorts/designing-blended-learning-classrooms/' ),
		),
		array(
			'slug'                     => 'creating-a-culture-of-love',
			'title'                    => __( 'Creating a Culture of Love (Leadership Cohort)', 'rocketpd' ),
			'cohort_subtitle'          => __( 'A belonging-first leadership cohort for school teams.', 'rocketpd' ),
			'cohort_short_description' => __( 'A 5-session live cohort with Dr. Luvelle Brown for school and district leaders building cultures where every student and educator is seen, heard, and loved.', 'rocketpd' ),
			'cohort_topic'             => __( 'School Culture', 'rocketpd' ),
			'cohort_audience'          => array( __( 'Principals', 'rocketpd' ), __( 'District Leaders', 'rocketpd' ) ),
			'cohort_status'            => 'waitlist',
			'featured_toggle'          => false,
			'start_date'               => '2026-11-12',
			'end_date'                 => '2026-12-17',
			'session_count'            => 5,
			'session_count_label'      => __( '5 live sessions', 'rocketpd' ),
			'total_hours'              => __( '6.25 hours', 'rocketpd' ),
			'format_label'             => __( '75 min · Live via Zoom', 'rocketpd' ),
			'price_type'               => 'paid',
			'price_label'              => __( '$495/person', 'rocketpd' ),
			'price_amount'             => 495,
			'instructor'               => array(
				'name'     => __( 'Dr. Luvelle Brown', 'rocketpd' ),
				'title'    => __( 'Former Superintendent · Equity Leader', 'rocketpd' ),
				'headshot' => $luvelle_image,
			),
			'card_image'               => $luvelle_image,
			'sponsor_enabled'          => false,
			'sponsor_name'             => '',
			'href'                     => home_url( '/cohorts/creating-a-culture-of-love/' ),
		),
		array(
			'slug'                     => 'building-thinking-classrooms-in-mathematics',
			'title'                    => __( 'Building Thinking Classrooms in Mathematics', 'rocketpd' ),
			'cohort_subtitle'          => __( 'Translate BTC practices into implementation-ready routines.', 'rocketpd' ),
			'cohort_short_description' => __( 'A 5-session live cohort with Peter Liljedahl translating the research-backed 14 practices into implementation-ready routines for math teachers.', 'rocketpd' ),
			'cohort_topic'             => __( 'Mathematics Instruction', 'rocketpd' ),
			'cohort_audience'          => array( __( 'Teachers', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ) ),
			'cohort_status'            => 'registration-open',
			'featured_toggle'          => false,
			'start_date'               => '2027-01-13',
			'end_date'                 => '2027-02-10',
			'session_count'            => 5,
			'session_count_label'      => __( '5 live sessions', 'rocketpd' ),
			'total_hours'              => __( '6.25 hours', 'rocketpd' ),
			'format_label'             => __( '75 min · Live via Zoom', 'rocketpd' ),
			'price_type'               => 'paid',
			'price_label'              => __( '$495/person', 'rocketpd' ),
			'price_amount'             => 495,
			'instructor'               => array(
				'name'     => __( 'Peter Liljedahl', 'rocketpd' ),
				'title'    => __( 'Researcher · Math Education', 'rocketpd' ),
				'headshot' => $base . '2024/03/Peter_Liljedahl.jpg',
			),
			'card_image'               => $base . '2024/03/Peter_Liljedahl.jpg',
			'sponsor_enabled'          => false,
			'sponsor_name'             => '',
			'href'                     => home_url( '/cohorts/building-thinking-classrooms-in-mathematics/' ),
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
