<?php
/**
 * Topic Index fallback data and helpers.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return true on the Topic Index templates or the current /topic/ page.
 *
 * @return bool
 */
function rocketpd_is_topics_context() {
	return is_page_template( 'page-templates/template-topics.php' )
		|| is_page_template( 'page-templates/global-topics-template.php' )
		|| is_page( 'topic' );
}

/**
 * Return category metadata used by the Topic Index.
 *
 * @return array
 */
function rocketpd_get_topic_categories() {
	return array(
		'leadership'      => array(
			'label' => __( 'Leadership', 'rocketpd' ),
			'tone'  => 'navy',
		),
		'instruction'     => array(
			'label' => __( 'Instruction', 'rocketpd' ),
			'tone'  => 'blue',
		),
		'student-support' => array(
			'label' => __( 'Student Support', 'rocketpd' ),
			'tone'  => 'magenta',
		),
		'technology'      => array(
			'label' => __( 'Technology', 'rocketpd' ),
			'tone'  => 'gold',
		),
		'wellness'        => array(
			'label' => __( 'Wellness & Culture', 'rocketpd' ),
			'tone'  => 'emerald',
		),
	);
}

/**
 * Return one category record.
 *
 * @param string $key Category key.
 * @return array
 */
function rocketpd_get_topic_category( $key ) {
	$categories = rocketpd_get_topic_categories();

	return isset( $categories[ $key ] ) ? $categories[ $key ] : $categories['leadership'];
}

/**
 * Return a decorative inline SVG icon for Topic Index cards.
 *
 * @param string $icon Icon key.
 * @param string $class Optional class name.
 * @return string
 */
function rocketpd_topic_icon_svg( $icon, $class = 'rpd-topics-icon' ) {
	$icons = array(
		'book'        => '<path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21.5V5.5Z"/><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3"/><path d="M8 7h8"/><path d="M8 11h6"/>',
		'brain'       => '<path d="M9 4a3 3 0 0 0-3 3v1a3 3 0 0 0 0 6v1a4 4 0 0 0 7 2.65"/><path d="M15 4a3 3 0 0 1 3 3v1a3 3 0 0 1 0 6v1a4 4 0 0 1-7 2.65"/><path d="M12 5v14"/><path d="M8 9h2"/><path d="M14 9h2"/><path d="M8 14h2"/><path d="M14 14h2"/>',
		'bulb'        => '<path d="M9 18h6"/><path d="M10 22h4"/><path d="M8 14a6 6 0 1 1 8 0c-.9.7-1.5 1.7-1.7 2.8H9.7A5.2 5.2 0 0 0 8 14Z"/><path d="M12 2v2"/><path d="m4.9 4.9 1.4 1.4"/><path d="m19.1 4.9-1.4 1.4"/>',
		'calculator'  => '<rect x="5" y="3" width="14" height="18" rx="2"/><path d="M8 7h8"/><path d="M8 11h.01"/><path d="M12 11h.01"/><path d="M16 11h.01"/><path d="M8 15h.01"/><path d="M12 15h.01"/><path d="M16 15h.01"/>',
		'calendar'    => '<rect x="4" y="5" width="16" height="15" rx="2"/><path d="M16 3v4"/><path d="M8 3v4"/><path d="M4 10h16"/><path d="M8 14h3"/><path d="M13 14h3"/>',
		'cap'         => '<path d="m3 8 9-4 9 4-9 4-9-4Z"/><path d="M7 10.5V15c0 1.7 2.2 3 5 3s5-1.3 5-3v-4.5"/><path d="M21 8v6"/>',
		'chat'        => '<path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4v8Z"/><path d="M8 9h8"/><path d="M8 13h5"/>',
		'clipboard'   => '<rect x="5" y="4" width="14" height="17" rx="2"/><path d="M9 4a3 3 0 0 1 6 0"/><path d="M9 9h6"/><path d="m9 14 2 2 4-5"/>',
		'crown'       => '<path d="m3 7 5 5 4-8 4 8 5-5-2 11H5L3 7Z"/><path d="M5 21h14"/>',
		'file'        => '<path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8l-5-5Z"/><path d="M14 3v5h5"/><path d="M9 13h6"/><path d="M9 17h4"/>',
		'heart'       => '<path d="M20.8 8.6a5.5 5.5 0 0 0-9-3.9l-.8.8-.8-.8a5.5 5.5 0 0 0-7.8 7.8L12 22l9.6-9.5a5.5 5.5 0 0 0-.8-3.9Z"/>',
		'megaphone'   => '<path d="m3 11 18-5v12L3 13v-2Z"/><path d="M7 14v5a2 2 0 0 0 2 2h1"/><path d="M21 10h2"/><path d="M21 14h2"/>',
		'pencil'      => '<path d="m18 2 4 4L8 20l-5 1 1-5L18 2Z"/><path d="m14 6 4 4"/>',
		'pulse'       => '<path d="M3 12h4l2-6 4 12 2-6h6"/><path d="M20.8 8.6a5.5 5.5 0 0 0-8.8-3.9 5.5 5.5 0 0 0-8.8 3.9"/>',
		'puzzle'      => '<path d="M8 3h5v4a2 2 0 1 0 4 0h4v5h-4a2 2 0 1 0 0 4h4v5h-6a2 2 0 1 1-4 0H6v-6a2 2 0 1 0 0-4V6h2V3Z"/>',
		'screen'      => '<rect x="3" y="4" width="18" height="13" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/>',
		'shield'      => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/><path d="m9 12 2 2 4-5"/>',
		'spark'       => '<path d="m12 2 2.2 6.2L20 10l-5.8 1.8L12 18l-2.2-6.2L4 10l5.8-1.8L12 2Z"/><path d="m19 17 .8 2.2L22 20l-2.2.8L19 23l-.8-2.2L16 20l2.2-.8L19 17Z"/>',
		'stethoscope' => '<path d="M6 3v5a4 4 0 0 0 8 0V3"/><path d="M10 12v3a4 4 0 0 0 8 0v-1"/><circle cx="19" cy="11" r="2"/><path d="M4 3h4"/><path d="M12 3h4"/>',
		'users'       => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
		'webinar'     => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m10 9 5 3-5 3V9Z"/><path d="M7 21h10"/>',
	);

	$key  = isset( $icons[ $icon ] ) ? $icon : 'spark';
	$path = $icons[ $key ];

	return sprintf(
		'<svg class="%1$s" aria-hidden="true" focusable="false" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">%2$s</svg>',
		esc_attr( $class ),
		$path
	);
}

/**
 * Build a topic record.
 *
 * @param array $topic Topic data.
 * @return array
 */
function rocketpd_topic_record( $topic ) {
	return wp_parse_args(
		$topic,
		array(
			'slug'        => '',
			'title'       => '',
			'category'    => 'leadership',
			'description' => '',
			'icon'        => 'spark',
			'resources'   => 0,
			'upcoming'    => 0,
			'featured'    => false,
			'newest'      => false,
			'expert'      => '',
			'href'        => '',
		)
	);
}

/**
 * Return the 16 Topic Index fallback cards.
 *
 * @return array
 */
function rocketpd_get_topics() {
	$topics = array(
		array( 'slug' => 'teacher-supervision-evaluation-coaching', 'title' => __( 'Teacher Supervision, Evaluation & Coaching', 'rocketpd' ), 'category' => 'leadership', 'description' => __( 'Replace annual reviews with sustainable mini-observations, feedback conversations, and instructional coaching systems.', 'rocketpd' ), 'icon' => 'clipboard', 'resources' => 42, 'upcoming' => 4, 'featured' => true, 'expert' => __( 'Kim Marshall', 'rocketpd' ) ),
		array( 'slug' => 'ai-and-education', 'title' => __( 'AI and Education', 'rocketpd' ), 'category' => 'technology', 'description' => __( 'From responsible classroom use to school-wide policy: practical AI frameworks for K-12 educators, leaders, and instructional teams.', 'rocketpd' ), 'icon' => 'spark', 'resources' => 38, 'upcoming' => 5, 'featured' => true, 'newest' => true, 'expert' => __( 'Matt Miller', 'rocketpd' ) ),
		array( 'slug' => 'family-engagement', 'title' => __( 'Family Engagement', 'rocketpd' ), 'category' => 'wellness', 'description' => __( 'Build trust-centered systems for two-way communication, partnership, and shared accountability with the families your school serves.', 'rocketpd' ), 'icon' => 'heart', 'resources' => 24, 'upcoming' => 3, 'featured' => true, 'expert' => __( 'Dr. Luvelle Brown', 'rocketpd' ) ),
		array( 'slug' => 'student-mental-health', 'title' => __( 'Student Mental Health', 'rocketpd' ), 'category' => 'student-support', 'description' => __( 'Trauma-informed, identity-affirming approaches to supporting student well-being across tier-1, tier-2, and tier-3 systems.', 'rocketpd' ), 'icon' => 'brain', 'resources' => 31, 'upcoming' => 4, 'featured' => true, 'expert' => __( 'Carla Tantillo Philibert', 'rocketpd' ) ),
		array( 'slug' => 'blended-learning-udl', 'title' => __( 'Blended Learning & UDL', 'rocketpd' ), 'category' => 'instruction', 'description' => __( 'Universal Design for Learning meets practical station-rotation, choice boards, and tech-enabled differentiation that works for every learner.', 'rocketpd' ), 'icon' => 'screen', 'resources' => 36, 'upcoming' => 6, 'expert' => __( 'Dr. Catlin Tucker', 'rocketpd' ) ),
		array( 'slug' => 'project-based-learning', 'title' => __( 'Project-Based Learning', 'rocketpd' ), 'category' => 'instruction', 'description' => __( 'Design rigorous, authentic learning experiences that build student agency, transferable skills, and durable knowledge.', 'rocketpd' ), 'icon' => 'bulb', 'resources' => 22, 'upcoming' => 3, 'expert' => __( 'A.J. Juliani', 'rocketpd' ) ),
		array( 'slug' => 'mathematics-instruction', 'title' => __( 'Mathematics Instruction', 'rocketpd' ), 'category' => 'instruction', 'description' => __( 'Building Thinking Classrooms, discourse-rich problem solving, and assessment practices that develop confident mathematical thinkers.', 'rocketpd' ), 'icon' => 'calculator', 'resources' => 28, 'upcoming' => 4, 'expert' => __( 'Peter Liljedahl', 'rocketpd' ) ),
		array( 'slug' => 'reading-instruction', 'title' => __( 'Reading Instruction', 'rocketpd' ), 'category' => 'instruction', 'description' => __( 'Science-of-reading-aligned literacy practices, structured phonics implementation, and adolescent literacy acceleration strategies.', 'rocketpd' ), 'icon' => 'book', 'resources' => 26, 'upcoming' => 3, 'expert' => __( 'Jennifer Gonzalez', 'rocketpd' ) ),
		array( 'slug' => 'school-culture-inclusion', 'title' => __( 'School Culture & Inclusion', 'rocketpd' ), 'category' => 'wellness', 'description' => __( 'Belonging-first school cultures; identity-affirming practices, restorative systems, and the daily routines that build them.', 'rocketpd' ), 'icon' => 'users', 'resources' => 19, 'upcoming' => 2, 'expert' => __( 'Dr. Luvelle Brown', 'rocketpd' ) ),
		array( 'slug' => 'school-leadership', 'title' => __( 'School Leadership', 'rocketpd' ), 'category' => 'leadership', 'description' => __( 'Principal practice, instructional leadership, distributed leadership models, and the systems that sustain school transformation.', 'rocketpd' ), 'icon' => 'crown', 'resources' => 34, 'upcoming' => 4, 'expert' => __( 'Kim Marshall', 'rocketpd' ) ),
		array( 'slug' => 'school-communications', 'title' => __( 'School Communications', 'rocketpd' ), 'category' => 'leadership', 'description' => __( 'Modern parent communication, crisis messaging, internal stakeholder engagement, and the editorial cadence that builds school brand trust.', 'rocketpd' ), 'icon' => 'megaphone', 'resources' => 18, 'upcoming' => 2, 'expert' => __( 'Dr. John Spencer', 'rocketpd' ) ),
		array( 'slug' => 'staff-retention-adult-well-being', 'title' => __( 'Staff Retention & Adult Well-Being', 'rocketpd' ), 'category' => 'wellness', 'description' => __( 'Retain great educators: workload boundaries, structured mentoring, leader-to-staff trust signals, and burnout prevention systems.', 'rocketpd' ), 'icon' => 'pulse', 'resources' => 18, 'upcoming' => 3, 'newest' => true, 'expert' => __( 'Carla Tantillo Philibert', 'rocketpd' ) ),
		array( 'slug' => 'lesson-planning-design', 'title' => __( 'Lesson Planning & Design', 'rocketpd' ), 'category' => 'instruction', 'description' => __( 'Backward-design templates, success-criteria language, and the planning routines that protect teacher time without sacrificing rigor.', 'rocketpd' ), 'icon' => 'pencil', 'resources' => 21, 'upcoming' => 2, 'expert' => __( 'Dr. Catlin Tucker', 'rocketpd' ) ),
		array( 'slug' => 'classroom-management-discipline', 'title' => __( 'Classroom Management & Discipline', 'rocketpd' ), 'category' => 'student-support', 'description' => __( 'Collaborative Problem Solving, restorative discipline, and proactive classroom routines that replace reactive consequences.', 'rocketpd' ), 'icon' => 'shield', 'resources' => 25, 'upcoming' => 3, 'expert' => __( 'Dr. Ross Greene', 'rocketpd' ) ),
		array( 'slug' => 'individualized-instruction-neurodiversity', 'title' => __( 'Individualized Instruction & Neurodiversity', 'rocketpd' ), 'category' => 'student-support', 'description' => __( 'Strengths-based, neurodiversity-affirming teaching: practical differentiation, MTSS implementation, and inclusive design.', 'rocketpd' ), 'icon' => 'puzzle', 'resources' => 17, 'upcoming' => 2, 'expert' => __( 'Dr. Ross Greene', 'rocketpd' ) ),
		array( 'slug' => 'school-health', 'title' => __( 'School Health', 'rocketpd' ), 'category' => 'wellness', 'description' => __( 'From recess and nutrition to nurse-led care, school health programming connects the dots between student well-being and learning.', 'rocketpd' ), 'icon' => 'stethoscope', 'resources' => 12, 'upcoming' => 1, 'expert' => __( 'Carla Tantillo Philibert', 'rocketpd' ) ),
	);

	return array_map(
		function ( $topic ) {
			$topic         = rocketpd_topic_record( $topic );
			$topic['href'] = home_url( '/topic/' . $topic['slug'] . '/' );

			return $topic;
		},
		$topics
	);
}

/**
 * Return featured topic cards.
 *
 * @return array
 */
function rocketpd_get_featured_topics() {
	return array_values(
		array_filter(
			rocketpd_get_topics(),
			function ( $topic ) {
				return ! empty( $topic['featured'] );
			}
		)
	);
}

/**
 * Return Topic Index benefits.
 *
 * @return array
 */
function rocketpd_get_topic_benefits() {
	return array(
		array( 'icon' => 'cap', 'title' => __( 'Expert voices', 'rocketpd' ), 'body' => __( 'Every topic is led by nationally recognized K-12 authors, researchers, and practitioners - not anonymous content writers.', 'rocketpd' ) ),
		array( 'icon' => 'bulb', 'title' => __( 'Practical frameworks', 'rocketpd' ), 'body' => __( 'Implementation tools, classroom-ready strategies, and decision frameworks you can use Monday morning.', 'rocketpd' ) ),
		array( 'icon' => 'chat', 'title' => __( 'Community conversations', 'rocketpd' ), 'body' => __( 'Connect with educators tackling the same challenges through live community discussions and async threads.', 'rocketpd' ) ),
		array( 'icon' => 'book', 'title' => __( 'Curated learning pathways', 'rocketpd' ), 'body' => __( 'Start where you are. Each hub sequences guides, podcasts, courses, and cohorts into a clear learning path.', 'rocketpd' ) ),
		array( 'icon' => 'calendar', 'title' => __( 'Live learning opportunities', 'rocketpd' ), 'body' => __( "Find upcoming cohorts, webinars, and meetups filtered to the topic you're trying to grow in.", 'rocketpd' ) ),
		array( 'icon' => 'file', 'title' => __( 'Downloadable resources', 'rocketpd' ), 'body' => __( 'Practical PDFs, planning templates, observation tools, and rubrics you can take into your school or district.', 'rocketpd' ) ),
	);
}

/**
 * Return featured resources.
 *
 * @return array
 */
function rocketpd_get_topic_resources() {
	return array(
		array( 'type' => __( 'Guide', 'rocketpd' ), 'title' => __( 'The Mini-Observation Field Guide', 'rocketpd' ), 'meta' => __( 'PDF · 18 pages', 'rocketpd' ), 'expert' => __( 'Kim Marshall', 'rocketpd' ), 'topic' => __( 'Teacher Evaluation', 'rocketpd' ), 'href' => home_url( '/k-12-guides/learning-meet-doing/' ) ),
		array( 'type' => __( 'Podcast', 'rocketpd' ), 'title' => __( 'AI in the K-12 Classroom (Without Losing the Plot)', 'rocketpd' ), 'meta' => __( 'Episode · 42 min', 'rocketpd' ), 'expert' => __( 'Matt Miller', 'rocketpd' ), 'topic' => __( 'AI and Education', 'rocketpd' ), 'href' => home_url( '/resources/' ) ),
		array( 'type' => __( 'Webinar', 'rocketpd' ), 'title' => __( 'Family Communication Systems That Actually Work', 'rocketpd' ), 'meta' => __( 'Free webinar · 60 min', 'rocketpd' ), 'expert' => __( 'Dr. Luvelle Brown', 'rocketpd' ), 'topic' => __( 'Family Engagement', 'rocketpd' ), 'href' => home_url( '/launchpad/courses/' ) ),
		array( 'type' => __( 'Playbook', 'rocketpd' ), 'title' => __( 'Building Thinking Classrooms - Implementation Map', 'rocketpd' ), 'meta' => __( 'Playbook · 32 pages', 'rocketpd' ), 'expert' => __( 'Peter Liljedahl', 'rocketpd' ), 'topic' => __( 'Mathematics Instruction', 'rocketpd' ), 'href' => home_url( '/resources/' ) ),
	);
}

/**
 * Return upcoming opportunities.
 *
 * @return array
 */
function rocketpd_get_topic_opportunities() {
	return array(
		array( 'format' => __( 'Live-Virtual Cohort', 'rocketpd' ), 'title' => __( 'Rethinking Teacher Supervision, Coaching & Evaluation', 'rocketpd' ), 'meta' => __( 'Kim Marshall · Sept 15 - Nov 3 · 8 sessions', 'rocketpd' ), 'topic' => __( 'Teacher Evaluation', 'rocketpd' ), 'price' => __( '$795/person', 'rocketpd' ), 'tone' => 'blue', 'href' => home_url( '/launchpad/courses/mini-observations-mastery-live-cohort/' ) ),
		array( 'format' => __( 'Free Webinar', 'rocketpd' ), 'title' => __( 'Practical AI Routines for Middle & High School Teachers', 'rocketpd' ), 'meta' => __( 'Matt Miller · Oct 9 · 4:00 PM ET', 'rocketpd' ), 'topic' => __( 'AI and Education', 'rocketpd' ), 'price' => __( 'Free', 'rocketpd' ), 'tone' => 'emerald', 'href' => home_url( '/launchpad/courses/building-your-districts-ai-strategy/' ) ),
		array( 'format' => __( 'Self-Paced', 'rocketpd' ), 'title' => __( 'Engaging Every Learner - On-Demand', 'rocketpd' ), 'meta' => __( 'Jennifer Gonzalez · Open enrollment', 'rocketpd' ), 'topic' => __( 'Reading Instruction', 'rocketpd' ), 'price' => __( '$49', 'rocketpd' ), 'tone' => 'gold', 'href' => home_url( '/launchpad/courses/' ) ),
	);
}

/**
 * Return FAQ entries.
 *
 * @return array
 */
function rocketpd_get_topic_faqs() {
	return array(
		array( 'question' => __( 'What is RocketPD?', 'rocketpd' ), 'answer' => __( 'RocketPD is a K-12 educator community built around expert-led learning, practical resources, and shared implementation. Educators learn together through self-paced courses, live-virtual cohorts, free webinars, and active community conversations across 16+ topic hubs.', 'rocketpd' ) ),
		array( 'question' => __( 'Are RocketPD resources free?', 'rocketpd' ), 'answer' => __( 'Many guides, webinars, podcast episodes, and community conversations are free. Paid courses and cohorts provide deeper implementation support and certificates.', 'rocketpd' ) ),
		array( 'question' => __( 'How do topic hubs work?', 'rocketpd' ), 'answer' => __( 'Each topic hub gathers resources, expert voices, courses, and live opportunities around one K-12 challenge so educators can move from discovery to implementation.', 'rocketpd' ) ),
		array( 'question' => __( 'Can districts use RocketPD for team learning?', 'rocketpd' ), 'answer' => __( 'Yes. Districts can use RocketPD for team-based learning, self-paced course libraries, live cohorts, and custom support aligned to strategic priorities.', 'rocketpd' ) ),
		array( 'question' => __( 'Are cohorts live or self-paced?', 'rocketpd' ), 'answer' => __( 'Cohorts are live-virtual, multi-session experiences. RocketPD also offers self-paced courses and free on-demand webinars.', 'rocketpd' ) ),
		array( 'question' => __( 'How do I find resources for my school initiative?', 'rocketpd' ), 'answer' => __( 'Search or filter the Topic Gallery, then open the hub that best matches your initiative. Each hub connects related guides, courses, webinars, and upcoming learning opportunities.', 'rocketpd' ) ),
	);
}
