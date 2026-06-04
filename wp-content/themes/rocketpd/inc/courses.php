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
			'slug'           => 'rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course',
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
			'href'           => home_url( '/launchpad/courses/rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course/' ),
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
			'instructorSlug' => 'dr-peter-liljedahl',
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
			'slug'           => 'redesigning-instruction-to-meet-every-learners-needs-with-robert-barnett',
			'title'          => __( "Redesigning Instruction to Meet Every Learner's Needs", 'rocketpd' ),
			'instructor'     => __( 'Robert Barnett', 'rocketpd' ),
			'instructorSlug' => 'robert-barnett',
			'headshot'       => $base . '2025/03/rob-barnett.jpg',
			'image'          => $base . '2025/03/robert-barnett-launchpad.png',
			'format'         => 'self-paced',
			'price'          => __( '$49', 'rocketpd' ),
			'topic'          => __( 'Individualized Instruction', 'rocketpd' ),
			'audiences'      => array( __( 'Teachers', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ), __( 'Curriculum Directors', 'rocketpd' ) ),
			'description'    => __( 'Digitize direct instruction, build self-paced lessons, and implement mastery-based learning with the Modern Classrooms Project framework.', 'rocketpd' ),
			'meta'           => __( '3 modules · 1 hour · Workbook included', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/redesigning-instruction-to-meet-every-learners-needs-with-robert-barnett/' ),
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

/**
 * Return full seeder data for all course posts.
 * Used by the admin Seed Courses button in setup.php.
 * Separate from rocketpd_get_courses() which serves the gallery index.
 *
 * Each entry has two flags:
 *   enabled — include this course in the seeder (false = skip entirely)
 *   resync  — overwrite ACF fields if the post already exists (false = skip existing, only create new)
 *
 * @return array
 */
function rocketpd_get_course_seed_data() {
	return array(

		// ─────────────────────────────────────────────────────────────────────
		// Kim Marshall — Rethinking Teacher Supervision, Coaching & Evaluation
		// ─────────────────────────────────────────────────────────────────────
		array(
			'slug'    => 'rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course',
			'enabled' => true,
			'resync'  => false,
			'title'   => 'Rethinking Teacher Supervision, Coaching & Evaluation',
			'format'  => 'self-paced',
			'topic'   => 'Teacher Evaluation',
			'price'   => '$49',
			'price_meta'           => 'single course · anytime access',
			'promise'              => 'Build a more practical, trust-centered approach to teacher evaluation through frequent mini-observations, better feedback conversations, and stronger coaching systems.',
			'trailer_youtube_id'   => '1lOJDsHcCPQ',
			'course_image'         => '',
			'primary_cta_label'    => 'Start Learning',
			'primary_cta_href'     => '#pricing',
			'secondary_cta_label'  => 'Watch Trailer',
			'secondary_cta_href'   => '#course-trailer',
			'audiences'            => array( 'Principals', 'Assistant Principals', 'Instructional Coaches', 'District Leaders', 'Teacher Leaders' ),
			'meta_items'           => array(
				array( 'icon' => 'clock',  'label' => '1 hour' ),
				array( 'icon' => 'video',  'label' => '5 video modules' ),
				array( 'icon' => 'file',   'label' => 'Workbook PDF' ),
				array( 'icon' => 'award',  'label' => 'Certificate' ),
			),
			'instructor' => array(
				'name'        => 'Kim Marshall',
				'slug'        => 'kim-marshall',
				'headshot'    => '',
				'title'       => 'K-12 Leadership Expert · Marshall Memo Founder',
				'role_line'   => 'Former principal, author, and nationally recognized school leadership coach',
				'bio'         => 'Kim Marshall is a nationally recognized school leadership expert, creator of the Marshall Memo, and author of Rethinking Teacher Supervision and Evaluation. His work helps school leaders create more practical, trust-centered systems for observation, coaching, and teacher growth.',
				'specialties' => array( 'Teacher Evaluation', 'Coaching', 'Instructional Leadership', 'Feedback Systems' ),
				'href'        => '/instructors/kim-marshall/',
			),
			'outcomes_heading' => "Three concrete shifts you'll be ready to make on Monday.",
			'audience_intro'   => 'If your job touches teacher growth - whether you observe, coach, supervise, or support - this course is built for you. Many districts run it together as a leadership team.',
			'outcomes'         => array(
				array( 'title' => 'Compare traditional observations with mini-observations.', 'summary' => 'See exactly why annual reviews so often fail teachers - and what changes when classroom visits become short, frequent, and unannounced.' ),
				array( 'title' => 'Build a practical system for frequent classroom visits.', 'summary' => 'Adapt the scheduling, note-taking, and follow-up routines that make 5- to 10-minute visits sustainable for one principal across a full faculty.' ),
				array( 'title' => 'Strengthen feedback conversations that support teacher growth.', 'summary' => 'Learn the language patterns and coaching moves that turn a 5-minute visit into a meaningful conversation teachers actually look forward to.' ),
			),
			'included_heading' => 'Every RocketPD self-paced course includes',
			'included_items'   => array(
				array( 'icon' => 'clock',  'label' => '60-minute expert-led course' ),
				array( 'icon' => 'layers', 'label' => '5 short video modules' ),
				array( 'icon' => 'book',   'label' => 'Downloadable workbook PDF' ),
				array( 'icon' => 'award',  'label' => 'Certificate of completion' ),
				array( 'icon' => 'screen', 'label' => 'Secure Learning Portal access' ),
				array( 'icon' => 'users',  'label' => 'RocketPD Community membership' ),
			),
			'guide' => array(
				'enabled'      => true,
				'title'        => 'The Ultimate Guide to Teacher Supervision, Coaching & Evaluation',
				'meta'         => 'Free guide · 20 pages · 22 min read',
				'summary'      => 'A practical playbook for school leaders ready to replace dread-filled annual reviews with short, frequent, growth-oriented classroom visits.',
				'href'         => '/k-12-guides/learning-meet-doing/',
				'deliverables' => array( 'A 5-step framework for sustainable mini-observations', 'Sample feedback scripts you can adapt this week', 'A printable visit tracker for your faculty roster' ),
			),
			'podcast' => array(
				'enabled'  => true,
				'title'    => 'Rethinking Teacher Evaluation with Kim Marshall',
				'meta'     => 'Podcast · 46 min',
				'summary'  => 'Kim joins the RocketPD podcast to unpack the 3 keys to reducing evaluation stress, saving time, and building teacher confidence.',
				'embed_id' => 'AME1I5sUJFQ',
				'href'     => 'https://www.youtube.com/watch?v=AME1I5sUJFQ',
			),
			'webinar' => array(
				'enabled'  => true,
				'title'    => 'Mini-Observations That Actually Move Teaching',
				'meta'     => 'Webinar · 56 min · On-demand',
				'summary'  => 'A working session with Kim on building a sustainable system of unannounced classroom visits that improve teaching at scale.',
				'embed_id' => 'wIV-j4nt_ms',
				'href'     => 'https://www.youtube.com/watch?v=wIV-j4nt_ms',
			),
			'blog' => array(
				'enabled' => true,
				'title'   => 'Rethinking Teacher Evaluation: 3 Keys',
				'meta'    => 'Blog',
				'summary' => "Kim's most-shared piece on the three shifts every school leader needs to make for a more meaningful evaluation system.",
				'href'    => '/resources/',
			),
			'pricing_cards' => array(
				array( 'eyebrow' => 'Single Course', 'title' => 'Single-Course Registration', 'price' => '$49', 'price_meta' => 'one-time access', 'bullets' => "Self-paced video modules\nCourse workbook PDF\nAccess to secure Learning Portal\nMembership in learning community\nCertificate of completion", 'cta_label' => 'Start Learning', 'cta_href' => '#pricing', 'highlighted' => 0 ),
				array( 'eyebrow' => 'Full Library', 'title' => 'Entire Video Library', 'price' => '$245', 'price_meta' => 'annually', 'bullets' => "Access to all RocketPD courses\nSelf-paced video modules\nAll course workbooks\nAccess to secure Learning Portal\nMembership in learning community\nCertificates of completion", 'cta_label' => 'Get Full Library', 'cta_href' => '/launchpad/', 'highlighted' => 1 ),
				array( 'eyebrow' => 'Teams', 'title' => 'School or District Use', 'price' => 'Custom', 'price_meta' => 'contact us for pricing', 'bullets' => "Unlimited team access\nAll RocketPD courses included\nSelf-paced video modules and workbooks\nDedicated success partner\nBuilt-in reporting for leaders", 'cta_label' => 'Talk With RocketPD', 'cta_href' => '/contact/', 'highlighted' => 0 ),
			),
			'related' => array(
				array( 'slug' => 'creating-a-culture-of-love', 'title' => 'Creating a Culture of Love', 'instructor' => 'Dr. Luvelle Brown', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'School Culture', 'href' => '/launchpad/courses/creating-a-culture-of-love/' ),
				array( 'slug' => 'blended-learning-universal-design-for-learning', 'title' => 'Supercharge Your Classroom with Blended Learning', 'instructor' => 'Dr. Catlin Tucker', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Blended Learning', 'href' => '/launchpad/courses/blended-learning-universal-design-for-learning/' ),
				array( 'slug' => 'rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course', 'title' => 'Rethinking Teacher Supervision, Coaching & Evaluation', 'instructor' => 'Kim Marshall', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Teacher Evaluation', 'href' => '/launchpad/courses/rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course/' ),
			),
			'faqs' => array(
				array( 'question' => 'Is this course live or self-paced?', 'answer' => 'This is a self-paced video course. You can start the moment you register and work through the modules whenever it fits your schedule.' ),
				array( 'question' => 'How long does the course take?', 'answer' => 'Plan for about one hour of video learning plus time to use the workbook and adapt the tools to your school.' ),
				array( 'question' => 'Is a workbook included?', 'answer' => 'Yes. The course includes a downloadable workbook PDF with reflection prompts and implementation tools.' ),
				array( 'question' => 'Do I receive a certificate?', 'answer' => 'Yes. Participants can earn a certificate of completion after finishing the course.' ),
				array( 'question' => 'Can my school or district purchase access for a team?', 'answer' => 'Yes. RocketPD supports school and district team access. Contact us and we will help map the best option.' ),
				array( 'question' => 'How do I access the course after registration?', 'answer' => 'You will access the course through the secure RocketPD Learning Portal after registration.' ),
			),
			'final_cta' => array(
				'headline'        => 'Ready to rethink teacher evaluation?',
				'body'            => "Join thousands of school leaders building more practical, trust-centered systems for observation, coaching, and growth - with Kim Marshall as your guide.",
				'primary_label'   => 'Start Learning - $49',
				'primary_href'    => '#pricing',
				'secondary_label' => 'Talk About District Pricing',
				'secondary_href'  => '/contact/',
			),
		),

		// ─────────────────────────────────────────────────────────────────────
		// Dr. Luvelle Brown — Creating a Culture of Love
		// ─────────────────────────────────────────────────────────────────────
		array(
			'slug'    => 'creating-a-culture-of-love',
			'enabled' => true,
			'resync'  => false,
			'title'   => 'Creating a Culture of Love',
			'format'  => 'self-paced',
			'topic'   => 'School Culture',
			'price'   => '$49',
			'price_meta'           => 'single course · anytime access',
			'promise'              => 'Dr. Luvelle Brown combines his personal experience as a student of color with his years as an educator and district leader to illustrate a mindset and practical framework for fostering a Culture of Love, understanding, and opportunity for all students and teachers.',
			'trailer_youtube_id'   => '6TTLAOSmpOM',
			'course_image'         => '',
			'primary_cta_label'    => 'Start Learning',
			'primary_cta_href'     => '#pricing',
			'secondary_cta_label'  => 'Watch Trailer',
			'secondary_cta_href'   => '#course-trailer',
			'audiences'            => array( 'Principals', 'Assistant Principals', 'Instructional Coaches', 'District Leaders', 'Superintendents' ),
			'meta_items'           => array(
				array( 'icon' => 'clock',  'label' => '1 hour' ),
				array( 'icon' => 'layers', 'label' => '3 video lessons' ),
				array( 'icon' => 'file',   'label' => 'Workbook PDF' ),
				array( 'icon' => 'award',  'label' => 'Certificate' ),
			),
			'instructor' => array(
				'name'        => 'Dr. Luvelle Brown',
				'slug'        => 'dr-luvelle-brown',
				'headshot'    => '',
				'title'       => 'School Culture Expert · Former NY State Superintendent of the Year',
				'role_line'   => 'Effie A. Jones Humanitarian Award Winner and nationally recognized equity leader',
				'bio'         => 'As school leaders work to narrow worsening achievement gaps, the pressure is on to level the playing field for all students. Former Superintendent of the Year and AASA Effie A. Jones Humanitarian Award winner Dr. Luvelle Brown combines his personal experience as a student of color with decades of school leadership to give educators a practical, courage-driven framework for building schools where every child belongs.',
				'specialties' => array( 'School Culture', 'Equity & Inclusion', 'Instructional Leadership', 'Student Engagement' ),
				'href'        => '/instructors/dr-luvelle-brown/',
			),
			'outcomes_heading' => 'In this course, Dr. Luvelle Brown challenges you to:',
			'audience_intro'   => '',
			'outcomes'         => array(
				array( 'title' => 'Create a culture of equity and access for all', 'summary' => 'Understand what it truly means to meet the needs of every learner and build the conditions where all students can thrive.' ),
				array( 'title' => 'Engage in critical self-reflection around your work', 'summary' => 'Examine your own assumptions and biases as a leader, and develop the awareness needed to lead with courage and consistency.' ),
				array( 'title' => 'Adopt a protocol for equitable learning experiences', 'summary' => 'Walk away with a practical framework you can apply immediately to redesign learning experiences that center belonging and high expectations.' ),
			),
			'included_heading' => '',
			'included_items'   => array(),
			'guide' => array(
				'enabled'      => true,
				'title'        => 'The Ultimate Guide to Standing Up for K-12 Public Education',
				'meta'         => 'Free guide',
				'summary'      => 'A practical resource for school leaders who want to foster belonging, reject negative narratives, and redesign schools for joy, engagement, and inclusivity.',
				'href'         => '/k-12-guides/',
				'deliverables' => array( 'Frameworks for building a Culture of Love in your school', 'Strategies for addressing systemic inequity head-on', 'Tools for leading courageous conversations with staff' ),
			),
			'podcast' => array(
				'enabled'  => true,
				'title'    => 'Dr. Luvelle Brown on building a Culture of Love',
				'meta'     => 'Podcast episode',
				'summary'  => 'Listen to Dr. Brown unpack how school leaders can create environments where every student feels seen, heard, and loved.',
				'embed_id' => '6TTLAOSmpOM',
				'href'     => 'https://www.youtube.com/watch?v=6TTLAOSmpOM',
			),
			'webinar' => array(
				'enabled'  => true,
				'title'    => 'A Call to Courage: Standing Up to Intolerance in K-12 Schools',
				'meta'     => 'Recorded webinar',
				'summary'  => "Dr. Brown and Dr. Shelley Berman walk through what it means to lead with courage in today's political climate.",
				'embed_id' => 'nEq0xqisnHM',
				'href'     => '/cohorts/a-call-to-courage-standing-up-to-intolerance-in-k-12-schools-with-drs-luvelle-brown-shelley-berman/',
			),
			'blog' => array(
				'enabled' => false,
				'title'   => '',
				'meta'    => '',
				'summary' => '',
				'href'    => '',
			),
			'pricing_cards' => array(
				array( 'eyebrow' => 'Single Course', 'title' => 'Single-Course Registration', 'price' => '$49', 'price_meta' => 'one-time access', 'bullets' => "Self-paced video modules\nCourse workbook PDF\nAccess to secure Learning Portal\nMembership in learning community\nCertificate of completion", 'cta_label' => 'Start Learning', 'cta_href' => '#pricing', 'highlighted' => 0 ),
				array( 'eyebrow' => 'Full Library', 'title' => 'Entire Video Library', 'price' => '$245', 'price_meta' => 'annually', 'bullets' => "Access to all RocketPD courses\nSelf-paced video modules\nAll course workbooks\nAccess to secure Learning Portal\nMembership in learning community\nCertificates of completion", 'cta_label' => 'Get Full Library', 'cta_href' => '/launchpad/', 'highlighted' => 1 ),
				array( 'eyebrow' => 'Teams', 'title' => 'School or District Use', 'price' => 'Custom', 'price_meta' => 'contact us for pricing', 'bullets' => "Unlimited team access\nAll RocketPD courses included\nSelf-paced video modules and workbooks\nDedicated success partner\nBuilt-in reporting for leaders", 'cta_label' => 'Talk With RocketPD', 'cta_href' => '/contact/', 'highlighted' => 0 ),
			),
			'related' => array(
				array( 'slug' => 'rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course', 'title' => 'Rethinking Teacher Supervision, Coaching & Evaluation', 'instructor' => 'Kim Marshall', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Teacher Evaluation', 'href' => '/launchpad/courses/rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course/' ),
				array( 'slug' => 'blended-learning-universal-design-for-learning', 'title' => 'Supercharge Your Classroom with Blended Learning', 'instructor' => 'Dr. Catlin Tucker', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Blended Learning', 'href' => '/launchpad/courses/blended-learning-universal-design-for-learning/' ),
				array( 'slug' => 'creating-a-culture-of-love', 'title' => 'Creating a Culture of Love', 'instructor' => 'Dr. Luvelle Brown', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'School Culture', 'href' => '/launchpad/courses/creating-a-culture-of-love/' ),
			),
			'faqs' => array(
				array( 'question' => 'Is this course live or self-paced?', 'answer' => 'This is a self-paced video course. You can start the moment you register and work through the modules whenever it fits your schedule.' ),
				array( 'question' => 'How long does the course take?', 'answer' => 'Plan for about one hour of video learning plus time to use the workbook and adapt the frameworks to your school.' ),
				array( 'question' => 'Who is this course best suited for?', 'answer' => "Dr. Brown's work is ideal for superintendents, principals, district leaders, and instructional coaches who want to build school cultures grounded in belonging, equity, and high expectations." ),
				array( 'question' => 'Can my school or district purchase access for a team?', 'answer' => 'Yes. RocketPD supports school and district team access. Contact us and we will help map the best option for your team.' ),
			),
			'final_cta' => array(
				'headline'        => 'Bring the Culture of Love to your district.',
				'body'            => "Join school leaders nationwide using Dr. Brown's framework to create schools where every student belongs, every educator thrives, and achievement gaps close.",
				'primary_label'   => 'Start Learning — $49',
				'primary_href'    => '#pricing',
				'secondary_label' => 'Talk About District Pricing',
				'secondary_href'  => '/contact/',
			),
		),

		// ─────────────────────────────────────────────────────────────────────
		// Dr. Catlin Tucker — Supercharge Your Classroom with Blended Learning
		// ─────────────────────────────────────────────────────────────────────
		array(
			'slug'    => 'blended-learning-universal-design-for-learning',
			'enabled' => true,
			'resync'  => false,
			'title'   => 'Supercharge Your Classroom with Blended Learning',
			'format'  => 'self-paced',
			'topic'   => 'Blended Learning',
			'price'   => '$49',
			'price_meta'           => 'single course · anytime access',
			'promise'              => "Dr. Catlin Tucker's unique blended learning models help educators implement Universal Design for Learning, supercharging the classroom experience and transforming traditional lessons into student-centered collaborations that put learners on a sustainable path to success.",
			'trailer_youtube_id'   => 'zFe413zgmhU',
			'course_image'         => '',
			'primary_cta_label'    => 'Start Learning',
			'primary_cta_href'     => '#pricing',
			'secondary_cta_label'  => 'Watch Trailer',
			'secondary_cta_href'   => '#course-trailer',
			'audiences'            => array( 'Classroom Teachers', 'Instructional Coaches', 'Curriculum Directors', 'Assistant Principals', 'District Leaders' ),
			'meta_items'           => array(
				array( 'icon' => 'clock',  'label' => '1 hour' ),
				array( 'icon' => 'layers', 'label' => '3 video lessons' ),
				array( 'icon' => 'book',   'label' => 'Workbook PDF' ),
				array( 'icon' => 'award',  'label' => 'Certificate' ),
			),
			'instructor' => array(
				'name'        => 'Dr. Catlin Tucker',
				'slug'        => 'dr-catlin-tucker',
				'headshot'    => '',
				'title'       => 'Blended Learning Expert · Former Teacher of the Year',
				'role_line'   => 'Best-selling author, college professor, and internationally recognized instructional design expert',
				'bio'         => "Best-selling author, college professor and former Teacher of the Year, Dr. Catlin Tucker is one of the world's leading voices on blended learning and instructional design. Her unique blended learning models help educators implement Universal Design for Learning, transforming traditional lessons into student-centered collaborations that put learners on a sustainable path to success.",
				'specialties' => array( 'Blended Learning', 'Universal Design for Learning', 'Student-Centered Instruction', 'Differentiated Instruction' ),
				'href'        => '/instructors/dr-catlin-tucker/',
			),
			'outcomes_heading' => 'In this course, Dr. Catlin Tucker challenges you to:',
			'audience_intro'   => '',
			'outcomes'         => array(
				array( 'title' => 'Become architects of learning experiences', 'summary' => 'Shift from delivering content to designing flexible, student-centered learning environments where every learner can thrive.' ),
				array( 'title' => 'Learn to use technology as a support tool', 'summary' => 'Discover how to leverage technology to free yourself from whole-group instruction and give students more ownership over their learning.' ),
				array( 'title' => 'Differentiate and personalize student experiences', 'summary' => 'Apply practical blended learning models that let you meet diverse learners where they are — without burning out.' ),
			),
			'included_heading' => '',
			'included_items'   => array(),
			'guide' => array(
				'enabled'      => true,
				'title'        => 'The Complete Guide to Blended Learning',
				'meta'         => 'PDF guide · 20 minute read',
				'summary'      => 'A practical guide for teachers who want to harness technology to create student-centered classrooms that work in both online and in-person environments.',
				'href'         => '/k-12-guides/learning-meet-doing/',
				'deliverables' => array( 'Practical blended learning models you can use this week', 'Strategies for differentiating instruction at scale', "Tools for shifting students into the driver's seat" ),
			),
			'podcast' => array(
				'enabled'  => true,
				'title'    => 'Episode 9: Supercharge Your Classroom with UDL & Blended Learning',
				'meta'     => 'Podcast episode',
				'summary'  => 'Listen to Catlin unpack how teachers can shift ownership to students without losing structure or rigor.',
				'embed_id' => 'aBIffssiPb0',
				'href'     => 'https://www.youtube.com/watch?v=aBIffssiPb0',
			),
			'webinar' => array(
				'enabled'  => true,
				'title'    => 'Learning Reimagined: How Schools Can Use Blended Learning to Center Students',
				'meta'     => 'Recorded webinar',
				'summary'  => 'Dr. Tucker walks through what it means to shift from teacher-led to student-led classrooms using practical blended learning models.',
				'embed_id' => '',
				'href'     => '/learning-reimagined-how-schools-can-use-blended-learning-to-center-students-in-their-education-with-dr-catlin-tucker/',
			),
			'blog' => array(
				'enabled' => true,
				'title'   => 'Learning Reimagined: How Schools Can Use Blended Learning to Center Students in Their Education',
				'meta'    => 'ARTICLE',
				'summary' => 'Dr. Catlin Tucker discusses how schools can use blended learning models to shift control of learning to students and improve outcomes for all.',
				'href'    => '/learning-reimagined-how-schools-can-use-blended-learning-to-center-students-in-their-education-with-dr-catlin-tucker/',
			),
			'pricing_cards' => array(
				array( 'eyebrow' => 'Single Course', 'title' => 'Single-Course Registration', 'price' => '$49', 'price_meta' => 'one-time access', 'bullets' => "Self-paced video modules\nCourse workbook PDF\nAccess to secure Learning Portal\nMembership in learning community\nCertificate of completion", 'cta_label' => 'Start Learning', 'cta_href' => '#pricing', 'highlighted' => 0 ),
				array( 'eyebrow' => 'Full Library', 'title' => 'Entire Video Library', 'price' => '$245', 'price_meta' => 'annually', 'bullets' => "Access to all RocketPD courses\nSelf-paced video modules\nAll course workbooks\nAccess to secure Learning Portal\nMembership in learning community\nCertificates of completion", 'cta_label' => 'Get Full Library', 'cta_href' => '/launchpad/', 'highlighted' => 1 ),
				array( 'eyebrow' => 'Teams', 'title' => 'School or District Use', 'price' => 'Custom', 'price_meta' => 'contact us for pricing', 'bullets' => "Unlimited team access\nAll RocketPD courses included\nSelf-paced video modules and workbooks\nDedicated success partner\nBuilt-in reporting for leaders", 'cta_label' => 'Talk With RocketPD', 'cta_href' => '/contact/', 'highlighted' => 0 ),
			),
			'related' => array(
				array( 'slug' => 'creating-a-culture-of-love', 'title' => 'Creating a Culture of Love', 'instructor' => 'Dr. Luvelle Brown', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'School Culture', 'href' => '/launchpad/courses/creating-a-culture-of-love/' ),
				array( 'slug' => 'rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course', 'title' => 'Rethinking Teacher Supervision, Coaching & Evaluation', 'instructor' => 'Kim Marshall', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Teacher Evaluation', 'href' => '/launchpad/courses/rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course/' ),
				array( 'slug' => 'blended-learning-universal-design-for-learning', 'title' => 'Supercharge Your Classroom with Blended Learning', 'instructor' => 'Dr. Catlin Tucker', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Blended Learning', 'href' => '/launchpad/courses/blended-learning-universal-design-for-learning/' ),
			),
			'faqs' => array(
				array( 'question' => 'Is this course live or self-paced?', 'answer' => 'This is a self-paced video course. You can start the moment you register and work through the modules on your own schedule.' ),
				array( 'question' => 'What grade levels does this apply to?', 'answer' => "Catlin's frameworks apply across K–12. Her station rotation model and UDL strategies have been implemented in elementary, middle, and high school classrooms worldwide." ),
				array( 'question' => 'Who is this course best suited for?', 'answer' => 'Classroom teachers, instructional coaches, and district leaders who want to shift from whole-group, teacher-led instruction to blended, student-centered learning models.' ),
				array( 'question' => 'Can my school or district purchase access for a team?', 'answer' => 'Yes. RocketPD supports school and district team access. Contact us and we will help map the best option for your team.' ),
			),
			'final_cta' => array(
			'headline'        => "Bring Catlin's work to your district.",
			'body'            => "Explore Catlin's free resources, bring her blended learning work into a cohort, or talk with RocketPD about a custom district experience built around your instructional goals.",
			'primary_label'   => 'Start Learning — $49',
			'primary_href'    => '#pricing',
			'secondary_label' => 'Talk About District Pricing',
			'secondary_href'  => '/contact/',
			),
			),

			 // ─────────────────────────────────────────────────────────────────────
		// A.J. Juliani — Artificial Intelligence in K-12 Schools
		// ─────────────────────────────────────────────────────────────────────
		array(
			'slug'    => 'artificial-intelligence-in-k-12-schools',
			'enabled' => true,
			'resync'  => false,
			'title'   => 'Artificial Intelligence in K-12 Schools',
			'format'  => 'self-paced',
			'topic'   => 'AI in Education',
			'price'   => '$49',
			'price_meta'           => 'single course · anytime access',
			'promise'              => 'A.J. Juliani combines years of experience working with and in schools with the latest research on AI and large language models to showcase how educators and school leaders can use artificial intelligence to improve decision-making, create more engaging learning experiences, and drive efficiencies — while balancing the risks.',
			'trailer_youtube_id'   => 'eCUk_wklm1s',
			'course_image'         => '',
			'primary_cta_label'    => 'Start Learning',
			'primary_cta_href'     => '#pricing',
			'secondary_cta_label'  => 'Watch Trailer',
			'secondary_cta_href'   => '#course-trailer',
			'audiences'            => array( 'Teachers', 'Principals', 'District Leaders' ),
			'meta_items'           => array(
				array( 'icon' => 'clock',  'label' => '1 hour' ),
				array( 'icon' => 'layers', 'label' => '3 video lessons' ),
				array( 'icon' => 'book',   'label' => 'Workbook PDF' ),
				array( 'icon' => 'award',  'label' => 'Certificate' ),
			),
			'instructor' => array(
				'name'        => 'A.J. Juliani',
				'slug'        => 'aj-juliani',
				'headshot'    => '',
				'title'       => 'AI in Education Expert · WSJ Best-Selling Author',
				'role_line'   => 'Wall Street Journal best-selling author, speaker, professor, and former school technology leader',
				'bio'         => 'A.J. Juliani has emerged as one of the top voices on technology, project-based learning, and the responsible use of artificial intelligence in schools. He combines years of experience working with and in schools with the latest research on AI and large language models to give educators and school leaders practical frameworks for using AI to improve outcomes — without losing the human at the center of learning.',
				'specialties' => array( 'Artificial Intelligence in Education', 'Project-Based Learning', 'Technology Integration', 'Student Engagement' ),
				'href'        => '/instructors/aj-juliani/',
			),
			'outcomes_heading' => 'In this course, A.J. Juliani challenges you to:',
			'audience_intro'   => '',
			'outcomes'         => array(
				array( 'title' => "Embrace AI as a 'Hinge of History'", 'summary' => 'Understand why this moment in AI development is a turning point for education — and why school leaders who engage now will be better positioned than those who wait.' ),
				array( 'title' => 'Understand how AI works', 'summary' => 'Go beyond the hype and build a practical, accurate understanding of what large language models can and cannot do in a K-12 context.' ),
				array( 'title' => 'Use AI to improve decision-making and engage students', 'summary' => 'Walk away with concrete strategies for using AI to reduce administrative burden, differentiate instruction, and create more meaningful learning experiences.' ),
			),
			'included_heading' => '',
			'included_items'   => array(),
			'guide' => array(
				'enabled'      => true,
				'title'        => '3 Musts for Every K-12 School District AI Policy',
				'meta'         => 'Free guide',
				'summary'      => 'A practical framework for district leaders who want to build an AI policy that protects students, supports teachers, and keeps pace with rapid change.',
				'href'         => '/3-musts-for-every-k-12-school-district-a-i-policy-with-a-j-juliani/',
				'deliverables' => array( 'The three non-negotiables every district AI policy needs', 'Frameworks for responsible AI use in classrooms and admin offices', 'A starting point for staff conversations about AI adoption' ),
			),
			'podcast' => array(
				'enabled'  => false,
				'title'    => '',
				'meta'     => '',
				'summary'  => '',
				'embed_id' => '',
				'href'     => '',
			),
			'webinar' => array(
				'enabled'  => true,
				'title'    => "Building Your District's AI Strategy",
				'meta'     => 'On-demand course',
				'summary'  => 'A practical conversation with A.J. on what district leaders need to decide — and what they should defer — in their first 12 months with AI.',
				'embed_id' => '',
				'href'     => '/launchpad/courses/building-your-districts-ai-strategy/',
			),
			'blog' => array(
				'enabled' => true,
				'title'   => '3 Musts for Every K-12 School District AI Policy',
				'meta'    => 'ARTICLE',
				'summary' => "A.J. Juliani breaks down the three non-negotiables every district AI policy needs as artificial intelligence becomes an integral part of everyday life in schools.",
				'href'    => '/3-musts-for-every-k-12-school-district-a-i-policy-with-a-j-juliani/',
			),
			'pricing_cards' => array(
				array( 'eyebrow' => 'Single Course', 'title' => 'Single-Course Registration', 'price' => '$49', 'price_meta' => 'one-time access', 'bullets' => "Self-paced video modules\nCourse workbook PDF\nAccess to secure Learning Portal\nMembership in learning community\nCertificate of completion", 'cta_label' => 'Start Learning', 'cta_href' => '#pricing', 'highlighted' => 0 ),
				array( 'eyebrow' => 'Full Library', 'title' => 'Entire Video Library', 'price' => '$245', 'price_meta' => 'annually', 'bullets' => "Access to all RocketPD courses\nSelf-paced video modules\nAll course workbooks\nAccess to secure Learning Portal\nMembership in learning community\nCertificates of completion", 'cta_label' => 'Get Full Library', 'cta_href' => '/launchpad/', 'highlighted' => 1 ),
				array( 'eyebrow' => 'Teams', 'title' => 'School or District Use', 'price' => 'Custom', 'price_meta' => 'contact us for pricing', 'bullets' => "Unlimited team access\nAll RocketPD courses included\nSelf-paced video modules and workbooks\nDedicated success partner\nBuilt-in reporting for leaders", 'cta_label' => 'Talk With RocketPD', 'cta_href' => '/contact/', 'highlighted' => 0 ),
			),
			'related' => array(
				array( 'slug' => 'building-your-districts-ai-strategy', 'title' => "Building Your District's AI Strategy", 'instructor' => 'A.J. Juliani', 'format' => 'webinar', 'price' => 'Free', 'topic' => 'AI in Education', 'href' => '/launchpad/courses/building-your-districts-ai-strategy/' ),
				array( 'slug' => 'creating-a-culture-of-love', 'title' => 'Creating a Culture of Love', 'instructor' => 'Dr. Luvelle Brown', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'School Culture', 'href' => '/launchpad/courses/creating-a-culture-of-love/' ),
				array( 'slug' => 'blended-learning-universal-design-for-learning', 'title' => 'Supercharge Your Classroom with Blended Learning', 'instructor' => 'Dr. Catlin Tucker', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Blended Learning', 'href' => '/launchpad/courses/blended-learning-universal-design-for-learning/' ),
			),
			'faqs' => array(
				array( 'question' => 'Is this course live or self-paced?', 'answer' => 'This is a self-paced video course. You can start the moment you register and work through the modules on your own schedule.' ),
				array( 'question' => 'Do I need a technical background to take this course?', 'answer' => "No. A.J. built this course for educators and school leaders, not engineers. The focus is on practical application, not technical depth." ),
				array( 'question' => 'Who is this course best suited for?', 'answer' => 'Teachers, principals, and district leaders who want to move beyond the AI hype and build a clear, practical strategy for using AI responsibly in their schools.' ),
				array( 'question' => 'Can my school or district purchase access for a team?', 'answer' => 'Yes. RocketPD supports school and district team access. Contact us and we will help map the best option for your team.' ),
			),
			'final_cta' => array(
				'headline'        => "Bring A.J.'s work to your district.",
				'body'            => "Explore A.J.'s free resources, run the self-paced course with your leadership team, or talk with RocketPD about a custom district AI strategy experience.",
				'primary_label'   => 'Start Learning — $49',
				'primary_href'    => '#pricing',
				'secondary_label' => 'Talk About District Pricing',
				'secondary_href'  => '/contact/',
			),
		),

		// ─────────────────────────────────────────────────────────────────────
		// Dr. Peter Liljedahl — Building Thinking Classrooms in Mathematics
		// ─────────────────────────────────────────────────────────────────────
		array(
			'slug'    => 'building-thinking-classrooms-in-mathematics',
			'enabled' => true,
			'resync'  => false,
			'title'   => 'Building Thinking Classrooms in Mathematics',
			'format'  => 'self-paced',
			'topic'   => 'Mathematics Instruction',
			'price'   => '$49',
			'price_meta'           => 'single course · anytime access',
			'promise'              => 'Dr. Peter Liljedahl shows you how to create an ideal setting for processing mathematics by meeting learners where they are and promoting the practice of thinking — as opposed to activity or memorization — using his proven, research-backed Building Thinking Classrooms framework.',
			'trailer_youtube_id'   => '7DxrQIKkClE',
			'course_image'         => '',
			'primary_cta_label'    => 'Start Learning',
			'primary_cta_href'     => '#pricing',
			'secondary_cta_label'  => 'Watch Trailer',
			'secondary_cta_href'   => '#course-trailer',
			'audiences'            => array( 'Classroom Teachers', 'Instructional Coaches', 'Curriculum Coordinators' ),
			'meta_items'           => array(
				array( 'icon' => 'clock',  'label' => '1 hour' ),
				array( 'icon' => 'layers', 'label' => '3 video lessons' ),
				array( 'icon' => 'book',   'label' => 'Workbook PDF' ),
				array( 'icon' => 'award',  'label' => 'Certificate' ),
			),
			'instructor' => array(
				'name'        => 'Dr. Peter Liljedahl',
				'slug'        => 'dr-peter-liljedahl',
				'headshot'    => '',
				'title'       => 'Mathematics Education Expert · Simon Fraser University Professor',
				'role_line'   => 'Best-selling author and former high school mathematics teacher',
				'bio'         => 'Dr. Peter Liljedahl is a Professor of Mathematics Education in the Faculty of Education at Simon Fraser University and author of the best-selling book Building Thinking Classrooms in Mathematics (Grades K-12): 14 Teaching Practices for Enhancing Learning. A former high school mathematics teacher, Peter has dedicated his career to reshaping classroom environments through thinking, collaborative learning, and problem-solving — inspiring educators worldwide to create dynamic and thought-provoking learning spaces.',
				'specialties' => array( 'Mathematics Instruction', 'Building Thinking Classrooms', 'Problem-Based Learning', 'Formative Assessment' ),
				'href'        => '/instructors/dr-peter-liljedahl/',
			),
			'outcomes_heading' => 'In this course, Dr. Peter Liljedahl challenges you to:',
			'audience_intro'   => '',
			'outcomes'         => array(
				array( 'title' => 'Build a Thinking Classroom', 'summary' => 'Learn what pieces make up a Thinking Classroom and how to create the conditions that shift students from mimicking to genuinely processing mathematics.' ),
				array( 'title' => 'Teach content through a Thinking Classroom', 'summary' => 'Master ways to engage students in the practice of thinking and get actionable strategies to launch and sustain Thinking Classrooms in your schools.' ),
				array( 'title' => 'Use assessment to shape learning', 'summary' => 'Apply formative and summative assessment approaches — including thin-slicing — that give you real data on where students are and where they need to go.' ),
			),
			'included_heading' => '',
			'included_items'   => array(),
			'guide' => array(
				'enabled'      => true,
				'title'        => 'The Ultimate Guide to Thinking Teaching Practices',
				'meta'         => 'Free guide',
				'summary'      => 'A practical resource for teachers and instructional coaches who want to shift their classrooms from passive activity to active thinking.',
				'href'         => '/k-12-guides/',
				'deliverables' => array( "Peter Liljedahl's 14 teaching practices for enhancing learning", 'Strategies for introducing thinking tasks and vertical non-permanent surfaces', 'A framework for using visibly random groups to increase engagement' ),
			),
			'podcast' => array(
				'enabled'  => true,
				'title'    => 'How to Move from Doing to Thinking in K-12 Classrooms',
				'meta'     => 'Podcast episode',
				'summary'  => 'Peter unpacks the 7 types of learning activities and explains why most classrooms are dominated by the wrong ones — and how to fix it.',
				'embed_id' => '7DxrQIKkClE',
				'href'     => 'https://www.youtube.com/watch?v=7DxrQIKkClE',
			),
			'webinar' => array(
				'enabled'  => false,
				'title'    => '',
				'meta'     => '',
				'summary'  => '',
				'embed_id' => '',
				'href'     => '',
			),
			'blog' => array(
				'enabled' => true,
				'title'   => "How to Move from 'Doing' to 'Thinking' in K-12 Classrooms: 7 Types of Learning Activities",
				'meta'    => 'ARTICLE',
				'summary' => "Peter Liljedahl's Building Thinking Classrooms framework transforms traditional classrooms into dynamic spaces where collaboration and deep thinking thrive.",
				'href'    => '/how-to-move-from-doing-to-thinking-in-k-12-classrooms-7-types-of-learning-activities-with-peter-liljedahl/',
			),
			'pricing_cards' => array(
				array( 'eyebrow' => 'Single Course', 'title' => 'Single-Course Registration', 'price' => '$49', 'price_meta' => 'one-time access', 'bullets' => "Self-paced video modules\nCourse workbook PDF\nAccess to secure Learning Portal\nMembership in learning community\nCertificate of completion", 'cta_label' => 'Start Learning', 'cta_href' => '#pricing', 'highlighted' => 0 ),
				array( 'eyebrow' => 'Full Library', 'title' => 'Entire Video Library', 'price' => '$245', 'price_meta' => 'annually', 'bullets' => "Access to all RocketPD courses\nSelf-paced video modules\nAll course workbooks\nAccess to secure Learning Portal\nMembership in learning community\nCertificates of completion", 'cta_label' => 'Get Full Library', 'cta_href' => '/launchpad/', 'highlighted' => 1 ),
				array( 'eyebrow' => 'Teams', 'title' => 'School or District Use', 'price' => 'Custom', 'price_meta' => 'contact us for pricing', 'bullets' => "Unlimited team access\nAll RocketPD courses included\nSelf-paced video modules and workbooks\nDedicated success partner\nBuilt-in reporting for leaders", 'cta_label' => 'Talk With RocketPD', 'cta_href' => '/contact/', 'highlighted' => 0 ),
			),
			'related' => array(
				array( 'slug' => 'artificial-intelligence-in-k-12-schools', 'title' => 'Artificial Intelligence in K-12 Schools', 'instructor' => 'A.J. Juliani', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'AI in Education', 'href' => '/launchpad/courses/artificial-intelligence-in-k-12-schools/' ),
				array( 'slug' => 'blended-learning-universal-design-for-learning', 'title' => 'Supercharge Your Classroom with Blended Learning', 'instructor' => 'Dr. Catlin Tucker', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Blended Learning', 'href' => '/launchpad/courses/blended-learning-universal-design-for-learning/' ),
				array( 'slug' => 'adult-well-being-staff-engagement', 'title' => 'Adult Well-Being & Staff Engagement', 'instructor' => 'Carla Tantillo Philibert', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Adult Well-Being', 'href' => '/launchpad/courses/adult-well-being-staff-engagement/' ),
			),
			'faqs' => array(
				array( 'question' => 'Is this course live or self-paced?', 'answer' => 'This is a self-paced video course. You can start the moment you register and work through the modules on your own schedule.' ),
				array( 'question' => 'Does this apply to subjects other than math?', 'answer' => "While Peter's book has Mathematics in the title, the Thinking Classrooms framework can be applied across disciplines. Teachers in other subjects can use and adapt the practices for their classrooms." ),
				array( 'question' => 'Who is this course best suited for?', 'answer' => 'Classroom teachers, instructional coaches, and curriculum coordinators who want to shift their classrooms from passive activity to active thinking.' ),
				array( 'question' => 'Can my school or district purchase access for a team?', 'answer' => 'Yes. RocketPD supports school and district team access. Contact us and we will help map the best option for your team.' ),
			),
			'final_cta' => array(
				'headline'        => "Bring Peter's work to your district.",
				'body'            => 'Give your teachers and instructional coaches a new way to approach instruction — built on research, designed for real classrooms, and ready to implement on Monday.',
				'primary_label'   => 'Start Learning — $49',
				'primary_href'    => '#pricing',
				'secondary_label' => 'Talk About District Pricing',
				'secondary_href'  => '/contact/',
			),
		),

		// ─────────────────────────────────────────────────────────────────────
		// Carla Tantillo Philibert — Adult Well-Being & Staff Engagement
		// ─────────────────────────────────────────────────────────────────────
		array(
			'slug'    => 'adult-well-being-staff-engagement',
			'enabled' => true,
			'resync'  => false,
			'title'   => 'Adult Well-Being & Staff Engagement',
			'format'  => 'self-paced',
			'topic'   => 'Adult Well-Being',
			'price'   => '$49',
			'price_meta'           => 'single course · anytime access',
			'promise'              => 'Carla Tantillo Philibert is on a mission to help every student benefit from the support of a caring adult. To do that, she helps school leaders support the personal and professional needs of front-line staff with a practical framework educators can use to advocate for and care for themselves.',
			'trailer_youtube_id'   => 'QrTi9gJvKPY',
			'course_image'         => '',
			'primary_cta_label'    => 'Start Learning',
			'primary_cta_href'     => '#pricing',
			'secondary_cta_label'  => 'Watch Trailer',
			'secondary_cta_href'   => '#course-trailer',
			'audiences'            => array( 'Principals', 'Leadership Teams', 'Teachers' ),
			'meta_items'           => array(
				array( 'icon' => 'clock',  'label' => '1 hour' ),
				array( 'icon' => 'layers', 'label' => '3 video lessons' ),
				array( 'icon' => 'book',   'label' => 'Workbook PDF' ),
				array( 'icon' => 'award',  'label' => 'Certificate' ),
			),
			'instructor' => array(
				'name'        => 'Carla Tantillo Philibert',
				'slug'        => 'carla-tantillo-philibert',
				'headshot'    => '',
				'title'       => 'Adult Well-Being Expert · Author & Entrepreneur',
				'role_line'   => 'Author, entrepreneur, and former classroom educator',
				'bio'         => 'Author, entrepreneur and former classroom educator Carla Tantillo Philibert is one of the nation’s leading voices on the power of collective well-being and staff retention in schools. She helps school leaders support the personal and professional needs of front-line staff by showing busy educators a practical framework that they can use to advocate for and care for themselves — so that every student can benefit from the support of a caring adult.',
				'specialties' => array( 'Adult Well-Being', 'Staff Retention', 'Mindfulness in Schools', 'Social-Emotional Learning' ),
				'href'        => '/instructors/carla-tantillo-philibert/',
			),
			'outcomes_heading' => 'In this course, Carla Tantillo Philibert challenges you to:',
			'audience_intro'   => '',
			'outcomes'         => array(
				array( 'title' => 'Care for your people and yourself', 'summary' => 'Shift from a culture of compliance to a culture of care — starting with a practical understanding of what adult well-being actually requires in a school setting.' ),
				array( 'title' => 'Find your starting point with adult well-being', 'summary' => 'Assess where your school or team currently stands and identify the highest-leverage entry point for building sustainable well-being practices.' ),
				array( 'title' => "Get immersed in the 'practice' of well-being", 'summary' => "Apply Carla's five-part framework to anchor adult needs alongside student needs — and walk away with tools you can use Monday morning." ),
			),
			'included_heading' => '',
			'included_items'   => array(),
			'guide' => array(
				'enabled'      => true,
				'title'        => 'The Ultimate Guide to Adult Well-Being in Schools',
				'meta'         => 'Free guide',
				'summary'      => 'A practical resource for school leaders who want to anchor adult well-being alongside student needs and build the conditions that keep great teachers in the building.',
				'href'         => '/k-12-guides/',
				'deliverables' => array( "Carla's five-part framework for adult well-being", 'Strategies for supporting staff retention through collective care', 'Tools for building sustainable well-being practices in your school' ),
			),
			'podcast' => array(
				'enabled'  => true,
				'title'    => 'The Link Between Adult Well-Being & Staff Retention',
				'meta'     => 'Podcast episode',
				'summary'  => 'Carla unpacks the five-part framework school leaders can use to support adult well-being and reduce teacher turnover.',
				'embed_id' => 'QrTi9gJvKPY',
				'href'     => 'https://www.youtube.com/watch?v=QrTi9gJvKPY',
			),
			'webinar' => array(
				'enabled'  => false,
				'title'    => '',
				'meta'     => '',
				'summary'  => '',
				'embed_id' => '',
				'href'     => '',
			),
			'blog' => array(
				'enabled' => true,
				'title'   => 'Use This Five-Part Framework to Support Adult Well-Being in Your Schools',
				'meta'    => 'ARTICLE',
				'summary' => 'Supporting adult well-being in schools is no longer a nice-to-have. Carla Tantillo Philibert shares a five-part framework school leaders can act on now.',
				'href'    => '/use-this-five-part-framework-to-support-adult-well-being-in-your-schools-with-carla-tantillo-philibert/',
			),
			'pricing_cards' => array(
				array( 'eyebrow' => 'Single Course', 'title' => 'Single-Course Registration', 'price' => '$49', 'price_meta' => 'one-time access', 'bullets' => "Self-paced video modules\nCourse workbook PDF\nAccess to secure Learning Portal\nMembership in learning community\nCertificate of completion", 'cta_label' => 'Start Learning', 'cta_href' => '#pricing', 'highlighted' => 0 ),
				array( 'eyebrow' => 'Full Library', 'title' => 'Entire Video Library', 'price' => '$245', 'price_meta' => 'annually', 'bullets' => "Access to all RocketPD courses\nSelf-paced video modules\nAll course workbooks\nAccess to secure Learning Portal\nMembership in learning community\nCertificates of completion", 'cta_label' => 'Get Full Library', 'cta_href' => '/launchpad/', 'highlighted' => 1 ),
				array( 'eyebrow' => 'Teams', 'title' => 'School or District Use', 'price' => 'Custom', 'price_meta' => 'contact us for pricing', 'bullets' => "Unlimited team access\nAll RocketPD courses included\nSelf-paced video modules and workbooks\nDedicated success partner\nBuilt-in reporting for leaders", 'cta_label' => 'Talk With RocketPD', 'cta_href' => '/contact/', 'highlighted' => 0 ),
			),
			'related' => array(
				array( 'slug' => 'creating-a-culture-of-love', 'title' => 'Creating a Culture of Love', 'instructor' => 'Dr. Luvelle Brown', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'School Culture', 'href' => '/launchpad/courses/creating-a-culture-of-love/' ),
				array( 'slug' => 'building-thinking-classrooms-in-mathematics', 'title' => 'Building Thinking Classrooms in Mathematics', 'instructor' => 'Dr. Peter Liljedahl', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Mathematics Instruction', 'href' => '/launchpad/courses/building-thinking-classrooms-in-mathematics/' ),
				array( 'slug' => 'rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course', 'title' => 'Rethinking Teacher Supervision, Coaching & Evaluation', 'instructor' => 'Kim Marshall', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Teacher Evaluation', 'href' => '/launchpad/courses/rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course/' ),
			),
			'faqs' => array(
				array( 'question' => 'Is this course live or self-paced?', 'answer' => 'This is a self-paced video course. You can start the moment you register and work through the modules on your own schedule.' ),
				array( 'question' => 'Who is this course best suited for?', 'answer' => 'Principals, leadership teams, and teachers who want to build sustainable well-being practices that keep great educators in the building.' ),
				array( 'question' => 'Is this just for administrators?', 'answer' => "No. While school leaders will find the framework immediately actionable, Carla's approach is designed for front-line educators too. Any adult in a school building can benefit from and apply these practices." ),
				array( 'question' => 'Can my school or district purchase access for a team?', 'answer' => 'Yes. RocketPD supports school and district team access. Contact us and we will help map the best option for your team.' ),
			),
			'final_cta' => array(
				'headline'        => "Bring Carla's work to your district.",
				'body'            => 'Build the adult well-being practices that keep great teachers in the building — practical, evidence-based, and ready to implement Monday morning.',
				'primary_label'   => 'Start Learning — $49',
				'primary_href'    => '#pricing',
				'secondary_label' => 'Talk About District Pricing',
				'secondary_href'  => '/contact/',
			),
		),

		// ─────────────────────────────────────────────────────────────────────
		// Robert Barnett — Redesigning Instruction to Meet Every Learner's Needs
		// ─────────────────────────────────────────────────────────────────────
		array(
			'slug'    => 'redesigning-instruction-to-meet-every-learners-needs-with-robert-barnett',
			'enabled' => true,
			'resync'  => false,
			'title'   => "Redesigning Instruction to Meet Every Learner's Needs",
			'format'  => 'self-paced',
			'topic'   => 'Individualized Instruction',
			'price'   => '$49',
			'price_meta'           => 'single course · anytime access',
			'promise'              => 'Former teacher and Modern Classrooms Project co-founder Robert Barnett introduces practical, research-backed strategies that help educators digitize direct instruction, create self-paced lessons, and implement mastery-based learning — making instruction more personalized, equitable, and effective.',
			'trailer_youtube_id'   => 'lgBZmF-wntw',
			'course_image'         => '',
			'primary_cta_label'    => 'Start Learning',
			'primary_cta_href'     => '#pricing',
			'secondary_cta_label'  => 'Watch Trailer',
			'secondary_cta_href'   => '#course-trailer',
			'audiences'            => array( 'Teachers', 'Instructional Coaches', 'Curriculum Directors' ),
			'meta_items'           => array(
				array( 'icon' => 'clock',  'label' => '1 hour' ),
				array( 'icon' => 'layers', 'label' => '3 video lessons' ),
				array( 'icon' => 'book',   'label' => 'Workbook PDF' ),
				array( 'icon' => 'award',  'label' => 'Certificate' ),
			),
			'instructor' => array(
				'name'        => 'Robert Barnett',
				'slug'        => 'robert-barnett',
				'headshot'    => '',
				'title'       => 'Individualized Instruction Expert · Modern Classrooms Project Co-Founder',
				'role_line'   => 'Former teacher, author of Meet Every Learner’s Needs, and co-founder of Modern Classrooms Project',
				'bio'         => 'Robert Barnett is a former teacher, co-founder of Modern Classrooms Project, and author of Meet Every Learner’s Needs. He has helped thousands of educators rethink how they deliver instruction — making it more personalized, equitable, and effective through digitized direct instruction, self-paced lessons, and mastery-based learning. This course is presented by RocketPD in partnership with Modern Classrooms Project.',
				'specialties' => array( 'Individualized Instruction', 'Mastery-Based Learning', 'Self-Paced Learning', 'Blended Learning' ),
				'href'        => '/instructors/robert-barnett/',
			),
			'outcomes_heading' => 'By the end of this course, you will:',
			'audience_intro'   => '',
			'outcomes'         => array(
				array( 'title' => 'Digitize direct instruction to free up time for targeted student support.', 'summary' => 'Learn how to move your core instruction into short, teacher-created videos so you can spend class time where it matters most — working directly with students who need you.' ),
				array( 'title' => 'Create self-paced lessons that allow students to progress at their own speed.', 'summary' => 'Design flexible lesson structures that let every student move at the pace that works for them — reducing frustration for struggling learners and boredom for advanced ones.' ),
				array( 'title' => 'Deliver mastery checks to ensure deep understanding and retention of concepts.', 'summary' => 'Build in simple, low-stakes checkpoints that confirm students have truly understood each concept before moving on — not just completed the activity.' ),
			),
			'included_heading' => '',
			'included_items'   => array(),
			'guide' => array(
				'enabled'      => true,
				'title'        => "The Ultimate Guide to Meeting Every Learner's Needs",
				'meta'         => 'Free guide',
				'summary'      => "A practical resource for educators who want to move beyond one-size-fits-all instruction and start meeting every learner where they are.",
				'href'         => '/k-12-guides/',
				'deliverables' => array( "Robert Barnett's framework for digitizing direct instruction", 'Steps for building self-paced lessons that actually work in real classrooms', 'A mastery-based assessment approach you can implement this week' ),
			),
			'podcast' => array(
				'enabled'  => true,
				'title'    => "Redesigning Instruction to Meet Every Learner's Needs",
				'meta'     => 'Podcast episode',
				'summary'  => 'Robert Barnett unpacks how the Modern Classrooms Project model helps teachers move from whole-group instruction to truly individualized learning.',
				'embed_id' => 'lgBZmF-wntw',
				'href'     => 'https://www.youtube.com/watch?v=lgBZmF-wntw',
			),
			'webinar' => array(
				'enabled'  => false,
				'title'    => '',
				'meta'     => '',
				'summary'  => '',
				'embed_id' => '',
				'href'     => '',
			),
			'blog' => array(
				'enabled' => true,
				'title'   => "Personalized Learning vs. Traditional Classrooms: Are Schools Truly Meeting Every Learner's Needs?",
				'meta'    => 'ARTICLE',
				'summary' => 'Traditional classrooms follow a one-size-fits-all model, but personalized learning empowers students with self-paced, mastery-based education.',
				'href'    => '/personalized-learning-vs-traditional-classrooms-are-schools-truly-meeting-every-learners-needs/',
			),
			'pricing_cards' => array(
				array( 'eyebrow' => 'Single Course', 'title' => 'Single-Course Registration', 'price' => '$49', 'price_meta' => 'one-time access', 'bullets' => "Self-paced video modules\nCourse workbook PDF\nAccess to secure Learning Portal\nMembership in learning community\nCertificate of completion", 'cta_label' => 'Start Learning', 'cta_href' => '#pricing', 'highlighted' => 0 ),
				array( 'eyebrow' => 'Full Library', 'title' => 'Entire Video Library', 'price' => '$245', 'price_meta' => 'annually', 'bullets' => "Access to all RocketPD courses\nSelf-paced video modules\nAll course workbooks\nAccess to secure Learning Portal\nMembership in learning community\nCertificates of completion", 'cta_label' => 'Get Full Library', 'cta_href' => '/launchpad/', 'highlighted' => 1 ),
				array( 'eyebrow' => 'Teams', 'title' => 'School or District Use', 'price' => 'Custom', 'price_meta' => 'contact us for pricing', 'bullets' => "Unlimited team access\nAll RocketPD courses included\nSelf-paced video modules and workbooks\nDedicated success partner\nBuilt-in reporting for leaders", 'cta_label' => 'Talk With RocketPD', 'cta_href' => '/contact/', 'highlighted' => 0 ),
			),
			'related' => array(
				array( 'slug' => 'blended-learning-universal-design-for-learning', 'title' => 'Supercharge Your Classroom with Blended Learning', 'instructor' => 'Dr. Catlin Tucker', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Blended Learning', 'href' => '/launchpad/courses/blended-learning-universal-design-for-learning/' ),
				array( 'slug' => 'artificial-intelligence-in-k-12-schools', 'title' => 'Artificial Intelligence in K-12 Schools', 'instructor' => 'A.J. Juliani', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'AI in Education', 'href' => '/launchpad/courses/artificial-intelligence-in-k-12-schools/' ),
				array( 'slug' => 'building-thinking-classrooms-in-mathematics', 'title' => 'Building Thinking Classrooms in Mathematics', 'instructor' => 'Dr. Peter Liljedahl', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Mathematics Instruction', 'href' => '/launchpad/courses/building-thinking-classrooms-in-mathematics/' ),
			),
			'faqs' => array(
				array( 'question' => 'Is this course live or self-paced?', 'answer' => 'This is a self-paced video course. You can start the moment you register and work through the modules on your own schedule.' ),
				array( 'question' => 'What grade levels does this apply to?', 'answer' => "Robert's Modern Classrooms framework has been implemented across K–12. The strategies are adaptable for elementary, middle, and high school teachers in any subject area." ),
				array( 'question' => 'Who is this course best suited for?', 'answer' => 'Teachers, instructional coaches, and curriculum directors who want to move beyond whole-group instruction and build classrooms where every learner can succeed at their own pace.' ),
				array( 'question' => 'Can my school or district purchase access for a team?', 'answer' => 'Yes. RocketPD supports school and district team access. Contact us and we will help map the best option for your team.' ),
			),
			'final_cta' => array(
				'headline'        => "Bring Robert's work to your district.",
				'body'            => 'Help your teachers move beyond one-size-fits-all instruction with a proven, research-backed model that meets every learner where they are.',
				'primary_label'   => 'Start Learning — $49',
				'primary_href'    => '#pricing',
				'secondary_label' => 'Talk About District Pricing',
				'secondary_href'  => '/contact/',
			),
		),

	); // end return array
}
