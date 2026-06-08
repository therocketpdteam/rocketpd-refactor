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
			'enabled' => false,
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
			'enabled' => false,
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
			'registrationFillsBy' => 'Seats typically fill by July 1.',
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
			'enabled' => false,
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
				array( 'outcome_icon' => '', 'outcome_title' => 'Increase supervisors\' classroom visits',                      'outcome_description' => 'Build a sustainable cadence of frequent, short classroom visits.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Improve observation skills',                                   'outcome_description' => 'Develop a sharper eye for what matters in classroom instruction.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Focus on checks for understanding and student learning',       'outcome_description' => 'Shift the lens from teacher activity to evidence of student learning.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Fine-tune debriefs and written feedback to teachers',          'outcome_description' => 'Practice face-to-face feedback conversations that are honest, specific, and useful.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Use student surveys as a coaching tool',                       'outcome_description' => 'Introduce low-stakes student feedback as part of the supervision cycle.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Navigate difficult conversations with confidence',             'outcome_description' => 'Engage teachers in honest conversations about performance and growth.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Use rubrics for goal-setting and summative evaluations',       'outcome_description' => 'Connect observation evidence to fair, standards-aligned summative ratings.' ),
				array( 'outcome_icon' => '', 'outcome_title' => 'Manage time so the most important work gets done',             'outcome_description' => 'Build a priority system that keeps supervision at the center of the leadership role.' ),
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
				array( 'quote' => 'Kim Marshall\'s work has been a cornerstone of my leadership practices and my coaching of instructional leadership teams for many years. Kim\'s ideas help leaders outline ways to systematize feedback aligned with the standards, our school\'s instructional priorities and school cultures.', 'name' => 'Drema Brown',      'role' => 'Head of School',                 'organization' => 'Children\'s Aid and Children\'s Aid College Prep Charter School', 'image' => '' ),
				array( 'quote' => 'Kim\'s work has been exemplary in supporting the school district\'s commitment to instructional improvement. Kim\'s accessibility, ongoing encouragement, and extraordinary insight encouraged our teachers and administrative staff to embrace his frequent, unannounced mini-observation and teacher-evaluation rubric.', 'name' => 'Charles Cardillo', 'role' => 'Former Superintendent',          'organization' => 'Manhasset, New York Public Schools', 'image' => '' ),
				array( 'quote' => 'Kim transformed the way that we observe teachers and give feedback. Short, frequent, and timely visits to every classroom occur with face-to-face feedback. As a result, teachers feel that we have a fair perspective of what is happening in their classrooms and truly value our instructional eye.', 'name' => 'Amelia Gorman',    'role' => 'Former Principal',               'organization' => 'Lee Pilot School, Boston, MA', 'image' => '' ),
				array( 'quote' => 'With Kim\'s support, we have abandoned rote observations and complicated rubrics for a synthesis of technical feedback, supportive coaching and immediate strategies to improve learning. The combination of mini-observations and clear, powerful rubrics has contributed to a singular focus on improved instruction and student growth.', 'name' => 'Nicholas Tishuk',  'role' => 'Executive Director',             'organization' => 'Bedford Stuyvesant New Beginnings Charter School, Brooklyn, NY', 'image' => '' ),
				array( 'quote' => 'Kim Marshall reminds us that adults are a critical lever to maximize student success. He implores participants to leverage their focus specifically on the school leader by providing timely, specific and direct feedback, along with targeted support for teachers.', 'name' => 'Shahara Jackson',  'role' => 'Former NYC Principal, Founder',  'organization' => 'LyfPrints, Inc.', 'image' => '' ),
				array( 'quote' => 'We asked Kim to work with the staff to design units that are coherent and promote deep understanding. His work helped shape the culture of the school in how we look at curriculum, provide feedback and design lessons. We consider this work as foundational to student success.', 'name' => 'Phuong Nguyen',    'role' => 'Principal',                      'organization' => 'Civic Leadership Academy, New York City', 'image' => '' ),
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
