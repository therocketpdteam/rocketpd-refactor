<?php
/**
 * Course detail fallback data and helpers.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the Kim Marshall self-paced course detail fallback contract.
 *
 * @return array
 */
function rocketpd_get_course_detail_fallback() {
	$uploads = '/wp-content/uploads/';

	return array(
		'slug'             => 'rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course',
		'title'            => __( 'Rethinking Teacher Supervision, Coaching & Evaluation', 'rocketpd' ),
		'format'           => 'self-paced',
		'price'            => __( '$49', 'rocketpd' ),
		'priceMeta'        => __( 'single course · anytime access', 'rocketpd' ),
		'promise'          => __( 'Build a more practical, trust-centered approach to teacher evaluation through frequent mini-observations, better feedback conversations, and stronger coaching systems.', 'rocketpd' ),
		'trailerYouTubeId' => '1lOJDsHcCPQ',
		'courseImage'      => $uploads . '2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg',
		'topic'            => __( 'Teacher Evaluation', 'rocketpd' ),
		'audiences'        => array(
			__( 'Principals', 'rocketpd' ),
			__( 'Assistant Principals', 'rocketpd' ),
			__( 'Instructional Coaches', 'rocketpd' ),
			__( 'District Leaders', 'rocketpd' ),
			__( 'Teacher Leaders', 'rocketpd' ),
		),
		'primaryCta'       => array(
			'label' => __( 'Start Learning', 'rocketpd' ),
			'href'  => '#pricing',
		),
		'secondaryCta'     => array(
			'label' => __( 'Watch Trailer', 'rocketpd' ),
			'href'  => '#course-trailer',
		),
		'meta'             => array(
			array(
				'icon'  => 'clock',
				'label' => __( '1 hour', 'rocketpd' ),
			),
			array(
				'icon'  => 'video',
				'label' => __( '5 video modules', 'rocketpd' ),
			),
			array(
				'icon'  => 'file',
				'label' => __( 'Workbook PDF', 'rocketpd' ),
			),
			array(
				'icon'  => 'award',
				'label' => __( 'Certificate', 'rocketpd' ),
			),
		),
		'instructor'       => array(
			'name'        => __( 'Kim Marshall', 'rocketpd' ),
			'slug'        => 'kim-marshall',
			'headshot'    => $uploads . '2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg',
			'title'       => __( 'K-12 Leadership Expert · Marshall Memo Founder', 'rocketpd' ),
			'roleLine'    => __( 'Former principal, author, and nationally recognized school leadership coach', 'rocketpd' ),
			'bio'         => __( 'Kim Marshall is a nationally recognized school leadership expert, creator of the Marshall Memo, and author of Rethinking Teacher Supervision and Evaluation. His work helps school leaders create more practical, trust-centered systems for observation, coaching, and teacher growth.', 'rocketpd' ),
			'specialties' => array(
				__( 'Teacher Evaluation', 'rocketpd' ),
				__( 'Coaching', 'rocketpd' ),
				__( 'Instructional Leadership', 'rocketpd' ),
				__( 'Feedback Systems', 'rocketpd' ),
			),
			'href'        => home_url( '/instructors/kim-marshall/' ),
		),
		'outcomes'         => array(
			array(
				'title'   => __( 'Compare traditional observations with mini-observations.', 'rocketpd' ),
				'summary' => __( 'See exactly why annual reviews so often fail teachers - and what changes when classroom visits become short, frequent, and unannounced.', 'rocketpd' ),
			),
			array(
				'title'   => __( 'Build a practical system for frequent classroom visits.', 'rocketpd' ),
				'summary' => __( 'Adapt the scheduling, note-taking, and follow-up routines that make 5- to 10-minute visits sustainable for one principal across a full faculty.', 'rocketpd' ),
			),
			array(
				'title'   => __( 'Strengthen feedback conversations that support teacher growth.', 'rocketpd' ),
				'summary' => __( 'Learn the language patterns and coaching moves that turn a 5-minute visit into a meaningful conversation teachers actually look forward to.', 'rocketpd' ),
			),
		),
		'audienceIntro'    => __( 'If your job touches teacher growth - whether you observe, coach, supervise, or support - this course is built for you. Many districts run it together as a leadership team.', 'rocketpd' ),
		'included'         => array(
			'self-paced' => array(
				'heading' => __( 'Every RocketPD self-paced course includes', 'rocketpd' ),
				'visual'  => $uploads . '2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg',
				'items'   => array(
					array( 'icon' => 'clock', 'label' => __( '60-minute expert-led course', 'rocketpd' ) ),
					array( 'icon' => 'layers', 'label' => __( '5 short video modules', 'rocketpd' ) ),
					array( 'icon' => 'book', 'label' => __( 'Downloadable workbook PDF', 'rocketpd' ) ),
					array( 'icon' => 'award', 'label' => __( 'Certificate of completion', 'rocketpd' ) ),
					array( 'icon' => 'screen', 'label' => __( 'Secure Learning Portal access', 'rocketpd' ) ),
					array( 'icon' => 'users', 'label' => __( 'RocketPD Community membership', 'rocketpd' ) ),
				),
			),
			'webinar'    => array(
				'heading' => __( 'Every RocketPD free webinar includes', 'rocketpd' ),
				'visual'  => $uploads . '2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg',
				'items'   => array(
					array( 'icon' => 'play', 'label' => __( 'Recorded expert conversation', 'rocketpd' ) ),
					array( 'icon' => 'spark', 'label' => __( 'Practical ideas you can use quickly', 'rocketpd' ) ),
					array( 'icon' => 'book', 'label' => __( 'Related resources and next steps', 'rocketpd' ) ),
					array( 'icon' => 'arrow', 'label' => __( 'Recommended learning pathway', 'rocketpd' ) ),
				),
			),
			'cohort'     => array(
				'heading' => __( 'Every RocketPD live cohort includes', 'rocketpd' ),
				'visual'  => $uploads . '2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg',
				'items'   => array(
					array( 'icon' => 'calendar', 'label' => __( 'Live expert-led sessions', 'rocketpd' ) ),
					array( 'icon' => 'play', 'label' => __( 'Session recordings', 'rocketpd' ) ),
					array( 'icon' => 'book', 'label' => __( 'Implementation materials', 'rocketpd' ) ),
					array( 'icon' => 'users', 'label' => __( 'Collaborative implementation support', 'rocketpd' ) ),
					array( 'icon' => 'star', 'label' => __( 'Priority access to RocketPD support', 'rocketpd' ) ),
				),
			),
		),
		'resources'        => array(
			'guide'    => array(
				'enabled'      => true,
				'title'        => __( 'The Ultimate Guide to Teacher Supervision, Coaching & Evaluation', 'rocketpd' ),
				'meta'         => __( 'Free guide · 20 pages · 22 min read', 'rocketpd' ),
				'summary'      => __( 'A practical playbook for school leaders ready to replace dread-filled annual reviews with short, frequent, growth-oriented classroom visits.', 'rocketpd' ),
				'href'         => home_url( '/k-12-guides/learning-meet-doing/' ),
				'deliverables' => array(
					__( 'A 5-step framework for sustainable mini-observations', 'rocketpd' ),
					__( 'Sample feedback scripts you can adapt this week', 'rocketpd' ),
					__( 'A printable visit tracker for your faculty roster', 'rocketpd' ),
				),
			),
			'podcast'  => array(
				'enabled' => true,
				'title'   => __( 'Rethinking Teacher Evaluation with Kim Marshall', 'rocketpd' ),
				'meta'    => __( 'Podcast · 46 min', 'rocketpd' ),
				'summary' => __( 'Kim joins the RocketPD podcast to unpack the 3 keys to reducing evaluation stress, saving time, and building teacher confidence.', 'rocketpd' ),
				'href'    => 'https://www.youtube.com/watch?v=AME1I5sUJFQ',
			),
			'webinar'  => array(
				'enabled' => true,
				'title'   => __( 'Mini-Observations That Actually Move Teaching', 'rocketpd' ),
				'meta'    => __( 'Webinar · 56 min · On-demand', 'rocketpd' ),
				'summary' => __( 'A working session with Kim on building a sustainable system of unannounced classroom visits that improve teaching at scale.', 'rocketpd' ),
				'href'    => 'https://www.youtube.com/watch?v=wIV-j4nt_ms',
			),
			'blog'     => array(
				'enabled' => true,
				'title'   => __( 'Rethinking Teacher Evaluation: 3 Keys', 'rocketpd' ),
				'meta'    => __( 'Blog', 'rocketpd' ),
				'summary' => __( 'Kim’s most-shared piece on the three shifts every school leader needs to make for a more meaningful evaluation system.', 'rocketpd' ),
				'href'    => home_url( '/resources/' ),
			),
			'playbook' => array(
				'enabled' => false,
				'title'   => __( 'Mini-Observation Playbook', 'rocketpd' ),
				'meta'    => __( 'Reserved', 'rocketpd' ),
				'summary' => __( 'Reserved for a future implementation playbook.', 'rocketpd' ),
				'href'    => '#',
			),
		),
		'pricing'          => array(
			'self-paced' => array(
				array(
					'eyebrow'     => __( 'Single Course', 'rocketpd' ),
					'title'       => __( 'Single-Course Registration', 'rocketpd' ),
					'price'       => __( '$49', 'rocketpd' ),
					'priceMeta'   => __( 'one-time access', 'rocketpd' ),
					'bullets'     => array( __( 'Self-paced video modules', 'rocketpd' ), __( 'Course workbook PDF', 'rocketpd' ), __( 'Access to secure Learning Portal', 'rocketpd' ), __( 'Membership in learning community', 'rocketpd' ), __( 'Certificate of completion', 'rocketpd' ) ),
					'ctaLabel'    => __( 'Start Learning', 'rocketpd' ),
					'ctaHref'     => '#pricing',
					'highlighted' => false,
				),
				array(
					'eyebrow'     => __( 'Full Library', 'rocketpd' ),
					'title'       => __( 'Entire Video Library', 'rocketpd' ),
					'price'       => __( '$245', 'rocketpd' ),
					'priceMeta'   => __( 'annually', 'rocketpd' ),
					'bullets'     => array( __( 'Access to all RocketPD courses', 'rocketpd' ), __( 'Self-paced video modules', 'rocketpd' ), __( 'All course workbooks', 'rocketpd' ), __( 'Access to secure Learning Portal', 'rocketpd' ), __( 'Membership in learning community', 'rocketpd' ), __( 'Certificates of completion', 'rocketpd' ) ),
					'ctaLabel'    => __( 'Get Full Library', 'rocketpd' ),
					'ctaHref'     => home_url( '/launchpad/' ),
					'highlighted' => true,
				),
				array(
					'eyebrow'     => __( 'Teams', 'rocketpd' ),
					'title'       => __( 'School or District Use', 'rocketpd' ),
					'price'       => __( 'Custom', 'rocketpd' ),
					'priceMeta'   => __( 'contact us for pricing', 'rocketpd' ),
					'bullets'     => array( __( 'Unlimited team access', 'rocketpd' ), __( 'All RocketPD courses included', 'rocketpd' ), __( 'Self-paced video modules and workbooks', 'rocketpd' ), __( 'Dedicated success partner', 'rocketpd' ), __( 'Built-in reporting for leaders', 'rocketpd' ) ),
					'ctaLabel'    => __( 'Talk With RocketPD', 'rocketpd' ),
					'ctaHref'     => home_url( '/contact/' ),
					'highlighted' => false,
				),
			),
			'webinar'    => array(),
			'cohort'     => array(),
		),
		'related'          => array(
			array(
				'slug'       => 'creating-a-culture-of-love',
				'title'      => __( 'Creating a Culture of Love', 'rocketpd' ),
				'instructor' => __( 'Dr. Luvelle Brown', 'rocketpd' ),
				'format'     => 'self-paced',
				'price'      => __( '$49', 'rocketpd' ),
				'topic'      => __( 'School Culture', 'rocketpd' ),
				'image'      => $uploads . '2024/04/dr-luvelle-brown-rocketpd-instructor.jpg',
				'href'       => home_url( '/launchpad/courses/creating-a-culture-of-love/' ),
			),
			array(
				'slug'       => 'build-ownership-not-buy-in-live-cohort',
				'title'      => __( 'Build Ownership, Not Buy-In - Live Cohort with Eric Sheninger', 'rocketpd' ),
				'instructor' => __( 'Eric Sheninger', 'rocketpd' ),
				'format'     => 'cohort',
				'price'      => __( '$495/person', 'rocketpd' ),
				'topic'      => __( 'School Leadership', 'rocketpd' ),
				'image'      => $uploads . '2025/01/eric-sheninger.png',
				'href'       => home_url( '/launchpad/courses/build-ownership-not-buy-in-live-cohort/' ),
			),
			array(
				'slug'       => 'mini-observations-that-actually-move-teaching',
				'title'      => __( 'Mini-Observations That Actually Move Teaching', 'rocketpd' ),
				'instructor' => __( 'Kim Marshall', 'rocketpd' ),
				'format'     => 'webinar',
				'price'      => __( 'Free', 'rocketpd' ),
				'topic'      => __( 'Teacher Evaluation', 'rocketpd' ),
				'image'      => $uploads . '2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg',
				'href'       => home_url( '/launchpad/courses/mini-observations-that-actually-move-teaching/' ),
			),
		),
		'faqs'             => array(
			array( 'question' => __( 'Is this course live or self-paced?', 'rocketpd' ), 'answer' => __( 'This is a self-paced video course. You can start the moment you register and work through the modules whenever it fits your schedule.', 'rocketpd' ) ),
			array( 'question' => __( 'How long does the course take?', 'rocketpd' ), 'answer' => __( 'Plan for about one hour of video learning plus time to use the workbook and adapt the tools to your school.', 'rocketpd' ) ),
			array( 'question' => __( 'Is a workbook included?', 'rocketpd' ), 'answer' => __( 'Yes. The course includes a downloadable workbook PDF with reflection prompts and implementation tools.', 'rocketpd' ) ),
			array( 'question' => __( 'Do I receive a certificate?', 'rocketpd' ), 'answer' => __( 'Yes. Participants can earn a certificate of completion after finishing the course.', 'rocketpd' ) ),
			array( 'question' => __( 'Can my school or district purchase access for a team?', 'rocketpd' ), 'answer' => __( 'Yes. RocketPD supports school and district team access. Contact us and we will help map the best option.', 'rocketpd' ) ),
			array( 'question' => __( 'How do I access the course after registration?', 'rocketpd' ), 'answer' => __( 'You will access the course through the secure RocketPD Learning Portal after registration.', 'rocketpd' ) ),
		),
		'finalCta'         => array(
			'headline'       => __( 'Ready to rethink teacher evaluation?', 'rocketpd' ),
			'body'           => __( 'Join thousands of school leaders building more practical, trust-centered systems for observation, coaching, and growth - with Kim Marshall as your guide.', 'rocketpd' ),
			'primaryLabel'   => __( 'Start Learning - $49', 'rocketpd' ),
			'primaryHref'    => '#pricing',
			'secondaryLabel' => __( 'Talk About District Pricing', 'rocketpd' ),
			'secondaryHref'  => home_url( '/contact/' ),
		),
	);
}

/**
 * Return true on the RocketPD course detail template or legacy assigned target page.
 *
 * @return bool
 */
function rocketpd_is_course_detail_context() {
	if ( is_singular( 'course' ) || is_page_template( 'page-templates/template-course-detail.php' ) ) {
		return true;
	}

	if ( is_page_template( 'page-templates/launchpad-template.php' ) && is_page( 'rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course' ) ) {
		return true;
	}

	return false;
}

/**
 * Deep merge arrays, preserving fallback values for empty overrides.
 *
 * @param array $fallback Fallback data.
 * @param array $override Override data.
 * @return array
 */
function rocketpd_course_detail_merge( $fallback, $override ) {
	foreach ( $override as $key => $value ) {
		if ( '' === $value || null === $value || array() === $value ) {
			continue;
		}

		if ( is_array( $value ) && isset( $fallback[ $key ] ) && is_array( $fallback[ $key ] ) ) {
			$fallback[ $key ] = rocketpd_course_detail_merge( $fallback[ $key ], $value );
			continue;
		}

		$fallback[ $key ] = $value;
	}

	return $fallback;
}

/**
 * Normalize related learning-experience cards inside course detail data.
 *
 * @param array $course Course detail data.
 * @return array
 */
function rocketpd_normalize_course_detail_related_cards( $course ) {
	if ( empty( $course['related'] ) || ! is_array( $course['related'] ) || ! function_exists( 'rocketpd_normalize_learning_experience_cards' ) ) {
		return $course;
	}

	$course['related'] = rocketpd_normalize_learning_experience_cards( $course['related'] );

	return $course;
}

/**
 * Return course detail data for the current page.
 *
 * Sentinel pattern: if rpd_course_title is null/false the post has never been
 * seeded — return the full fallback. Once seeded, every ACF value is honoured
 * as-is, including empty strings and empty repeaters.
 *
 * @return array
 */
function rocketpd_get_current_course_detail() {
	$fallback = rocketpd_get_course_detail_fallback();

	if ( ! is_singular( 'course' ) || ! function_exists( 'get_field' ) ) {
		return rocketpd_normalize_course_detail_related_cards( $fallback );
	}

	// Sentinel: null/false means never seeded — use full fallback.
	$sentinel = get_field( 'rpd_course_title' );
	if ( null === $sentinel || false === $sentinel ) {
		$fallback['slug'] = get_post_field( 'post_name', get_the_ID() ) ?: $fallback['slug'];
		return rocketpd_normalize_course_detail_related_cards( $fallback );
	}

	// Post has been seeded — read all ACF fields directly, honour every value.
	$post_id = get_the_ID();

	// Hero.
	$course                   = array();
	$course['slug']           = get_post_field( 'post_name', $post_id ) ?: $fallback['slug'];
	$course['title']          = get_field( 'rpd_course_title', $post_id );
	$course['format']         = get_field( 'rpd_course_format', $post_id );
	$course['topic']          = get_field( 'rpd_course_topic', $post_id );
	$course['price']          = get_field( 'rpd_course_price', $post_id );
	$course['priceMeta']      = get_field( 'rpd_course_price_meta', $post_id );
	$course['promise']        = get_field( 'rpd_course_promise', $post_id );
	$course['trailerYouTubeId'] = get_field( 'rpd_course_trailer_youtube_id', $post_id );
	$course['courseImage']    = get_field( 'rpd_course_image', $post_id ) ?: '';

	$audience_rows = get_field( 'rpd_course_audiences', $post_id );
	$course['audiences'] = is_array( $audience_rows )
		? array_column( $audience_rows, 'label' )
		: array();

	$course['primaryCta'] = array(
		'label' => get_field( 'rpd_course_primary_cta_label', $post_id ),
		'href'  => get_field( 'rpd_course_primary_cta_href', $post_id ),
	);
	$course['secondaryCta'] = array(
		'label' => get_field( 'rpd_course_secondary_cta_label', $post_id ),
		'href'  => get_field( 'rpd_course_secondary_cta_href', $post_id ),
	);
	$course['meta'] = get_field( 'rpd_course_meta_items', $post_id ) ?: array();

	// Instructor.
	$course['instructor'] = array(
		'name'        => get_field( 'rpd_course_instructor_name', $post_id ),
		'slug'        => get_field( 'rpd_course_instructor_slug', $post_id ),
		'headshot'    => get_field( 'rpd_course_instructor_headshot', $post_id ) ?: '',
		'title'       => get_field( 'rpd_course_instructor_title', $post_id ),
		'roleLine'    => get_field( 'rpd_course_instructor_role_line', $post_id ),
		'bio'         => get_field( 'rpd_course_instructor_bio', $post_id ),
		'specialties' => array_column( get_field( 'rpd_course_instructor_specialties', $post_id ) ?: array(), 'label' ),
		'href'        => get_field( 'rpd_course_instructor_href', $post_id ),
	);

	// Outcomes.
	$course['audienceIntro'] = get_field( 'rpd_course_audience_intro', $post_id );
	$course['outcomes']      = get_field( 'rpd_course_outcomes', $post_id ) ?: array();

	// Included.
	$format                           = $course['format'] ?: 'self-paced';
	$included_heading                 = get_field( 'rpd_course_included_heading', $post_id );
	$included_visual                  = get_field( 'rpd_course_included_visual', $post_id );
	$included_items                   = get_field( 'rpd_course_included_items', $post_id );
	$course['included'][$format] = array(
		'heading' => $included_heading ?: ( $fallback['included'][$format]['heading'] ?? '' ),
		'visual'  => $included_visual  ?: ( $fallback['included'][$format]['visual']  ?? '' ),
		'items'   => is_array( $included_items ) && count( $included_items ) > 0
			? $included_items
			: ( $fallback['included'][$format]['items'] ?? array() ),
	);

	// Resources.
	$course['resources'] = array(
		'guide' => array(
			'enabled'      => (bool) get_field( 'rpd_course_guide_enabled', $post_id ),
			'title'        => get_field( 'rpd_course_guide_title', $post_id ),
			'meta'         => get_field( 'rpd_course_guide_meta', $post_id ),
			'summary'      => get_field( 'rpd_course_guide_summary', $post_id ),
			'href'         => get_field( 'rpd_course_guide_href', $post_id ),
			'deliverables' => array_column( get_field( 'rpd_course_guide_deliverables', $post_id ) ?: array(), 'text' ),
		),
		'podcast' => array(
			'enabled'  => (bool) get_field( 'rpd_course_podcast_enabled', $post_id ),
			'title'    => get_field( 'rpd_course_podcast_title', $post_id ),
			'meta'     => get_field( 'rpd_course_podcast_meta', $post_id ),
			'summary'  => get_field( 'rpd_course_podcast_summary', $post_id ),
			'embedId'  => get_field( 'rpd_course_podcast_embed_id', $post_id ),
			'href'     => get_field( 'rpd_course_podcast_href', $post_id ),
		),
		'webinar' => array(
			'enabled'  => (bool) get_field( 'rpd_course_webinar_enabled', $post_id ),
			'title'    => get_field( 'rpd_course_webinar_title', $post_id ),
			'meta'     => get_field( 'rpd_course_webinar_meta', $post_id ),
			'summary'  => get_field( 'rpd_course_webinar_summary', $post_id ),
			'embedId'  => get_field( 'rpd_course_webinar_embed_id', $post_id ),
			'href'     => get_field( 'rpd_course_webinar_href', $post_id ),
		),
		'blog' => array(
			'enabled' => (bool) get_field( 'rpd_course_blog_enabled', $post_id ),
			'title'   => get_field( 'rpd_course_blog_title', $post_id ),
			'meta'    => get_field( 'rpd_course_blog_meta', $post_id ),
			'summary' => get_field( 'rpd_course_blog_summary', $post_id ),
			'href'    => get_field( 'rpd_course_blog_href', $post_id ),
		),
		'playbook' => $fallback['resources']['playbook'] ?? array( 'enabled' => false ),
	);

	// Pricing — use ACF cards if any rows exist, else format-based fallback.
	$pricing_rows = get_field( 'rpd_course_pricing_cards', $post_id );
	if ( is_array( $pricing_rows ) && count( $pricing_rows ) > 0 ) {
		$cards = array();
		foreach ( $pricing_rows as $row ) {
			$bullets = array_filter( array_map( 'trim', explode( "\n", $row['bullets'] ?? '' ) ) );
			$cards[] = array(
				'eyebrow'     => $row['eyebrow']     ?? '',
				'title'       => $row['title']       ?? '',
				'price'       => $row['price']       ?? '',
				'priceMeta'   => $row['price_meta']  ?? '',
				'bullets'     => array_values( $bullets ),
				'ctaLabel'    => $row['cta_label']   ?? '',
				'ctaHref'     => $row['cta_href']    ?? '',
				'highlighted' => ! empty( $row['highlighted'] ),
			);
		}
		$course['pricing'] = array( $format => $cards );
	} else {
		$course['pricing'] = $fallback['pricing'];
	}

	// Related — use ACF rows if any exist, else fallback.
	$related_rows = get_field( 'rpd_course_related', $post_id );
	$course['related'] = ( is_array( $related_rows ) && count( $related_rows ) > 0 )
		? $related_rows
		: $fallback['related'];

	// FAQs — use ACF rows if any exist, else fallback.
	$faq_rows = get_field( 'rpd_course_faqs', $post_id );
	$course['faqs'] = ( is_array( $faq_rows ) && count( $faq_rows ) > 0 )
		? $faq_rows
		: $fallback['faqs'];

	// Final CTA.
	$course['finalCta'] = array(
		'headline'       => get_field( 'rpd_course_final_headline', $post_id ),
		'body'           => get_field( 'rpd_course_final_body', $post_id ),
		'primaryLabel'   => get_field( 'rpd_course_final_primary_label', $post_id ),
		'primaryHref'    => get_field( 'rpd_course_final_primary_href', $post_id ),
		'secondaryLabel' => get_field( 'rpd_course_final_secondary_label', $post_id ),
		'secondaryHref'  => get_field( 'rpd_course_final_secondary_href', $post_id ),
	);

	return rocketpd_normalize_course_detail_related_cards( $course );
}

/**
 * Return display metadata for a course resource type.
 *
 * @param string $type Resource type key.
 * @return array
 */
function rocketpd_get_course_resource_type_meta( $type ) {
	$type = sanitize_key( $type );
	$map  = array(
		'guide'    => array(
			'label' => __( 'Guide', 'rocketpd' ),
			'icon'  => 'book',
			'tone'  => 'purple',
		),
		'podcast'  => array(
			'label' => __( 'Podcast', 'rocketpd' ),
			'icon'  => 'mic',
			'tone'  => 'purple',
		),
		'webinar'  => array(
			'label' => __( 'Webinar', 'rocketpd' ),
			'icon'  => 'video',
			'tone'  => 'blue',
		),
		'blog'     => array(
			'label' => __( 'Blog', 'rocketpd' ),
			'icon'  => 'article',
			'tone'  => 'magenta',
		),
		'playbook' => array(
			'label' => __( 'Playbook', 'rocketpd' ),
			'icon'  => 'book',
			'tone'  => 'purple',
		),
		'video'    => array(
			'label' => __( 'Video', 'rocketpd' ),
			'icon'  => 'video',
			'tone'  => 'blue',
		),
		'download' => array(
			'label' => __( 'Download', 'rocketpd' ),
			'icon'  => 'download',
			'tone'  => 'purple',
		),
		'course'   => array(
			'label' => __( 'Course', 'rocketpd' ),
			'icon'  => 'course',
			'tone'  => 'gold',
		),
		'cohort'   => array(
			'label' => __( 'Cohort', 'rocketpd' ),
			'icon'  => 'users',
			'tone'  => 'blue',
		),
	);

	return $map[ $type ] ?? array(
		'label' => ucwords( str_replace( '-', ' ', $type ) ),
		'icon'  => 'article',
		'tone'  => 'purple',
	);
}

/**
 * Return enabled resource cards for a course.
 *
 * @param array $course Course data.
 * @return array
 */
function rocketpd_get_enabled_course_resources( $course ) {
	$resources = isset( $course['resources'] ) && is_array( $course['resources'] ) ? $course['resources'] : array();

	return array_filter(
		$resources,
		function ( $resource ) {
			return ! empty( $resource['enabled'] );
		}
	);
}
