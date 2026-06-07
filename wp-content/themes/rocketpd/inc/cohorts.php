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

	$kim_image     = $image_for( 'kim-marshall' ) ?: $base . '2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg';

	return array(
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
