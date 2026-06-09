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

	return rocketpd_filter_courses_index_items(
		array(
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
			'slug'           => 'engaging-every-family-self-paced-course',
			'title'          => __( 'Engaging Every Family', 'rocketpd' ),
			'instructor'     => __( 'Dr. Steve Constantino', 'rocketpd' ),
			'instructorSlug' => 'dr-steve-constantino',
			'headshot'       => $base . '2023/05/dr-steve-constantino.jpg',
			'image'          => $base . '2024/03/dr-steve-constantino-video.png',
			'format'         => 'self-paced',
			'price'          => __( '$49', 'rocketpd' ),
			'topic'          => __( 'Family Engagement', 'rocketpd' ),
			'audiences'      => array( __( 'Principals', 'rocketpd' ), __( 'District Leaders', 'rocketpd' ), __( 'Teachers', 'rocketpd' ) ),
			'description'    => __( 'Build trust with families and develop strong school-family partnerships that lead to better attendance and improved student outcomes.', 'rocketpd' ),
			'meta'           => __( '3 modules · 1 hour · Workbook included', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/engaging-every-family-self-paced-course/' ),
		),
		array(
			'slug'           => 'close-learning-gaps-through-reading-instruction-self-paced-video-course',
			'title'          => __( 'Close Learning Gaps Through Reading Instruction', 'rocketpd' ),
			'instructor'     => __( 'Beth P. Estill', 'rocketpd' ),
			'instructorSlug' => 'beth-p-estill',
			'headshot'       => $base . '2024/03/beth-estill-video-course.png',
			'image'          => $base . '2024/03/beth-estill-video-course.png',
			'format'         => 'self-paced',
			'price'          => __( '$49', 'rocketpd' ),
			'topic'          => __( 'Reading Instruction', 'rocketpd' ),
			'audiences'      => array( __( 'Classroom Teachers', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ), __( 'Principals', 'rocketpd' ) ),
			'description'    => __( 'Use the science of reading to close learning gaps and help every student become a confident reader with proven intervention and prevention strategies.', 'rocketpd' ),
			'meta'           => __( '3 modules · 1 hour · Workbook included', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/close-learning-gaps-through-reading-instruction-self-paced-video-course/' ),
		),
		array(
			'slug'           => 'fine-tune-your-lessons-with-the-fundamentals-with-jennifer-gonzalez',
			'title'          => __( 'Fine-Tune Your Lessons with the Fundamentals', 'rocketpd' ),
			'instructor'     => __( 'Jennifer Gonzalez', 'rocketpd' ),
			'instructorSlug' => 'jennifer-gonzalez',
			'headshot'       => $base . '2024/03/Jennifer-Gonzalez.jpg',
			'image'          => $base . '2024/03/Jennifer-Gonzalez.jpg',
			'format'         => 'self-paced',
			'price'          => __( '$49', 'rocketpd' ),
			'topic'          => __( 'Teaching Efficacy', 'rocketpd' ),
			'audiences'      => array( __( 'Classroom Teachers', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ), __( 'Curriculum Directors', 'rocketpd' ) ),
			'description'    => __( 'Master the fundamentals of lesson design — clear objectives, aligned assessments, and student-centered learning experiences that drive mastery.', 'rocketpd' ),
			'meta'           => __( '3 modules · 1 hour · Workbook included', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/fine-tune-your-lessons-with-the-fundamentals-with-jennifer-gonzalez/' ),
		),
		array(
			'slug'           => 'transformational-school-leadership-with-dr-michael-hinojosa',
			'title'          => __( 'Transformational School Leadership', 'rocketpd' ),
			'instructor'     => __( 'Dr. Michael Hinojosa', 'rocketpd' ),
			'instructorSlug' => 'dr-michael-hinojosa',
			'headshot'       => $base . '2024/03/dr-michael-hinojosa-video-course.png',
			'image'          => $base . '2024/03/dr-michael-hinojosa-video-course.png',
			'format'         => 'self-paced',
			'price'          => __( '$49', 'rocketpd' ),
			'topic'          => __( 'School Leadership', 'rocketpd' ),
			'audiences'      => array( __( 'Superintendents', 'rocketpd' ), __( 'Principals', 'rocketpd' ), __( 'District Leaders', 'rocketpd' ) ),
			'description'    => __( 'Three practical strategies from a National Superintendent of the Year for navigating talent, strategic thinking, and the politics of school leadership.', 'rocketpd' ),
			'meta'           => __( '3 modules · 1 hour · Workbook included', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/transformational-school-leadership-with-dr-michael-hinojosa/' ),
		),
		array(
			'slug'           => 'fearless-school-communications-with-veronica-v-sopher',
			'title'          => __( 'Fearless School Communications', 'rocketpd' ),
			'instructor'     => __( 'Veronica V. Sopher', 'rocketpd' ),
			'instructorSlug' => 'veronica-v-sopher',
			'headshot'       => $base . '2024/03/veronica-sopher-video-course.png',
			'image'          => $base . '2024/03/veronica-sopher-video-course.png',
			'format'         => 'self-paced',
			'price'          => __( '$49', 'rocketpd' ),
			'topic'          => __( 'School Communications', 'rocketpd' ),
			'audiences'      => array( __( 'Principals', 'rocketpd' ), __( 'Superintendents', 'rocketpd' ), __( 'District Communications Directors', 'rocketpd' ) ),
			'description'    => __( 'Build trust with families and communicate with confidence — especially around sensitive issues like security, mental health, and academic performance.', 'rocketpd' ),
			'meta'           => __( '3 modules · 1 hour · Workbook included', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/fearless-school-communications-with-veronica-v-sopher/' ),
		),
		array(
			'slug'           => 'using-pbl-to-spark-real-world-learning-with-john-spencer',
			'title'          => __( 'Using PBL to Spark Real-World Learning', 'rocketpd' ),
			'instructor'     => __( 'Dr. John Spencer', 'rocketpd' ),
			'instructorSlug' => 'dr-john-spencer',
			'headshot'       => '/wp-content/uploads/2025/03/dr-john-spencer.jpg',
			'image'          => '/wp-content/uploads/2025/03/dr-john-spencer.jpg',
			'format'         => 'self-paced',
			'price'          => __( '$49', 'rocketpd' ),
			'topic'          => __( 'Project-Based Learning', 'rocketpd' ),
			'audiences'      => array( __( 'Classroom Teachers', 'rocketpd' ), __( 'Instructional Coaches', 'rocketpd' ), __( 'Curriculum Directors', 'rocketpd' ) ),
			'description'    => __( 'Design authentic PBL units that help students master standards while developing creativity, collaboration, and resilience for an unpredictable world.', 'rocketpd' ),
			'meta'           => __( '3 modules · 1 hour · Workbook included', 'rocketpd' ),
			'href'           => home_url( '/launchpad/courses/using-pbl-to-spark-real-world-learning-with-john-spencer/' ),
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
		)
	);
}

/**
 * Limit the Course Index gallery to the approved handoff catalog.
 *
 * The full seed data below supports detail pages and future sync work; the
 * index page intentionally displays the 3 webinar / 6 course / 3 cohort set.
 *
 * @param array $courses Course records.
 * @return array
 */
function rocketpd_filter_courses_index_items( $courses ) {
	$allowed_slugs = array(
		'mini-observations-that-actually-move-teaching',
		'building-your-districts-ai-strategy',
		'action-oriented-family-engagement',
		'rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course',
		'creating-a-culture-of-love',
		'blended-learning-universal-design-for-learning',
		'artificial-intelligence-in-k-12-schools',
		'building-thinking-classrooms-in-mathematics',
		'adult-well-being-staff-engagement',
		'mini-observations-mastery-live-cohort',
		'build-ownership-not-buy-in-live-cohort',
		'unlocking-teacher-productivity-live-cohort',
	);

	$allowed = array_flip( $allowed_slugs );

	return array_values(
		array_filter(
			$courses,
			function ( $course ) use ( $allowed ) {
				return isset( $course['slug'], $allowed[ $course['slug'] ] );
			}
		)
	);
}

/**
 * Return decorative hero feature cards from the handoff.
 *
 * @return array
 */
function rocketpd_get_courses_hero_features() {
	$asset_base = get_template_directory_uri() . '/assets/images/courses/';

	return array(
		array(
			'title'      => __( 'Rethinking Teacher Supervision, Coaching & Evaluation', 'rocketpd' ),
			'instructor' => __( 'Kim Marshall', 'rocketpd' ),
			'format'     => 'self-paced',
			'image'      => $asset_base . 'kim-marshall-video-course.png',
		),
		array(
			'title'      => __( 'Fine-Tune Your Lessons with the Fundamentals', 'rocketpd' ),
			'instructor' => __( 'Jennifer Gonzalez', 'rocketpd' ),
			'format'     => 'self-paced',
			'image'      => $asset_base . 'jennifer-gonzalez.jpg',
		),
		array(
			'title'      => __( 'Blended Learning & Universal Design for Learning', 'rocketpd' ),
			'instructor' => __( 'Dr. Catlin Tucker', 'rocketpd' ),
			'format'     => 'self-paced',
			'image'      => $asset_base . 'catlin-tucker.png',
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
 * To seed a course:   set enabled => true, deploy, click Seed Courses, set back to false.
 * To update a course: set enabled => true, resync => true, deploy, click Seed Courses, set both back to false.
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
			'enabled' => false,
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
			'enabled' => false,
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
			'enabled' => false,
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
			'enabled' => false,
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
			'enabled' => false,
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
			'enabled' => false,
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
				'bio'         => "Author, entrepreneur and former classroom educator Carla Tantillo Philibert is one of the nation's leading voices on the power of collective well-being and staff retention in schools. She helps school leaders support the personal and professional needs of front-line staff by showing busy educators a practical framework that they can use to advocate for and care for themselves — so that every student can benefit from the support of a caring adult.",
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
			'enabled' => false,
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
				'role_line'   => "Former teacher, author of Meet Every Learner's Needs, and co-founder of Modern Classrooms Project",
				'bio'         => "Robert Barnett is a former teacher, co-founder of Modern Classrooms Project, and author of Meet Every Learner's Needs. He has helped thousands of educators rethink how they deliver instruction — making it more personalized, equitable, and effective through digitized direct instruction, self-paced lessons, and mastery-based learning. This course is presented by RocketPD in partnership with Modern Classrooms Project.",
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

		// ─────────────────────────────────────────────────────────────────────
		// Dr. Steve Constantino — Engaging Every Family
		// ─────────────────────────────────────────────────────────────────────
		array(
			'slug'    => 'engaging-every-family-self-paced-course',
			'enabled' => false,
			'resync'  => false,
			'title'   => 'Engaging Every Family',
			'format'  => 'self-paced',
			'topic'   => 'Family Engagement',
			'price'   => '$49',
			'price_meta'           => 'single course · anytime access',
			'promise'              => 'Dr. Steve Constantino combines research and personal experience with concrete examples, case studies, and practical exercises to help you build trust with families and develop strong relationships — leading to better attendance, fewer disruptions, and improved student outcomes.',
			'trailer_youtube_id'   => 'IPHV-yYcTEg',
			'course_image'         => '',
			'primary_cta_label'    => 'Start Learning',
			'primary_cta_href'     => '#pricing',
			'secondary_cta_label'  => 'Watch Trailer',
			'secondary_cta_href'   => '#course-trailer',
			'audiences'            => array( 'Principals', 'District Leaders', 'Teachers' ),
			'meta_items'           => array(
				array( 'icon' => 'clock',  'label' => '1 hour' ),
				array( 'icon' => 'layers', 'label' => '3 video lessons' ),
				array( 'icon' => 'book',   'label' => 'Workbook PDF' ),
				array( 'icon' => 'award',  'label' => 'Certificate' ),
			),
			'instructor' => array(
				'name'        => 'Dr. Steve Constantino',
				'slug'        => 'dr-steve-constantino',
				'headshot'    => '',
				'title'       => 'Family Engagement Expert · Best-Selling Author',
				'role_line'   => 'Best-selling author of Engage Every Family, college professor, keynote speaker, and career educator',
				'bio'         => "Dr. Steve Constantino is one of the nation's foremost experts on action-oriented family engagement. As a best-selling author, college professor, and career educator, he combines research and personal experience with concrete examples and practical exercises to help school leaders build genuine trust with families — turning engagement from a checkbox into a catalyst for student success.",
				'specialties' => array( 'Family Engagement', 'School-Community Partnerships', 'Student Attendance', 'Equity in Education' ),
				'href'        => '/instructors/dr-steve-constantino/',
			),
			'outcomes_heading' => 'What Dr. Steve Constantino wants you to walk away with:',
			'audience_intro'   => '',
			'outcomes'         => array(
				array( 'title' => 'Understand why family engagement matters', 'summary' => 'Examine the research connecting family engagement to student outcomes — and build the conviction and language to make it a school-wide priority.' ),
				array( 'title' => "Master the '7 Big Ideas' in family engagement", 'summary' => "Learn Dr. Constantino's seven foundational principles that distinguish schools with genuine family partnerships from those with surface-level involvement programs." ),
				array( 'title' => 'Explore why some families disengage', 'summary' => 'Understand the barriers — historical, cultural, and practical — that cause families to pull back, and develop strategies to meet them where they are.' ),
			),
			'included_heading' => '',
			'included_items'   => array(),
			'guide' => array(
				'enabled'      => true,
				'title'        => 'The Ultimate Guide to Action-Oriented Family Engagement',
				'meta'         => 'Free guide',
				'summary'      => 'A practical resource for school leaders who want to move beyond bake sales and parent nights to build lasting, trust-based family partnerships.',
				'href'         => '/k-12-guides/',
				'deliverables' => array( "Dr. Constantino's 7 Big Ideas for family engagement", 'Strategies for reaching disengaged and hard-to-reach families', 'A framework for building school-wide family partnership systems' ),
			),
			'podcast' => array(
				'enabled'  => true,
				'title'    => '3 Ways to Engage Disengaged Families',
				'meta'     => 'Podcast episode',
				'summary'  => 'Dr. Constantino shares three practical strategies for reaching families who seem unreachable — and why the schools that do it well have better outcomes across the board.',
				'embed_id' => 'IPHV-yYcTEg',
				'href'     => 'https://www.youtube.com/watch?v=IPHV-yYcTEg',
			),
			'webinar' => array(
				'enabled'  => true,
				'title'    => 'Action-Oriented Family Engagement',
				'meta'     => 'On-demand webinar',
				'summary'  => 'Dr. Constantino walks through what actually moves the needle for family-school partnership — beyond bake sales and parent nights.',
				'embed_id' => '',
				'href'     => '/launchpad/courses/action-oriented-family-engagement/',
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
				array( 'slug' => 'creating-a-culture-of-love', 'title' => 'Creating a Culture of Love', 'instructor' => 'Dr. Luvelle Brown', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'School Culture', 'href' => '/launchpad/courses/creating-a-culture-of-love/' ),
				array( 'slug' => 'adult-well-being-staff-engagement', 'title' => 'Adult Well-Being & Staff Engagement', 'instructor' => 'Carla Tantillo Philibert', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Adult Well-Being', 'href' => '/launchpad/courses/adult-well-being-staff-engagement/' ),
				array( 'slug' => 'rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course', 'title' => 'Rethinking Teacher Supervision, Coaching & Evaluation', 'instructor' => 'Kim Marshall', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Teacher Evaluation', 'href' => '/launchpad/courses/rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course/' ),
			),
			'faqs' => array(
				array( 'question' => 'Is this course live or self-paced?', 'answer' => 'This is a self-paced video course. You can start the moment you register and work through the modules on your own schedule.' ),
				array( 'question' => 'Who is this course best suited for?', 'answer' => 'Principals, district leaders, and teachers who want to move beyond surface-level parent involvement and build genuine, trust-based partnerships with families.' ),
				array( 'question' => 'Does this apply to all school levels?', 'answer' => "Yes. Dr. Constantino's framework applies across elementary, middle, and high school. The principles of trust-building and reaching disengaged families are universal." ),
				array( 'question' => 'Can my school or district purchase access for a team?', 'answer' => 'Yes. RocketPD supports school and district team access. Contact us and we will help map the best option for your team.' ),
			),
			'final_cta' => array(
				'headline'        => "Bring Dr. Constantino's work to your district.",
				'body'            => 'Give every family a reason to engage — with a proven, research-backed framework that turns family engagement from a checkbox into a catalyst for student success.',
				'primary_label'   => 'Start Learning — $49',
				'primary_href'    => '#pricing',
				'secondary_label' => 'Talk About District Pricing',
				'secondary_href'  => '/contact/',
			),
		),

		// ─────────────────────────────────────────────────────────────────────
		// Beth P. Estill — Close Learning Gaps Through Reading Instruction
		// ─────────────────────────────────────────────────────────────────────
		array(
			'slug'    => 'close-learning-gaps-through-reading-instruction-self-paced-video-course',
			'enabled' => false,
			'resync'  => false,
			'title'   => 'Close Learning Gaps Through Reading Instruction',
			'format'  => 'self-paced',
			'topic'   => 'Reading Instruction',
			'price'   => '$49',
			'price_meta'           => 'single course · anytime access',
			'promise'              => "Nationally renowned reading coach Beth Estill believes every student can learn to read. She combines the science of reading with a deep look at whole- and small-group instruction and proven interventions to give teachers and coaches a clear framework for closing learning gaps.",
			'trailer_youtube_id'   => 'J9svLdwL_Ac',
			'course_image'         => '',
			'primary_cta_label'    => 'Start Learning',
			'primary_cta_href'     => '#pricing',
			'secondary_cta_label'  => 'Watch Trailer',
			'secondary_cta_href'   => '#course-trailer',
			'audiences'            => array( 'Classroom Teachers', 'Instructional Coaches', 'Principals' ),
			'meta_items'           => array(
				array( 'icon' => 'clock',  'label' => '1 hour' ),
				array( 'icon' => 'layers', 'label' => '3 video lessons' ),
				array( 'icon' => 'book',   'label' => 'Workbook PDF' ),
				array( 'icon' => 'award',  'label' => 'Certificate' ),
			),
			'instructor' => array(
				'name'        => 'Beth P. Estill',
				'slug'        => 'beth-p-estill',
				'headshot'    => '',
				'title'       => 'Reading Instruction Expert · Nationally Renowned Reading Coach',
				'role_line'   => 'Longtime educator and nationally renowned reading coach',
				'bio'         => "Longtime educator and nationally renowned reading coach Beth Estill believes every student can learn to read. She combines research into the science of reading with a deep look at the unique benefits and drawbacks of whole- and small-group instruction and proven interventions for struggling readers — giving instructional coaches and classroom teachers the confidence and framework to close learning gaps through effective reading instruction.",
				'specialties' => array( 'Reading Instruction', 'Science of Reading', 'Intervention & Prevention', 'Struggling Readers' ),
				'href'        => '/instructors/beth-p-estill/',
			),
			'outcomes_heading' => 'What you will be equipped to do after this course:',
			'audience_intro'   => '',
			'outcomes'         => array(
				array( 'title' => "Understand the 'big picture' of reading instruction", 'summary' => 'Ground your practice in the science of reading and understand the full landscape of what effective, research-based reading instruction looks like across grade levels.' ),
				array( 'title' => 'Embrace strategies for intervention vs. prevention', 'summary' => 'Distinguish between preventive classroom practices and targeted intervention approaches — and know when and how to deploy each to close learning gaps.' ),
				array( 'title' => 'Intervene to help reach struggling readers', 'summary' => 'Apply proven intervention strategies with confidence, including small-group instruction approaches that meet struggling readers where they are and move them forward.' ),
			),
			'included_heading' => '',
			'included_items'   => array(),
			'guide' => array(
				'enabled'      => true,
				'title'        => 'The Ultimate Guide to Closing Learning Gaps Through Reading',
				'meta'         => 'Free guide',
				'summary'      => 'A practical resource for teachers and coaches who want to use the science of reading to close learning gaps and help every student become a confident reader.',
				'href'         => '/k-12-guides/',
				'deliverables' => array( "Beth Estill's framework for the science of reading in K–12", 'Intervention vs. prevention strategies for struggling readers', 'Small-group instruction approaches you can implement this week' ),
			),
			'podcast' => array(
				'enabled'  => true,
				'title'    => 'Close Learning Gaps Through Reading Instruction',
				'meta'     => 'Podcast episode',
				'summary'  => "Beth Estill unpacks why reading is the single most powerful lever for closing learning gaps — and what teachers can do differently starting tomorrow.",
				'embed_id' => 'J9svLdwL_Ac',
				'href'     => 'https://www.youtube.com/watch?v=J9svLdwL_Ac',
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
				array( 'slug' => 'redesigning-instruction-to-meet-every-learners-needs-with-robert-barnett', 'title' => "Redesigning Instruction to Meet Every Learner's Needs", 'instructor' => 'Robert Barnett', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Individualized Instruction', 'href' => '/launchpad/courses/redesigning-instruction-to-meet-every-learners-needs-with-robert-barnett/' ),
				array( 'slug' => 'building-thinking-classrooms-in-mathematics', 'title' => 'Building Thinking Classrooms in Mathematics', 'instructor' => 'Dr. Peter Liljedahl', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Mathematics Instruction', 'href' => '/launchpad/courses/building-thinking-classrooms-in-mathematics/' ),
				array( 'slug' => 'blended-learning-universal-design-for-learning', 'title' => 'Supercharge Your Classroom with Blended Learning', 'instructor' => 'Dr. Catlin Tucker', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Blended Learning', 'href' => '/launchpad/courses/blended-learning-universal-design-for-learning/' ),
			),
			'faqs' => array(
				array( 'question' => 'Is this course live or self-paced?', 'answer' => 'This is a self-paced video course. You can start the moment you register and work through the modules on your own schedule.' ),
				array( 'question' => 'What grade levels does this apply to?', 'answer' => "Beth's frameworks apply across K–12. While the examples skew toward elementary and middle school where reading gaps are most acute, the intervention and prevention principles apply at any level." ),
				array( 'question' => 'Who is this course best suited for?', 'answer' => 'Classroom teachers, instructional coaches, and school leaders who want a clear, research-backed framework for closing reading gaps and supporting struggling readers.' ),
				array( 'question' => 'Can my school or district purchase access for a team?', 'answer' => 'Yes. RocketPD supports school and district team access. Contact us and we will help map the best option for your team.' ),
			),
			'final_cta' => array(
				'headline'        => "Bring Beth's work to your district.",
				'body'            => "Every student can learn to read. Give your teachers and coaches the science-backed framework they need to make it happen.",
				'primary_label'   => 'Start Learning — $49',
				'primary_href'    => '#pricing',
				'secondary_label' => 'Talk About District Pricing',
				'secondary_href'  => '/contact/',
			),
		),

		// ─────────────────────────────────────────────────────────────────────
		// Jennifer Gonzalez — Fine-Tune Your Lessons with the Fundamentals
		// ─────────────────────────────────────────────────────────────────────
		array(
			'slug'    => 'fine-tune-your-lessons-with-the-fundamentals-with-jennifer-gonzalez',
			'enabled' => false,
			'resync'  => false,
			'title'   => 'Fine-Tune Your Lessons with the Fundamentals',
			'format'  => 'self-paced',
			'topic'   => 'Teaching Efficacy',
			'price'   => '$49',
			'price_meta'           => 'single course · anytime access',
			'promise'              => 'Jennifer Gonzalez — veteran teacher, author, and founder of Cult of Pedagogy — delivers a practical framework rooted in the time-tested fundamentals of instructional design. A clear, repeatable process for writing better objectives, building aligned assessments, and designing learning experiences that actually drive mastery.',
			'trailer_youtube_id'   => 'xGT-GtT0ZkE',
			'course_image'         => '',
			'primary_cta_label'    => 'Start Learning',
			'primary_cta_href'     => '#pricing',
			'secondary_cta_label'  => 'Watch Trailer',
			'secondary_cta_href'   => '#course-trailer',
			'audiences'            => array( 'Classroom Teachers', 'Instructional Coaches', 'Curriculum Directors' ),
			'meta_items'           => array(
				array( 'icon' => 'clock',  'label' => '1 hour' ),
				array( 'icon' => 'layers', 'label' => '3 video lessons' ),
				array( 'icon' => 'book',   'label' => 'Workbook PDF' ),
				array( 'icon' => 'award',  'label' => 'Certificate' ),
			),
			'instructor' => array(
				'name'        => 'Jennifer Gonzalez',
				'slug'        => 'jennifer-gonzalez',
				'headshot'    => '',
				'title'       => 'Teaching Efficacy Expert · Founder of Cult of Pedagogy',
				'role_line'   => 'Veteran teacher, author, and founder of Cult of Pedagogy',
				'bio'         => 'Even experienced teachers can struggle with lesson planning that truly drives learning. Jennifer Gonzalez is a veteran teacher, author, and founder of Cult of Pedagogy — one of the most trusted voices in K–12 instructional design. Her work helps teachers master the building blocks of effective instruction through a clear, repeatable process grounded in the fundamentals that have always mattered.',
				'specialties' => array( 'Lesson Design', 'Learning Objectives', 'Formative Assessment', 'Student Engagement' ),
				'href'        => '/instructors/jennifer-gonzalez/',
			),
			'outcomes_heading' => 'By the end of this course, you will:',
			'audience_intro'   => '',
			'outcomes'         => array(
				array( 'title' => 'Write clear, measurable learning objectives that align to your standards', 'summary' => 'Learn how to craft objectives that actually guide your instruction and give students a clear target — rather than vague goals that sound good but do nothing.' ),
				array( 'title' => 'Design formative and summative assessments that directly measure student learning', 'summary' => 'Build assessments that align tightly to your objectives and give you real data on what students know — not just whether they completed the work.' ),
				array( 'title' => 'Build student-centered learning experiences that drive mastery and engagement', 'summary' => 'Design the learning activities that connect objectives to assessments — creating the conditions where every student can achieve mastery.' ),
			),
			'included_heading' => '',
			'included_items'   => array(),
			'guide' => array(
				'enabled'      => true,
				'title'        => 'The Ultimate Guide to Powerful Lesson Design',
				'meta'         => 'Free guide',
				'summary'      => 'A practical resource for teachers who want to master the fundamentals of instructional design — clear objectives, aligned assessments, and student-centered learning.',
				'href'         => '/k-12-guides/',
				'deliverables' => array( "Jennifer Gonzalez's framework for writing measurable learning objectives", 'A backward design approach for building assessments first', 'Templates for designing student-centered learning experiences' ),
			),
			'podcast' => array(
				'enabled'  => true,
				'title'    => 'Fine-Tune Your Lessons with the Fundamentals',
				'meta'     => 'Podcast episode',
				'summary'  => 'Jennifer Gonzalez walks through why even experienced teachers struggle with lesson planning — and the three fundamentals that fix it.',
				'embed_id' => 'xGT-GtT0ZkE',
				'href'     => 'https://www.youtube.com/watch?v=xGT-GtT0ZkE',
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
				'title'   => 'Confidence Builder: A 5-Part Framework for Powerful Lesson Design',
				'meta'    => 'ARTICLE',
				'summary' => "Build confidence in the classroom with Jennifer Gonzalez's 5-part framework for powerful lesson design that works for new and experienced teachers alike.",
				'href'    => '/confidence-builder-a-5-part-framework-for-powerful-lesson-design-with-jennifer-gonzalez/',
			),
			'pricing_cards' => array(
				array( 'eyebrow' => 'Single Course', 'title' => 'Single-Course Registration', 'price' => '$49', 'price_meta' => 'one-time access', 'bullets' => "Self-paced video modules\nCourse workbook PDF\nAccess to secure Learning Portal\nMembership in learning community\nCertificate of completion", 'cta_label' => 'Start Learning', 'cta_href' => '#pricing', 'highlighted' => 0 ),
				array( 'eyebrow' => 'Full Library', 'title' => 'Entire Video Library', 'price' => '$245', 'price_meta' => 'annually', 'bullets' => "Access to all RocketPD courses\nSelf-paced video modules\nAll course workbooks\nAccess to secure Learning Portal\nMembership in learning community\nCertificates of completion", 'cta_label' => 'Get Full Library', 'cta_href' => '/launchpad/', 'highlighted' => 1 ),
				array( 'eyebrow' => 'Teams', 'title' => 'School or District Use', 'price' => 'Custom', 'price_meta' => 'contact us for pricing', 'bullets' => "Unlimited team access\nAll RocketPD courses included\nSelf-paced video modules and workbooks\nDedicated success partner\nBuilt-in reporting for leaders", 'cta_label' => 'Talk With RocketPD', 'cta_href' => '/contact/', 'highlighted' => 0 ),
			),
			'related' => array(
				array( 'slug' => 'redesigning-instruction-to-meet-every-learners-needs-with-robert-barnett', 'title' => "Redesigning Instruction to Meet Every Learner's Needs", 'instructor' => 'Robert Barnett', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Individualized Instruction', 'href' => '/launchpad/courses/redesigning-instruction-to-meet-every-learners-needs-with-robert-barnett/' ),
				array( 'slug' => 'blended-learning-universal-design-for-learning', 'title' => 'Supercharge Your Classroom with Blended Learning', 'instructor' => 'Dr. Catlin Tucker', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Blended Learning', 'href' => '/launchpad/courses/blended-learning-universal-design-for-learning/' ),
				array( 'slug' => 'building-thinking-classrooms-in-mathematics', 'title' => 'Building Thinking Classrooms in Mathematics', 'instructor' => 'Dr. Peter Liljedahl', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Mathematics Instruction', 'href' => '/launchpad/courses/building-thinking-classrooms-in-mathematics/' ),
			),
			'faqs' => array(
				array( 'question' => 'Is this course live or self-paced?', 'answer' => 'This is a self-paced video course. You can start the moment you register and work through the modules on your own schedule.' ),
				array( 'question' => 'Is this only for newer teachers?', 'answer' => "No. Jennifer designed this course specifically because even experienced teachers can struggle with lesson planning that truly drives learning. The fundamentals apply at every career stage." ),
				array( 'question' => 'Who is this course best suited for?', 'answer' => 'Classroom teachers, instructional coaches, and curriculum directors who want a clear, repeatable process for designing lessons that drive mastery and engagement.' ),
				array( 'question' => 'Can my school or district purchase access for a team?', 'answer' => 'Yes. RocketPD supports school and district team access. Contact us and we will help map the best option for your team.' ),
			),
			'final_cta' => array(
				'headline'        => "Bring Jennifer's work to your district.",
				'body'            => 'Give every teacher a clear, repeatable process for designing lessons that work — grounded in the fundamentals that have always mattered.',
				'primary_label'   => 'Start Learning — $49',
				'primary_href'    => '#pricing',
				'secondary_label' => 'Talk About District Pricing',
				'secondary_href'  => '/contact/',
			),
		),

		// ─────────────────────────────────────────────────────────────────────
		// Dr. Michael Hinojosa — Transformational School Leadership
		// ─────────────────────────────────────────────────────────────────────
		array(
			'slug'    => 'transformational-school-leadership-with-dr-michael-hinojosa',
			'enabled' => false,
			'resync'  => false,
			'title'   => 'Transformational School Leadership',
			'format'  => 'self-paced',
			'topic'   => 'School Leadership',
			'price'   => '$49',
			'price_meta'           => 'single course · anytime access',
			'promise'              => 'Former Dallas ISD and Cobb County Superintendent and National Superintendent of the Year Dr. Michael Hinojosa draws on 30+ years of urban school leadership — reflecting on successes and failures — to highlight three practical strategies for navigating the pitfalls and challenges of school leadership.',
			'trailer_youtube_id'   => 'fK2y-vobtAs',
			'course_image'         => '',
			'primary_cta_label'    => 'Start Learning',
			'primary_cta_href'     => '#pricing',
			'secondary_cta_label'  => 'Watch Trailer',
			'secondary_cta_href'   => '#course-trailer',
			'audiences'            => array( 'Superintendents', 'Principals', 'District Leaders' ),
			'meta_items'           => array(
				array( 'icon' => 'clock',  'label' => '1 hour' ),
				array( 'icon' => 'layers', 'label' => '3 video lessons' ),
				array( 'icon' => 'book',   'label' => 'Workbook PDF' ),
				array( 'icon' => 'award',  'label' => 'Certificate' ),
			),
			'instructor' => array(
				'name'        => 'Dr. Michael Hinojosa',
				'slug'        => 'dr-michael-hinojosa',
				'headshot'    => '',
				'title'       => 'School Leadership Expert · National Superintendent of the Year',
				'role_line'   => 'Former Dallas ISD and Cobb County Superintendent with 30+ years of urban school leadership',
				'bio'         => 'Over a more than 30-year career, former Dallas ISD and Cobb County Superintendent and National Superintendent of the Year Dr. Michael Hinojosa built a reputation as an innovative school leader with a knack for getting things done. He uses his experience in urban school leadership — reflecting honestly on both successes and failures — to give school and district leaders a practical framework for navigating the real challenges of leadership at scale.',
				'specialties' => array( 'Transformational Leadership', 'Talent Management', 'Strategic Thinking', 'Urban Education' ),
				'href'        => '/instructors/dr-michael-hinojosa/',
			),
			'outcomes_heading' => 'Three strategies Dr. Hinojosa wants every school leader to master:',
			'audience_intro'   => '',
			'outcomes'         => array(
				array( 'title' => 'Learn to identify and manage key organizational talent', 'summary' => "Understand how to spot, develop, and retain the people who drive your school or district forward — and how to make the hard calls when it's time to move on." ),
				array( 'title' => 'Embrace strategic thinking vs. strategic planning', 'summary' => 'Move beyond the annual planning cycle and develop the adaptive, in-the-moment thinking that separates good managers from transformational leaders.' ),
				array( 'title' => 'Master the art of politics in school leadership', 'summary' => 'Learn how to navigate the political realities of district leadership — building relationships, managing boards, and moving initiatives forward without losing your integrity.' ),
			),
			'included_heading' => '',
			'included_items'   => array(),
			'guide' => array(
				'enabled'      => true,
				'title'        => 'The Ultimate Guide to Transformational School Leadership',
				'meta'         => 'Free guide',
				'summary'      => 'A practical resource for school and district leaders who want to lead with confidence, manage talent effectively, and navigate the political realities of modern education leadership.',
				'href'         => '/k-12-guides/',
				'deliverables' => array( "Dr. Hinojosa's three-strategy framework for transformational leadership", 'Tools for identifying and developing key organizational talent', 'A framework for strategic thinking vs. strategic planning' ),
			),
			'podcast' => array(
				'enabled'  => true,
				'title'    => 'Transformational School Leadership with Dr. Michael Hinojosa',
				'meta'     => 'Podcast episode',
				'summary'  => "Dr. Hinojosa reflects on 30+ years of urban school leadership — what worked, what didn't, and the three things he wishes every superintendent knew going in.",
				'embed_id' => 'fK2y-vobtAs',
				'href'     => 'https://www.youtube.com/watch?v=fK2y-vobtAs',
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
				array( 'slug' => 'creating-a-culture-of-love', 'title' => 'Creating a Culture of Love', 'instructor' => 'Dr. Luvelle Brown', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'School Culture', 'href' => '/launchpad/courses/creating-a-culture-of-love/' ),
				array( 'slug' => 'rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course', 'title' => 'Rethinking Teacher Supervision, Coaching & Evaluation', 'instructor' => 'Kim Marshall', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Teacher Evaluation', 'href' => '/launchpad/courses/rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course/' ),
				array( 'slug' => 'engaging-every-family-self-paced-course', 'title' => 'Engaging Every Family', 'instructor' => 'Dr. Steve Constantino', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Family Engagement', 'href' => '/launchpad/courses/engaging-every-family-self-paced-course/' ),
			),
			'faqs' => array(
				array( 'question' => 'Is this course live or self-paced?', 'answer' => 'This is a self-paced video course. You can start the moment you register and work through the modules on your own schedule.' ),
				array( 'question' => 'Who is this course best suited for?', 'answer' => 'Superintendents, principals, and district leaders who want practical, battle-tested strategies for leading schools and districts with confidence.' ),
				array( 'question' => 'Is this relevant for aspiring leaders too?', 'answer' => "Yes. Dr. Hinojosa's course is framed as a blueprint for aspiring school leaders as much as it is for sitting superintendents. The lessons are universal across career stages." ),
				array( 'question' => 'Can my school or district purchase access for a team?', 'answer' => 'Yes. RocketPD supports school and district team access. Contact us and we will help map the best option for your team.' ),
			),
			'final_cta' => array(
				'headline'        => "Bring Dr. Hinojosa's work to your district.",
				'body'            => 'Give your leadership team the battle-tested strategies of a National Superintendent of the Year — talent management, strategic thinking, and the political savvy to get things done.',
				'primary_label'   => 'Start Learning — $49',
				'primary_href'    => '#pricing',
				'secondary_label' => 'Talk About District Pricing',
				'secondary_href'  => '/contact/',
			),
		),

		// ─────────────────────────────────────────────────────────────────────
		// Dr. John Spencer — Using PBL to Spark Real-World Learning
		// ─────────────────────────────────────────────────────────────────────
		array(
			'slug'    => 'using-pbl-to-spark-real-world-learning-with-john-spencer',
			'enabled' => false,
			'resync'  => false,
			'title'   => 'Using PBL to Spark Real-World Learning',
			'format'  => 'self-paced',
			'topic'   => 'Project-Based Learning',
			'price'   => '$49',
			'price_meta'           => 'single course · anytime access',
			'promise'              => "Project-Based Learning isn't about adding one more thing to your plate — it's about rearranging the plate. Dr. John Spencer shows educators how to design authentic PBL units that help students master standards while developing creativity, collaboration, and resilience for an unpredictable world.",
			'trailer_youtube_id'   => '', // Trailer is MP4: /wp-content/uploads/2025/10/John-Spencer-Promo.mp4
			'course_image'         => '/wp-content/uploads/2025/03/dr-john-spencer.jpg',
			'primary_cta_label'    => 'Start Learning',
			'primary_cta_href'     => '#pricing',
			'secondary_cta_label'  => 'Watch Trailer',
			'secondary_cta_href'   => '#course-trailer',
			'audiences'            => array( 'Classroom Teachers', 'Instructional Coaches', 'Curriculum Directors' ),
			'meta_items'           => array(
				array( 'icon' => 'clock',  'label' => '1 hour' ),
				array( 'icon' => 'layers', 'label' => '3 video lessons' ),
				array( 'icon' => 'book',   'label' => 'Workbook PDF' ),
				array( 'icon' => 'award',  'label' => 'Certificate' ),
			),
			'instructor' => array(
				'name'        => 'Dr. John Spencer',
				'slug'        => 'dr-john-spencer',
				'headshot'    => '/wp-content/uploads/2025/03/dr-john-spencer.jpg',
				'title'       => 'Project-Based Learning Expert · Best-Selling Author',
				'role_line'   => 'Best-selling author, former classroom teacher, and nationally recognized voice on creativity and project-based learning',
				'bio'         => 'Dr. John Spencer is a best-selling author, former classroom teacher, and one of the most trusted voices on creativity and project-based learning in K–12 education. His PBL by Design framework helps teachers move beyond surface-level projects to design authentic learning experiences that develop the skills students need for an unpredictable world — without abandoning the standards that matter.',
				'specialties' => array( 'Project-Based Learning', 'Design Thinking', 'Student Creativity', 'Authentic Assessment' ),
				'href'        => '/instructors/dr-john-spencer/',
			),
			'outcomes_heading' => 'In this course, Dr. John Spencer challenges you to:',
			'audience_intro'   => '',
			'outcomes'         => array(
				array( 'title' => 'Understand why PBL prepares students for an unpredictable world', 'summary' => 'Build the case for project-based learning as a vehicle for standards mastery — and develop the conviction to implement it even when it feels risky.' ),
				array( 'title' => 'Design authentic PBL units that balance creativity with standards', 'summary' => 'Learn how to build projects that give students real creative ownership while staying tightly aligned to the learning outcomes that matter.' ),
				array( 'title' => 'Implement PBL by Design — combining PBL with design thinking', 'summary' => "Apply Dr. Spencer's signature framework to turn your classroom into a place where students solve real problems, make meaningful products, and develop resilience through the creative process." ),
			),
			'included_heading' => '',
			'included_items'   => array(),
			'guide' => array(
				'enabled'      => true,
				'title'        => 'The Ultimate Guide to Project-Based Learning',
				'meta'         => 'Free guide',
				'summary'      => 'A practical resource for teachers who want to move beyond worksheets and into authentic, student-driven projects that build creativity, collaboration, and mastery.',
				'href'         => '/k-12-guides/',
				'deliverables' => array( "Dr. Spencer's PBL by Design framework", 'A step-by-step process for designing authentic PBL units', 'Strategies for balancing student creativity with standards alignment' ),
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
				'enabled'  => false,
				'title'    => '',
				'meta'     => '',
				'summary'  => '',
				'embed_id' => '',
				'href'     => '',
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
				array( 'slug' => 'artificial-intelligence-in-k-12-schools', 'title' => 'Artificial Intelligence in K-12 Schools', 'instructor' => 'A.J. Juliani', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'AI in Education', 'href' => '/launchpad/courses/artificial-intelligence-in-k-12-schools/' ),
				array( 'slug' => 'fine-tune-your-lessons-with-the-fundamentals-with-jennifer-gonzalez', 'title' => 'Fine-Tune Your Lessons with the Fundamentals', 'instructor' => 'Jennifer Gonzalez', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Teaching Efficacy', 'href' => '/launchpad/courses/fine-tune-your-lessons-with-the-fundamentals-with-jennifer-gonzalez/' ),
				array( 'slug' => 'blended-learning-universal-design-for-learning', 'title' => 'Supercharge Your Classroom with Blended Learning', 'instructor' => 'Dr. Catlin Tucker', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Blended Learning', 'href' => '/launchpad/courses/blended-learning-universal-design-for-learning/' ),
			),
			'faqs' => array(
				array( 'question' => 'Is this course live or self-paced?', 'answer' => 'This is a self-paced video course. You can start the moment you register and work through the modules on your own schedule.' ),
				array( 'question' => 'What grade levels does PBL by Design apply to?', 'answer' => "Dr. Spencer's framework applies across K–12 and across subject areas. Whether you teach elementary, middle, or high school, the principles of authentic project design translate directly to your classroom context." ),
				array( 'question' => 'Who is this course best suited for?', 'answer' => 'Classroom teachers, instructional coaches, and curriculum directors who want to move beyond surface-level projects and build learning experiences that develop creativity, collaboration, and real-world skills.' ),
				array( 'question' => 'Can my school or district purchase access for a team?', 'answer' => 'Yes. RocketPD supports school and district team access. Contact us and we will help map the best option for your team.' ),
			),
			'final_cta' => array(
				'headline'        => "Bring Dr. Spencer's work to your district.",
				'body'            => 'Give your teachers a framework for designing projects that actually develop creativity and mastery — not just busy work with a poster at the end.',
				'primary_label'   => 'Start Learning — $49',
				'primary_href'    => '#pricing',
				'secondary_label' => 'Talk About District Pricing',
				'secondary_href'  => '/contact/',
			),
		),

		// ─────────────────────────────────────────────────────────────────────
		// Veronica V. Sopher — Fearless School Communications
		// ─────────────────────────────────────────────────────────────────────
		array(
			'slug'    => 'fearless-school-communications-with-veronica-v-sopher',
			'enabled' => false,
			'resync'  => false,
			'title'   => 'Fearless School Communications',
			'format'  => 'self-paced',
			'topic'   => 'School Communications',
			'price'   => '$49',
			'price_meta'           => 'single course · anytime access',
			'promise'              => 'Nationally recognized school communications strategist Veronica V. Sopher provides an actionable template and strategies for building trust with families — with a focus on clear communication and measurable outcomes, especially around sensitive issues like security, mental health, and academic performance.',
			'trailer_youtube_id'   => 'i96l1oQQPLs',
			'course_image'         => '',
			'primary_cta_label'    => 'Start Learning',
			'primary_cta_href'     => '#pricing',
			'secondary_cta_label'  => 'Watch Trailer',
			'secondary_cta_href'   => '#course-trailer',
			'audiences'            => array( 'Principals', 'Superintendents', 'District Communications Directors' ),
			'meta_items'           => array(
				array( 'icon' => 'clock',  'label' => '1 hour' ),
				array( 'icon' => 'layers', 'label' => '3 video lessons' ),
				array( 'icon' => 'book',   'label' => 'Workbook PDF' ),
				array( 'icon' => 'award',  'label' => 'Certificate' ),
			),
			'instructor' => array(
				'name'        => 'Veronica V. Sopher',
				'slug'        => 'veronica-v-sopher',
				'headshot'    => '',
				'title'       => 'School Communications Expert · Nationally Recognized Strategist & Speaker',
				'role_line'   => 'Former school district communications director turned nationally recognized strategist and speaker',
				'bio'         => 'Veronica V. Sopher has staked her career on helping school leaders build trust and navigate the subtle art of school communications. A former communications director for large school districts turned nationally recognized strategist and speaker, she uses her years of experience to give school leaders an actionable template for communicating with authenticity and confidence — especially around the sensitive issues that matter most.',
				'specialties' => array( 'School Communications', 'Crisis Communications', 'Stakeholder Engagement', 'Trust Building' ),
				'href'        => '/instructors/veronica-v-sopher/',
			),
			'outcomes_heading' => 'In this course, Veronica V. Sopher challenges you to:',
			'audience_intro'   => '',
			'outcomes'         => array(
				array( 'title' => 'Master the art and science of school communications', 'summary' => 'Understand the principles that separate reactive, damage-control communication from proactive, trust-building communication — and build the habits that make the difference.' ),
				array( 'title' => 'Communicate with authenticity and confidence', 'summary' => 'Develop your own communication voice and learn how to deliver difficult messages — around security, mental health, academic performance — in ways that build rather than erode trust.' ),
				array( 'title' => "Align your message to your school or district's goals", 'summary' => 'Learn how to connect every communication touchpoint back to your strategic priorities, so your messaging moves stakeholders toward the outcomes that matter most.' ),
			),
			'included_heading' => '',
			'included_items'   => array(),
			'guide' => array(
				'enabled'      => true,
				'title'        => 'The Ultimate Guide to Fearless School Communications',
				'meta'         => 'Free guide',
				'summary'      => "A practical resource for school leaders who want to build trust with families and communicate with confidence — especially around the sensitive topics that can't be avoided.",
				'href'         => '/k-12-guides/',
				'deliverables' => array( "Veronica's actionable template for school communications", 'Strategies for engaging stakeholders around sensitive issues', "A framework for aligning messaging to your district's goals" ),
			),
			'podcast' => array(
				'enabled'  => true,
				'title'    => 'Fearless School Communications with Veronica V. Sopher',
				'meta'     => 'Podcast episode',
				'summary'  => 'Veronica unpacks what fearless school communication actually looks like — and how school leaders can move from reactive messaging to proactive trust-building.',
				'embed_id' => 'i96l1oQQPLs',
				'href'     => 'https://www.youtube.com/watch?v=i96l1oQQPLs',
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
				array( 'slug' => 'engaging-every-family-self-paced-course', 'title' => 'Engaging Every Family', 'instructor' => 'Dr. Steve Constantino', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'Family Engagement', 'href' => '/launchpad/courses/engaging-every-family-self-paced-course/' ),
				array( 'slug' => 'transformational-school-leadership-with-dr-michael-hinojosa', 'title' => 'Transformational School Leadership', 'instructor' => 'Dr. Michael Hinojosa', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'School Leadership', 'href' => '/launchpad/courses/transformational-school-leadership-with-dr-michael-hinojosa/' ),
				array( 'slug' => 'creating-a-culture-of-love', 'title' => 'Creating a Culture of Love', 'instructor' => 'Dr. Luvelle Brown', 'format' => 'self-paced', 'price' => '$49', 'topic' => 'School Culture', 'href' => '/launchpad/courses/creating-a-culture-of-love/' ),
			),
			'faqs' => array(
				array( 'question' => 'Is this course live or self-paced?', 'answer' => 'This is a self-paced video course. You can start the moment you register and work through the modules on your own schedule.' ),
				array( 'question' => 'Who is this course best suited for?', 'answer' => 'Principals, superintendents, and district communications directors who want to build trust with families and communicate with confidence — especially around sensitive topics.' ),
				array( 'question' => 'Does this cover crisis communications?', 'answer' => 'Yes. Veronica specifically addresses communication around sensitive issues including security incidents, mental health, and academic performance — the situations where clear, confident communication matters most.' ),
				array( 'question' => 'Can my school or district purchase access for a team?', 'answer' => 'Yes. RocketPD supports school and district team access. Contact us and we will help map the best option for your team.' ),
			),
			'final_cta' => array(
				'headline'        => "Bring Veronica's work to your district.",
				'body'            => 'Give your leadership team the communication strategies and confidence to engage every stakeholder — especially when the topics are hard.',
				'primary_label'   => 'Start Learning — $49',
				'primary_href'    => '#pricing',
				'secondary_label' => 'Talk About District Pricing',
				'secondary_href'  => '/contact/',
			),
		),

	); // end return array
}
