<?php
/**
 * Course Index seed data and helpers.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the format metadata used across the Course Index.
 *
 * @return array
 */
function rocketpd_get_course_format_meta() {
	return array(
		'webinar'    => array(
			'label'          => __( 'Free Webinar', 'rocketpd' ),
			'plural'         => __( 'Free Webinars', 'rocketpd' ),
			'group_label'    => __( 'Free Webinars', 'rocketpd' ),
			'group_subtitle' => __( 'On-demand expert conversations - watch any time, no card required.', 'rocketpd' ),
			'tone'           => 'emerald',
			'icon'           => 'play',
			'cta'            => __( 'Watch Free', 'rocketpd' ),
		),
		'self-paced' => array(
			'label'          => __( 'Self-Paced Course', 'rocketpd' ),
			'plural'         => __( 'Self-Paced Courses', 'rocketpd' ),
			'group_label'    => __( 'Self-Paced Courses', 'rocketpd' ),
			'group_subtitle' => __( 'Expert-led video modules + workbook + certificate. Learn on your schedule.', 'rocketpd' ),
			'tone'           => 'gold',
			'icon'           => 'layers',
			'cta'            => __( 'Start Course', 'rocketpd' ),
		),
		'cohort'     => array(
			'label'          => __( 'Live-Virtual Cohort', 'rocketpd' ),
			'plural'         => __( 'Live-Virtual Cohorts', 'rocketpd' ),
			'group_label'    => __( 'Live-Virtual Cohorts', 'rocketpd' ),
			'group_subtitle' => __( 'Multi-session live programs with direct expert guidance and a peer cohort.', 'rocketpd' ),
			'tone'           => 'blue',
			'icon'           => 'calendar',
			'cta'            => __( 'Reserve a Seat', 'rocketpd' ),
		),
	);
}

/**
 * Return one course format record.
 *
 * @param string $format Format key.
 * @return array
 */
function rocketpd_get_course_format( $format ) {
	$formats = rocketpd_get_course_format_meta();

	return isset( $formats[ $format ] ) ? $formats[ $format ] : $formats['self-paced'];
}

/**
 * Return the Course Index fallback data contract.
 *
 * @return array
 */
function rocketpd_get_courses() {
	$base = '/wp-content/uploads/';

	return array(
		array(
			'slug'           => 'mini-observations-that-actually-move-teaching',
			'title'          => __( 'Mini-Observations That Actually Move Teaching', 'rocketpd' ),
			'instructor'     => __( 'Kim Marshall', 'rocketpd' ),
			'instructorSlug' => 'kim-marshall',
			'headshot'       => $base . '2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg',
			'image'          => $base . '2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg',
			'format'         => 'webinar',
			'price'          => __( 'Free', 'rocketpd' ),
			'topic'          => __( 'Teacher Evaluation', 'rocketpd' ),
			'audiences'      => array( __( 'Principals', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ) ),
			'description'    => __( 'A 56-minute working session with Kim on building a sustainable system of short, unannounced classroom visits that improve teaching at scale.', 'rocketpd' ),
			'meta'           => __( 'Webinar · 56 min · On-demand', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/mini-observations-that-actually-move-teaching/' ),
		),
		array(
			'slug'           => 'building-your-districts-ai-strategy',
			'title'          => __( "Building Your District's AI Strategy", 'rocketpd' ),
			'instructor'     => __( 'A.J. Juliani', 'rocketpd' ),
			'instructorSlug' => 'aj-juliani',
			'headshot'       => $base . '2024/02/aj-juliani-rocketpd-instructor.jpg',
			'image'          => $base . '2024/02/aj-juliani-rocketpd-instructor.jpg',
			'format'         => 'webinar',
			'price'          => __( 'Free', 'rocketpd' ),
			'topic'          => __( 'AI in Education', 'rocketpd' ),
			'audiences'      => array( __( 'District Leaders', 'rocketpd' ), __( 'Principals', 'rocketpd' ), __( 'Teachers', 'rocketpd' ) ),
			'description'    => __( 'A practical conversation with A.J. on what district leaders need to decide - and what they should defer - in their first 12 months with AI.', 'rocketpd' ),
			'meta'           => __( 'Webinar · 48 min · On-demand', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/building-your-districts-ai-strategy/' ),
		),
		array(
			'slug'           => 'action-oriented-family-engagement',
			'title'          => __( 'Action-Oriented Family Engagement', 'rocketpd' ),
			'instructor'     => __( 'Dr. Steve Constantino', 'rocketpd' ),
			'instructorSlug' => 'steve-constantino',
			'headshot'       => $base . '2023/05/dr-steve-constantino.jpg',
			'image'          => $base . '2023/06/steve-constantino-launchpad-thumbnail-300x225.jpg',
			'format'         => 'webinar',
			'price'          => __( 'Free', 'rocketpd' ),
			'topic'          => __( 'Family Engagement', 'rocketpd' ),
			'audiences'      => array( __( 'Principals', 'rocketpd' ), __( 'District Leaders', 'rocketpd' ) ),
			'description'    => __( 'Move beyond bake sales and parent nights - Dr. Constantino on what actually moves the needle for family-school partnership.', 'rocketpd' ),
			'meta'           => __( 'Webinar · 52 min · On-demand', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/action-oriented-family-engagement/' ),
		),
		array(
			'slug'           => 'rethinking-teacher-supervision-coaching-evaluation',
			'title'          => __( 'Rethinking Teacher Supervision, Coaching & Evaluation', 'rocketpd' ),
			'instructor'     => __( 'Kim Marshall', 'rocketpd' ),
			'instructorSlug' => 'kim-marshall',
			'headshot'       => $base . '2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg',
			'image'          => $base . '2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg',
			'format'         => 'self-paced',
			'price'          => __( '$49', 'rocketpd' ),
			'topic'          => __( 'Teacher Evaluation', 'rocketpd' ),
			'audiences'      => array( __( 'Principals', 'rocketpd' ), __( 'District Leaders', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ) ),
			'description'    => __( 'Reduce evaluation stress, build teacher trust, and make feedback more frequent, practical, and useful.', 'rocketpd' ),
			'meta'           => __( '5 modules · 1 hour · Workbook included', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/rethinking-teacher-supervision-coaching-evaluation/' ),
		),
		array(
			'slug'           => 'creating-a-culture-of-love',
			'title'          => __( 'Creating a Culture of Love', 'rocketpd' ),
			'instructor'     => __( 'Dr. Luvelle Brown', 'rocketpd' ),
			'instructorSlug' => 'dr-luvelle-brown',
			'headshot'       => $base . '2024/04/dr-luvelle-brown-rocketpd-instructor.jpg',
			'image'          => $base . '2024/04/dr-luvelle-brown-rocketpd-instructor.jpg',
			'format'         => 'self-paced',
			'price'          => __( '$49', 'rocketpd' ),
			'topic'          => __( 'School Culture', 'rocketpd' ),
			'audiences'      => array( __( 'Principals', 'rocketpd' ), __( 'District Leaders', 'rocketpd' ) ),
			'description'    => __( 'Design schools where students and educators are seen, heard, and loved - a leadership system rooted in human dignity.', 'rocketpd' ),
			'meta'           => __( '5 modules · 1 hour · Workbook included', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/creating-a-culture-of-love/' ),
		),
		array(
			'slug'           => 'blended-learning-universal-design-for-learning',
			'title'          => __( 'Blended Learning & Universal Design for Learning', 'rocketpd' ),
			'instructor'     => __( 'Dr. Catlin Tucker', 'rocketpd' ),
			'instructorSlug' => 'dr-catlin-tucker',
			'headshot'       => $base . '2024/04/dr-catlin-tucker-rocketpd-instructor-blended-learning.jpg',
			'image'          => $base . '2024/04/dr-catlin-tucker-rocketpd-instructor-blended-learning.jpg',
			'format'         => 'self-paced',
			'price'          => __( '$49', 'rocketpd' ),
			'topic'          => __( 'Instructional Design', 'rocketpd' ),
			'audiences'      => array( __( 'Teachers', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ) ),
			'description'    => __( 'Pioneer blended learning in K-12 classrooms with practical UDL frameworks that meet every learner where they are.', 'rocketpd' ),
			'meta'           => __( '5 modules · 1 hour · Workbook included', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/blended-learning-universal-design-for-learning/' ),
		),
		array(
			'slug'           => 'artificial-intelligence-in-k-12-schools',
			'title'          => __( 'Artificial Intelligence in K-12 Schools', 'rocketpd' ),
			'instructor'     => __( 'A.J. Juliani', 'rocketpd' ),
			'instructorSlug' => 'aj-juliani',
			'headshot'       => $base . '2024/02/aj-juliani-rocketpd-instructor.jpg',
			'image'          => $base . '2024/02/aj-juliani-rocketpd-instructor.jpg',
			'format'         => 'self-paced',
			'price'          => __( '$49', 'rocketpd' ),
			'topic'          => __( 'AI in Education', 'rocketpd' ),
			'audiences'      => array( __( 'Teachers', 'rocketpd' ), __( 'Principals', 'rocketpd' ), __( 'District Leaders', 'rocketpd' ) ),
			'description'    => __( 'Build a practical, ethical AI strategy for your classroom or district - without losing the human at the center of learning.', 'rocketpd' ),
			'meta'           => __( '5 modules · 1 hour · Workbook included', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/artificial-intelligence-in-k-12-schools/' ),
		),
		array(
			'slug'           => 'building-thinking-classrooms-in-mathematics',
			'title'          => __( 'Building Thinking Classrooms in Mathematics', 'rocketpd' ),
			'instructor'     => __( 'Peter Liljedahl', 'rocketpd' ),
			'instructorSlug' => 'peter-liljedahl',
			'headshot'       => $base . '2024/03/Peter_Liljedahl.jpg',
			'image'          => $base . '2025/03/RPD-ThoughtLeader-HERO_Liljedahl.jpg',
			'format'         => 'self-paced',
			'price'          => __( '$49', 'rocketpd' ),
			'topic'          => __( 'Mathematics Instruction', 'rocketpd' ),
			'audiences'      => array( __( 'Teachers', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ) ),
			'description'    => __( "Transform passive math classrooms into thinking classrooms - Peter's research-backed practices, made implementation-ready.", 'rocketpd' ),
			'meta'           => __( '5 modules · 1 hour · Workbook included', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/building-thinking-classrooms-in-mathematics/' ),
		),
		array(
			'slug'           => 'adult-well-being-staff-engagement',
			'title'          => __( 'Adult Well-Being & Staff Engagement', 'rocketpd' ),
			'instructor'     => __( 'Carla Tantillo Philibert', 'rocketpd' ),
			'instructorSlug' => 'carla-tantillo-philibert',
			'headshot'       => $base . '2024/02/dr-carla-tantillo-philibert-rocketpd-instructor.jpg',
			'image'          => $base . '2024/03/carla-tantillo-philibert-video-course.png',
			'format'         => 'self-paced',
			'price'          => __( '$49', 'rocketpd' ),
			'topic'          => __( 'Adult Well-Being', 'rocketpd' ),
			'audiences'      => array( __( 'Principals', 'rocketpd' ), __( 'Leadership Teams', 'rocketpd' ), __( 'Teachers', 'rocketpd' ) ),
			'description'    => __( 'Build the staff well-being practices that keep great teachers in the building - practical, evidence-based, ready Monday morning.', 'rocketpd' ),
			'meta'           => __( '5 modules · 1 hour · Workbook included', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/adult-well-being-staff-engagement/' ),
		),
		array(
			'slug'           => 'mini-observations-mastery-live-cohort',
			'title'          => __( 'Mini-Observations Mastery - Live Cohort with Kim Marshall', 'rocketpd' ),
			'instructor'     => __( 'Kim Marshall', 'rocketpd' ),
			'instructorSlug' => 'kim-marshall',
			'headshot'       => $base . '2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg',
			'image'          => $base . '2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg',
			'format'         => 'cohort',
			'price'          => __( '$795/person', 'rocketpd' ),
			'priceTier'      => 8,
			'topic'          => __( 'Teacher Evaluation', 'rocketpd' ),
			'audiences'      => array( __( 'Principals', 'rocketpd' ), __( 'District Leaders', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ) ),
			'description'    => __( 'An 8-session live cohort: design and implement a sustainable mini-observation system with weekly expert coaching from Kim.', 'rocketpd' ),
			'meta'           => __( '8 live sessions · 90 min each · Implementation rubric', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/mini-observations-mastery-live-cohort/' ),
		),
		array(
			'slug'           => 'build-ownership-not-buy-in-live-cohort',
			'title'          => __( 'Build Ownership, Not Buy-In - Live Cohort with Eric Sheninger', 'rocketpd' ),
			'instructor'     => __( 'Eric Sheninger', 'rocketpd' ),
			'instructorSlug' => 'eric-sheninger',
			'headshot'       => $base . '2025/01/eric-sheninger.png',
			'image'          => $base . '2025/01/eric-sheninger.png',
			'format'         => 'cohort',
			'price'          => __( '$495/person', 'rocketpd' ),
			'priceTier'      => 5,
			'topic'          => __( 'School Leadership', 'rocketpd' ),
			'audiences'      => array( __( 'Principals', 'rocketpd' ), __( 'District Leaders', 'rocketpd' ) ),
			'description'    => __( 'Help your school teams move from compliance to ownership - a 5-session live cohort on leading the hard work of change.', 'rocketpd' ),
			'meta'           => __( '5 live sessions · 75 min each · Recordings included', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/build-ownership-not-buy-in-live-cohort/' ),
		),
		array(
			'slug'           => 'unlocking-teacher-productivity-live-cohort',
			'title'          => __( 'Unlocking Teacher Productivity - Live Cohort with Angela Watson', 'rocketpd' ),
			'instructor'     => __( 'Angela Watson', 'rocketpd' ),
			'instructorSlug' => 'angela-watson',
			'headshot'       => $base . '2025/01/angela-watson.jpg',
			'image'          => $base . '2025/01/angela-watson.jpg',
			'format'         => 'cohort',
			'price'          => __( '$295/person', 'rocketpd' ),
			'priceTier'      => 3,
			'topic'          => __( 'Adult Well-Being', 'rocketpd' ),
			'audiences'      => array( __( 'Teachers', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ), __( 'Principals', 'rocketpd' ) ),
			'description'    => __( 'Reclaim 5 hours every week. A 3-session live cohort on time-management strategies that protect teacher energy and prevent burnout.', 'rocketpd' ),
			'meta'           => __( '3 live sessions · 60 min each · Worksheets included', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/unlocking-teacher-productivity-live-cohort/' ),
		),
	);
}

/**
 * Return unique course values.
 *
 * @param string $key Course key.
 * @return array
 */
function rocketpd_get_course_filter_values( $key ) {
	$values = array();

	foreach ( rocketpd_get_courses() as $course ) {
		if ( 'audiences' === $key ) {
			foreach ( $course['audiences'] as $audience ) {
				$values[] = $audience;
			}
			continue;
		}

		if ( ! empty( $course[ $key ] ) ) {
			$values[] = $course[ $key ];
		}
	}

	$values = array_unique( $values );
	sort( $values );

	return $values;
}

/**
 * Return courses grouped by format.
 *
 * @return array
 */
function rocketpd_get_courses_by_format() {
	$groups = array(
		'webinar'    => array(),
		'self-paced' => array(),
		'cohort'     => array(),
	);

	foreach ( rocketpd_get_courses() as $course ) {
		$format = $course['format'] ?? 'self-paced';

		if ( ! isset( $groups[ $format ] ) ) {
			$groups[ $format ] = array();
		}

		$groups[ $format ][] = $course;
	}

	return $groups;
}
