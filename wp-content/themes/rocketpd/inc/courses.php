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

	); // end return array
}
