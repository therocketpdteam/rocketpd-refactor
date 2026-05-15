<?php
/**
 * Topic detail fallback data and helpers.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return true on the current page-route-safe Topic Detail template.
 *
 * @return bool
 */
function rocketpd_is_topic_detail_context() {
	return is_page_template( 'page-templates/template-topic-detail.php' )
		|| is_page_template( 'page-templates/topics-template.php' )
		|| is_page( 'teacher-supervision-evaluation-coaching' );
}

/**
 * Merge non-empty override values into a fallback contract.
 *
 * @param array $fallback Fallback data.
 * @param array $override Override data.
 * @return array
 */
function rocketpd_topic_detail_merge( $fallback, $override ) {
	foreach ( $override as $key => $value ) {
		if ( is_array( $value ) ) {
			if ( empty( $value ) ) {
				continue;
			}

			$fallback[ $key ] = isset( $fallback[ $key ] ) && is_array( $fallback[ $key ] )
				? rocketpd_topic_detail_merge( $fallback[ $key ], $value )
				: $value;
			continue;
		}

		if ( null !== $value && '' !== trim( (string) $value ) ) {
			$fallback[ $key ] = $value;
		}
	}

	return $fallback;
}

/**
 * Return the worked example Topic Detail fallback contract.
 *
 * @param string $slug Topic slug.
 * @return array
 */
function rocketpd_get_topic_detail_fallback( $slug = 'teacher-supervision-evaluation-coaching' ) {
	$kim = function_exists( 'rocketpd_get_instructor_by_slug' ) ? rocketpd_get_instructor_by_slug( 'kim-marshall' ) : array();

	return array(
		'slug'            => $slug,
		'title'           => __( 'Teacher Supervision, Evaluation & Coaching', 'rocketpd' ),
		'category'        => 'leadership',
		'categoryLabel'   => __( 'Leadership', 'rocketpd' ),
		'badge'           => __( 'Topic Hub', 'rocketpd' ),
		'subtitle'        => __( 'Explore practical strategies, expert guidance, professional learning opportunities, and implementation resources designed to help school leaders strengthen teacher growth and instructional leadership.', 'rocketpd' ),
		'primaryCta'      => array(
			'label' => __( 'Join the Community', 'rocketpd' ),
			'href'  => home_url( '/community/' ),
		),
		'secondaryCta'    => array(
			'label' => __( 'Explore Resources', 'rocketpd' ),
			'href'  => '#related-resources',
		),
		'stats'           => array(
			array( 'value' => __( '42', 'rocketpd' ), 'label' => __( 'Resources', 'rocketpd' ) ),
			array( 'value' => __( '4', 'rocketpd' ), 'label' => __( 'Upcoming Events', 'rocketpd' ) ),
		),
		'toc'             => array(
			array( 'number' => '01', 'label' => __( 'Topic Overview', 'rocketpd' ), 'href' => '#topic-overview' ),
			array( 'number' => '02', 'label' => __( 'Why This Topic Matters', 'rocketpd' ), 'href' => '#why-this-matters' ),
			array( 'number' => '03', 'label' => __( 'Featured Expert', 'rocketpd' ), 'href' => '#featured-expert' ),
			array( 'number' => '04', 'label' => __( 'Related Resources', 'rocketpd' ), 'href' => '#related-resources' ),
			array( 'number' => '05', 'label' => __( 'Upcoming Learning', 'rocketpd' ), 'href' => '#upcoming-learning' ),
			array( 'number' => '06', 'label' => __( 'Practical Strategies', 'rocketpd' ), 'href' => '#practical-strategies' ),
			array( 'number' => '07', 'label' => __( 'FAQ', 'rocketpd' ), 'href' => '#topic-faq' ),
		),
		'featuredExpert'  => array(
			'name'        => __( 'Kim Marshall', 'rocketpd' ),
			'title'       => __( 'Founder - The Marshall Memo', 'rocketpd' ),
			'image'       => $kim['headshot'] ?? '/wp-content/uploads/2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg',
			'quote'       => __( 'Annual evaluations were designed for a different era. What teachers - and students - need now is a leader who shows up frequently, listens carefully, and feeds back honestly.', 'rocketpd' ),
			'bio'         => __( 'Kim Marshall is a former teacher, principal, and central-office leader, and the founder of The Marshall Memo. He pioneered the mini-observation approach to teacher supervision and has trained thousands of K-12 school leaders on practical, growth-focused evaluation systems.', 'rocketpd' ),
			'linkedin'    => 'https://www.linkedin.com/in/kim-marshall-1a720b10/',
			'website'     => 'https://www.marshallmemo.com/',
			'profileHref' => home_url( '/instructors/kim-marshall/' ),
			'cohortHref'  => home_url( '/launchpad/courses/mini-observations-mastery-live-cohort/' ),
		),
		'overview'        => array(
			'headline'      => __( 'A practical guide to modern teacher supervision, evaluation, and coaching.', 'rocketpd' ),
			'intro'         => array(
				__( 'Teacher supervision, evaluation, and coaching are three of the most consequential leadership practices in a school - and three of the most poorly designed. In many districts, the system still revolves around one or two long, scripted formal observations per year, an end-of-year rubric score, and very little day-to-day feedback in between. That model was designed for a different era of teaching, a different research base, and a very different theory of how adults learn.', 'rocketpd' ),
				__( 'Today, effective school leaders treat supervision as a year-round growth system rather than a compliance ritual. They lean on frequent, low-stakes mini-observations, honest face-to-face conversations, and instructional coaching that connects what leaders see in classrooms to what teachers experience as supportive, trustworthy feedback.', 'rocketpd' ),
			),
			'sections'      => array(
				array(
					'heading' => __( 'Why this work matters now', 'rocketpd' ),
					'body'    => array(
						__( 'Three forces are converging to make this work more urgent than at any point in the last decade. First, post-pandemic instructional gaps mean leaders can no longer rely on a year-end summary to course-correct teaching practice - the cost is too high. Second, teacher retention pressures have made how it feels to be supervised a retention lever. Teachers leave principals more often than they leave schools. Third, federal and state evaluation mandates have stabilized enough that schools can finally stop chasing compliance and start designing systems that actually grow people.', 'rocketpd' ),
					),
					'callout' => array(
						'title' => __( 'The shift in one sentence', 'rocketpd' ),
						'body'  => __( 'From a once-a-year, rubric-driven evaluation event to a continuous, conversation-driven supervision system that includes frequent classroom visits, written and verbal feedback, and instructional coaching designed for the way adults actually change practice.', 'rocketpd' ),
						'icon'  => 'spark',
					),
				),
				array(
					'heading' => __( 'Mini-observations: the operating system', 'rocketpd' ),
					'body'    => array(
						__( 'The foundation of a modern supervision system is the mini-observation - short, frequent, unannounced classroom visits followed by a real conversation. Kim Marshall recommends a cadence of 10 mini-observations per teacher per year, each lasting 10-15 minutes and followed by same-day or next-day feedback conversation. That is roughly one visit per classroom every 18 instructional days - a frequency that makes leadership feel present without making teachers feel surveilled.', 'rocketpd' ),
						__( 'Done well, mini-observations replace the artificial showcase lesson of the traditional formal observation with a real-time sample of instruction the leader actually sees. They surface patterns over time - strengths, growth edges, school-wide professional learning needs - that a single scripted observation can never reveal.', 'rocketpd' ),
					),
				),
				array(
					'heading' => __( 'Feedback conversations that change practice', 'rocketpd' ),
					'body'    => array(
						__( 'Most observation feedback fails not because the observer was wrong, but because the conversation was structured for compliance rather than growth. Effective feedback is timely, specific, two-way, and forward-looking. It treats the teacher as the protagonist of the conversation - not the recipient of a score. The most useful protocols ask three questions: What did you notice? What did I notice? What is our next step?', 'rocketpd' ),
					),
					'quote'   => array(
						'text'        => __( "The mini-observation isn't the point. The conversation it makes possible is the point.", 'rocketpd' ),
						'attribution' => __( 'Kim Marshall, Marshall Memo', 'rocketpd' ),
					),
				),
				array(
					'heading' => __( 'Coaching is the missing third leg', 'rocketpd' ),
					'body'    => array(
						__( 'Supervision and evaluation only become a growth system when coaching is layered on top. Coaching is the work between the visits - modeling, planning partnerships, video review, lab classrooms, and reflective routines that help teachers internalize new practice. Most schools under-invest here. Districts that get this right pair instructional coaches with leaders so they share a common observation language, common look-fors, and common feedback routines so that coaches and supervisors do not pull teachers in different directions.', 'rocketpd' ),
					),
				),
				array(
					'heading' => __( 'Common pitfalls (and how to avoid them)', 'rocketpd' ),
					'body'    => array(
						__( 'Starting with a rubric instead of a vision, confusing frequency with rigor, letting evaluation contaminate coaching, skipping calibration work, and treating this as a principal-only initiative are the most common failure modes. Strong systems start with a vision of teaching, choose the rubric that matches it, and then build routines that make learning visible without creating a culture of surveillance.', 'rocketpd' ),
					),
				),
				array(
					'heading' => __( 'District considerations', 'rocketpd' ),
					'body'    => array(
						__( 'At the district level, three design decisions matter most: keep the rubric tight, observable, and shorter than your current one; build a cadence that makes frequent visits possible, which usually means cutting at least one district-level demand; and create a data system that makes documentation a 60-second task, not a 30-minute one. Districts that modernize all three tend to see retention gains within 18 months and instructional gains within 24-36.', 'rocketpd' ),
					),
				),
				array(
					'heading' => __( 'Where to start', 'rocketpd' ),
					'body'    => array(
						__( 'If you are new to this work, start small. Pilot a mini-observation cadence with one grade level or department for a single semester, calibrate weekly as a leadership team, and document what you learn. The single most common failure mode is launching district-wide before you have internalized the practice yourself. The resources, frameworks, and learning opportunities below are sequenced to help you do exactly that - start where you are, build the habit, then scale.', 'rocketpd' ),
					),
				),
			),
			'takeaways'     => array(
				__( 'Replace 1-2 annual observations with 10 short mini-observations per teacher per year.', 'rocketpd' ),
				__( 'Pair every visit with a same-day or next-day feedback conversation, not just a written form.', 'rocketpd' ),
				__( 'Separate the evaluation role from the coaching role to protect candor and trust.', 'rocketpd' ),
				__( 'Calibrate the leadership team quarterly so rubric judgments stay consistent.', 'rocketpd' ),
				__( 'Pilot before you scale - one department, one semester, then expand.', 'rocketpd' ),
			),
			'sideStats'     => array(
				array( 'value' => __( '10x', 'rocketpd' ), 'label' => __( 'more frequent classroom visits in a mini-observation system', 'rocketpd' ) ),
				array( 'value' => __( '78%', 'rocketpd' ), 'label' => __( 'of teachers say timely feedback influences their decision to stay', 'rocketpd' ) ),
				array( 'value' => __( '90 days', 'rocketpd' ), 'label' => __( 'typical timeline from pilot to school-wide habit', 'rocketpd' ) ),
			),
			'download'      => array(
				'title' => __( 'The Mini-Observation Field Guide', 'rocketpd' ),
				'body'  => __( '10-page PDF: cadence templates, observation prompts, and live feedback conversation script Kim Marshall uses with principals.', 'rocketpd' ),
				'href'  => home_url( '/k-12-guides/learning-meet-doing/' ),
				'label' => __( 'Get the Guide', 'rocketpd' ),
			),
		),
		'whyMatters'      => array(
			array( 'icon' => 'target', 'title' => __( 'Improve educator growth', 'rocketpd' ), 'body' => __( 'Frequent feedback compounds - small adjustments every month outperform a single rubric score in June.', 'rocketpd' ) ),
			array( 'icon' => 'shield', 'title' => __( 'Strengthen instructional leadership', 'rocketpd' ), 'body' => __( 'Leaders who supervise consistently build a shared instructional language across an entire building.', 'rocketpd' ) ),
			array( 'icon' => 'users', 'title' => __( 'Support teacher retention', 'rocketpd' ), 'body' => __( 'Teachers are more likely to stay in schools where they feel seen, supported, and given timely feedback.', 'rocketpd' ) ),
			array( 'icon' => 'chat', 'title' => __( 'Build better feedback systems', 'rocketpd' ), 'body' => __( 'Structured conversations replace one-way evaluations and create a habit of honest reflection.', 'rocketpd' ) ),
			array( 'icon' => 'bulb', 'title' => __( 'Increase consistency', 'rocketpd' ), 'body' => __( 'Calibration walks and shared rubrics make supervision more equitable across teachers, grades, and buildings.', 'rocketpd' ) ),
			array( 'icon' => 'cap', 'title' => __( 'Improve student outcomes', 'rocketpd' ), 'body' => __( 'Coaching tied to observed practice - not abstract PD - directly shapes the instruction students experience.', 'rocketpd' ) ),
		),
		'resources'       => array(
			array( 'type' => 'Guide', 'tone' => 'blue', 'title' => __( 'The Mini-Observation Field Guide', 'rocketpd' ), 'description' => __( 'Cadence templates, classroom prompts, and the feedback conversation script Kim Marshall uses with principals.', 'rocketpd' ), 'meta' => __( 'PDF - 18 pages', 'rocketpd' ), 'instructor' => __( 'Kim Marshall', 'rocketpd' ), 'href' => home_url( '/k-12-guides/learning-meet-doing/' ) ),
			array( 'type' => 'Course', 'tone' => 'gold', 'title' => __( 'Rethinking Teacher Supervision - Self-Paced', 'rocketpd' ), 'description' => __( 'On-demand course version of Kim’s cohort: 6 modules covering observation, feedback, and instructional coaching.', 'rocketpd' ), 'meta' => __( 'Self-paced - $49', 'rocketpd' ), 'instructor' => __( 'Kim Marshall', 'rocketpd' ), 'href' => home_url( '/launchpad/rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course/' ) ),
			array( 'type' => 'Cohort', 'tone' => 'blue', 'title' => __( 'Rethinking Teacher Supervision - Live Cohort', 'rocketpd' ), 'description' => __( 'Multi-session live cohort for school leaders implementing a mini-observation system in real time.', 'rocketpd' ), 'meta' => __( 'Live - $795/person', 'rocketpd' ), 'instructor' => __( 'Kim Marshall', 'rocketpd' ), 'href' => home_url( '/launchpad/courses/mini-observations-mastery-live-cohort/' ) ),
			array( 'type' => 'Podcast', 'tone' => 'magenta', 'title' => __( 'From Annual Reviews to Real Growth', 'rocketpd' ), 'description' => __( 'Kim sits down with three principals who replaced their formal observation system in a single school year.', 'rocketpd' ), 'meta' => __( 'Episode - 42 min', 'rocketpd' ), 'instructor' => __( 'Kim Marshall', 'rocketpd' ), 'href' => home_url( '/resources/' ) ),
			array( 'type' => 'Webinar', 'tone' => 'emerald', 'title' => __( "Feedback Conversations That Don't Backfire", 'rocketpd' ), 'description' => __( 'A free 60-minute webinar on the language and structure of growth-focused feedback after a classroom visit.', 'rocketpd' ), 'meta' => __( 'Free webinar - 60 min', 'rocketpd' ), 'instructor' => __( 'Kim Marshall', 'rocketpd' ), 'href' => home_url( '/launchpad/courses/' ) ),
			array( 'type' => 'Blog', 'tone' => 'navy', 'title' => __( 'The Calibration Walk: A Cheap, High-Leverage Habit', 'rocketpd' ), 'description' => __( 'A practical write-up of the once-a-quarter calibration walk and what to do when teams disagree on a rubric score.', 'rocketpd' ), 'meta' => __( 'Article - 8 min read', 'rocketpd' ), 'instructor' => __( 'RocketPD Editorial', 'rocketpd' ), 'href' => home_url( '/resources/' ) ),
			array( 'type' => 'Playbook', 'tone' => 'gold', 'title' => __( '90-Day Supervision Pilot Plan', 'rocketpd' ), 'description' => __( 'Step-by-step district playbook for piloting a mini-observation system with a single school or department.', 'rocketpd' ), 'meta' => __( 'Playbook - 24 pages', 'rocketpd' ), 'instructor' => __( 'RocketPD Leadership', 'rocketpd' ), 'href' => home_url( '/resources/' ) ),
			array( 'type' => 'Video', 'tone' => 'emerald', 'title' => __( 'Inside a Real Feedback Conversation', 'rocketpd' ), 'description' => __( 'Watch Kim walk through a coaching-style feedback conversation, broken down minute by minute.', 'rocketpd' ), 'meta' => __( 'Video - 27 min', 'rocketpd' ), 'instructor' => __( 'Kim Marshall', 'rocketpd' ), 'href' => home_url( '/resources/' ) ),
			array( 'type' => 'Download', 'tone' => 'blue', 'title' => __( 'Observation Look-Fors - Editable Template', 'rocketpd' ), 'description' => __( 'A short, observable look-fors template districts can adapt to their own teaching framework.', 'rocketpd' ), 'meta' => __( 'Editable PDF - 1 item', 'rocketpd' ), 'instructor' => __( 'RocketPD Editorial', 'rocketpd' ), 'href' => home_url( '/resources/' ) ),
		),
		'opportunities'  => array(
			array( 'format' => 'Live-Virtual Cohort', 'tone' => 'blue', 'title' => __( 'Rethinking Teacher Supervision, Coaching & Evaluation', 'rocketpd' ), 'meta' => __( 'Kim Marshall - Sept 15 - Nov 3 - Weekly Tuesdays - Live via Zoom - 90 min sessions', 'rocketpd' ), 'price' => __( '$795/person', 'rocketpd' ), 'href' => home_url( '/launchpad/courses/mini-observations-mastery-live-cohort/' ) ),
			array( 'format' => 'Free Webinar', 'tone' => 'emerald', 'title' => __( "Feedback Conversations That Don't Backfire", 'rocketpd' ), 'meta' => __( 'Kim Marshall - Oct 22 - 4:00 PM ET - 60 min - Live + recorded', 'rocketpd' ), 'price' => __( 'Free', 'rocketpd' ), 'href' => home_url( '/launchpad/courses/' ) ),
			array( 'format' => 'Self-Paced', 'tone' => 'gold', 'title' => __( 'Rethinking Teacher Supervision - On-Demand', 'rocketpd' ), 'meta' => __( 'Kim Marshall - Open enrollment - 6 modules - 3.5 hours', 'rocketpd' ), 'price' => __( '$49', 'rocketpd' ), 'href' => home_url( '/launchpad/rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course/' ) ),
		),
		'frameworks'     => array(
			array( 'icon' => 'clipboard', 'title' => __( 'The 10-Visit Cadence', 'rocketpd' ), 'body' => __( 'A scheduling framework that gets supervisors into every classroom 10 times per year - without burning out the leadership team.', 'rocketpd' ), 'href' => '#topic-overview' ),
			array( 'icon' => 'chat', 'title' => __( '3-Question Feedback Protocol', 'rocketpd' ), 'body' => __( 'What did you notice? What did I notice? What is our next step? The conversation script that turns visits into growth.', 'rocketpd' ), 'href' => '#topic-overview' ),
			array( 'icon' => 'target', 'title' => __( 'Calibration Walk', 'rocketpd' ), 'body' => __( 'A once-a-quarter routine where leadership teams visit classrooms together to norm rubric judgments and feedback language.', 'rocketpd' ), 'href' => '#topic-overview' ),
			array( 'icon' => 'book', 'title' => __( 'Observation Look-Fors', 'rocketpd' ), 'body' => __( 'A short, observable set of evidence-based teaching look-fors - keep it under 10 items so it actually gets used.', 'rocketpd' ), 'href' => '#related-resources' ),
			array( 'icon' => 'users', 'title' => __( 'Coaching/Evaluation Role Split', 'rocketpd' ), 'body' => __( 'A clarity model that separates the supervisor role from the coach role to protect candor and accelerate growth.', 'rocketpd' ), 'href' => '#featured-expert' ),
			array( 'icon' => 'shield', 'title' => __( '90-Day Pilot Map', 'rocketpd' ), 'body' => __( 'A step-by-step plan for piloting a mini-observation system with one school or department before scaling district-wide.', 'rocketpd' ), 'href' => '#related-resources' ),
		),
		'faqs'           => array(
			array( 'question' => __( 'What is teacher supervision?', 'rocketpd' ), 'answer' => __( 'Teacher supervision is the year-round leadership practice of observing teaching, having growth-focused feedback conversations, and connecting that feedback to professional learning and coaching support. It is not the same as evaluation - supervision is continuous and developmental, while evaluation is a periodic summative judgment.', 'rocketpd' ) ),
			array( 'question' => __( 'What is the difference between supervision, evaluation, and coaching?', 'rocketpd' ), 'answer' => __( 'Supervision is the ongoing leadership system. Evaluation is the formal judgment process. Coaching is the support that helps teachers improve practice between observations.', 'rocketpd' ) ),
			array( 'question' => __( 'How often should classroom observations happen?', 'rocketpd' ), 'answer' => __( 'Kim Marshall recommends roughly 10 short mini-observations per teacher per year, each followed by a timely feedback conversation.', 'rocketpd' ) ),
			array( 'question' => __( 'What is instructional coaching?', 'rocketpd' ), 'answer' => __( 'Instructional coaching is job-embedded support that helps teachers refine specific practices through modeling, planning, feedback, and reflection.', 'rocketpd' ) ),
			array( 'question' => __( 'How do districts improve evaluation systems?', 'rocketpd' ), 'answer' => __( 'Start by simplifying rubrics, increasing observation frequency, calibrating leaders, and separating developmental coaching from formal evaluation when possible.', 'rocketpd' ) ),
			array( 'question' => __( 'What is a mini-observation?', 'rocketpd' ), 'answer' => __( 'A mini-observation is a short, focused classroom visit - often 10 to 15 minutes - followed by a brief, specific feedback conversation.', 'rocketpd' ) ),
			array( 'question' => __( 'Can mini-observations replace formal evaluation?', 'rocketpd' ), 'answer' => __( 'They can strengthen the evidence base for evaluation, but districts still need to honor local policy and state requirements for formal evaluation decisions.', 'rocketpd' ) ),
			array( 'question' => __( 'How does RocketPD support this work?', 'rocketpd' ), 'answer' => __( 'RocketPD connects leaders to Kim Marshall resources, self-paced courses, live cohorts, guides, webinars, and a professional community focused on implementation.', 'rocketpd' ) ),
		),
		'communityCta'   => array(
			'headline' => __( 'Continue the Conversation Inside RocketPD.', 'rocketpd' ),
			'body'     => __( 'RocketPD helps educators move from isolated learning to connected implementation through expert-led professional learning, practical resources, and collaborative community experiences.', 'rocketpd' ),
			'perks'    => array(
				array( 'icon' => 'file', 'label' => __( 'Free practical resources', 'rocketpd' ) ),
				array( 'icon' => 'chat', 'label' => __( 'Leader-to-leader threads', 'rocketpd' ) ),
				array( 'icon' => 'calendar', 'label' => __( 'Weekly live events', 'rocketpd' ) ),
				array( 'icon' => 'cap', 'label' => __( 'District team support', 'rocketpd' ) ),
			),
		),
		'finalCta'       => array(
			'headline'       => __( 'Explore More Resources on Teacher Supervision, Evaluation & Coaching.', 'rocketpd' ),
			'body'           => __( 'Browse all 42 resources tagged to this topic - guides, podcasts, webinars, courses, cohorts, and downloadable templates.', 'rocketpd' ),
			'primaryLabel'   => __( 'Browse Related Resources', 'rocketpd' ),
			'primaryHref'    => '#related-resources',
			'secondaryLabel' => __( 'All Topics', 'rocketpd' ),
			'secondaryHref'  => home_url( '/topic/' ),
		),
	);
}

/**
 * Return the active Topic Detail data.
 *
 * @return array
 */
function rocketpd_get_current_topic_detail() {
	$fallback = rocketpd_get_topic_detail_fallback();

	if ( ! function_exists( 'get_field' ) ) {
		return $fallback;
	}

	$overview = $fallback['overview'];
	$override = array(
		'title'        => rocketpd_get_field( 'rpd_topic_detail_title', '' ),
		'subtitle'     => rocketpd_get_field( 'rpd_topic_detail_subtitle', '' ),
		'badge'        => rocketpd_get_field( 'rpd_topic_detail_badge', '' ),
		'category'     => rocketpd_get_field( 'rpd_topic_detail_category', '' ),
		'primaryCta'   => array(
			'label' => rocketpd_get_field( 'rpd_topic_detail_primary_cta_label', '' ),
			'href'  => rocketpd_get_field( 'rpd_topic_detail_primary_cta_url', '' ),
		),
		'secondaryCta' => array(
			'label' => rocketpd_get_field( 'rpd_topic_detail_secondary_cta_label', '' ),
			'href'  => rocketpd_get_field( 'rpd_topic_detail_secondary_cta_url', '' ),
		),
		'overview'     => array(
			'headline'  => rocketpd_get_field( 'rpd_topic_detail_overview_headline', '' ),
			'intro'     => rocketpd_get_repeater_rows( 'rpd_topic_detail_overview_intro', $overview['intro'], array( 'paragraph' ) ),
			'sections'  => rocketpd_get_repeater_rows( 'rpd_topic_detail_overview_sections', $overview['sections'], array( 'heading', 'body' ) ),
			'takeaways' => rocketpd_get_repeater_rows( 'rpd_topic_detail_key_takeaways', $overview['takeaways'], array( 'text' ) ),
			'sideStats' => rocketpd_get_repeater_rows( 'rpd_topic_detail_side_stats', $overview['sideStats'], array( 'value', 'label' ) ),
		),
		'whyMatters'   => rocketpd_get_repeater_rows( 'rpd_topic_detail_why_matters', $fallback['whyMatters'], array( 'title', 'body' ) ),
		'resources'    => rocketpd_get_repeater_rows( 'rpd_topic_detail_resources', $fallback['resources'], array( 'title', 'description' ) ),
		'opportunities' => rocketpd_get_repeater_rows( 'rpd_topic_detail_opportunities', $fallback['opportunities'], array( 'title', 'meta' ) ),
		'frameworks'   => rocketpd_get_repeater_rows( 'rpd_topic_detail_frameworks', $fallback['frameworks'], array( 'title', 'body' ) ),
		'faqs'         => rocketpd_get_repeater_rows( 'rpd_topic_detail_faqs', $fallback['faqs'], array( 'question', 'answer' ) ),
		'finalCta'     => array(
			'headline'       => rocketpd_get_field( 'rpd_topic_detail_final_headline', '' ),
			'body'           => rocketpd_get_field( 'rpd_topic_detail_final_body', '' ),
			'primaryLabel'   => rocketpd_get_field( 'rpd_topic_detail_final_primary_label', '' ),
			'primaryHref'    => rocketpd_get_field( 'rpd_topic_detail_final_primary_url', '' ),
			'secondaryLabel' => rocketpd_get_field( 'rpd_topic_detail_final_secondary_label', '' ),
			'secondaryHref'  => rocketpd_get_field( 'rpd_topic_detail_final_secondary_url', '' ),
		),
	);

	return rocketpd_topic_detail_merge( $fallback, $override );
}

/**
 * Normalize repeater rows that can contain either text-only or structured data.
 *
 * @param array $items Items.
 * @param string $key Key.
 * @return array
 */
function rocketpd_topic_detail_list_text( $items, $key = 'text' ) {
	return array_map(
		function ( $item ) use ( $key ) {
			return is_array( $item ) && isset( $item[ $key ] ) ? $item[ $key ] : $item;
		},
		(array) $items
	);
}
