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
 * Return cohort seed data for the admin seeder.
 *
 * Each entry supports two flags:
 *   enabled — include in seeder run (false = skip entirely)
 *   resync  — overwrite ACF fields on an existing post (false = skip if post exists)
 *
 * Start all entries with enabled: false, resync: false.
 * Flip enabled: true only when ready to seed a specific cohort.
 *
 * @return array
 */
function rocketpd_get_cohort_seed_data() {
	return array(
		array(
			'slug'    => 'building-thinking-classrooms-in-mathematics-with-peter-liljedahl',
			'enabled' => true,
			'resync'  => false,
			// Basics.
			'title'             => 'Building Thinking Classrooms',
			'subtitle'          => 'Master a process for enhancing student learning through a process of enhancing student thinking.',
			'shortDescription'  => 'A 5-session virtual cohort with Dr. Peter Liljedahl: learn how to create an ideal setting for mathematical thinking and launch Thinking Classrooms in your school.',
			'longDescription'   => '<p>In a time when more students are falling further behind, the old way of teaching mathematics isn\'t going to close the learning gap.</p><p>In this five-session virtual cohort, Dr. Peter Liljedahl shows you and your instructional team how to create an ideal setting for processing mathematics and other academic disciplines by meeting learners where they\'re at and promoting the practice of thinking as opposed to activity or memorization in classrooms.</p><p>Learn what pieces make up a Thinking Classroom, master ways to engage students in the practice of thinking, and get actionable strategies to launch and sustain Thinking Classrooms in your schools — with help from Liljedahl\'s proven, research-backed method.</p>',
			'topic'             => 'Mathematics Instruction',
			'category'          => 'Instruction',
			'status'            => 'registration-open',
			'featured'          => true,
			'startDate'         => '2026-10-29',
			'endDate'           => '2026-12-03',
			'sessionCountLabel' => '5 live sessions',
			'totalHours'        => '10 hours of live instruction',
			'formatLabel'       => 'Live via Zoom',
			'cadenceLabel'      => 'Weekly - Thursdays',
			'sessionLength'     => '120 minutes',
			'cardImage'         => '/wp-content/uploads/2024/03/Peter_Liljedahl.jpg',
			// Instructor.
			'instructor' => array(
				'slug'        => 'dr-peter-liljedahl',
				'name'        => 'Dr. Peter Liljedahl',
				'title'       => 'Professor of Mathematics Education, Simon Fraser University',
				'roleLine'    => 'Author, Building Thinking Classrooms in Mathematics',
				'headshot'    => '/wp-content/uploads/2024/03/Peter_Liljedahl.jpg',
				'bio'         => 'Dr. Peter Liljedahl is a Professor of Mathematics Education in the Faculty of Education at Simon Fraser University and author of the best-selling book, Building Thinking Classrooms in Mathematics (Grades K-12): 14 Teaching Practices for Enhancing Learning. A former high school mathematics teacher, Peter has dedicated his career to reshaping classroom environments through thinking, collaborative learning, and problem solving. His Building Thinking Classrooms model has been applied by tens of thousands of schools across academic disciplines worldwide.',
				'quote'       => '',
				'specialties' => array( 'Mathematics Instruction', 'Thinking Classrooms', 'Problem-Based Learning', 'Instructional Design' ),
				'href'        => '/instructors/dr-peter-liljedahl/',
				'links'       => array(),
			),
			// Pricing.
			'priceType'           => 'paid',
			'priceLabel'          => '$495/person',
			'priceAmount'         => '$495',
			'priceMeta'           => 'per person - 5 sessions',
			'registrationUrl'     => 'https://pci.jotform.com/form/243226275018049',
			'waitlistUrl'         => '',
			'closedMessage'       => 'Registration is currently closed. Join the notification list and we will let you know when the next cohort opens.',
			'registrationFillsBy' => '',
			'invoiceNote'         => 'Need an invoice or purchase order? Contact RocketPD before registering.',
			// Schedule.
			'schedule' => array(
				array(
					'session_number'        => 1,
					'session_title'         => 'Introduction to a Thinking Classroom',
					'session_date'          => '2026-10-29',
					'session_time'          => '3:30-5:30 PM PST | 6:30-8:30 PM EST',
					'session_description'   => 'The importance of thinking tasks, visibly random groups, and vertical non-permanent surfaces (VNPS).',
					'session_resource_link' => '',
					'coming_soon'           => false,
				),
				array(
					'session_number'        => 2,
					'session_title'         => 'Engagement in the Thinking Classroom',
					'session_date'          => '2026-11-05',
					'session_time'          => '3:30-5:30 PM PST | 6:30-8:30 PM EST',
					'session_description'   => 'The important relationship between thinking and engagement, how to increase engagement through flow, and the relationship between flow and productive struggle.',
					'session_resource_link' => '',
					'coming_soon'           => false,
				),
				array(
					'session_number'        => 3,
					'session_title'         => 'A Thinking Classroom Lesson: From Launch to Closing',
					'session_date'          => '2026-11-12',
					'session_time'          => '3:30-5:30 PM PST | 6:30-8:30 PM EST',
					'session_description'   => 'The importance of the launch, how to consolidate, how to do meaningful notes, and how to use check-your-understanding questions.',
					'session_resource_link' => '',
					'coming_soon'           => false,
				),
				array(
					'session_number'        => 4,
					'session_title'         => 'Thin-Slicing 101',
					'session_date'          => '2026-11-19',
					'session_time'          => '3:30-5:30 PM PST | 6:30-8:30 PM EST',
					'session_description'   => 'What is thin-slicing, the value of thin-slicing, and how to do thin-slicing.',
					'session_resource_link' => '',
					'coming_soon'           => false,
				),
				array(
					'session_number'        => 5,
					'session_title'         => 'Formative and Summative Assessment',
					'session_date'          => '2026-12-03',
					'session_time'          => '3:30-5:30 PM PST | 6:30-8:30 PM EST',
					'session_description'   => 'The importance of formative assessment, helping students know where they are and where they are going, and grading based on data rather than points.',
					'session_resource_link' => '',
					'coming_soon'           => false,
				),
			),
			// Outcomes.
			'outcomes' => array(
				array( 'outcome_icon' => '', 'outcome_title' => 'Build a Thinking Classroom',                  'outcome_description' => 'Learn the structures and practices that create an environment where students genuinely think.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Teach content through a Thinking Classroom',  'outcome_description' => 'Apply the BTC framework to real classroom content across disciplines.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Use assessment to shape learning',            'outcome_description' => 'Implement formative and summative assessment strategies grounded in Liljedahl\'s research.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Improve student outcomes',                    'outcome_description' => 'Give students the conditions they need to engage, think, and succeed.' ),
			),
			// Audience.
			'audience' => array(
				array( 'audience_label' => 'Classroom Teachers',      'audience_description' => 'Launch a Thinking Classroom with a proven, research-backed framework.' ),
				array( 'audience_label' => 'Instructional Coaches',   'audience_description' => 'Support teachers in adopting and sustaining the BTC model.' ),
				array( 'audience_label' => 'Curriculum Coordinators', 'audience_description' => 'Align the BTC approach with school or district instructional goals.' ),
			),
			// Included items.
			'included' => array(
				array( 'included_item_icon' => 'users',     'included_item_label' => 'Live sessions with Dr. Peter Liljedahl' ),
				array( 'included_item_icon' => 'video',     'included_item_label' => 'Session recordings (available for 30 days)' ),
				array( 'included_item_icon' => 'community', 'included_item_label' => 'Breakout discussions with educators worldwide' ),
				array( 'included_item_icon' => 'mobile',    'included_item_label' => 'Access via the RocketPD Learning Portal' ),
				array( 'included_item_icon' => 'award',     'included_item_label' => 'Certificate of Completion' ),
			),
			// Sponsor.
			'sponsor' => array(
				'enabled'     => false,
				'name'        => '',
				'logo'        => '',
				'description' => '',
				'url'         => '',
				'cta_label'   => 'Learn More',
			),
			// Team options.
			'teamOptions' => array(
				'team_eyebrow'       => 'Team & District Options',
				'team_headline'      => 'Build a team of any size and save.',
				'team_body'          => 'RocketPD offers group discounts for schools and districts registering teams. Contact us for large group rates of 30 or more.',
				'team_ideal_for'     => 'Ideal for instructional teams, math departments, and district-wide professional learning initiatives.',
				'team_cta_label'     => 'Contact RocketPD',
				'team_cta_url'       => '/contact/?source=cohort-team',
				'team_pricing_tiers' => array(
					array( 'tier_label' => 'Team of 5',   'tier_price' => '$485',       'tier_unit' => 'per person' ),
					array( 'tier_label' => 'Team of 10',  'tier_price' => '$465',       'tier_unit' => 'per person' ),
					array( 'tier_label' => 'Team of 30+', 'tier_price' => 'Contact us', 'tier_unit' => 'for rates'  ),
				),
				'team_capabilities' => array(
					array( 'capability_label' => 'Group discounts' ),
					array( 'capability_label' => 'Invoice and PO support' ),
					array( 'capability_label' => 'Centralized registration' ),
					array( 'capability_label' => 'Custom cohorts for teams of 50+' ),
				),
			),
			// Resources.
			'resources' => array(
				'guide'   => array( 'enabled' => true,  'title' => 'The Ultimate Guide to Thinking Teaching Practices', 'meta' => 'Free guide', 'summary' => 'A practical introduction to the Building Thinking Classrooms framework and how to apply it in your school.', 'href' => '/k-12-guides/' ),
				'podcast' => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
				'webinar' => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
				'playbook' => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
			),
			// FAQs.
			'faqs' => array(
				array( 'question' => 'What is Building your Thinking Classroom — and how can it help?', 'answer' => 'In this 5-session virtual cohort, Dr. Peter Liljedahl shows you and your instructional team how to create an ideal setting for processing mathematics and other academic disciplines by meeting learners where they\'re at and promoting the practice of thinking as opposed to activity or memorization. Learn what pieces make up a Thinking Classroom, master ways to engage students in the practice of thinking, and get actionable strategies to launch and sustain Thinking Classrooms in your schools.' ),
				array( 'question' => 'Why do this as part of a cohort?', 'answer' => 'The live-virtual sessions give educators and school district leaders an easy and reliable way to collaborate with a best-selling author and other colleagues from around the world on a topic of strategic importance to schools and teachers. Individual teachers can register or school district teams can register select members of their building or central-office teams for open cohorts.' ),
				array( 'question' => 'What\'s included in this program?', 'answer' => 'Delivered over five weeks, the program includes 5 scheduled structured learning conversations delivered virtually over Zoom, plus password-protected access to the RocketPD Learning Portal where participants can access recordings for a limited time, and a customized Certificate of Completion.' ),
				array( 'question' => 'Who should participate?', 'answer' => 'Building your Thinking Classroom is a 5-session (120 minutes each) collaborative professional-learning experience for classroom teachers, instructional coaches, and other instructional leaders.' ),
				array( 'question' => 'Can I register if I am not a math instructor or coach?', 'answer' => 'Yes. While Peter\'s book has Mathematics in the title, the research-backed Thinking Classrooms model can be applied to other disciplines. Teachers and instructional coaches in other disciplines can still use and apply the framework in their classrooms.' ),
				array( 'question' => 'Are sessions recorded?', 'answer' => 'Yes. Sessions are recorded and accessible via the RocketPD Learning Portal for a limited time during the cohort experience.' ),
				array( 'question' => 'How can I participate?', 'answer' => 'Save your spot by registering on this page. Once you sign up, you\'ll receive more information about the program including payment and invoicing details, and a detailed follow-up email with scheduled session dates and times.' ),
			),
			// Testimonials.
			'testimonials' => array(
				array( 'quote' => 'Building Thinking Classrooms in Mathematics exudes enthusiasm for students, how they think, and how those thoughts coalesce into powerful thinking classrooms. It\'s also deeply practical.', 'name' => 'Dan Meyer',        'role' => '',        'organization' => '', 'image' => '' ),
				array( 'quote' => 'Peter Liljedahl\'s Thinking Classroom framework transformed my mathematics classroom overnight. This framework gave me a starting point I started implementing the very next day.',       'name' => 'Laura Wheeler',  'role' => 'Teacher', 'organization' => '', 'image' => '' ),
				array( 'quote' => 'An in-depth action plan backed with significant research and data — Liljedahl\'s plan is one that can improve every classroom for the better.',                                          'name' => 'Leslie Mohlman', 'role' => '',        'organization' => '', 'image' => '' ),
			),
			// CTAs.
			'primaryCta'   => array( 'label' => 'Register Now', 'href' => 'https://pci.jotform.com/form/243226275018049' ),
			'secondaryCta' => array( 'label' => 'See Full Schedule', 'href' => '#cohort-schedule' ),
			'finalCta'     => array(
				'headline'       => 'Ready to Join the Cohort?',
				'body'           => 'Give your teachers and instructional coaches a new way to approach instruction.',
				'primaryLabel'   => 'Yes, let\'s get started',
				'primaryHref'    => 'https://pci.jotform.com/form/243226275018049',
				'secondaryLabel' => 'Contact Us With Questions',
				'secondaryHref'  => '/contact/?source=cohort-btc',
			),
		),
		array(
			'slug'    => 'building-thinking-classrooms-summer-refresh',
			'enabled' => true,
			'resync'  => false,
			// Basics.
			'title'             => 'Building Thinking Classrooms Summer Refresh',
			'subtitle'          => 'Master a process for enhancing student learning through a process of enhancing student thinking.',
			'shortDescription'  => 'A 3-session summer refresh with Dr. Peter Liljedahl: launch or relaunch your Thinking Classroom with confidence starting on Day 1.',
			'longDescription'   => '<p>Educator and best-selling author Peter Liljedahl\'s Building Thinking Classrooms has taken K–12 classrooms by storm.</p><p>Whether you\'ve launched your own Thinking Classroom with your students or you\'ve been considering launching one, Peter created this hands-on summer refresh to help you hit the ground running in the critical year ahead.</p><p>Join educators from across the globe live over three 120-minute virtual sessions as Peter Liljedahl personally walks you and/or your instructional team through a series of practical challenges and exercises designed to help you embrace and model a replicable process for teaching thinking, strike an intentional balance between flow and productive struggle in classroom groups, and successfully launch or relaunch your Thinking Classroom starting on Day 1.</p>',
			'topic'             => 'Mathematics Instruction',
			'category'          => 'Instruction',
			'status'            => 'registration-open',
			'featured'          => true,
			'startDate'         => '2026-07-28',
			'endDate'           => '2026-08-11',
			'sessionCountLabel' => '3 live sessions',
			'totalHours'        => '6 hours of live instruction',
			'formatLabel'       => 'Live via Zoom',
			'cadenceLabel'      => 'Weekly - Tuesdays',
			'sessionLength'     => '120 minutes',
			'cardImage'         => '/wp-content/uploads/2024/03/Peter_Liljedahl.jpg',
			// Instructor.
			'instructor' => array(
				'slug'        => 'dr-peter-liljedahl',
				'name'        => 'Dr. Peter Liljedahl',
				'title'       => 'Professor of Mathematics Education, Simon Fraser University',
				'roleLine'    => 'Author, Building Thinking Classrooms in Mathematics',
				'headshot'    => '/wp-content/uploads/2024/03/Peter_Liljedahl.jpg',
				'bio'         => 'Dr. Peter Liljedahl is a Professor of Mathematics Education in the Faculty of Education at Simon Fraser University and author of the best-selling book, Building Thinking Classrooms in Mathematics (Grades K-12): 14 Teaching Practices for Enhancing Learning. A former high school mathematics teacher, Peter has dedicated his career to reshaping classroom environments through thinking, collaborative learning, and problem solving. His Building Thinking Classrooms model has been applied by tens of thousands of schools across academic disciplines worldwide.',
				'quote'       => '',
				'specialties' => array( 'Mathematics Instruction', 'Thinking Classrooms', 'Problem-Based Learning', 'Instructional Design' ),
				'href'        => '/instructors/dr-peter-liljedahl/',
				'links'       => array(),
			),
			// Pricing.
			'priceType'           => 'paid',
			'priceLabel'          => '$295/person',
			'priceAmount'         => '$295',
			'priceMeta'           => 'per person - 3 sessions',
			'registrationUrl'     => '/cohorts/building-thinking-classrooms-summer-refresh/#register',
			'waitlistUrl'         => '',
			'closedMessage'       => 'Registration is currently closed. Join the notification list and we will let you know when the next cohort opens.',
			'registrationFillsBy' => '',
			'invoiceNote'         => 'Need an invoice or purchase order? Contact RocketPD before registering.',
			// Schedule.
			'schedule' => array(
				array(
					'session_number'        => 1,
					'session_title'         => 'Introduction to a Thinking Classroom',
					'session_date'          => '2026-07-28',
					'session_time'          => '3:00-5:00 PM PST | 6:00-8:00 PM EST',
					'session_description'   => 'The importance of thinking tasks, visibly random groups, and vertical non-permanent surfaces (VNPS).',
					'session_resource_link' => '',
					'coming_soon'           => false,
				),
				array(
					'session_number'        => 2,
					'session_title'         => 'Engagement in the Thinking Classroom',
					'session_date'          => '2026-08-04',
					'session_time'          => '3:00-5:00 PM PST | 6:00-8:00 PM EST',
					'session_description'   => 'The important relationship between thinking and engagement, how to increase engagement through flow, and the relationship between flow and productive struggle.',
					'session_resource_link' => '',
					'coming_soon'           => false,
				),
				array(
					'session_number'        => 3,
					'session_title'         => 'A Thinking Classroom Lesson: From Launch to Closing',
					'session_date'          => '2026-08-11',
					'session_time'          => '3:00-5:00 PM PST | 6:00-8:00 PM EST',
					'session_description'   => 'The importance of the launch, how to consolidate, how to do meaningful notes, and how to use check-your-understanding questions.',
					'session_resource_link' => '',
					'coming_soon'           => false,
				),
			),
			// Outcomes.
			'outcomes' => array(
				array( 'outcome_icon' => '', 'outcome_title' => 'Understand the need to build a thinking classroom',      'outcome_description' => 'Explore the research behind why traditional instruction falls short and what thinking classrooms change.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Learn how to build a thinking classroom',                'outcome_description' => 'Walk through the practical structures — tasks, groups, and surfaces — that make thinking classrooms work.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Learn how to teach content through a thinking classroom', 'outcome_description' => 'Apply the framework to real content and successfully launch or relaunch your Thinking Classroom on Day 1.' ),
			),
			// Audience.
			'audience' => array(
				array( 'audience_label' => 'Classroom Teachers',      'audience_description' => 'Launch or relaunch a Thinking Classroom with confidence.' ),
				array( 'audience_label' => 'Instructional Coaches',   'audience_description' => 'Support teachers in implementing the BTC framework.' ),
				array( 'audience_label' => 'Curriculum Coordinators', 'audience_description' => 'Align the BTC model with school or district instructional goals.' ),
			),
			// Included items.
			'included' => array(
				array( 'included_item_icon' => 'users',     'included_item_label' => 'Live sessions with Dr. Peter Liljedahl' ),
				array( 'included_item_icon' => 'video',     'included_item_label' => 'Session recordings (available for 30 days)' ),
				array( 'included_item_icon' => 'community', 'included_item_label' => 'Breakout discussions with educators worldwide' ),
				array( 'included_item_icon' => 'mobile',    'included_item_label' => 'Access via the RocketPD Learning Portal' ),
				array( 'included_item_icon' => 'award',     'included_item_label' => 'Certificate of Completion' ),
			),
			// Sponsor.
			'sponsor' => array(
				'enabled'     => false,
				'name'        => '',
				'logo'        => '',
				'description' => '',
				'url'         => '',
				'cta_label'   => 'Learn More',
			),
			// Team options.
			'teamOptions' => array(
				'team_eyebrow'       => 'Team & District Options',
				'team_headline'      => 'Build a team of any size and save.',
				'team_body'          => 'RocketPD offers group discounts for schools and districts registering teams. Contact us for large group rates of 30 or more.',
				'team_ideal_for'     => 'Ideal for instructional teams, math departments, and district-wide professional learning initiatives.',
				'team_cta_label'     => 'Contact RocketPD',
				'team_cta_url'       => '/contact/?source=cohort-team',
				'team_pricing_tiers' => array(
					array( 'tier_label' => 'Team of 5',   'tier_price' => '$285',       'tier_unit' => 'per person' ),
					array( 'tier_label' => 'Team of 10',  'tier_price' => '$275',       'tier_unit' => 'per person' ),
					array( 'tier_label' => 'Team of 30+', 'tier_price' => 'Contact us', 'tier_unit' => 'for rates'  ),
				),
				'team_capabilities' => array(
					array( 'capability_label' => 'Group discounts' ),
					array( 'capability_label' => 'Invoice and PO support' ),
					array( 'capability_label' => 'Centralized registration' ),
					array( 'capability_label' => 'Custom cohorts for teams of 50+' ),
				),
			),
			// Resources.
			'resources' => array(
				'guide'   => array( 'enabled' => true,  'title' => 'The Ultimate Guide to Thinking Teaching Practices', 'meta' => 'Free guide', 'summary' => 'A practical introduction to the Building Thinking Classrooms framework and how to apply it in your school.', 'href' => '/k-12-guides/' ),
				'podcast' => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
				'webinar' => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
				'playbook' => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
			),
			// FAQs.
			'faqs' => array(
				array( 'question' => 'What is Building Thinking Classrooms Summer Refresh — and how can it help?', 'answer' => 'Join educators from across the globe live over three 120-minute sessions as Building Thinking Classrooms author and educator Peter Liljedahl personally walks you and/or your instructional team through a series of practical challenges and exercises designed to help you embrace and model a replicable process for teaching thinking, strike an intentional balance between flow and productive struggle in classroom groups, and successfully launch or relaunch your Thinking Classroom starting on Day 1.' ),
				array( 'question' => 'Why do this as part of a cohort?', 'answer' => 'Peter Liljedahl has been traveling the country and the world helping schools implement his process for Building Thinking Classrooms. Peter and RocketPD created this cohort experience to ensure that instructional leaders and teachers with an interest in BTC, regardless of location, would have the ability to learn about BTC and its application directly from Peter, while receiving the added benefit of collaborating with educators from different schools and communities.' ),
				array( 'question' => 'What\'s included in this program?', 'answer' => 'Delivered over three short weeks, the program includes three scheduled structured learning conversations delivered virtually over Zoom, plus password-protected access to the RocketPD Learning Portal where participants can access recordings for a limited time, and an available customized Certificate of Completion.' ),
				array( 'question' => 'Who should participate?', 'answer' => 'Building Thinking Classrooms Summer Refresh is a 3-session (120 minutes each) collaborative professional-learning experience for classroom teachers, instructional coaches, and other instructional leaders. Teams are encouraged to register and discounts are available for groups of 5 or more.' ),
				array( 'question' => 'Can I register if I am not a math instructor or coach?', 'answer' => 'Yes. While Peter\'s book has Mathematics in the title, the research-backed Thinking Classrooms model can be applied across academic disciplines. This summer refresh is designed for both math educators and educators in other subject areas who want to launch or relaunch a Thinking Classroom with confidence.' ),
				array( 'question' => 'Are sessions recorded?', 'answer' => 'Yes. Sessions are recorded and accessible via the RocketPD Learning Portal for a limited time during the cohort experience.' ),
				array( 'question' => 'I already participated in the Fall BTC cohort. Can I do the summer cohort too?', 'answer' => 'Absolutely. The fall BTC cohort is 5 sessions and provides a comprehensive overview of the BTC model start to finish. The summer BTC refresh is 3 sessions designed to help teachers and educators hit the ground running the year ahead. While some concepts may be familiar, the ideas are organized to help you refresh your understanding and plan for a successful start to the year.' ),
				array( 'question' => 'How can I participate?', 'answer' => 'Save your spot by registering on this page. Once you sign up, you\'ll receive more information about the program including payment and invoicing details, and a detailed follow-up email with scheduled session dates and times.' ),
			),
			// Testimonials.
			'testimonials' => array(
				array( 'quote' => 'Building Thinking Classrooms in Mathematics exudes enthusiasm for students, how they think, and how those thoughts coalesce into powerful thinking classrooms. It\'s also deeply practical.', 'name' => 'Dan Meyer',        'role' => '',        'organization' => '', 'image' => '' ),
				array( 'quote' => 'Peter Liljedahl\'s Thinking Classroom framework transformed my mathematics classroom overnight. This framework gave me a starting point I started implementing the very next day.',       'name' => 'Laura Wheeler',  'role' => 'Teacher', 'organization' => '', 'image' => '' ),
				array( 'quote' => 'An in-depth action plan backed with significant research and data — Liljedahl\'s plan is one that can improve every classroom for the better.',                                          'name' => 'Leslie Mohlman', 'role' => '',        'organization' => '', 'image' => '' ),
			),
			// CTAs.
			'primaryCta'   => array( 'label' => 'Register Now', 'href' => '/cohorts/building-thinking-classrooms-summer-refresh/#register' ),
			'secondaryCta' => array( 'label' => 'See Full Schedule', 'href' => '#cohort-schedule' ),
			'finalCta'     => array(
				'headline'       => 'Ready to Join the Cohort?',
				'body'           => 'Give your teachers and instructional coaches a new way to approach instruction.',
				'primaryLabel'   => 'Yes, let\'s get started',
				'primaryHref'    => '/cohorts/building-thinking-classrooms-summer-refresh/#register',
				'secondaryLabel' => 'Contact Us With Questions',
				'secondaryHref'  => '/contact/?source=cohort-btc',
			),
		),
		array(
			'slug'    => 'rethinking-teacher-supervision-coaching-evaluation',
			'enabled' => true,
			'resync'  => false,
			// Basics.
			'title'             => 'Rethinking Teacher Supervision, Coaching & Evaluation',
			'subtitle'          => 'A practical 90-day blueprint for the evaluation system your faculty actually deserves.',
			'shortDescription'  => 'Design and implement a sustainable mini-observation system with weekly expert coaching from Kim Marshall.',
			'longDescription'   => '<p>Traditional teacher evaluation is broken. Annual sit-downs, long checklists, and high-stakes scoring create stress for teachers, paperwork for principals, and almost no actual change in classroom practice.</p><p>In this live-virtual cohort, Kim Marshall guides school and district leaders through the exact mini-observation framework that thousands of schools have used to make evaluation more frequent, more human, and dramatically more useful.</p><p>Expect short expert teaching, peer collaboration, field-tested tools, and a 90-day rollout plan you can adapt to your faculty.</p>',
			'topic'             => 'Teacher Evaluation',
			'category'          => 'Leadership',
			'status'            => 'registration-open',
			'featured'          => true,
			'startDate'         => '2026-09-15',
			'endDate'           => '2026-11-03',
			'sessionCountLabel' => '8 live sessions',
			'totalHours'        => '12 hours of live instruction',
			'formatLabel'       => 'Live via Zoom',
			'cadenceLabel'      => 'Weekly - Tuesdays',
			'sessionLength'     => '90 minutes',
			'cardImage'         => '',
			// Instructor — slug used to look up instructor CPT post ID.
			'instructor' => array(
				'slug'        => 'kim-marshall',
				'name'        => 'Kim Marshall',
				'title'       => 'Founder - The Marshall Memo',
				'roleLine'    => 'K-12 leadership expert and former principal',
				'headshot'    => '',
				'bio'         => 'Kim Marshall is a nationally recognized school leadership expert, creator of the Marshall Memo, and author of Rethinking Teacher Supervision and Evaluation. His work helps leaders replace compliance-heavy evaluation with short, frequent classroom visits and feedback conversations teachers can actually use.',
				'quote'       => 'Annual evaluations were designed for a different era. What teachers need now is a leader who shows up frequently, listens carefully, and feeds back honestly.',
				'specialties' => array( 'Teacher Evaluation', 'Mini-Observations', 'Instructional Leadership', 'Feedback Systems' ),
				'href'        => '/instructors/kim-marshall/',
				'links'       => array(
					array( 'label' => 'Website',  'href' => 'https://marshallmemo.com/' ),
					array( 'label' => 'LinkedIn', 'href' => 'https://www.linkedin.com/in/kim-marshall-733a631/' ),
					array( 'label' => 'X',        'href' => 'https://twitter.com/KimMarshallMemo' ),
				),
			),
			// Pricing.
			'priceType'           => 'paid',
			'priceLabel'          => '$795/person',
			'priceAmount'         => '$795',
			'priceMeta'           => 'per person - 8 sessions',
			'registrationUrl'     => '#',
			'waitlistUrl'         => '#',
			'closedMessage'       => 'Registration is currently closed. Join the notification list and we will let you know when the next cohort opens.',
			'registrationFillsBy' => 'Seats typically fill by September 1.',
			'invoiceNote'         => 'Need an invoice or purchase order? Use the team option or contact RocketPD before registering.',
			// Schedule.
			'schedule' => array(
				array( 'session_number' => 1, 'session_title' => 'The Case for Rethinking Teacher Evaluation',  'session_date' => '2026-09-15', 'session_time' => '4:00-5:30 PM ET', 'session_description' => 'Why annual systems fail and what changes when leaders move to frequent, short classroom visits.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 2, 'session_title' => 'Designing Mini-Observations for Your School', 'session_date' => '2026-09-22', 'session_time' => '4:00-5:30 PM ET', 'session_description' => 'Build the cadence, look-fors, and documentation routine that make visits sustainable.',              'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 3, 'session_title' => 'Effective Feedback Conversations',            'session_date' => '2026-09-29', 'session_time' => '4:00-5:30 PM ET', 'session_description' => 'Practice a feedback protocol that teachers experience as useful and fair.',                       'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 4, 'session_title' => 'Building Shared Understanding',               'session_date' => '2026-10-06', 'session_time' => '4:00-5:30 PM ET', 'session_description' => 'Bring your team into a common language for instruction and evidence.',                          'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 5, 'session_title' => 'Coaching Underperforming Teachers',           'session_date' => '2026-10-13', 'session_time' => '4:00-5:30 PM ET', 'session_description' => 'Use observation evidence to support honest, humane growth plans.',                               'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 6, 'session_title' => 'Stretching Your Strongest Teachers',          'session_date' => '2026-10-20', 'session_time' => '4:00-5:30 PM ET', 'session_description' => 'Make supervision meaningful for teachers who already show strong practice.',                   'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 7, 'session_title' => 'Communicating the Shift to Your Faculty',     'session_date' => '2026-10-27', 'session_time' => '4:00-5:30 PM ET', 'session_description' => 'Plan the message, meeting, and follow-through that build trust.',                              'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 8, 'session_title' => 'Your 90-Day Implementation Plan',             'session_date' => '2026-11-03', 'session_time' => '4:00-5:30 PM ET', 'session_description' => 'Finalize your rollout plan and identify the first moves for your context.',                    'session_resource_link' => '', 'coming_soon' => false ),
			),
			// Outcomes.
			'outcomes' => array(
				array( 'outcome_icon' => '', 'outcome_title' => 'Design a sustainable mini-observation system',      'outcome_description' => 'Map a weekly cadence that works inside a real school calendar.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Lead feedback conversations teachers can use',      'outcome_description' => 'Practice language that lowers defensiveness and increases ownership.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Align your evaluation rubric with actual practice', 'outcome_description' => 'Keep the formal system connected to observable classroom moves.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Build a 90-day rollout plan for your school',       'outcome_description' => 'Leave with a practical implementation path for your context.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Earn a certificate of completion',                  'outcome_description' => 'Document live participation and implementation work.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Join a peer cohort of practicing school leaders',   'outcome_description' => 'Work through the same challenges with leaders doing the work now.' ),
			),
			// Audience.
			'audience' => array(
				array( 'audience_label' => 'Principals',            'audience_description' => 'Build a sustainable observation cadence.' ),
				array( 'audience_label' => 'District Leaders',      'audience_description' => 'Support evaluation redesign across schools.' ),
				array( 'audience_label' => 'Instructional Coaches', 'audience_description' => 'Connect coaching conversations to evidence.' ),
			),
			// Included items.
			'included' => array(
				array( 'included_item_icon' => 'users',     'included_item_label' => 'Live expert-led sessions with Kim Marshall' ),
				array( 'included_item_icon' => 'video',     'included_item_label' => 'Recordings of every session' ),
				array( 'included_item_icon' => 'download',  'included_item_label' => 'Mini-observation toolkit, scripts, and templates' ),
				array( 'included_item_icon' => 'messages',  'included_item_label' => 'Small-group breakout discussions' ),
				array( 'included_item_icon' => 'rubric',    'included_item_label' => 'Personal feedback on your draft 90-day plan' ),
				array( 'included_item_icon' => 'award',     'included_item_label' => 'Certificate of professional learning credit' ),
				array( 'included_item_icon' => 'community', 'included_item_label' => 'Access to the RocketPD leader community' ),
				array( 'included_item_icon' => 'priority',  'included_item_label' => 'Priority access to RocketPD support' ),
			),
			// Sponsor.
			'sponsor' => array(
				'enabled'     => false,
				'name'        => '',
				'logo'        => '',
				'description' => '',
				'url'         => '',
				'cta_label'   => 'Learn More',
			),
			// Team options.
			'teamOptions' => array(
				'team_eyebrow'       => 'Team & District Options',
				'team_headline'      => 'Bringing a team?',
				'team_body'          => 'RocketPD can help schools and districts register groups, invoice centrally, and align the cohort to leadership team goals.',
				'team_ideal_for'     => 'Ideal for principal supervisors, leadership teams, and district cohorts.',
				'team_cta_label'     => 'Talk With RocketPD',
				'team_cta_url'       => '/contact/?source=cohort-team',
				'team_pricing_tiers' => array(
					array( 'tier_label' => '5+ participants',  'tier_price' => 'from $785', 'tier_unit' => 'per person' ),
					array( 'tier_label' => '10+ participants', 'tier_price' => 'from $765', 'tier_unit' => 'per person' ),
				),
				'team_capabilities' => array(
					array( 'capability_label' => 'District invoicing' ),
					array( 'capability_label' => 'Centralized registration' ),
					array( 'capability_label' => 'Leadership team onboarding' ),
					array( 'capability_label' => 'Implementation planning support' ),
				),
			),
			// Resources.
			'resources' => array(
				'guide'   => array( 'enabled' => true,  'title' => 'The Ultimate Guide to Teacher Supervision, Coaching & Evaluation', 'meta' => 'Free guide - 20 pages',  'summary' => 'A practical playbook for replacing annual reviews with frequent classroom visits and useful feedback.', 'href' => '/k-12-guides/learning-meet-doing/' ),
				'podcast' => array( 'enabled' => true,  'title' => 'Rethinking Teacher Evaluation with Kim Marshall',                  'meta' => 'Podcast - 46 min',      'summary' => 'Kim unpacks the shifts that reduce stress and build confidence.',                                    'href' => 'https://www.youtube.com/watch?v=AME1I5sUJFQ' ),
				'webinar' => array( 'enabled' => true,  'title' => 'Mini-Observations That Actually Move Teaching',                    'meta' => 'Webinar - On demand',   'summary' => 'A working session on building a sustainable system of classroom visits.',                          'href' => 'https://www.youtube.com/watch?v=wIV-j4nt_ms' ),
				'playbook' => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
			),
			// FAQs.
			'faqs' => array(
				array( 'question' => 'What is a live-virtual cohort?',                'answer' => 'A live-virtual cohort is a multi-session program delivered live on Zoom. You learn directly with the expert and a group of peers over several weeks.' ),
				array( 'question' => 'How long is this cohort?',                      'answer' => 'This cohort includes eight 90-minute sessions, plus implementation work between sessions.' ),
				array( 'question' => 'Are sessions recorded?',                        'answer' => 'Yes. Sessions are recorded and shared with registered participants.' ),
				array( 'question' => 'Can my district register a team?',              'answer' => 'Yes. Schools and districts can register teams and request invoicing support.' ),
				array( 'question' => 'What if I miss a session?',                     'answer' => 'You can watch the recording and continue with the cohort materials before the next live session.' ),
				array( 'question' => 'Do I receive professional development credit?', 'answer' => 'RocketPD provides documentation and a certificate of completion that educators can submit according to local requirements.' ),
				array( 'question' => 'Can I pay by invoice?',                         'answer' => 'Yes. Contact RocketPD before registering and we can help with invoicing or team registration.' ),
			),
			// Testimonials.
			'testimonials' => array(
				array( 'quote' => 'The sessions gave our leadership team the language and confidence to make evaluation feel less stressful and more useful.', 'name' => 'Dr. Denise Williams', 'role' => 'Assistant Superintendent', 'organization' => 'K-12 District',  'image' => '' ),
				array( 'quote' => 'Kim made the work practical. I left with a system I could explain to teachers and actually sustain.',                      'name' => 'Marcus Riley',        'role' => 'Principal',               'organization' => 'Middle School', 'image' => '' ),
			),
			// CTAs.
			'primaryCta'   => array( 'label' => '', 'href' => '' ),
			'secondaryCta' => array( 'label' => 'See Full Schedule', 'href' => '#cohort-schedule' ),
			'finalCta'     => array(
				'headline'       => 'Ready to Join the Cohort?',
				'body'           => 'Claim your seat and build a more practical, trust-centered evaluation system with Kim Marshall.',
				'primaryLabel'   => '',
				'primaryHref'    => '',
				'secondaryLabel' => 'Contact Us About Team Registration',
				'secondaryHref'  => '/contact/?source=cohort-team',
			),
		),
	);
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
