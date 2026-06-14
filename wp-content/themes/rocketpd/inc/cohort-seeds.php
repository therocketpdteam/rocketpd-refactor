<?php
/**
 * Cohort seed data for the admin seeder.
 *
 * Loaded by cohorts.php — do not load this file directly.
 *
 * Each entry supports two flags:
 *   enabled — include in seeder run (false = skip entirely)
 *   resync  — overwrite ACF fields on an existing post (false = skip if post exists)
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return cohort seed data for the admin seeder.
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
			'registrationFillsBy' => 'Seats typically fill by October 1.',
			'invoiceNote'         => 'Need an invoice or purchase order? Contact RocketPD before registering.',
			// Schedule.
			'schedule' => array(
				array( 'session_number' => 1, 'session_title' => 'Introduction to a Thinking Classroom',           'session_date' => '2026-10-29', 'session_time' => '3:30-5:30 PM PST | 6:30-8:30 PM EST', 'session_description' => 'The importance of thinking tasks, visibly random groups, and vertical non-permanent surfaces (VNPS).', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 2, 'session_title' => 'Engagement in the Thinking Classroom',          'session_date' => '2026-11-05', 'session_time' => '3:30-5:30 PM PST | 6:30-8:30 PM EST', 'session_description' => 'The important relationship between thinking and engagement, how to increase engagement through flow, and the relationship between flow and productive struggle.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 3, 'session_title' => 'A Thinking Classroom Lesson: From Launch to Closing', 'session_date' => '2026-11-12', 'session_time' => '3:30-5:30 PM PST | 6:30-8:30 PM EST', 'session_description' => 'The importance of the launch, how to consolidate, how to do meaningful notes, and how to use check-your-understanding questions.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 4, 'session_title' => 'Thin-Slicing 101',                               'session_date' => '2026-11-19', 'session_time' => '3:30-5:30 PM PST | 6:30-8:30 PM EST', 'session_description' => 'What is thin-slicing, the value of thin-slicing, and how to do thin-slicing.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 5, 'session_title' => 'Formative and Summative Assessment',             'session_date' => '2026-12-03', 'session_time' => '3:30-5:30 PM PST | 6:30-8:30 PM EST', 'session_description' => 'The importance of formative assessment, helping students know where they are and where they are going, and grading based on data rather than points.', 'session_resource_link' => '', 'coming_soon' => false ),
			),
			// Outcomes.
			'outcomes' => array(
				array( 'outcome_icon' => '', 'outcome_title' => 'Build a Thinking Classroom',                 'outcome_description' => 'Learn the structures and practices that create an environment where students genuinely think.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Teach content through a Thinking Classroom', 'outcome_description' => 'Apply the BTC framework to real classroom content across disciplines.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Use assessment to shape learning',           'outcome_description' => 'Implement formative and summative assessment strategies grounded in Liljedahl\'s research.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Improve student outcomes',                   'outcome_description' => 'Give students the conditions they need to engage, think, and succeed.' ),
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
			'sponsor' => array( 'enabled' => false, 'name' => '', 'logo' => '', 'description' => '', 'url' => '', 'cta_label' => 'Learn More' ),
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
				'guide'    => array( 'enabled' => true,  'title' => 'The Ultimate Guide to Thinking Teaching Practices', 'meta' => 'Free guide', 'summary' => 'A practical introduction to the Building Thinking Classrooms framework and how to apply it in your school.', 'href' => '/k-12-guides/' ),
				'podcast'  => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
				'webinar'  => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
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
			'longDescription'   => '<p>Educator and best-selling author Peter Liljedahl\'s Building Thinking Classrooms has taken K-12 classrooms by storm.</p><p>Whether you\'ve launched your own Thinking Classroom with your students or you\'ve been considering launching one, Peter created this hands-on summer refresh to help you hit the ground running in the critical year ahead.</p><p>Join educators from across the globe live over three 120-minute virtual sessions as Peter Liljedahl personally walks you and/or your instructional team through a series of practical challenges and exercises designed to help you embrace and model a replicable process for teaching thinking, strike an intentional balance between flow and productive struggle in classroom groups, and successfully launch or relaunch your Thinking Classroom starting on Day 1.</p>',
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
			'registrationFillsBy' => 'Seats typically fill by July 1.',
			'invoiceNote'         => 'Need an invoice or purchase order? Contact RocketPD before registering.',
			// Schedule.
			'schedule' => array(
				array( 'session_number' => 1, 'session_title' => 'Introduction to a Thinking Classroom',           'session_date' => '2026-07-28', 'session_time' => '3:00-5:00 PM PST | 6:00-8:00 PM EST', 'session_description' => 'The importance of thinking tasks, visibly random groups, and vertical non-permanent surfaces (VNPS).', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 2, 'session_title' => 'Engagement in the Thinking Classroom',          'session_date' => '2026-08-04', 'session_time' => '3:00-5:00 PM PST | 6:00-8:00 PM EST', 'session_description' => 'The important relationship between thinking and engagement, how to increase engagement through flow, and the relationship between flow and productive struggle.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 3, 'session_title' => 'A Thinking Classroom Lesson: From Launch to Closing', 'session_date' => '2026-08-11', 'session_time' => '3:00-5:00 PM PST | 6:00-8:00 PM EST', 'session_description' => 'The importance of the launch, how to consolidate, how to do meaningful notes, and how to use check-your-understanding questions.', 'session_resource_link' => '', 'coming_soon' => false ),
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
			'sponsor' => array( 'enabled' => false, 'name' => '', 'logo' => '', 'description' => '', 'url' => '', 'cta_label' => 'Learn More' ),
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
				'guide'    => array( 'enabled' => true,  'title' => 'The Ultimate Guide to Thinking Teaching Practices', 'meta' => 'Free guide', 'summary' => 'A practical introduction to the Building Thinking Classrooms framework and how to apply it in your school.', 'href' => '/k-12-guides/' ),
				'podcast'  => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
				'webinar'  => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
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
			'startDate'         => '2026-09-24',
			'endDate'           => '2027-04-15',
			'sessionCountLabel' => '8 live sessions',
			'totalHours'        => '12 hours of live instruction',
			'formatLabel'       => 'Live via Zoom',
			'cadenceLabel'      => 'Monthly - Thursdays',
			'sessionLength'     => '90 minutes',
			'cardImage'         => '',
			// Instructor.
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
				array( 'session_number' => 1, 'session_title' => 'The moral imperative of a better approach',         'session_date' => '2026-09-24', 'session_time' => '3:30-5:00 PM EST', 'session_description' => 'The big picture of improving teaching and learning, the urgent need for a good system, and an overview of mini-observations.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 2, 'session_title' => 'Nuts and bolts of mini-observations',              'session_date' => '2026-10-15', 'session_time' => '3:30-5:00 PM EST', 'session_description' => 'Why observations need to be frequent and short, developing a systematic approach, and the power of unannounced visits.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 3, 'session_title' => 'Face-to-face debrief conversations and write-ups',  'session_date' => '2026-11-12', 'session_time' => '3:30-5:00 PM EST', 'session_description' => 'How to conduct face-to-face meetings, having the courage to give feedback, and keeping it short, simple, and low-tech.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 4, 'session_title' => 'Nuts and bolts part 2: teacher-evaluation rubrics', 'session_date' => '2026-12-10', 'session_time' => '3:30-5:00 PM EST', 'session_description' => 'How to use teacher evaluation rubrics, evaluating teachers on what matters, and scoring progress over time.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 5, 'session_title' => 'Making student learning central to the process',    'session_date' => '2027-01-07', 'session_time' => '3:30-5:00 PM EST', 'session_description' => 'The problem with test scores and value-added measures, asking the right questions about student learning, and improving instruction in time.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 6, 'session_title' => 'Differentiation and unit/lesson planning',          'session_date' => '2027-02-11', 'session_time' => '3:30-5:00 PM EST', 'session_description' => 'Ensuring students learn what they are supposed to, identifying the best ways to teach content, and determining if learning is happening.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 7, 'session_title' => 'Student surveys and difficult conversations',       'session_date' => '2027-03-18', 'session_time' => '3:30-5:00 PM EST', 'session_description' => 'Student surveys as a low-stakes coaching process, rooting out mediocre and ineffective teaching practices, and facilitating difficult conversations.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 8, 'session_title' => 'Time management: fitting it all in',               'session_date' => '2027-04-15', 'session_time' => '3:30-5:00 PM EST', 'session_description' => 'Setting big-picture goals and staying focused, developing a process to continually improve teaching and learning, and honing priority management skills.', 'session_resource_link' => '', 'coming_soon' => false ),
			),
			// Outcomes.
			'outcomes' => array(
				array( 'outcome_icon' => '', 'outcome_title' => 'Increase supervisors\' classroom visits',                'outcome_description' => 'Build a sustainable cadence of frequent, short classroom visits.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Improve observation skills',                            'outcome_description' => 'Develop a sharper eye for what matters in classroom instruction.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Focus on checks for understanding and student learning', 'outcome_description' => 'Shift the lens from teacher activity to evidence of student learning.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Fine-tune debriefs and written feedback to teachers',   'outcome_description' => 'Practice face-to-face feedback conversations that are honest, specific, and useful.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Use student surveys as a coaching tool',                'outcome_description' => 'Introduce low-stakes student feedback as part of the supervision cycle.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Navigate difficult conversations with confidence',      'outcome_description' => 'Engage teachers in honest conversations about performance and growth.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Use rubrics for goal-setting and summative evaluations','outcome_description' => 'Connect observation evidence to fair, standards-aligned summative ratings.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Manage time so the most important work gets done',      'outcome_description' => 'Build a priority system that keeps supervision at the center of the leadership role.' ),
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
			'sponsor' => array( 'enabled' => false, 'name' => '', 'logo' => '', 'description' => '', 'url' => '', 'cta_label' => 'Learn More' ),
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
				'guide'    => array( 'enabled' => true,  'title' => 'The Ultimate Guide to Teacher Supervision, Coaching & Evaluation', 'meta' => 'Free guide - 20 pages', 'summary' => 'A practical playbook for replacing annual reviews with frequent classroom visits and useful feedback.', 'href' => '/k-12-guides/learning-meet-doing/' ),
				'podcast'  => array( 'enabled' => true,  'title' => 'Rethinking Teacher Evaluation with Kim Marshall',                  'meta' => 'Podcast - 46 min',     'summary' => 'Kim unpacks the shifts that reduce stress and build confidence.',                                   'href' => 'https://www.youtube.com/watch?v=AME1I5sUJFQ' ),
				'webinar'  => array( 'enabled' => true,  'title' => 'Mini-Observations That Actually Move Teaching',                    'meta' => 'Webinar - On demand',  'summary' => 'A working session on building a sustainable system of classroom visits.',                         'href' => 'https://www.youtube.com/watch?v=wIV-j4nt_ms' ),
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
				array( 'quote' => 'Kim Marshall\'s work has been a cornerstone of my leadership practices and my coaching of instructional leadership teams for many years. Kim\'s ideas help leaders outline ways to systematize feedback aligned with the standards, our school\'s instructional priorities and school cultures.', 'name' => 'Drema Brown',      'role' => 'Head of School',                'organization' => 'Children\'s Aid and Children\'s Aid College Prep Charter School', 'image' => '' ),
				array( 'quote' => 'Kim\'s work has been exemplary in supporting the school district\'s commitment to instructional improvement. Kim\'s accessibility, ongoing encouragement, and extraordinary insight encouraged our teachers and administrative staff to embrace his frequent, unannounced mini-observation and teacher-evaluation rubric.', 'name' => 'Charles Cardillo', 'role' => 'Former Superintendent',         'organization' => 'Manhasset, New York Public Schools', 'image' => '' ),
				array( 'quote' => 'Kim transformed the way that we observe teachers and give feedback. Short, frequent, and timely visits to every classroom occur with face-to-face feedback. As a result, teachers feel that we have a fair perspective of what is happening in their classrooms and truly value our instructional eye.', 'name' => 'Amelia Gorman',    'role' => 'Former Principal',              'organization' => 'Lee Pilot School, Boston, MA', 'image' => '' ),
				array( 'quote' => 'With Kim\'s support, we have abandoned rote observations and complicated rubrics for a synthesis of technical feedback, supportive coaching and immediate strategies to improve learning. The combination of mini-observations and clear, powerful rubrics has contributed to a singular focus on improved instruction and student growth.', 'name' => 'Nicholas Tishuk',  'role' => 'Executive Director',            'organization' => 'Bedford Stuyvesant New Beginnings Charter School, Brooklyn, NY', 'image' => '' ),
				array( 'quote' => 'Kim Marshall reminds us that adults are a critical lever to maximize student success. He implores participants to leverage their focus specifically on the school leader by providing timely, specific and direct feedback, along with targeted support for teachers.', 'name' => 'Shahara Jackson',  'role' => 'Former NYC Principal, Founder', 'organization' => 'LyfPrints, Inc.', 'image' => '' ),
				array( 'quote' => 'We asked Kim to work with the staff to design units that are coherent and promote deep understanding. His work helped shape the culture of the school in how we look at curriculum, provide feedback and design lessons. We consider this work as foundational to student success.', 'name' => 'Phuong Nguyen',    'role' => 'Principal',                     'organization' => 'Civic Leadership Academy, New York City', 'image' => '' ),
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
		array(
			'slug'    => 'a-call-to-courage-standing-up-to-intolerance-in-k-12-schools-with-drs-luvelle-brown-shelley-berman',
			'enabled' => false,
			'resync'  => false,
			// Basics.
			'title'             => 'A Call to Courage: Standing Up to Intolerance in K-12 Schools',
			'subtitle'          => 'A five-session cohort with Drs. Luvelle Brown and Shelley Berman on leading with courage against rising attacks on public education.',
			'shortDescription'  => 'Join award-winning superintendents Drs. Luvelle Brown and Shelley Berman for five live sessions on standing up to intolerance, reclaiming the narrative, and building courageous school culture.',
			'longDescription'   => '<p>In their book A Call to Courage, Drs. Sheldon Berman and Luvelle Brown issue a clarion call to stand up to rising instances of unjust and intolerant attacks on K-12 public schools.</p><p>In this five-session virtual cohort, Brown and Berman share ideas for dealing with and managing these attacks, while giving your teams practical tools and strategies for responding and reclaiming the narrative, and instilling courage to change the culture in your schools and your community.</p>',
			'topic'             => 'School Culture',
			'category'          => 'Leadership',
			'status'            => 'closed',
			'featured'          => false,
			'startDate'         => '2024-11-13',
			'endDate'           => '2024-12-18',
			'sessionCountLabel' => '5 live sessions',
			'totalHours'        => '7.5 hours of live instruction',
			'formatLabel'       => 'Live via Zoom',
			'cadenceLabel'      => 'Weekly',
			'sessionLength'     => '90 minutes',
			'cardImage'         => '/wp-content/uploads/2024/04/dr-luvelle-brown-rocketpd-instructor.jpg',
			// Instructor.
			'instructor' => array(
				'slug'        => 'dr-luvelle-brown',
				'name'        => 'Dr. Luvelle Brown',
				'title'       => 'Former New York State Superintendent of the Year',
				'roleLine'    => 'Co-author, A Call to Courage &#183; with Dr. Shelley Berman',
				'headshot'    => '/wp-content/uploads/2024/04/dr-luvelle-brown-rocketpd-instructor.jpg',
				'bio'         => 'A former New York State Superintendent of the Year, Dr. Luvelle Brown has emerged as one of the nation\'s foremost voices on innovation and school and district culture in K-12 schools. His book Culture of Love has been called transformative and powerful. Dr. Brown received the 2022 AASA Dr. Effie Jones Humanitarian Award for his national and international leadership. He co-authored A Call to Courage with Dr. Sheldon Berman, AASA\'s Lead Superintendent for Social-Emotional Learning, who has served as superintendent in four districts over 28 years and authored five books on democracy, education, and social responsibility.',
				'quote'       => '',
				'specialties' => array( 'School Culture', 'Equity and Inclusion', 'Courageous Leadership', 'District Innovation' ),
				'href'        => '/instructors/dr-luvelle-brown/',
				'links'       => array(),
			),
			// Pricing.
			'priceType'           => 'paid',
			'priceLabel'          => '$495/person',
			'priceAmount'         => '$495',
			'priceMeta'           => 'per person - 5 sessions',
			'registrationUrl'     => '',
			'waitlistUrl'         => '',
			'closedMessage'       => 'Registration is currently closed. Join the notification list and we will let you know when the next cohort opens.',
			'registrationFillsBy' => '',
			'invoiceNote'         => 'Need an invoice or purchase order? Contact RocketPD before registering.',
			// Schedule.
			'schedule' => array(
				array( 'session_number' => 1, 'session_title' => 'A Call to Courage: Why, What, and How?',                              'session_date' => '2024-11-13', 'session_time' => '3:30 - 5:00 PM EST', 'session_description' => 'Explore how current political divisiveness is compromising school operations and student achievement, and why the courage of education leaders is so critical. Analyze assaults on education, learn to articulate your motivations as an educator, and explore key terms including Culture, Equity, Diversity, and Anti-Racism.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 2, 'session_title' => 'Define Your Journey',                                                 'session_date' => '2024-11-20', 'session_time' => '3:30 - 5:00 PM EST', 'session_description' => 'Discuss what motivates courageous action and how those sources of courage can serve as resources for current challenges. Identify real-life examples of courageous leadership and apply that motivation to your own context.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 3, 'session_title' => 'What\'s Happening? And What Do You Do About It?',                    'session_date' => '2024-12-04', 'session_time' => '3:30 - 5:00 PM EST', 'session_description' => 'Review current sources of divisiveness participants are experiencing and how to mitigate and manage resistance through leadership actions that keep the focus on what is right for students.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 4, 'session_title' => 'How to Reclaim the Narrative',                                        'session_date' => '2024-12-11', 'session_time' => '3:30 - 5:00 PM EST', 'session_description' => 'Share messages and strategies to reframe issues, reduce divisiveness, and reclaim the narrative for students. Learn to identify metrics and communicate with stakeholders about equity, inclusion, and student achievement.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 5, 'session_title' => 'What Will You Do Tomorrow, Next Year, Over the Next Five Years?',    'session_date' => '2024-12-18', 'session_time' => '3:30 - 5:00 PM EST', 'session_description' => 'Master strategies that defuse divisiveness and promote common understanding. Learn how education leaders can respond directly to extreme attacks on public education while moving the organization forward.', 'session_resource_link' => '', 'coming_soon' => false ),
			),
			// Outcomes.
			'outcomes' => array(
				array( 'outcome_icon' => '', 'outcome_title' => 'Define and speak to critical issues',        'outcome_description' => 'Articulate your position on diversity, academic excellence, and inclusion for all.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Foster productive conversations',            'outcome_description' => 'Engage students and staff in programs that promote safer, more inclusive learning environments.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Build effective support structures',         'outcome_description' => 'Establish relationships and systems that power equity and inclusion work.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Establish metrics and communicate success', 'outcome_description' => 'Define a repeatable system for measuring and communicating progress to stakeholders.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Lead challenging conversations',            'outcome_description' => 'Invite and lead difficult conversations with productive outcomes for students, families, boards, and community members.' ),
			),
			// Audience.
			'audience' => array(
				array( 'audience_label' => 'Superintendents',            'audience_description' => 'Lead with courage in the face of rising attacks on public education.' ),
				array( 'audience_label' => 'Assistant Superintendents', 'audience_description' => 'Support district-wide culture and equity efforts.' ),
				array( 'audience_label' => 'Central-Office Teams',      'audience_description' => 'Align your team around courageous, equity-centered leadership.' ),
				array( 'audience_label' => 'Building Administrators',   'audience_description' => 'Reclaim the narrative and build culture at the school level.' ),
				array( 'audience_label' => 'School Board Members',      'audience_description' => 'Strengthen your role in advancing public education.' ),
			),
			// Included items.
			'included' => array(
				array( 'included_item_icon' => 'users',     'included_item_label' => 'Live sessions with Drs. Luvelle Brown and Shelley Berman' ),
				array( 'included_item_icon' => 'video',     'included_item_label' => 'Session recordings via the RocketPD Learning Portal' ),
				array( 'included_item_icon' => 'book',      'included_item_label' => 'A copy of A Call to Courage by Berman and Brown' ),
				array( 'included_item_icon' => 'community', 'included_item_label' => 'Breakout discussions with educators worldwide' ),
				array( 'included_item_icon' => 'award',     'included_item_label' => 'Certificate of Completion' ),
			),
			// Sponsor.
			'sponsor' => array( 'enabled' => false, 'name' => '', 'logo' => '', 'description' => '', 'url' => '', 'cta_label' => 'Learn More' ),
			// Team options.
			'teamOptions' => array(
				'team_eyebrow'       => 'Team & District Options',
				'team_headline'      => 'Build a team of any size and save.',
				'team_body'          => 'RocketPD offers group discounts for schools and districts registering teams. Contact us for large group rates of 10 or more.',
				'team_ideal_for'     => 'Ideal for superintendent cabinets, central-office teams, and school board members.',
				'team_cta_label'     => 'Contact RocketPD',
				'team_cta_url'       => '/contact/?source=cohort-team',
				'team_pricing_tiers' => array(
					array( 'tier_label' => 'Team of 5',   'tier_price' => '$485',       'tier_unit' => 'per person' ),
					array( 'tier_label' => 'Team of 10+', 'tier_price' => 'Contact us', 'tier_unit' => 'for rates'  ),
				),
				'team_capabilities' => array(
					array( 'capability_label' => 'Group discounts' ),
					array( 'capability_label' => 'Invoice and PO support' ),
					array( 'capability_label' => 'Centralized registration' ),
				),
			),
			// Resources.
			'resources' => array(
				'guide'    => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
				'podcast'  => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
				'webinar'  => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
				'playbook' => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
			),
			// FAQs.
			'faqs' => array(
				array( 'question' => 'What is the A Call to Courage cohort?',  'answer' => 'In their book A Call to Courage, award-winning educators Drs. Sheldon Berman and Luvelle Brown issue a clarion call to stand up to rising instances of unjust and intolerant attacks on K-12 public schools. In this five-session cohort, Brown and Berman share ideas for dealing with and managing these attacks, while giving your teams practical tools and strategies for responding and reclaiming the narrative, and instilling courage to change the culture in your schools and your community.' ),
				array( 'question' => 'Why do this as part of a cohort?',       'answer' => 'The RocketPD cohort experience is designed to give school district leaders an actionable, affordable, and convenient way to facilitate difficult but necessary strategic conversations and initiatives. Districts can register select members of their building or central-office teams for open cohorts.' ),
				array( 'question' => 'What is included in this program?',      'answer' => 'Attendees will participate in five collaborative 90-minute virtual learning sessions over Zoom. They will also have access to the RocketPD Learning Portal for recordings and resources, and will receive a copy of Drs. Berman and Brown\'s book, A Call to Courage.' ),
				array( 'question' => 'Who should participate?',                'answer' => 'This cohort is designed for superintendents, assistant superintendents, central-office and school administrators, directors, coaches, and team leads.' ),
				array( 'question' => 'How will this help my team?',            'answer' => 'The goal of this cohort is to empower school leaders and public school supporters to take action to meet resistance in the community or state, and to take proactive action to further advance equity and inclusion work within their professional organizations and legislatively.' ),
				array( 'question' => 'How can I participate?',                 'answer' => 'Join the notification list to be the first to know when this cohort opens again. Once you sign up, you will receive information about the program including payment and invoicing details and scheduled session dates and times.' ),
			),
			// Testimonials.
			'testimonials' => array(
				array( 'quote' => 'The Call to Courage responds to the urgent need for educative leadership in times of political divisiveness. Its pragmatic ideas for reducing polarization while advancing justice will serve the field for years to come.', 'name' => 'Linda Darling-Hammond', 'role' => 'Professor Emeritus, Stanford University; President, Learning Policy Institute', 'organization' => '', 'image' => '' ),
				array( 'quote' => 'The Call to Courage will inspire and sustain leaders who want to do the right thing, even when it is difficult.',                                                                                                        'name' => 'Joshua P. Starr',        'role' => 'Managing Partner, Center for Model Schools; Former Superintendent',          'organization' => '', 'image' => '' ),
				array( 'quote' => 'The Call to Courage is a must-read for those fighting to ensure public schools continue to be students\' and families\' pathway to success.',                                                                           'name' => 'Gustavo Balderas',       'role' => 'Superintendent, Beaverton School District, Oregon; President-elect, AASA',  'organization' => '', 'image' => '' ),
			),
			// CTAs.
			'primaryCta'   => array( 'label' => 'Join the Notification List', 'href' => '/contact/?source=cohort-call-to-courage' ),
			'secondaryCta' => array( 'label' => 'See Full Schedule', 'href' => '#cohort-schedule' ),
			'finalCta'     => array(
				'headline'       => 'Be the First to Know When This Cohort Opens',
				'body'           => 'This cohort is currently closed. Join the notification list and we will let you know when the next session is available.',
				'primaryLabel'   => 'Join the Notification List',
				'primaryHref'    => '/contact/?source=cohort-call-to-courage',
				'secondaryLabel' => 'Contact Us With Questions',
				'secondaryHref'  => '/contact/?source=cohort-call-to-courage',
			),
		),
		array(
			'slug'    => 'a-i-for-leaders-how-to-use-ai-to-become-a-more-efficient-and-effective-k-12-administrator',
			'enabled' => false,
			'resync'  => false,
			// Basics.
			'title'             => 'A.I. For Leaders: How to Use AI to Become a More Efficient and Effective K-12 Administrator',
			'subtitle'          => 'A hands-on five-session cohort with A.J. Juliani on using AI to improve decision-making, drive efficiency, and manage transformational change in K-12 schools.',
			'shortDescription'  => 'Join Wall Street Journal bestselling author A.J. Juliani for five live sessions on using AI as a strategic leadership tool — from decision-making and operations to ethics and stakeholder communication.',
			'longDescription'   => '<p>As administrators and educators grapple with the far-reaching implications of artificial intelligence in K-12 education, understanding and knowledge are key to unlocking the technology\'s vast potential while effectively managing its risks.</p><p>While much of the focus so far in schools has centered on classroom applications, an increasing number of forward-thinking K-12 school leaders has begun to explore AI as a strategic resource for improving decision-making and driving operational efficiency.</p><p>In this hands-on cohort, best-selling author and career educator A.J. Juliani lays the groundwork for understanding the current state of AI in education, while focusing on the role that AI can and will play in the future of K-12 leadership and administration.</p>',
			'topic'             => 'Artificial Intelligence',
			'category'          => 'Leadership',
			'status'            => 'closed',
			'featured'          => false,
			'startDate'         => '2025-10-02',
			'endDate'           => '2025-10-30',
			'sessionCountLabel' => '5 live sessions',
			'totalHours'        => '7.5 hours of live instruction',
			'formatLabel'       => 'Live via Zoom',
			'cadenceLabel'      => 'Weekly - Thursdays',
			'sessionLength'     => '90 minutes',
			'cardImage'         => '/wp-content/uploads/2023/05/aj-juliani.jpg',
			// Instructor.
			'instructor' => array(
				'slug'        => 'aj-juliani',
				'name'        => 'A.J. Juliani',
				'title'       => 'Wall Street Journal and USA Today Bestselling Author of Adaptable',
				'roleLine'    => 'Creator of LearningTools.ai &#183; Faculty, University of Pennsylvania Graduate School of Education',
				'headshot'    => '/wp-content/uploads/2023/05/aj-juliani.jpg',
				'bio'         => 'A.J. Juliani is the Wall Street Journal and USA Today bestselling author of Adaptable. He created LearningTools.ai, an AI tool for Universal Design for Learning, and serves as Faculty for the University of Pennsylvania Graduate School of Education. A former Director of Learning and Innovation, Curriculum Coordinator, Tech Director, English teacher, and K-12 Instructional Coach, A.J. has worked toward innovative learning experiences for schools across the country. He is also the author of Empower, Launch, and The PBL Playbook.',
				'quote'       => '',
				'specialties' => array( 'Artificial Intelligence in Education', 'Innovation and Change Leadership', 'Project-Based Learning', 'Instructional Technology' ),
				'href'        => '/instructors/aj-juliani/',
				'links'       => array(),
			),
			// Pricing.
			'priceType'           => 'paid',
			'priceLabel'          => '$495/person',
			'priceAmount'         => '$495',
			'priceMeta'           => 'per person - 5 sessions',
			'registrationUrl'     => '',
			'waitlistUrl'         => '',
			'closedMessage'       => 'Registration is currently closed. Join the notification list and we will let you know when the next cohort opens.',
			'registrationFillsBy' => '',
			'invoiceNote'         => 'Need an invoice or purchase order? Contact RocketPD before registering.',
			// Schedule.
			'schedule' => array(
				array( 'session_number' => 1, 'session_title' => 'How A.I. Can Be Your Leadership Partner',             'session_date' => '2025-10-02', 'session_time' => '3:30 - 5:00 PM EST', 'session_description' => 'Explore the use of AI in core school leadership functions. Identify applications for decision-making, streamlining tasks, and strategic innovation. Learn how AI can augment leadership and drive organizational improvements.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 2, 'session_title' => 'Using A.I. For Educational Efficacy',                'session_date' => '2025-10-09', 'session_time' => '3:30 - 5:00 PM EST', 'session_description' => 'Learn how AI can optimize school operations and explore applications for enhanced student learning. Use AI to become a more efficient, data-driven decision-maker.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 3, 'session_title' => 'Handling Bias, Ethics, and Community Feedback',      'session_date' => '2025-10-16', 'session_time' => '3:30 - 5:00 PM EST', 'session_description' => 'Navigate the ethics of AI in K-12 schools. Effectively manage implicit and explicit biases, and use community input to foster equitable learning environments.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 4, 'session_title' => '10 Ways To Use A.I. As A School Leader Right Now',  'session_date' => '2025-10-23', 'session_time' => '3:30 - 5:00 PM EST', 'session_description' => 'Maximize time by integrating AI into daily leadership functions. Identify immediate and impactful AI applications and achieve administrative efficiencies and learning enhancements.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 5, 'session_title' => 'Navigating Unprecedented Change With Your Stakeholders', 'session_date' => '2025-10-30', 'session_time' => '3:30 - 5:00 PM EST', 'session_description' => 'Learn to collaborate with colleagues using AI, manage and stay ahead of transformational change, and build resilient and adaptive learning environments.', 'session_resource_link' => '', 'coming_soon' => false ),
			),
			// Outcomes.
			'outcomes' => array(
				array( 'outcome_icon' => '', 'outcome_title' => 'Drive efficiencies and build confidence in decision-making', 'outcome_description' => 'Use AI to streamline leadership functions and make faster, better-informed decisions.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Improve educational efficacy',                              'outcome_description' => 'Apply AI from operations to student outcomes to improve school performance at every level.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Promote ethical and responsible use of AI',                 'outcome_description' => 'Navigate bias, privacy, and community concerns to lead AI adoption with integrity.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Improve time management skills',                            'outcome_description' => 'Identify and implement AI applications that give you back time for what matters most.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Manage transformational change',                            'outcome_description' => 'Support adaptive learning environments and lead your stakeholders through the shift to AI-augmented leadership.' ),
			),
			// Audience.
			'audience' => array(
				array( 'audience_label' => 'Superintendents',               'audience_description' => 'Lead district-wide AI strategy with confidence and clarity.' ),
				array( 'audience_label' => 'Assistant Superintendents',     'audience_description' => 'Support operational AI integration across departments.' ),
				array( 'audience_label' => 'Building Principals',           'audience_description' => 'Use AI to improve school-level decision-making and efficiency.' ),
				array( 'audience_label' => 'Central Office Administrators', 'audience_description' => 'Identify AI applications that improve operations and outcomes.' ),
				array( 'audience_label' => 'Aspiring School Leaders',       'audience_description' => 'Build the AI fluency that modern K-12 leadership requires.' ),
			),
			// Included items.
			'included' => array(
				array( 'included_item_icon' => 'users',      'included_item_label' => 'Live sessions with A.J. Juliani and special guests' ),
				array( 'included_item_icon' => 'video',      'included_item_label' => 'Session recordings (available for 30 days)' ),
				array( 'included_item_icon' => 'community',  'included_item_label' => 'Breakout discussions with educators worldwide' ),
				array( 'included_item_icon' => 'mobile',     'included_item_label' => 'Access via the RocketPD Learning Portal' ),
				array( 'included_item_icon' => 'newsletter', 'included_item_label' => 'Free enrollment in A.J. Juliani\'s AI newsletter' ),
				array( 'included_item_icon' => 'award',      'included_item_label' => 'Certificate of Completion' ),
			),
			// Sponsor.
			'sponsor' => array( 'enabled' => false, 'name' => '', 'logo' => '', 'description' => '', 'url' => '', 'cta_label' => 'Learn More' ),
			// Team options.
			'teamOptions' => array(
				'team_eyebrow'       => 'Team & District Options',
				'team_headline'      => 'Build a team of any size and save.',
				'team_body'          => 'RocketPD offers group discounts for schools and districts registering teams. Contact us for large group rates of 30 or more.',
				'team_ideal_for'     => 'Ideal for leadership teams, cabinet-level administrators, and district-wide AI initiatives.',
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
				'guide'    => array( 'enabled' => true,  'title' => 'The Ultimate Guide to Using Artificial Intelligence for Good in K-12 Schools', 'meta' => 'Free guide', 'summary' => 'A practical introduction to AI in K-12 education — what it is, what it isn\'t, and how school leaders can use it responsibly.', 'href' => '/k-12-guides/' ),
				'podcast'  => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
				'webinar'  => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
				'playbook' => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
			),
			// FAQs.
			'faqs' => array(
				array( 'question' => 'What is the A.I. For K-12 School Leaders cohort?', 'answer' => 'Created by best-selling author and former classroom educator A.J. Juliani, this is an all-virtual five-session hands-on professional learning experience for central-office and school building administrators. Attendees will learn how to use AI as a partner in school leadership, with a focus on improved decision-making, educational efficacy, and time management.' ),
				array( 'question' => 'Why do this as part of a cohort?',                  'answer' => 'The RocketPD cohort experience is designed to give school district leaders an actionable, affordable, and convenient way to facilitate difficult but necessary strategic conversations and initiatives. Districts can register select members of their building or central-office teams for open cohorts.' ),
				array( 'question' => 'What is included in this program?',                 'answer' => 'The cohort features five 90-minute virtual learning sessions delivered via Zoom, access to the RocketPD Learning Portal throughout the cohort for session recordings and resources, and free enrollment in A.J. Juliani\'s newsletter featuring the latest insights and ideas for using AI in K-12 schools.' ),
				array( 'question' => 'Who should participate?',                           'answer' => 'This cohort is intended for superintendents, assistant superintendents, site and central office administrators, building principals, and aspiring school leaders. Discounts are available for teams of five or more.' ),
				array( 'question' => 'How will this help my team?',                       'answer' => 'Attendees will emerge with clear ideas and practical applications for AI in key school leadership functions, including streamlined decision-making, culture and organizational efficiency, ethical AI use, improved time management, and strategies for managing transformational change.' ),
				array( 'question' => 'How can I participate?',                            'answer' => 'Join the notification list to be the first to know when this cohort opens again. Once you sign up, you will receive information about the program including payment and invoicing details and scheduled session dates and times.' ),
			),
			// Testimonials.
			'testimonials' => array(
				array( 'quote' => 'What an empowering message! My teacher heart is fired up.',                                                         'name' => 'MacKenzie Pettit', 'role' => 'Teacher', 'organization' => '', 'image' => '' ),
				array( 'quote' => 'I will never forget meeting this awesome guest speaker! A.J. is a true advocate for student learning and passion.', 'name' => 'Natasha Smith',    'role' => 'Teacher', 'organization' => '', 'image' => '' ),
				array( 'quote' => 'By far the best keynote speaker we\'ve had on opening day! Thank you for the inspiration and motivation.',          'name' => 'Becky Thal',       'role' => 'Teacher', 'organization' => '', 'image' => '' ),
			),
			// CTAs.
			'primaryCta'   => array( 'label' => 'Join the Notification List', 'href' => '/contact/?source=cohort-ai-for-leaders' ),
			'secondaryCta' => array( 'label' => 'See Full Schedule', 'href' => '#cohort-schedule' ),
			'finalCta'     => array(
				'headline'       => 'Be the First to Know When This Cohort Opens',
				'body'           => 'This cohort is currently closed. Join the notification list and we will let you know when the next session is available.',
				'primaryLabel'   => 'Join the Notification List',
				'primaryHref'    => '/contact/?source=cohort-ai-for-leaders',
				'secondaryLabel' => 'Contact Us With Questions',
				'secondaryHref'  => '/contact/?source=cohort-ai-for-leaders',
			),
		),
		// -------------------------------------------------------------------------
		// #3 — Build Ownership, Not Buy-In (Eric Sheninger) — Nov-Dec 2025 — closed
		// -------------------------------------------------------------------------
		array(
			'slug'    => 'build-ownership-not-buy-in-empowering-school-teams-for-the-hard-work-of-change',
			'enabled' => true,
			'resync'  => false,
			// Basics.
			'title'             => 'Build Ownership, Not Buy-In: Empowering School Teams for the Hard Work of Change',
			'subtitle'          => 'A five-session cohort with Eric Sheninger on building a culture of ownership, accountability, and innovation that drives lasting change in K-12 schools.',
			'shortDescription'  => 'Join best-selling author and Aspire Change EDU founder Eric Sheninger for five live sessions on leading sustainable change, empowering school teams, and building a culture where everyone owns the work.',
			'longDescription'   => '<p>It is easy to talk about the importance of meeting all learners needs. It is hard to launch programs that realistically achieve that goal. That type of whole-scale change demands more than just buy-in — it requires true ownership and commitment from every member of your team.</p><p>Join Eric Sheninger, founder of Aspire Change EDU and acclaimed author of Personalize: Meeting the Needs of All Learners, for this five-session live-virtual course designed to equip school leaders with the tools, strategies, and mindset to lead sustainable change-based initiatives and improve outcomes for all learners.</p>',
			'topic'             => 'School Leadership',
			'category'          => 'Leadership',
			'status'            => 'closed',
			'featured'          => false,
			'startDate'         => '2025-11-06',
			'endDate'           => '2025-12-11',
			'sessionCountLabel' => '5 live sessions',
			'totalHours'        => '7.5 hours of live instruction',
			'formatLabel'       => 'Live via Zoom',
			'cadenceLabel'      => 'Weekly - Thursdays',
			'sessionLength'     => '90 minutes',
			'cardImage'         => '/wp-content/uploads/2025/01/eric-sheninger.png',
			// Instructor.
			'instructor' => array(
				'slug'        => 'eric-sheninger',
				'name'        => 'Eric Sheninger',
				'title'       => 'Founder and CEO, Aspire Change EDU',
				'roleLine'    => 'Best-selling author of Personalize: Meeting the Needs of ALL Learners',
				'headshot'    => '/wp-content/uploads/2025/01/eric-sheninger.png',
				'bio'         => 'Eric Sheninger is the founder and CEO of Aspire Change EDU, where he partners with schools worldwide to empower educators and improve outcomes for learners. A former award-winning principal, Eric transformed New Milford High School into a globally recognized model of innovation through sustainable change initiatives that increased achievement and redefined the learning culture. As a best-selling author and sought-after speaker, Eric focuses on practical, research-based strategies that inspire transformative teaching, learning, and leadership. His latest book is Personalize: Meeting the Needs of ALL Learners with Nicki Slaugh.',
				'quote'       => '',
				'specialties' => array( 'Change Leadership', 'School Culture', 'Instructional Innovation', 'Staff Empowerment' ),
				'href'        => '/instructors/eric-sheninger/',
				'links'       => array(),
			),
			// Pricing.
			'priceType'           => 'paid',
			'priceLabel'          => '$495/person',
			'priceAmount'         => '$495',
			'priceMeta'           => 'per person - 5 sessions',
			'registrationUrl'     => '',
			'waitlistUrl'         => '',
			'closedMessage'       => 'Registration is currently closed. Join the notification list and we will let you know when the next cohort opens.',
			'registrationFillsBy' => '',
			'invoiceNote'         => 'Need an invoice or purchase order? Contact RocketPD before registering.',
			// Schedule.
			'schedule' => array(
				array( 'session_number' => 1, 'session_title' => 'Leveraging a Swiss Army Knife Approach to Change', 'session_date' => '2025-11-06', 'session_time' => '3:30 - 5:00 PM EST', 'session_description' => 'Explore the concept of adaptability and versatility in navigating change to build ownership. Develop your change management toolkit, create a culture of adaptability and agility, and conduct a change management tool audit to assess and refine existing initiatives.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 2, 'session_title' => 'Charting a Course to Ownership',                  'session_date' => '2025-11-13', 'session_time' => '3:30 - 5:00 PM EST', 'session_description' => 'Get practical strategies and tools to empower individuals and teams to take ownership of their goals. Apply the Eisenhower Matrix to prioritize effectively, master clear communication and consistent branding, and use SWOT analysis to enable informed ownership of strategic goals.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 3, 'session_title' => 'Evolving into a Pedagogical Leader: Part 1',      'session_date' => '2025-11-20', 'session_time' => '3:30 - 5:00 PM EST', 'session_description' => 'Acquire the knowledge, skills, and strategies to effectively lead instructional practices and inspire student growth. Articulate your core beliefs about teaching and learning, develop a culture of collaboration and innovation, and champion student-centered learning.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 4, 'session_title' => 'Evolving into a Pedagogical Leader: Part 2',      'session_date' => '2025-12-04', 'session_time' => '3:30 - 5:00 PM EST', 'session_description' => 'Delve into the practical application of pedagogical leadership principles. Collect and analyze data to inform pedagogy, develop strong observational feedback skills, and embrace continuous professional growth.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 5, 'session_title' => 'Cycle of Continuous Improvement',                  'session_date' => '2025-12-11', 'session_time' => '3:30 - 5:00 PM EST', 'session_description' => 'Apply a Cycle of Continuous Improvement to refine planning, implementation, evaluation, and growth processes. Learn to plan strategically with standards-based goals, evaluate using data-driven insights, and commit to adaptive strategies that drive sustained success.', 'session_resource_link' => '', 'coming_soon' => false ),
			),
			// Outcomes.
			'outcomes' => array(
				array( 'outcome_icon' => '', 'outcome_title' => 'A personalized change-management toolkit',      'outcome_description' => 'Lead through challenges and obstacles with confidence using a diverse set of strategies and tools.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'A culture of ownership and accountability',     'outcome_description' => 'Build engagement and shared responsibility within and among your school team.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Skills to champion student-centered learning',  'outcome_description' => 'Lead instructional practices that put learner needs at the center of every decision.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Capacity for continuous improvement',          'outcome_description' => 'Sustain meaningful, measurable success through reflective practices and adaptive strategies.' ),
			),
			// Audience.
			'audience' => array(
				array( 'audience_label' => 'Superintendents',         'audience_description' => 'Lead district-wide change initiatives with a culture of ownership.' ),
				array( 'audience_label' => 'Assistant Superintendents','audience_description' => 'Support sustainable change across schools and departments.' ),
				array( 'audience_label' => 'Principals',              'audience_description' => 'Build school-level accountability and staff empowerment.' ),
				array( 'audience_label' => 'Assistant Principals',    'audience_description' => 'Develop the leadership skills to guide teams through complex change.' ),
				array( 'audience_label' => 'Instructional Leaders',   'audience_description' => 'Foster collaborative, innovative cultures for lasting improvement.' ),
				array( 'audience_label' => 'Department Heads',        'audience_description' => 'Build ownership within your team for sustainable program success.' ),
			),
			// Included items.
			'included' => array(
				array( 'included_item_icon' => 'users',     'included_item_label' => 'Live sessions with Eric Sheninger' ),
				array( 'included_item_icon' => 'video',     'included_item_label' => 'Session recordings (available for 30 days)' ),
				array( 'included_item_icon' => 'community', 'included_item_label' => 'Breakout discussions with educators worldwide' ),
				array( 'included_item_icon' => 'mobile',    'included_item_label' => 'Access via the RocketPD Learning Portal' ),
				array( 'included_item_icon' => 'award',     'included_item_label' => 'Certificate of Completion' ),
			),
			// Sponsor.
			'sponsor' => array( 'enabled' => false, 'name' => '', 'logo' => '', 'description' => '', 'url' => '', 'cta_label' => 'Learn More' ),
			// Team options.
			'teamOptions' => array(
				'team_eyebrow'       => 'Team & District Options',
				'team_headline'      => 'Build a team of any size and save.',
				'team_body'          => 'RocketPD offers group discounts for schools and districts registering teams. Contact us for large group rates of 30 or more.',
				'team_ideal_for'     => 'Ideal for leadership teams, department heads, and district-wide change initiatives.',
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
				'guide'    => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
				'podcast'  => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
				'webinar'  => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
				'playbook' => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
			),
			// FAQs.
			'faqs' => array(
				array( 'question' => 'What is Build Ownership, Not Buy-In — and how can it help?', 'answer' => 'Build Ownership, Not Buy-In is a live-virtual 5-session course for school leaders and their teams, led by Eric Sheninger. This course was designed to help school leaders drive sustainable change and improve outcomes for all learners. Participants will learn how to build a toolkit for navigating complex challenges, empower teams to take ownership of initiatives, and lead with a student-centered vision.' ),
				array( 'question' => 'Why do this as part of a cohort?',                           'answer' => 'The RocketPD cohort experience is designed to give educators and school district leaders an actionable, affordable, and convenient way to facilitate difficult but necessary strategic conversations and initiatives. The live-virtual sessions give educators an easy and reliable way to collaborate with best-selling author and Aspire Change EDU founder Eric Sheninger and other colleagues from around the world on a topic of strategic importance.' ),
				array( 'question' => 'What is included in this program?',                          'answer' => 'Delivered over five weeks, the program includes five scheduled structured learning conversations delivered virtually over Zoom, plus password-protected access to the RocketPD Learning Portal where participants can access recordings for a limited time, and a customized Certificate of Completion.' ),
				array( 'question' => 'Who should participate?',                                    'answer' => 'This cohort is a five-session collaborative professional-learning experience for superintendents, assistant superintendents, department heads, directors, and anyone working in education in charge of leading or managing change-based initiatives in schools.' ),
				array( 'question' => 'How will this help my team?',                                'answer' => 'The cohort provides a unique opportunity for school district leadership and staff teams to have candid conversations with Eric Sheninger on leading and implementing complex change-based initiatives. Unlike one-off seminars, the cohort provides a framework that school leaders can use to create stronger, more supportive environments for improved student and community outcomes.' ),
				array( 'question' => 'How can I participate?',                                     'answer' => 'Join the notification list to be the first to know when this cohort opens again. Once you sign up, you will receive information about the program including payment and invoicing details and scheduled session dates and times.' ),
			),
			// Testimonials.
			'testimonials' => array(
				array( 'quote' => 'Eric Sheninger has been a key asset throughout my administrative career in my efforts to build capacity and restructure my organizational practice through the latest pedagogical methods. His work has helped improve my teachers\' abilities and student achievement across the nation in urban and suburban districts.', 'name' => 'Eric Crespo',  'role' => 'Superintendent', 'organization' => 'Weehawken Township School District, NJ', 'image' => '' ),
				array( 'quote' => 'I have worked with Eric in different capacities since 2016, and he has a unique ability to both support and push administrators and teachers. In each situation, he has tailored his approach to the needs of the district and the practitioners and, while always keeping the focus on what is best for children.', 'name' => 'Dr. Dave Moyer', 'role' => 'Superintendent', 'organization' => 'Northport-East Northport Unified School District, NY', 'image' => '' ),
				array( 'quote' => 'Eric is an innovative, out-of-the-box thinker with a mission to disrupt and improve the education system. He is a passionate partner who takes pride in forming relationships with his schools and personalizes the coaching experience based on your needs.', 'name' => 'Nick Slaugh',    'role' => 'Principal',      'organization' => 'Quest Academy Junior High School, West Haven, UT', 'image' => '' ),
			),
			// CTAs.
			'primaryCta'   => array( 'label' => 'Join the Notification List', 'href' => '/contact/?source=cohort-build-ownership' ),
			'secondaryCta' => array( 'label' => 'See Full Schedule', 'href' => '#cohort-schedule' ),
			'finalCta'     => array(
				'headline'       => 'Be the First to Know When This Cohort Opens',
				'body'           => 'This cohort is currently closed. Join the notification list and we will let you know when the next session is available.',
				'primaryLabel'   => 'Join the Notification List',
				'primaryHref'    => '/contact/?source=cohort-build-ownership',
				'secondaryLabel' => 'Contact Us With Questions',
				'secondaryHref'  => '/contact/?source=cohort-build-ownership',
			),
		),
		// -------------------------------------------------------------------------
		// #4 — Build Teaching Confidence (Jennifer Gonzalez) — Mar 2026 — closed
		// -------------------------------------------------------------------------
		array(
			'slug'    => 'build-teaching-confidence-with-powerful-lesson-design-with-jennifer-gonzalez',
			'enabled' => true,
			'resync'  => false,
			// Basics.
			'title'             => 'Build Teaching Confidence with Powerful Lesson Design',
			'subtitle'          => 'A five-session cohort with Jennifer Gonzalez on building and maintaining instructional confidence through powerful lesson planning and design.',
			'shortDescription'  => 'Join Cult of Pedagogy founder Jennifer Gonzalez for five live sessions on designing high-quality lessons, building a personal strategy toolkit, and gaining the confidence to deliver outstanding instruction.',
			'longDescription'   => '<p>As the founder and editor of Cult of Pedagogy, Jennifer Gonzalez has built a community of committed educators who view great teaching as an art form. As a former teacher, she also knows how hard teaching has become.</p><p>In this five-session live virtual cohort, Gonzalez shows classroom teachers and instructional coaches how to build and maintain instructional confidence through powerful lesson planning and design. Get practical strategies to help you set rigorous, achievable goals, select the best strategies to meet those goals, and get more learning out of every teachable moment.</p>',
			'topic'             => 'Instructional Design',
			'category'          => 'Instruction',
			'status'            => 'closed',
			'featured'          => false,
			'startDate'         => '2026-03-03',
			'endDate'           => '2026-03-31',
			'sessionCountLabel' => '5 live sessions',
			'totalHours'        => '7.5 hours of live instruction',
			'formatLabel'       => 'Live via Zoom',
			'cadenceLabel'      => 'Weekly - Tuesdays',
			'sessionLength'     => '90 minutes',
			'cardImage'         => '/wp-content/uploads/2025/10/Jennifer-Gonzalez-2024-Square-1024x1024-1.jpg',
			// Instructor.
			'instructor' => array(
				'slug'        => 'jennifer-gonzalez',
				'name'        => 'Jennifer Gonzalez',
				'title'       => 'National Board Certified Teacher and Founder of Cult of Pedagogy',
				'roleLine'    => 'Founder and Editor, Cult of Pedagogy',
				'headshot'    => '/wp-content/uploads/2025/10/Jennifer-Gonzalez-2024-Square-1024x1024-1.jpg',
				'bio'         => 'Jennifer Gonzalez is a National Board Certified Teacher with over 10 years of classroom experience. Most of this time was spent teaching middle school language arts, and the rest was at the college level, where she trained pre-service teachers for the classroom. In 2013, she created the website Cult of Pedagogy, where she now works full-time to help teachers of all subjects and grade levels practice and perfect the art of teaching.',
				'quote'       => '',
				'specialties' => array( 'Lesson Design', 'Instructional Strategy', 'Teacher Confidence', 'Assessment Design' ),
				'href'        => '/instructors/jennifer-gonzalez/',
				'links'       => array(),
			),
			// Pricing.
			'priceType'           => 'paid',
			'priceLabel'          => '$495/person',
			'priceAmount'         => '$495',
			'priceMeta'           => 'per person - 5 sessions',
			'registrationUrl'     => '',
			'waitlistUrl'         => '',
			'closedMessage'       => 'Registration is currently closed. Join the notification list and we will let you know when the next cohort opens.',
			'registrationFillsBy' => '',
			'invoiceNote'         => 'Need an invoice or purchase order? Contact RocketPD before registering.',
			// Schedule.
			'schedule' => array(
				array( 'session_number' => 1, 'session_title' => 'The Architecture of a Good Lesson',       'session_date' => '2026-03-03', 'session_time' => '6:30 - 8:00 PM EST', 'session_description' => 'Using sample lesson plans as a model, the opening session introduces the steps of planning an effective lesson using the principles of backward design. Covers writing clear, measurable learning objectives, choosing the right assessments, selecting learning experiences to match your objectives, and designing the lesson flow from start to finish.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 2, 'session_title' => 'Designing Assessments',                   'session_date' => '2026-03-10', 'session_time' => '6:30 - 8:00 PM EST', 'session_description' => 'Focus on designing assessments that directly measure student mastery of your objectives. Covers the purpose of diagnostic, formative, and summative assessments, specific assessment strategies, effective rubric design, and what assessment looks like in a lesson.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 3, 'session_title' => 'The Learning Experience',                 'session_date' => '2026-03-17', 'session_time' => '6:30 - 8:00 PM EST', 'session_description' => 'With assessment in place, choose learning activities that will develop the knowledge and skills students need to succeed. Covers creating an engaging opening, content delivery strategies, application strategies, and sequencing and timing.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 4, 'session_title' => 'Differentiating Instruction From Multiple Angles', 'session_date' => '2026-03-24', 'session_time' => '6:30 - 8:00 PM EST', 'session_description' => 'Build lesson plans that account for each student\'s unique blend of interests, talents, abilities, culture, and needs. Covers Universal Design, working differentiation into a lesson plan, specific differentiation strategies, diversifying materials, and how technology can help.', 'session_resource_link' => '', 'coming_soon' => false ),
				array( 'session_number' => 5, 'session_title' => 'Lesson Delivery',                         'session_date' => '2026-03-31', 'session_time' => '6:30 - 8:00 PM EST', 'session_description' => 'Explore techniques for delivering lessons to get the best results. Covers creating academic safety, managing instructional time with efficiency and flexibility, getting better participation, the importance of modeling, and mastering the use of silence.', 'session_resource_link' => '', 'coming_soon' => false ),
			),
			// Outcomes.
			'outcomes' => array(
				array( 'outcome_icon' => '', 'outcome_title' => 'A step-by-step lesson planning process',          'outcome_description' => 'Learn a replicable framework for designing high-quality lessons that can be used for the rest of your career.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'A personal toolkit of instructional strategies',  'outcome_description' => 'Build a library of specific, ready-to-implement strategies for assessment, instruction, and differentiation.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Insights on lesson delivery',                     'outcome_description' => 'Gain the finer points of lesson delivery — the small moves that can make or break a lesson.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Model lesson plans to reference',                 'outcome_description' => 'Leave with a set of model lesson plans to refer back to in future planning.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Greater instructional confidence',                'outcome_description' => 'Grow more confident in your ability to design and deliver outstanding instruction for all students.' ),
			),
			// Audience.
			'audience' => array(
				array( 'audience_label' => 'New Teachers',               'audience_description' => 'Build a strong instructional foundation from day one.' ),
				array( 'audience_label' => 'Veteran Teachers',           'audience_description' => 'Refresh and deepen your practice with a proven framework.' ),
				array( 'audience_label' => 'Instructional Coaches',      'audience_description' => 'Strengthen your ability to support teachers in lesson design.' ),
				array( 'audience_label' => 'New Hires',                  'audience_description' => 'Get up to speed quickly with practical, replicable strategies.' ),
				array( 'audience_label' => 'Building Principals',        'audience_description' => 'Understand the lesson design framework your teachers are learning.' ),
			),
			// Included items.
			'included' => array(
				array( 'included_item_icon' => 'users',     'included_item_label' => 'Live sessions with Jennifer Gonzalez' ),
				array( 'included_item_icon' => 'video',     'included_item_label' => 'Session recordings (available for 30 days)' ),
				array( 'included_item_icon' => 'community', 'included_item_label' => 'Breakout discussions with educators worldwide' ),
				array( 'included_item_icon' => 'mobile',    'included_item_label' => 'Access via the RocketPD Learning Portal' ),
				array( 'included_item_icon' => 'book',      'included_item_label' => 'Readings and lesson planning templates from Jennifer Gonzalez' ),
				array( 'included_item_icon' => 'award',     'included_item_label' => 'Certificate of Completion' ),
			),
			// Sponsor.
			'sponsor' => array( 'enabled' => false, 'name' => '', 'logo' => '', 'description' => '', 'url' => '', 'cta_label' => 'Learn More' ),
			// Team options.
			'teamOptions' => array(
				'team_eyebrow'       => 'Team & District Options',
				'team_headline'      => 'Have a team of new hires? Build a team of any size and save.',
				'team_body'          => 'RocketPD offers group discounts for schools and districts registering teams. Contact us for large group rates of 30 or more.',
				'team_ideal_for'     => 'Ideal for new teacher cohorts, instructional coaching programs, and school-wide instructional initiatives.',
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
				'guide'    => array( 'enabled' => true,  'title' => 'The Ultimate Guide to Powerful K-12 Lesson Planning & Design', 'meta' => 'Free guide', 'summary' => 'A practical introduction to the lesson design framework Jennifer Gonzalez uses to help teachers build confidence and improve student outcomes.', 'href' => '/k-12-guides/' ),
				'podcast'  => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
				'webinar'  => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
				'playbook' => array( 'enabled' => false, 'title' => '', 'meta' => '', 'summary' => '', 'href' => '' ),
			),
			// FAQs.
			'faqs' => array(
				array( 'question' => 'What is the Build Teaching Confidence cohort — and how can it help?', 'answer' => 'Created by former classroom educator and Cult of Pedagogy founder Jennifer Gonzalez, this is a five-session collaborative professional-learning experience for teachers, curriculum leaders, and instructional coaches on how to build and maintain instructional confidence through powerful lesson planning and design. Get practical strategies to help you set rigorous, achievable goals, select the best strategies to meet those goals, and get more learning out of every teachable moment.' ),
				array( 'question' => 'Why do this as part of a cohort?',                                   'answer' => 'The RocketPD cohort experience is designed to give classroom educators and school and district leaders an actionable, affordable, and convenient way to facilitate difficult but necessary strategic conversations and initiatives. Districts can register select members of their building or central-office teams for open cohorts.' ),
				array( 'question' => 'What is included in this program?',                                  'answer' => 'Delivered over five weeks, the program includes five scheduled structured learning conversations delivered virtually over Zoom, plus password-protected access to the RocketPD Learning Portal where participants can access recordings for a limited time, readings that deepen the learning from each session, and templates to support continued lesson planning.' ),
				array( 'question' => 'Who should participate?',                                            'answer' => 'This cohort is a five-session collaborative professional-learning experience for curriculum leaders, instructional coaches, and classroom teachers — both new and veteran — who want to design powerful lessons, increase teacher confidence, and maximize time and effort in the classroom.' ),
				array( 'question' => 'How will this help my team?',                                        'answer' => 'The cohort provides a unique opportunity to have candid conversations with a nationally recognized educator and best-selling author on the subject of teaching and lesson design. Unlike one-off seminars, the cohort provides a clear framework for sustained development that school leaders can use to create stronger, more supportive environments for sustainable success.' ),
				array( 'question' => 'How can I participate?',                                             'answer' => 'Join the notification list to be the first to know when this cohort opens again. Once you sign up, you will receive information about the program including payment and invoicing details and scheduled session dates and times.' ),
			),
			// Testimonials.
			'testimonials' => array(
				array( 'quote' => 'The practical scenarios and strategies for implementation that Jennifer Gonzalez shared has helped teachers and administrators in Frederick County Public Schools go beyond enthusiasm for learning to transforming instructional practices in the classroom.', 'name' => 'Eric Haines',    'role' => 'Supervisor of Innovative Learning', 'organization' => 'Frederick County Public Schools, MD', 'image' => '' ),
				array( 'quote' => 'I can\'t recommend Jennifer Gonzalez enough as a speaker and thought leader. We featured Jennifer as a speaker to our community of over 50 million teachers and the feedback was overwhelmingly positive. Every pathway she shared got an "I love this" reaction from the audience.',                    'name' => 'Ashley Williams', 'role' => 'Global Teacher Community Lead',   'organization' => 'ClassDojo', 'image' => '' ),
				array( 'quote' => 'Jennifer Gonzalez always brings her best to the table. Our objective was to refresh teachers and provide them with tools to construct classrooms that are based on sustainable practices, student-centric instruction, and a focus on well-being.',                                                        'name' => 'Kris Szajner',    'role' => 'Marketing Manager',              'organization' => 'Seesaw', 'image' => '' ),
			),
			// CTAs.
			'primaryCta'   => array( 'label' => 'Join the Notification List', 'href' => '/contact/?source=cohort-lesson-design' ),
			'secondaryCta' => array( 'label' => 'See Full Schedule', 'href' => '#cohort-schedule' ),
			'finalCta'     => array(
				'headline'       => 'Be the First to Know When This Cohort Opens',
				'body'           => 'This cohort is currently closed. Join the notification list and we will let you know when the next session is available.',
				'primaryLabel'   => 'Join the Notification List',
				'primaryHref'    => '/contact/?source=cohort-lesson-design',
				'secondaryLabel' => 'Contact Us With Questions',
				'secondaryHref'  => '/contact/?source=cohort-lesson-design',
			),
		),
	);
}
