<?php
/**
 * Cohorts Index data and helpers.
 *
 * Seed data lives in inc/cohort-seeds.php — loaded below.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require_once get_template_directory() . '/inc/cohort-seeds.php';

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
 * Return Cohort Index card data.
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

	$kim_image       = $image_for( 'kim-marshall' )       ?: $base . '2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg';
	$liljedahl_image = $image_for( 'dr-peter-liljedahl' ) ?: $base . '2024/03/Peter_Liljedahl.jpg';

	return array(
		array(
			'slug'                     => 'building-thinking-classrooms-in-mathematics-with-peter-liljedahl',
			'title'                    => __( 'Building Thinking Classrooms', 'rocketpd' ),
			'cohort_subtitle'          => __( 'Master a process for enhancing student learning through a process of enhancing student thinking.', 'rocketpd' ),
			'cohort_short_description' => __( 'A 5-session virtual cohort with Dr. Peter Liljedahl: learn how to create an ideal setting for mathematical thinking and launch Thinking Classrooms in your school.', 'rocketpd' ),
			'cohort_topic'             => __( 'Mathematics Instruction', 'rocketpd' ),
			'cohort_audience'          => array( __( 'Classroom Teachers', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ), __( 'Curriculum Coordinators', 'rocketpd' ) ),
			'cohort_status'            => 'registration-open',
			'featured_toggle'          => true,
			'start_date'               => '2026-10-29',
			'end_date'                 => '2026-12-03',
			'session_count'            => 5,
			'session_count_label'      => __( '5 live sessions', 'rocketpd' ),
			'total_hours'              => __( '10 hours', 'rocketpd' ),
			'format_label'             => __( '120 min · Live via Zoom', 'rocketpd' ),
			'price_type'               => 'paid',
			'price_label'              => __( '$495/person', 'rocketpd' ),
			'price_amount'             => 495,
			'instructor'               => array(
				'name'     => __( 'Dr. Peter Liljedahl', 'rocketpd' ),
				'title'    => __( 'Professor, SFU · Author, Building Thinking Classrooms', 'rocketpd' ),
				'headshot' => $liljedahl_image,
			),
			'card_image'               => $liljedahl_image,
			'sponsor_enabled'          => false,
			'sponsor_name'             => '',
			'href'                     => home_url( '/cohorts/building-thinking-classrooms-in-mathematics-with-peter-liljedahl/' ),
		),
		array(
			'slug'                     => 'building-thinking-classrooms-summer-refresh',
			'title'                    => __( 'Building Thinking Classrooms Summer Refresh', 'rocketpd' ),
			'cohort_subtitle'          => __( 'Master a process for enhancing student learning through a process of enhancing student thinking.', 'rocketpd' ),
			'cohort_short_description' => __( 'A 3-session summer refresh with Dr. Peter Liljedahl: launch or relaunch your Thinking Classroom with confidence starting on Day 1.', 'rocketpd' ),
			'cohort_topic'             => __( 'Mathematics Instruction', 'rocketpd' ),
			'cohort_audience'          => array( __( 'Classroom Teachers', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ), __( 'Curriculum Coordinators', 'rocketpd' ) ),
			'cohort_status'            => 'registration-open',
			'featured_toggle'          => true,
			'start_date'               => '2026-07-28',
			'end_date'                 => '2026-08-11',
			'session_count'            => 3,
			'session_count_label'      => __( '3 live sessions', 'rocketpd' ),
			'total_hours'              => __( '6 hours', 'rocketpd' ),
			'format_label'             => __( '120 min · Live via Zoom', 'rocketpd' ),
			'price_type'               => 'paid',
			'price_label'              => __( '$295/person', 'rocketpd' ),
			'price_amount'             => 295,
			'instructor'               => array(
				'name'     => __( 'Dr. Peter Liljedahl', 'rocketpd' ),
				'title'    => __( 'Professor, SFU · Author, Building Thinking Classrooms', 'rocketpd' ),
				'headshot' => $liljedahl_image,
			),
			'card_image'               => $liljedahl_image,
			'sponsor_enabled'          => false,
			'sponsor_name'             => '',
			'href'                     => home_url( '/cohorts/building-thinking-classrooms-summer-refresh/' ),
		),
		array(
			'slug'                     => 'rethinking-teacher-supervision-coaching-evaluation',
			'title'                    => __( 'Rethinking Teacher Supervision, Coaching & Evaluation', 'rocketpd' ),
			'cohort_subtitle'          => __( 'Design a modern mini-observation system with Kim Marshall.', 'rocketpd' ),
			'cohort_short_description' => __( 'An 8-session deep-dive cohort with Kim Marshall: design and implement a sustainable mini-observation system with weekly expert coaching.', 'rocketpd' ),
			'cohort_topic'             => __( 'Teacher Evaluation', 'rocketpd' ),
			'cohort_audience'          => array( __( 'Principals', 'rocketpd' ), __( 'District Leaders', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ) ),
			'cohort_status'            => 'registration-open',
			'featured_toggle'          => true,
			'start_date'               => '2026-09-24',
			'end_date'                 => '2027-04-15',
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
			'slug'                     => 'a-call-to-courage-standing-up-to-intolerance-in-k-12-schools-with-drs-luvelle-brown-shelley-berman',
			'title'                    => __( 'A Call to Courage: Standing Up to Intolerance in K-12 Schools', 'rocketpd' ),
			'cohort_subtitle'          => __( 'A five-session cohort with Drs. Luvelle Brown and Shelley Berman on leading with courage against rising attacks on public education.', 'rocketpd' ),
			'cohort_short_description' => __( 'Join award-winning superintendents Drs. Luvelle Brown and Shelley Berman for five live sessions on standing up to intolerance, reclaiming the narrative, and building courageous school culture.', 'rocketpd' ),
			'cohort_topic'             => __( 'School Culture', 'rocketpd' ),
			'cohort_audience'          => array( __( 'Superintendents', 'rocketpd' ), __( 'Assistant Superintendents', 'rocketpd' ), __( 'Central-Office Teams', 'rocketpd' ), __( 'Building Administrators', 'rocketpd' ), __( 'School Board Members', 'rocketpd' ) ),
			'cohort_status'            => 'closed',
			'featured_toggle'          => false,
			'start_date'               => '2024-11-13',
			'end_date'                 => '2024-12-18',
			'session_count'            => 5,
			'session_count_label'      => __( '5 live sessions', 'rocketpd' ),
			'total_hours'              => __( '7.5 hours', 'rocketpd' ),
			'format_label'             => __( '90 min · Live via Zoom', 'rocketpd' ),
			'price_type'               => 'paid',
			'price_label'              => __( '$495/person', 'rocketpd' ),
			'price_amount'             => 495,
			'instructor'               => array(
				'name'    => __( 'Dr. Luvelle Brown', 'rocketpd' ),
				'title'   => __( 'Former NY State Superintendent of the Year · Co-author, A Call to Courage', 'rocketpd' ),
				'headshot' => '/wp-content/uploads/2024/04/dr-luvelle-brown-rocketpd-instructor.jpg',
			),
			'card_image'               => '/wp-content/uploads/2024/04/dr-luvelle-brown-rocketpd-instructor.jpg',
			'sponsor_enabled'          => false,
			'sponsor_name'             => '',
			'href'                     => home_url( '/cohorts/a-call-to-courage-standing-up-to-intolerance-in-k-12-schools-with-drs-luvelle-brown-shelley-berman/' ),
		),
		array(
			'slug'                     => 'a-i-for-leaders-how-to-use-ai-to-become-a-more-efficient-and-effective-k-12-administrator',
			'title'                    => __( 'A.I. For Leaders: How to Use AI to Become a More Efficient and Effective K-12 Administrator', 'rocketpd' ),
			'cohort_subtitle'          => __( 'A hands-on five-session cohort with A.J. Juliani on using AI to improve decision-making, drive efficiency, and manage transformational change in K-12 schools.', 'rocketpd' ),
			'cohort_short_description' => __( 'Join Wall Street Journal bestselling author A.J. Juliani for five live sessions on using AI as a strategic leadership tool — from decision-making and operations to ethics and stakeholder communication.', 'rocketpd' ),
			'cohort_topic'             => __( 'Artificial Intelligence', 'rocketpd' ),
			'cohort_audience'          => array( __( 'Superintendents', 'rocketpd' ), __( 'Assistant Superintendents', 'rocketpd' ), __( 'Building Principals', 'rocketpd' ), __( 'Central Office Administrators', 'rocketpd' ), __( 'Aspiring School Leaders', 'rocketpd' ) ),
			'cohort_status'            => 'closed',
			'featured_toggle'          => false,
			'start_date'               => '2025-10-02',
			'end_date'                 => '2025-10-30',
			'session_count'            => 5,
			'session_count_label'      => __( '5 live sessions', 'rocketpd' ),
			'total_hours'              => __( '7.5 hours', 'rocketpd' ),
			'format_label'             => __( '90 min · Live via Zoom', 'rocketpd' ),
			'price_type'               => 'paid',
			'price_label'              => __( '$495/person', 'rocketpd' ),
			'price_amount'             => 495,
			'instructor'               => array(
				'name'     => __( 'A.J. Juliani', 'rocketpd' ),
				'title'    => __( 'WSJ Bestselling Author of Adaptable · Creator of LearningTools.ai', 'rocketpd' ),
				'headshot' => '/wp-content/uploads/2023/05/aj-juliani.jpg',
			),
			'card_image'               => '/wp-content/uploads/2023/05/aj-juliani.jpg',
			'sponsor_enabled'          => false,
			'sponsor_name'             => '',
			'href'                     => home_url( '/cohorts/a-i-for-leaders-how-to-use-ai-to-become-a-more-efficient-and-effective-k-12-administrator/' ),
		),
		array(
			'slug'                     => 'build-ownership-not-buy-in-empowering-school-teams-for-the-hard-work-of-change',
			'title'                    => __( 'Build Ownership, Not Buy-In: Empowering School Teams for the Hard Work of Change', 'rocketpd' ),
			'cohort_subtitle'          => __( 'A five-session cohort with Eric Sheninger on building a culture of ownership, accountability, and innovation that drives lasting change in K-12 schools.', 'rocketpd' ),
			'cohort_short_description' => __( 'Join best-selling author and Aspire Change EDU founder Eric Sheninger for five live sessions on leading sustainable change, empowering school teams, and building a culture where everyone owns the work.', 'rocketpd' ),
			'cohort_topic'             => __( 'School Leadership', 'rocketpd' ),
			'cohort_audience'          => array( __( 'Superintendents', 'rocketpd' ), __( 'Principals', 'rocketpd' ), __( 'Assistant Principals', 'rocketpd' ), __( 'Instructional Leaders', 'rocketpd' ), __( 'Department Heads', 'rocketpd' ) ),
			'cohort_status'            => 'closed',
			'featured_toggle'          => false,
			'start_date'               => '2025-11-06',
			'end_date'                 => '2025-12-11',
			'session_count'            => 5,
			'session_count_label'      => __( '5 live sessions', 'rocketpd' ),
			'total_hours'              => __( '7.5 hours', 'rocketpd' ),
			'format_label'             => __( '90 min &#183; Live via Zoom', 'rocketpd' ),
			'price_type'               => 'paid',
			'price_label'              => __( '$495/person', 'rocketpd' ),
			'price_amount'             => 495,
			'instructor'               => array(
				'name'     => __( 'Eric Sheninger', 'rocketpd' ),
				'title'    => __( 'Founder, Aspire Change EDU &#183; Author, Personalize', 'rocketpd' ),
				'headshot' => '/wp-content/uploads/2025/01/eric-sheninger.png',
			),
			'card_image'               => '/wp-content/uploads/2025/01/eric-sheninger.png',
			'sponsor_enabled'          => false,
			'sponsor_name'             => '',
			'href'                     => home_url( '/cohorts/build-ownership-not-buy-in-empowering-school-teams-for-the-hard-work-of-change/' ),
		),
		array(
			'slug'                     => 'build-teaching-confidence-with-powerful-lesson-design-with-jennifer-gonzalez',
			'title'                    => __( 'Build Teaching Confidence with Powerful Lesson Design', 'rocketpd' ),
			'cohort_subtitle'          => __( 'A five-session cohort with Jennifer Gonzalez on building and maintaining instructional confidence through powerful lesson planning and design.', 'rocketpd' ),
			'cohort_short_description' => __( 'Join Cult of Pedagogy founder Jennifer Gonzalez for five live sessions on designing high-quality lessons, building a personal strategy toolkit, and gaining the confidence to deliver outstanding instruction.', 'rocketpd' ),
			'cohort_topic'             => __( 'Instructional Design', 'rocketpd' ),
			'cohort_audience'          => array( __( 'New Teachers', 'rocketpd' ), __( 'Veteran Teachers', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ), __( 'New Hires', 'rocketpd' ), __( 'Building Principals', 'rocketpd' ) ),
			'cohort_status'            => 'closed',
			'featured_toggle'          => false,
			'start_date'               => '2026-03-03',
			'end_date'                 => '2026-03-31',
			'session_count'            => 5,
			'session_count_label'      => __( '5 live sessions', 'rocketpd' ),
			'total_hours'              => __( '7.5 hours', 'rocketpd' ),
			'format_label'             => __( '90 min &#183; Live via Zoom', 'rocketpd' ),
			'price_type'               => 'paid',
			'price_label'              => __( '$495/person', 'rocketpd' ),
			'price_amount'             => 495,
			'instructor'               => array(
				'name'     => __( 'Jennifer Gonzalez', 'rocketpd' ),
				'title'    => __( 'National Board Certified Teacher &#183; Founder, Cult of Pedagogy', 'rocketpd' ),
				'headshot' => '/wp-content/uploads/2025/10/Jennifer-Gonzalez-2024-Square-1024x1024-1.jpg',
			),
			'card_image'               => '/wp-content/uploads/2025/10/Jennifer-Gonzalez-2024-Square-1024x1024-1.jpg',
			'sponsor_enabled'          => false,
			'sponsor_name'             => '',
			'href'                     => home_url( '/cohorts/build-teaching-confidence-with-powerful-lesson-design-with-jennifer-gonzalez/' ),
		),
		array(
			'slug'                     => 'design-for-diverse-classrooms-udl-mtss-blended-learning-practice-dr-catlin-tucker',
			'title'                    => __( 'Designing for Diverse Classrooms: UDL, MTSS, and Blended Learning in Practice', 'rocketpd' ),
			'cohort_subtitle'          => __( 'A five-session cohort with Dr. Catlin Tucker on elevating Tier 1 instruction using Universal Design for Learning, MTSS, and technology-enhanced blended learning models.', 'rocketpd' ),
			'cohort_short_description' => __( 'Join bestselling author and blended learning expert Dr. Catlin Tucker for five live sessions on weaving UDL, MTSS, and blended learning into every lesson to meet the needs of every learner.', 'rocketpd' ),
			'cohort_topic'             => __( 'Instructional Design', 'rocketpd' ),
			'cohort_audience'          => array( __( 'Classroom Teachers', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ), __( 'School Leaders', 'rocketpd' ), __( 'MTSS Coordinators', 'rocketpd' ) ),
			'cohort_status'            => 'closed',
			'featured_toggle'          => false,
			'start_date'               => '2025-11-05',
			'end_date'                 => '2025-12-10',
			'session_count'            => 5,
			'session_count_label'      => __( '5 live sessions', 'rocketpd' ),
			'total_hours'              => __( '7.5 hours', 'rocketpd' ),
			'format_label'             => __( '90 min &#183; Live via Zoom', 'rocketpd' ),
			'price_type'               => 'paid',
			'price_label'              => __( '$495/person', 'rocketpd' ),
			'price_amount'             => 495,
			'instructor'               => array(
				'name'     => __( 'Dr. Catlin Tucker', 'rocketpd' ),
				'title'    => __( 'Former Teacher of the Year &#183; Author, UDL and Blended Learning', 'rocketpd' ),
				'headshot' => '/wp-content/uploads/2024/04/dr-catlin-tucker-rocketpd-instructor-blended-learning.jpg',
			),
			'card_image'               => '/wp-content/uploads/2024/04/dr-catlin-tucker-rocketpd-instructor-blended-learning.jpg',
			'sponsor_enabled'          => false,
			'sponsor_name'             => '',
			'href'                     => home_url( '/cohorts/design-for-diverse-classrooms-udl-mtss-blended-learning-practice-dr-catlin-tucker/' ),
		),
		array(
			'slug'                     => 'elevate-advocate-a-5-part-framework-for-supporting-adult-wellbeing-in-k-12-schools',
			'title'                    => __( 'Elevate &amp; Advocate: A 5-Part Framework for Supporting Adult Well-Being in K-12 Schools', 'rocketpd' ),
			'cohort_subtitle'          => __( 'A five-session virtual cohort with Carla Tantillo Philibert on building personal well-being, advocating for your needs, and achieving sustained fulfillment in your education career.', 'rocketpd' ),
			'cohort_short_description' => __( 'Join educator, author, and wellness expert Carla Tantillo Philibert for five live sessions on taking ownership of your personal well-being, advocating within your organization, and building a practical framework for career fulfillment.', 'rocketpd' ),
			'cohort_topic'             => __( 'Adult Well-Being', 'rocketpd' ),
			'cohort_audience'          => array( __( 'Classroom Teachers', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ), __( 'Department Heads', 'rocketpd' ) ),
			'cohort_status'            => 'closed',
			'featured_toggle'          => false,
			'start_date'               => '2024-11-06',
			'end_date'                 => '2024-12-11',
			'session_count'            => 5,
			'session_count_label'      => __( '5 live sessions', 'rocketpd' ),
			'total_hours'              => __( '7.5 hours', 'rocketpd' ),
			'format_label'             => __( '90 min &#183; Live via Zoom', 'rocketpd' ),
			'price_type'               => 'paid',
			'price_label'              => __( '$495/person', 'rocketpd' ),
			'price_amount'             => 495,
			'instructor'               => array(
				'name'     => __( 'Carla Tantillo Philibert', 'rocketpd' ),
				'title'    => __( 'Author, Entrepreneur &#183; Founder, Mindful Practices', 'rocketpd' ),
				'headshot' => '/wp-content/uploads/2021/12/Philibert.Carla_.jpg',
			),
			'card_image'               => '/wp-content/uploads/2021/12/Philibert.Carla_.jpg',
			'sponsor_enabled'          => false,
			'sponsor_name'             => '',
			'href'                     => home_url( '/cohorts/elevate-advocate-a-5-part-framework-for-supporting-adult-wellbeing-in-k-12-schools/' ),
		),
		array(
			'slug'                     => 'improving-behaviors-by-solving-the-problems-that-are-causing-them',
			'title'                    => __( 'Improving Behaviors By Solving The Problems That Are Causing Them', 'rocketpd' ),
			'cohort_subtitle'          => __( 'A five-session cohort with Dr. Ross Greene on shifting from traditional discipline to proactive problem-solving.', 'rocketpd' ),
			'cohort_short_description' => __( 'Join award-winning child psychologist Dr. Ross Greene for five live sessions on reducing disruptions and solving unsolved problems with the Collaborative &amp; Proactive Solutions model.', 'rocketpd' ),
			'cohort_topic'             => __( 'School Culture', 'rocketpd' ),
			'cohort_audience'          => array( __( 'Classroom Teachers', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ), __( 'School Administrators', 'rocketpd' ), __( 'Behavior Specialists', 'rocketpd' ) ),
			'cohort_status'            => 'closed',
			'featured_toggle'          => false,
			'start_date'               => '2026-01-21',
			'end_date'                 => '2026-02-18',
			'session_count'            => 5,
			'session_count_label'      => __( '5 live sessions', 'rocketpd' ),
			'total_hours'              => __( '7.5 hours', 'rocketpd' ),
			'format_label'             => __( '90 min &#183; Live via Zoom', 'rocketpd' ),
			'price_type'               => 'paid',
			'price_label'              => __( '$495/person', 'rocketpd' ),
			'price_amount'             => 495,
			'instructor'               => array(
				'name'     => __( 'Dr. Ross Greene', 'rocketpd' ),
				'title'    => __( 'Originator of Collaborative &amp; Proactive Solutions', 'rocketpd' ),
				'headshot' => '/wp-content/uploads/2025/01/dr-ross-greene.jpg',
			),
			'card_image'               => '/wp-content/uploads/2025/01/dr-ross-greene.jpg',
			'sponsor_enabled'          => false,
			'sponsor_name'             => '',
			'href'                     => home_url( '/cohorts/improving-behaviors-by-solving-the-problems-that-are-causing-them/' ),
		),
		array(
			'slug'                     => 'pbl-by-design-empowering-student-engagement-real-world-learning',
			'title'                    => __( 'PBL by Design: Empowering Student Engagement &amp; Real-World Learning', 'rocketpd' ),
			'cohort_subtitle'          => __( 'Master classroom-tested techniques that help all students - and their teachers - succeed.', 'rocketpd' ),
			'cohort_short_description' => __( 'Join Dr. John Spencer for five live sessions on designing project-based learning units that build engagement, creativity, and deeper learning.', 'rocketpd' ),
			'cohort_topic'             => __( 'Instructional Design', 'rocketpd' ),
			'cohort_audience'          => array( __( 'Classroom Teachers', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ), __( 'Instructional Leaders', 'rocketpd' ), __( 'District Administrators', 'rocketpd' ) ),
			'cohort_status'            => 'closed',
			'featured_toggle'          => false,
			'start_date'               => '2026-03-03',
			'end_date'                 => '2026-03-31',
			'session_count'            => 5,
			'session_count_label'      => __( '5 live sessions', 'rocketpd' ),
			'total_hours'              => __( '7.5 hours', 'rocketpd' ),
			'format_label'             => __( '90 min &#183; Live via Zoom', 'rocketpd' ),
			'price_type'               => 'paid',
			'price_label'              => __( '$495/person', 'rocketpd' ),
			'price_amount'             => 495,
			'instructor'               => array(
				'name'     => __( 'Dr. John Spencer', 'rocketpd' ),
				'title'    => __( 'Author, Empower &#183; PBL and Design Thinking Expert', 'rocketpd' ),
				'headshot' => '/wp-content/uploads/2025/03/dr-john-spencer.jpg',
			),
			'card_image'               => '/wp-content/uploads/2025/03/dr-john-spencer.jpg',
			'sponsor_enabled'          => false,
			'sponsor_name'             => '',
			'href'                     => home_url( '/cohorts/pbl-by-design-empowering-student-engagement-real-world-learning/' ),
		),
	);
}

/**
 * Return cohorts sorted for display (featured first, then by start date).
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
 * Return featured cohorts only.
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
 * Return unique Cohort filter values for a given key.
 *
 * @param string $key Cohort array key.
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
 * Return a session-count length bucket label.
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
 * Format a Cohort start date for display.
 *
 * @param string $date Date string.
 * @return string
 */
function rocketpd_format_cohort_start_date( $date ) {
	$timestamp = strtotime( $date );

	return $timestamp ? date_i18n( 'M j, Y', $timestamp ) : '';
}
