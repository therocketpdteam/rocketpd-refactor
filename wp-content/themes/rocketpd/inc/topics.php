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
 * Return true on the Topic Index templates or the current topic index page.
 *
 * @return bool
 */
function rocketpd_is_topics_context() {
	return is_page_template( 'page-templates/template-topics.php' )
		|| is_page_template( 'page-templates/global-topics-template.php' )
		|| is_page( 'topics' )
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
	$aliases = array(
		'book'        => 'book',
		'brain'       => 'brain',
		'bulb'        => 'lightbulb',
		'calculator'  => 'calculator',
		'calendar'    => 'calendar',
		'cap'         => 'graduation-cap',
		'chat'        => 'message-square',
		'clipboard'   => 'clipboard-check',
		'crown'       => 'crown',
		'file'        => 'file-text',
		'heart'       => 'heart',
		'megaphone'   => 'megaphone',
		'pencil'      => 'pencil',
		'pulse'       => 'heart-pulse',
		'puzzle'      => 'puzzle',
		'screen'      => 'monitor',
		'shield'      => 'shield-check',
		'spark'       => 'sparkles',
		'stethoscope' => 'stethoscope',
		'users'       => 'users',
		'webinar'     => 'monitor-play',
	);

	$global_key = isset( $aliases[ $icon ] ) ? $aliases[ $icon ] : 'sparkles';

	return rocketpd_get_icon( $global_key, 24, $class );
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
			'headshot'    => '',
			'href'        => '',
		)
	);
}

/**
 * Return topics dynamically from published topic_hub posts, with hardcoded fallback.
 *
 * @return array
 */
function rocketpd_get_topics() {
	$posts = get_posts( array(
		'post_type'      => 'topic_hub',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order title',
		'order'          => 'ASC',
	) );

	if ( empty( $posts ) ) {
		return rocketpd_get_topics_fallback();
	}

	// ACF stores wellness as 'wellness-culture'; normalize to match rocketpd_get_topic_categories().
	$category_aliases = array( 'wellness-culture' => 'wellness' );

	$has_acf = function_exists( 'get_field' );

	return array_map(
		function ( $post ) use ( $has_acf, $category_aliases ) {
			$category = $has_acf ? get_field( 'rpd_topic_detail_category', $post->ID ) : '';
			$category = isset( $category_aliases[ $category ] ) ? $category_aliases[ $category ] : ( $category ?: 'instruction' );

			$headshot = $has_acf ? (string) get_field( 'rpd_topic_detail_expert_image', $post->ID ) : '';

			return rocketpd_topic_record( array(
				'slug'        => $post->post_name,
				'title'       => $post->post_title,
				'category'    => $category,
				'description' => $post->post_excerpt
				?: ( $has_acf ? wp_trim_words( (string) get_field( 'rpd_topic_detail_subtitle', $post->ID ), 25, '…' ) : '' )
				?: wp_trim_words( wp_strip_all_tags( $post->post_content ), 25, '…' ),
				'icon'        => $has_acf ? ( get_field( 'rpd_topic_icon', $post->ID ) ?: 'spark' ) : 'spark',
				'resources'   => $has_acf ? (int) get_field( 'rpd_topic_resources', $post->ID ) : 0,
				'upcoming'    => $has_acf ? (int) get_field( 'rpd_topic_upcoming', $post->ID ) : 0,
				'featured'    => $has_acf ? (bool) get_field( 'rpd_topic_featured', $post->ID ) : false,
				'newest'      => $has_acf ? (bool) get_field( 'rpd_topic_newest', $post->ID ) : false,
				'expert'      => $has_acf ? (string) get_field( 'rpd_topic_detail_expert_name', $post->ID ) : '',
				'headshot'    => $headshot,
				'href'        => get_permalink( $post->ID ),
			) );
		},
		$posts
	);
}

/**
 * Return the 16 hardcoded Topic Index fallback cards (used when no topic_hub posts exist).
 *
 * @return array
 */
function rocketpd_get_topics_fallback() {
	$img   = get_template_directory_uri() . '/assets/images/instructors/';
	$lpimg = get_template_directory_uri() . '/assets/images/launchpad/';

	$topics = array(
		array( 'slug' => 'teacher-supervision-evaluation-coaching', 'title' => __( 'Teacher Supervision, Evaluation & Coaching', 'rocketpd' ), 'category' => 'leadership', 'description' => __( 'Replace annual reviews with sustainable mini-observations, feedback conversations, and instructional coaching systems.', 'rocketpd' ), 'icon' => 'clipboard', 'resources' => 42, 'upcoming' => 4, 'featured' => true, 'expert' => __( 'Kim Marshall', 'rocketpd' ), 'headshot' => $img . 'kim-marshall.jpg' ),
		array( 'slug' => 'ai-and-education', 'title' => __( 'AI and Education', 'rocketpd' ), 'category' => 'technology', 'description' => __( 'From responsible classroom use to school-wide policy: practical AI frameworks for K-12 educators, leaders, and instructional teams.', 'rocketpd' ), 'icon' => 'spark', 'resources' => 38, 'upcoming' => 5, 'featured' => true, 'newest' => true, 'expert' => __( 'Matt Miller', 'rocketpd' ), 'headshot' => $img . 'matt-miller.jpg' ),
		array( 'slug' => 'family-engagement', 'title' => __( 'Family Engagement', 'rocketpd' ), 'category' => 'wellness', 'description' => __( 'Build trust-centered systems for two-way communication, partnership, and shared accountability with the families your school serves.', 'rocketpd' ), 'icon' => 'heart', 'resources' => 24, 'upcoming' => 3, 'featured' => true, 'expert' => __( 'Dr. Luvelle Brown', 'rocketpd' ), 'headshot' => $img . 'dr-luvelle-brown.png' ),
		array( 'slug' => 'student-mental-health', 'title' => __( 'Student Mental Health', 'rocketpd' ), 'category' => 'student-support', 'description' => __( 'Trauma-informed, identity-affirming approaches to supporting student well-being across tier-1, tier-2, and tier-3 systems.', 'rocketpd' ), 'icon' => 'brain', 'resources' => 31, 'upcoming' => 4, 'featured' => true, 'expert' => __( 'Carla Tantillo Philibert', 'rocketpd' ), 'headshot' => $lpimg . 'inst-philibert.png' ),
		array( 'slug' => 'blended-learning-udl', 'title' => __( 'Blended Learning & UDL', 'rocketpd' ), 'category' => 'instruction', 'description' => __( 'Universal Design for Learning meets practical station-rotation, choice boards, and tech-enabled differentiation that works for every learner.', 'rocketpd' ), 'icon' => 'screen', 'resources' => 36, 'upcoming' => 6, 'expert' => __( 'Dr. Catlin Tucker', 'rocketpd' ), 'headshot' => $img . 'dr-catlin-tucker.png' ),
		array( 'slug' => 'project-based-learning', 'title' => __( 'Project-Based Learning', 'rocketpd' ), 'category' => 'instruction', 'description' => __( 'Design rigorous, authentic learning experiences that build student agency, transferable skills, and durable knowledge.', 'rocketpd' ), 'icon' => 'bulb', 'resources' => 22, 'upcoming' => 3, 'expert' => __( 'A.J. Juliani', 'rocketpd' ), 'headshot' => $img . 'aj-juliani.png' ),
		array( 'slug' => 'mathematics-instruction', 'title' => __( 'Mathematics Instruction', 'rocketpd' ), 'category' => 'instruction', 'description' => __( 'Building Thinking Classrooms, discourse-rich problem solving, and assessment practices that develop confident mathematical thinkers.', 'rocketpd' ), 'icon' => 'calculator', 'resources' => 28, 'upcoming' => 4, 'expert' => __( 'Peter Liljedahl', 'rocketpd' ), 'headshot' => $img . 'dr-peter-liljedahl.png' ),
		array( 'slug' => 'reading-instruction', 'title' => __( 'Reading Instruction', 'rocketpd' ), 'category' => 'instruction', 'description' => __( 'Science-of-reading-aligned literacy practices, structured phonics implementation, and adolescent literacy acceleration strategies.', 'rocketpd' ), 'icon' => 'book', 'resources' => 26, 'upcoming' => 3, 'expert' => __( 'Jennifer Gonzalez', 'rocketpd' ), 'headshot' => $img . 'jennifer-gonzalez.jpg' ),
		array( 'slug' => 'school-culture-inclusion', 'title' => __( 'School Culture & Inclusion', 'rocketpd' ), 'category' => 'wellness', 'description' => __( 'Belonging-first school cultures: identity-affirming practices, restorative systems, and the daily routines that build them.', 'rocketpd' ), 'icon' => 'users', 'resources' => 19, 'upcoming' => 2, 'expert' => __( 'Dr. Luvelle Brown', 'rocketpd' ), 'headshot' => $img . 'dr-luvelle-brown.png' ),
		array( 'slug' => 'school-leadership', 'title' => __( 'School Leadership', 'rocketpd' ), 'category' => 'leadership', 'description' => __( 'Principal practice, instructional leadership, distributed leadership models, and the systems that sustain school transformation.', 'rocketpd' ), 'icon' => 'crown', 'resources' => 34, 'upcoming' => 4, 'expert' => __( 'Kim Marshall', 'rocketpd' ), 'headshot' => $img . 'kim-marshall.jpg' ),
		array( 'slug' => 'school-communications', 'title' => __( 'School Communications', 'rocketpd' ), 'category' => 'leadership', 'description' => __( 'Modern parent communication, crisis messaging, internal stakeholder engagement, and the editorial cadence that builds school brand trust.', 'rocketpd' ), 'icon' => 'megaphone', 'resources' => 16, 'upcoming' => 2, 'expert' => __( 'Dr. John Spencer', 'rocketpd' ), 'headshot' => $img . 'dr-john-spencer.jpg' ),
		array( 'slug' => 'staff-retention-adult-well-being', 'title' => __( 'Staff Retention & Adult Well-Being', 'rocketpd' ), 'category' => 'wellness', 'description' => __( 'Retain great educators: workload boundaries, structured mentoring, leader-to-staff trust signals, and burnout prevention systems.', 'rocketpd' ), 'icon' => 'pulse', 'resources' => 18, 'upcoming' => 3, 'newest' => true, 'expert' => __( 'Carla Tantillo Philibert', 'rocketpd' ), 'headshot' => $lpimg . 'inst-philibert.png' ),
		array( 'slug' => 'lesson-planning-design', 'title' => __( 'Lesson Planning & Design', 'rocketpd' ), 'category' => 'instruction', 'description' => __( 'Backward-design templates, success-criteria language, and the planning routines that protect teacher time without sacrificing rigor.', 'rocketpd' ), 'icon' => 'pencil', 'resources' => 21, 'upcoming' => 2, 'expert' => __( 'Dr. Catlin Tucker', 'rocketpd' ), 'headshot' => $img . 'dr-catlin-tucker.png' ),
		array( 'slug' => 'classroom-management-discipline', 'title' => __( 'Classroom Management & Discipline', 'rocketpd' ), 'category' => 'student-support', 'description' => __( 'Collaborative Problem Solving, restorative discipline, and proactive classroom routines that replace reactive consequences.', 'rocketpd' ), 'icon' => 'shield', 'resources' => 25, 'upcoming' => 3, 'expert' => __( 'Dr. Ross Greene', 'rocketpd' ), 'headshot' => $img . 'dr-ross-greene.jpg' ),
		array( 'slug' => 'individualized-instruction-neurodiversity', 'title' => __( 'Individualized Instruction & Neurodiversity', 'rocketpd' ), 'category' => 'student-support', 'description' => __( 'Strengths-based, neurodiversity-affirming teaching: practical differentiation, MTSS implementation, and inclusive design.', 'rocketpd' ), 'icon' => 'puzzle', 'resources' => 17, 'upcoming' => 2, 'expert' => __( 'Dr. Ross Greene', 'rocketpd' ), 'headshot' => $img . 'dr-ross-greene.jpg' ),
		array( 'slug' => 'school-health', 'title' => __( 'School Health', 'rocketpd' ), 'category' => 'wellness', 'description' => __( 'From recess and nutrition to nurse-led care, school health programming connects the dots between student well-being and learning.', 'rocketpd' ), 'icon' => 'stethoscope', 'resources' => 12, 'upcoming' => 1, 'expert' => __( 'Carla Tantillo Philibert', 'rocketpd' ), 'headshot' => $lpimg . 'inst-philibert.png' ),
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
	$featured = array_values(
		array_filter(
			rocketpd_get_topics(),
			function ( $topic ) {
				return ! empty( $topic['featured'] );
			}
		)
	);

	if ( ! empty( $featured ) ) {
		return $featured;
	}

	// No live posts are marked featured yet — fall back to hardcoded set.
	return array_values(
		array_filter(
			rocketpd_get_topics_fallback(),
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
		array( 'icon' => 'book', 'title' => __( 'Curated pathways', 'rocketpd' ), 'body' => __( 'Start where you are. Each hub sequences guides, podcasts, courses, and cohorts into a clear learning path.', 'rocketpd' ) ),
		array( 'icon' => 'calendar', 'title' => __( 'Live opportunities', 'rocketpd' ), 'body' => __( "Find upcoming cohorts, webinars, and meetups filtered to the topic you're trying to grow in.", 'rocketpd' ) ),
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
		array( 'type' => __( 'Guide', 'rocketpd' ), 'tone' => 'blue', 'title' => __( 'The Mini-Observation Field Guide', 'rocketpd' ), 'description' => __( 'A practical field guide for replacing compliance observations with useful instructional feedback.', 'rocketpd' ), 'meta' => __( 'PDF · 18 pages', 'rocketpd' ), 'expert' => __( 'Kim Marshall', 'rocketpd' ), 'topic' => __( 'Teacher Evaluation', 'rocketpd' ), 'href' => home_url( '/k-12-guides/learning-meet-doing/' ) ),
		array( 'type' => __( 'Podcast', 'rocketpd' ), 'tone' => 'emerald', 'title' => __( 'AI in the K-12 Classroom (Without Losing the Plot)', 'rocketpd' ), 'description' => __( 'A grounded conversation about classroom AI routines, policy, and teacher judgment.', 'rocketpd' ), 'meta' => __( 'Episode · 42 min', 'rocketpd' ), 'expert' => __( 'Matt Miller', 'rocketpd' ), 'topic' => __( 'AI and Education', 'rocketpd' ), 'href' => home_url( '/resources/' ) ),
		array( 'type' => __( 'Webinar', 'rocketpd' ), 'tone' => 'purple', 'title' => __( 'Family Communication Systems That Actually Work', 'rocketpd' ), 'description' => __( 'Build a repeatable cadence for two-way communication and trust-centered family partnership.', 'rocketpd' ), 'meta' => __( 'Free webinar · 60 min', 'rocketpd' ), 'expert' => __( 'Dr. Luvelle Brown', 'rocketpd' ), 'topic' => __( 'Family Engagement', 'rocketpd' ), 'href' => home_url( '/launchpad/courses/' ) ),
		array( 'type' => __( 'Playbook', 'rocketpd' ), 'tone' => 'gold', 'title' => __( 'Building Thinking Classrooms - Implementation Map', 'rocketpd' ), 'description' => __( 'A school-ready sequence for launching thinking routines, discourse, and better math tasks.', 'rocketpd' ), 'meta' => __( 'Playbook · 32 pages', 'rocketpd' ), 'expert' => __( 'Peter Liljedahl', 'rocketpd' ), 'topic' => __( 'Mathematics Instruction', 'rocketpd' ), 'href' => home_url( '/resources/' ) ),
	);
}

/**
 * Return upcoming opportunities.
 *
 * @return array
 */
function rocketpd_get_topic_opportunities() {
	return array(
		array( 'format' => __( 'Live-Virtual Cohort', 'rocketpd' ), 'title' => __( 'Rethinking Teacher Supervision, Coaching & Evaluation', 'rocketpd' ), 'expert' => __( 'Kim Marshall', 'rocketpd' ), 'date' => __( 'Sep 24 – Apr 15 · 8 sessions', 'rocketpd' ), 'topic' => __( 'Teacher Evaluation', 'rocketpd' ), 'price' => __( '$795/person', 'rocketpd' ), 'tone' => 'blue', 'href' => home_url( '/cohorts/rethinking-teacher-supervision-coaching-evaluation/' ) ),
		array( 'format' => __( 'Free Webinar', 'rocketpd' ), 'title' => __( 'From Mini-Observations to Meaningful Debriefs', 'rocketpd' ), 'expert' => __( 'Kim Marshall', 'rocketpd' ), 'date' => __( 'Date TBD', 'rocketpd' ), 'topic' => __( 'Teacher Evaluation', 'rocketpd' ), 'price' => __( 'Free', 'rocketpd' ), 'tone' => 'emerald', 'href' => home_url( '/webinars/from-mini-observations-to-meaningful-debriefs-rethinking-teacher-evaluation-conversations-with-kim-marshall/' ) ),
		array( 'format' => __( 'Self-Paced Course', 'rocketpd' ), 'title' => __( 'Fine-Tune Your Lessons with the Fundamentals', 'rocketpd' ), 'expert' => __( 'Jennifer Gonzalez', 'rocketpd' ), 'date' => __( 'Open enrollment', 'rocketpd' ), 'topic' => __( 'Teaching Efficacy', 'rocketpd' ), 'price' => __( '$49', 'rocketpd' ), 'tone' => 'gold', 'href' => home_url( '/launchpad/courses/fine-tune-your-lessons-with-the-fundamentals-with-jennifer-gonzalez/' ) ),
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
		array( 'question' => __( 'Are RocketPD resources free?', 'rocketpd' ), 'answer' => __( 'Most topic-hub resources - guides, podcasts, blog posts, webinars, and core community access - are free for community members. Self-paced courses and live-virtual cohorts are paid, with district team pricing available.', 'rocketpd' ) ),
		array( 'question' => __( 'How do topic hubs work?', 'rocketpd' ), 'answer' => __( "Each topic hub is curated by RocketPD's editorial team and trusted community instructors. Hubs sequence learning across guides, podcasts, webinars, courses, and cohorts so educators have a clear path from quick read to deep implementation.", 'rocketpd' ) ),
		array( 'question' => __( 'Can districts use RocketPD for team learning?', 'rocketpd' ), 'answer' => __( 'Yes. Districts use RocketPD for leadership team development, PLC support, onboarding programs, and strategic initiatives through community seats, cohorts, self-paced learning, and aligned support.', 'rocketpd' ) ),
		array( 'question' => __( 'Are cohorts live or self-paced?', 'rocketpd' ), 'answer' => __( 'RocketPD cohorts are live by design: community learning experiences with expert facilitation. Self-paced learning is offered separately through RocketPD LaunchPad.', 'rocketpd' ) ),
		array( 'question' => __( 'How do I find resources for my school initiative?', 'rocketpd' ), 'answer' => __( "Start with the topic hub closest to your initiative, then use search and filters to narrow by topic, instructor, or audience. If you cannot find what you need, ask the community for topic-specific resource curation.", 'rocketpd' ) ),
	);
}

/**
 * Return Community CTA perk tiles.
 *
 * @return array
 */
function rocketpd_get_topic_community_perks() {
	return array(
		array( 'icon' => 'file', 'label' => __( '400+ free resources', 'rocketpd' ) ),
		array( 'icon' => 'calendar', 'label' => __( 'Weekly community events', 'rocketpd' ) ),
		array( 'icon' => 'chat', 'label' => __( 'Educator conversations', 'rocketpd' ) ),
		array( 'icon' => 'cap', 'label' => __( 'Direct expert access', 'rocketpd' ) ),
	);
}

/**
 * Print Topic Index structured data.
 */
function rocketpd_print_topics_schema() {
	$topics = rocketpd_get_topics();
	$faqs   = rocketpd_get_topic_faqs();
	$items  = array();

	foreach ( $topics as $index => $topic ) {
		$items[] = array(
			'@type'    => 'ListItem',
			'position' => $index + 1,
			'url'      => $topic['href'],
			'name'     => $topic['title'],
		);
	}

	$faq_entities = array();

	foreach ( $faqs as $faq ) {
		$faq_entities[] = array(
			'@type'          => 'Question',
			'name'           => $faq['question'],
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => $faq['answer'],
			),
		);
	}

	$schema = array(
		'@context' => 'https://schema.org',
		'@graph'   => array(
			array(
				'@type'           => 'BreadcrumbList',
				'itemListElement' => array(
					array(
						'@type'    => 'ListItem',
						'position' => 1,
						'name'     => __( 'Home', 'rocketpd' ),
						'item'     => home_url( '/' ),
					),
					array(
						'@type'    => 'ListItem',
						'position' => 2,
						'name'     => __( 'Topics', 'rocketpd' ),
						'item'     => home_url( '/topic/' ),
					),
				),
			),
			array(
				'@type'           => 'ItemList',
				'name'            => __( 'RocketPD Topic Hubs', 'rocketpd' ),
				'itemListElement' => $items,
			),
			array(
				'@type'      => 'FAQPage',
				'mainEntity' => $faq_entities,
			),
		),
	);

	printf(
		'<script type="application/ld+json">%s</script>',
		wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
	);
}
