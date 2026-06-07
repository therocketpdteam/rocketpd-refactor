<?php
/**
 * Cohort detail fallback data and helpers.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return true on individual Cohort pages.
 *
 * @return bool
 */
function rocketpd_is_cohort_detail_context() {
	return is_singular( 'cohort' );
}

/**
 * Return status display and CTA metadata.
 *
 * @return array
 */
function rocketpd_get_cohort_detail_status_meta() {
	return array(
		'registration-open' => array(
			'label'     => __( 'Registration Open', 'rocketpd' ),
			'tone'      => 'emerald',
			'cta_label' => __( 'Register for Cohort', 'rocketpd' ),
		),
		'nearly-full'       => array(
			'label'     => __( 'Nearly Full', 'rocketpd' ),
			'tone'      => 'gold',
			'cta_label' => __( 'Reserve a Seat', 'rocketpd' ),
		),
		'waitlist'          => array(
			'label'     => __( 'Waitlist Open', 'rocketpd' ),
			'tone'      => 'purple',
			'cta_label' => __( 'Join the Waitlist', 'rocketpd' ),
		),
		'closed'            => array(
			'label'     => __( 'Registration Closed', 'rocketpd' ),
			'tone'      => 'lavender',
			'cta_label' => __( 'Notify Me About the Next Cohort', 'rocketpd' ),
		),
	);
}

/**
 * Return one status metadata record.
 *
 * @param string $status Status key.
 * @return array
 */
function rocketpd_get_cohort_detail_status( $status ) {
	$statuses = rocketpd_get_cohort_detail_status_meta();

	return isset( $statuses[ $status ] ) ? $statuses[ $status ] : $statuses['registration-open'];
}

/**
 * Return price display metadata.
 *
 * @return array
 */
function rocketpd_get_cohort_detail_price_meta() {
	return array(
		'paid'      => array(
			'label' => __( 'Paid', 'rocketpd' ),
			'tone'  => 'gold',
		),
		'free'      => array(
			'label' => __( 'Free', 'rocketpd' ),
			'tone'  => 'emerald',
		),
		'sponsored' => array(
			'label' => __( 'Sponsored', 'rocketpd' ),
			'tone'  => 'gold',
		),
	);
}

/**
 * Merge non-empty override values into fallback values.
 *
 * @param array $fallback Fallback data.
 * @param array $override Override data.
 * @return array
 */
function rocketpd_cohort_detail_merge( $fallback, $override ) {
	foreach ( $override as $key => $value ) {
		if ( is_array( $value ) ) {
			if ( empty( $value ) ) {
				continue;
			}

			// Indexed arrays are repeater rows — replace wholesale, never recurse.
			$is_indexed = array_keys( $value ) === range( 0, count( $value ) - 1 );
			if ( $is_indexed ) {
				$fallback[ $key ] = $value;
				continue;
			}

			$fallback[ $key ] = isset( $fallback[ $key ] ) && is_array( $fallback[ $key ] )
				? rocketpd_cohort_detail_merge( $fallback[ $key ], $value )
				: $value;
			continue;
		}

		if ( is_bool( $value ) ) {
			$fallback[ $key ] = $value;
			continue;
		}

		if ( null !== $value && '' !== trim( (string) $value ) ) {
			$fallback[ $key ] = $value;
		}
	}

	return $fallback;
}

/**
 * Return a display-safe date.
 *
 * @param string $date Date string.
 * @param string $format Date format.
 * @return string
 */
function rocketpd_format_cohort_detail_date( $date, $format = 'M j, Y' ) {
	$timestamp = strtotime( (string) $date );

	return $timestamp ? date_i18n( $format, $timestamp ) : '';
}

/**
 * Return safe href by status.
 *
 * @param array $cohort Cohort data.
 * @return string
 */
function rocketpd_get_cohort_detail_primary_href( $cohort ) {
	$status = $cohort['status'] ?? 'registration-open';

	if ( ! empty( $cohort['primaryCta']['href'] ) ) {
		return $cohort['primaryCta']['href'];
	}

	if ( ( 'waitlist' === $status || 'closed' === $status ) && ! empty( $cohort['waitlistUrl'] ) ) {
		return $cohort['waitlistUrl'];
	}

	if ( ! empty( $cohort['registrationUrl'] ) ) {
		return $cohort['registrationUrl'];
	}

	return '#';
}

/**
 * Return primary CTA label by status with optional override.
 *
 * @param array $cohort Cohort data.
 * @return string
 */
function rocketpd_get_cohort_detail_primary_label( $cohort ) {
	if ( ! empty( $cohort['primaryCta']['label'] ) ) {
		return $cohort['primaryCta']['label'];
	}

	$status = rocketpd_get_cohort_detail_status( $cohort['status'] ?? 'registration-open' );

	return $status['cta_label'];
}

/**
 * Return support CTA href for pricing support banner.
 *
 * @param array $cohort Cohort data.
 * @return string
 */
function rocketpd_get_cohort_detail_support_href( $cohort ) {
	if ( ! empty( $cohort['teamOptions']['team_cta_url'] ) ) {
		return $cohort['teamOptions']['team_cta_url'];
	}

	if ( ! empty( $cohort['secondaryCta']['href'] ) ) {
		return $cohort['secondaryCta']['href'];
	}

	return home_url( '/contact/?source=cohort-support' );
}

/**
 * Return normalized resource cards.
 *
 * @param array $cohort Cohort data.
 * @return array
 */
function rocketpd_get_enabled_cohort_detail_resources( $cohort ) {
	$resources = isset( $cohort['resources'] ) && is_array( $cohort['resources'] ) ? $cohort['resources'] : array();

	return array_filter(
		$resources,
		function ( $resource ) {
			if ( ! is_array( $resource ) || empty( $resource['enabled'] ) ) {
				return false;
			}

			return ! empty( $resource['title'] ) || ! empty( $resource['summary'] ) || ! empty( $resource['href'] );
		}
	);
}

/**
 * Return whether an ACF group has real content beyond empty/default controls.
 *
 * @param array $group Group data.
 * @return bool
 */
function rocketpd_cohort_detail_group_has_content( $group ) {
	foreach ( $group as $key => $value ) {
		if ( 'enabled' === $key && false === $value ) {
			continue;
		}

		if ( is_array( $value ) ) {
			if ( rocketpd_cohort_detail_group_has_content( $value ) ) {
				return true;
			}
			continue;
		}

		if ( null !== $value && '' !== trim( (string) $value ) ) {
			return true;
		}
	}

	return false;
}

/**
 * Normalize resource overrides so empty ACF defaults do not disable fallbacks.
 *
 * @param array $resources Resource group from ACF.
 * @return array
 */
function rocketpd_normalize_cohort_detail_resources( $resources ) {
	if ( ! is_array( $resources ) ) {
		return array();
	}

	$normalized = array();

	foreach ( $resources as $key => $resource ) {
		if ( ! is_array( $resource ) || ! rocketpd_cohort_detail_group_has_content( $resource ) ) {
			continue;
		}

		$normalized[ $key ] = $resource;
	}

	return $normalized;
}

/**
 * Normalize team option overrides so empty repeater rows preserve fallbacks.
 *
 * @param array $team_options Team options group from ACF.
 * @return array
 */
function rocketpd_normalize_cohort_detail_team_options( $team_options ) {
	if ( ! is_array( $team_options ) || ! rocketpd_cohort_detail_group_has_content( $team_options ) ) {
		return array();
	}

	if ( isset( $team_options['team_pricing_tiers'] ) && is_array( $team_options['team_pricing_tiers'] ) ) {
		$team_options['team_pricing_tiers'] = array_values(
			array_filter(
				$team_options['team_pricing_tiers'],
				function ( $tier ) {
					return is_array( $tier ) && ( ! empty( $tier['tier_label'] ) || ! empty( $tier['tier_price'] ) );
				}
			)
		);

		if ( empty( $team_options['team_pricing_tiers'] ) ) {
			unset( $team_options['team_pricing_tiers'] );
		}
	}

	if ( isset( $team_options['team_capabilities'] ) && is_array( $team_options['team_capabilities'] ) ) {
		$team_options['team_capabilities'] = array_values(
			array_filter(
				$team_options['team_capabilities'],
				function ( $item ) {
					return is_array( $item ) && ! empty( $item['capability_label'] );
				}
			)
		);

		if ( empty( $team_options['team_capabilities'] ) ) {
			unset( $team_options['team_capabilities'] );
		}
	}

	return $team_options;
}

/**
 * Return whether sponsor block should render.
 *
 * @param array $cohort Cohort data.
 * @return bool
 */
function rocketpd_cohort_detail_has_sponsor( $cohort ) {
	$sponsor = $cohort['sponsor'] ?? array();

	return ! empty( $sponsor['enabled'] ) && ( ! empty( $sponsor['name'] ) || ! empty( $sponsor['description'] ) );
}

/**
 * Return fallback contract for the Kim Marshall cohort worked example.
 *
 * @return array
 */
function rocketpd_get_cohort_detail_fallback() {
	$uploads   = '/wp-content/uploads/';
	$kim_image = $uploads . '2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg';

	return array(
		'title'              => __( 'Rethinking Teacher Supervision, Coaching & Evaluation', 'rocketpd' ),
		'subtitle'           => __( 'A practical 90-day blueprint for the evaluation system your faculty actually deserves.', 'rocketpd' ),
		'shortDescription'   => __( 'Design and implement a sustainable mini-observation system with weekly expert coaching from Kim Marshall.', 'rocketpd' ),
		'longDescription'    => array(
			__( 'Traditional teacher evaluation is broken. Annual sit-downs, long checklists, and high-stakes scoring create stress for teachers, paperwork for principals, and almost no actual change in classroom practice.', 'rocketpd' ),
			__( 'In this live-virtual cohort, Kim Marshall guides school and district leaders through the exact mini-observation framework that thousands of schools have used to make evaluation more frequent, more human, and dramatically more useful.', 'rocketpd' ),
			__( 'Expect short expert teaching, peer collaboration, field-tested tools, and a 90-day rollout plan you can adapt to your faculty.', 'rocketpd' ),
		),
		'topic'              => __( 'Teacher Evaluation', 'rocketpd' ),
		'category'           => __( 'Leadership', 'rocketpd' ),
		'status'             => 'registration-open',
		'featured'           => true,
		'startDate'          => '2026-09-15',
		'endDate'            => '2026-11-03',
		'sessionCountLabel'  => __( '8 live sessions', 'rocketpd' ),
		'totalHours'         => __( '12 hours of live instruction', 'rocketpd' ),
		'formatLabel'        => __( 'Live via Zoom', 'rocketpd' ),
		'cadenceLabel'       => __( 'Weekly - Tuesdays', 'rocketpd' ),
		'sessionLength'      => __( '90 minutes', 'rocketpd' ),
		'certificateLabel'   => __( 'Certificate of Completion', 'rocketpd' ),
		'priceType'          => 'paid',
		'priceLabel'         => __( '$795/person', 'rocketpd' ),
		'priceAmount'        => __( '$795', 'rocketpd' ),
		'priceMeta'          => __( 'per person - 8 sessions', 'rocketpd' ),
		'registrationUrl'    => '#',
		'waitlistUrl'        => '#',
		'closedMessage'      => __( 'Registration is currently closed. Join the notification list and we will let you know when the next cohort opens.', 'rocketpd' ),
		'registrationFillsBy' => __( 'Seats typically fill by September 1.', 'rocketpd' ),
		'invoiceNote'        => __( 'Need an invoice or purchase order? Use the team option or contact RocketPD before registering.', 'rocketpd' ),
		'cardImage'          => $kim_image,
		'instructor'         => array(
			'name'        => __( 'Kim Marshall', 'rocketpd' ),
			'title'       => __( 'Founder - The Marshall Memo', 'rocketpd' ),
			'roleLine'    => __( 'K-12 leadership expert and former principal', 'rocketpd' ),
			'headshot'    => $kim_image,
			'bio'         => __( 'Kim Marshall is a nationally recognized school leadership expert, creator of the Marshall Memo, and author of Rethinking Teacher Supervision and Evaluation. His work helps leaders replace compliance-heavy evaluation with short, frequent classroom visits and feedback conversations teachers can actually use.', 'rocketpd' ),
			'quote'       => __( 'Annual evaluations were designed for a different era. What teachers need now is a leader who shows up frequently, listens carefully, and feeds back honestly.', 'rocketpd' ),
			'specialties' => array( __( 'Teacher Evaluation', 'rocketpd' ), __( 'Mini-Observations', 'rocketpd' ), __( 'Instructional Leadership', 'rocketpd' ), __( 'Feedback Systems', 'rocketpd' ) ),
			'href'        => home_url( '/instructors/kim-marshall/' ),
			'links'       => array(
				array( 'label' => __( 'Website', 'rocketpd' ), 'href' => 'https://marshallmemo.com/' ),
				array( 'label' => __( 'LinkedIn', 'rocketpd' ), 'href' => 'https://www.linkedin.com/in/kim-marshall-733a631/' ),
				array( 'label' => __( 'X', 'rocketpd' ), 'href' => 'https://twitter.com/KimMarshallMemo' ),
			),
		),
		'audience'           => array(
			array( 'label' => __( 'Principals', 'rocketpd' ), 'description' => __( 'Build a sustainable observation cadence.', 'rocketpd' ) ),
			array( 'label' => __( 'District Leaders', 'rocketpd' ), 'description' => __( 'Support evaluation redesign across schools.', 'rocketpd' ) ),
			array( 'label' => __( 'Instructional Coaches', 'rocketpd' ), 'description' => __( 'Connect coaching conversations to evidence.', 'rocketpd' ) ),
		),
		'outcomes'           => array(
			array( 'title' => __( 'Design a sustainable mini-observation system', 'rocketpd' ), 'description' => __( 'Map a weekly cadence that works inside a real school calendar.', 'rocketpd' ) ),
			array( 'title' => __( 'Lead feedback conversations teachers can use', 'rocketpd' ), 'description' => __( 'Practice language that lowers defensiveness and increases ownership.', 'rocketpd' ) ),
			array( 'title' => __( 'Align your evaluation rubric with actual practice', 'rocketpd' ), 'description' => __( 'Keep the formal system connected to observable classroom moves.', 'rocketpd' ) ),
			array( 'title' => __( 'Build a 90-day rollout plan for your school', 'rocketpd' ), 'description' => __( 'Leave with a practical implementation path for your context.', 'rocketpd' ) ),
			array( 'title' => __( 'Earn a certificate of completion', 'rocketpd' ), 'description' => __( 'Document live participation and implementation work.', 'rocketpd' ) ),
			array( 'title' => __( 'Join a peer cohort of practicing school leaders', 'rocketpd' ), 'description' => __( 'Work through the same challenges with leaders doing the work now.', 'rocketpd' ) ),
		),
		'schedule'           => array(
			array( 'number' => 1, 'title' => __( 'The Case for Rethinking Teacher Evaluation', 'rocketpd' ), 'date' => '2026-09-15', 'time' => __( '4:00-5:30 PM ET', 'rocketpd' ), 'description' => __( 'Why annual systems fail and what changes when leaders move to frequent, short classroom visits.', 'rocketpd' ) ),
			array( 'number' => 2, 'title' => __( 'Designing Mini-Observations for Your School', 'rocketpd' ), 'date' => '2026-09-22', 'time' => __( '4:00-5:30 PM ET', 'rocketpd' ), 'description' => __( 'Build the cadence, look-fors, and documentation routine that make visits sustainable.', 'rocketpd' ) ),
			array( 'number' => 3, 'title' => __( 'Effective Feedback Conversations', 'rocketpd' ), 'date' => '2026-09-29', 'time' => __( '4:00-5:30 PM ET', 'rocketpd' ), 'description' => __( 'Practice a feedback protocol that teachers experience as useful and fair.', 'rocketpd' ) ),
			array( 'number' => 4, 'title' => __( 'Building Shared Understanding', 'rocketpd' ), 'date' => '2026-10-06', 'time' => __( '4:00-5:30 PM ET', 'rocketpd' ), 'description' => __( 'Bring your team into a common language for instruction and evidence.', 'rocketpd' ) ),
			array( 'number' => 5, 'title' => __( 'Coaching Underperforming Teachers', 'rocketpd' ), 'date' => '2026-10-13', 'time' => __( '4:00-5:30 PM ET', 'rocketpd' ), 'description' => __( 'Use observation evidence to support honest, humane growth plans.', 'rocketpd' ) ),
			array( 'number' => 6, 'title' => __( 'Stretching Your Strongest Teachers', 'rocketpd' ), 'date' => '2026-10-20', 'time' => __( '4:00-5:30 PM ET', 'rocketpd' ), 'description' => __( 'Make supervision meaningful for teachers who already show strong practice.', 'rocketpd' ) ),
			array( 'number' => 7, 'title' => __( 'Communicating the Shift to Your Faculty', 'rocketpd' ), 'date' => '2026-10-27', 'time' => __( '4:00-5:30 PM ET', 'rocketpd' ), 'description' => __( 'Plan the message, meeting, and follow-through that build trust.', 'rocketpd' ) ),
			array( 'number' => 8, 'title' => __( 'Your 90-Day Implementation Plan', 'rocketpd' ), 'date' => '2026-11-03', 'time' => __( '4:00-5:30 PM ET', 'rocketpd' ), 'description' => __( 'Finalize your rollout plan and identify the first moves for your context.', 'rocketpd' ) ),
		),
		'included'           => array(
			array( 'icon' => 'users', 'label' => __( 'Live expert-led sessions with Kim Marshall', 'rocketpd' ) ),
			array( 'icon' => 'video', 'label' => __( 'Recordings of every session', 'rocketpd' ) ),
			array( 'icon' => 'download', 'label' => __( 'Mini-observation toolkit, scripts, and templates', 'rocketpd' ) ),
			array( 'icon' => 'messages', 'label' => __( 'Small-group breakout discussions', 'rocketpd' ) ),
			array( 'icon' => 'rubric', 'label' => __( 'Personal feedback on your draft 90-day plan', 'rocketpd' ) ),
			array( 'icon' => 'award', 'label' => __( 'Certificate of professional learning credit', 'rocketpd' ) ),
			array( 'icon' => 'community', 'label' => __( 'Access to the RocketPD leader community', 'rocketpd' ) ),
			array( 'icon' => 'priority', 'label' => __( 'Priority access to RocketPD support', 'rocketpd' ) ),
		),
		'sponsor'            => array(
			'enabled'     => false,
			'name'        => '',
			'logo'        => '',
			'description' => '',
			'url'         => '',
			'cta_label'   => __( 'Learn More', 'rocketpd' ),
		),
		'teamOptions'        => array(
			'team_eyebrow'       => __( 'Team & District Options', 'rocketpd' ),
			'team_headline'      => __( 'Bringing a team?', 'rocketpd' ),
			'team_body'          => __( 'RocketPD can help schools and districts register groups, invoice centrally, and align the cohort to leadership team goals.', 'rocketpd' ),
			'team_pricing_tiers' => array(
				array( 'tier_label' => __( '5+ participants', 'rocketpd' ), 'tier_price' => __( 'from $785', 'rocketpd' ), 'tier_unit' => __( 'per person', 'rocketpd' ) ),
				array( 'tier_label' => __( '10+ participants', 'rocketpd' ), 'tier_price' => __( 'from $765', 'rocketpd' ), 'tier_unit' => __( 'per person', 'rocketpd' ) ),
			),
			'team_capabilities'  => array(
				array( 'capability_label' => __( 'District invoicing', 'rocketpd' ) ),
				array( 'capability_label' => __( 'Centralized registration', 'rocketpd' ) ),
				array( 'capability_label' => __( 'Leadership team onboarding', 'rocketpd' ) ),
				array( 'capability_label' => __( 'Implementation planning support', 'rocketpd' ) ),
			),
			'team_ideal_for'     => __( 'Ideal for principal supervisors, leadership teams, and district cohorts.', 'rocketpd' ),
			'team_cta_label'     => __( 'Talk With RocketPD', 'rocketpd' ),
			'team_cta_url'       => home_url( '/contact/?source=cohort-team' ),
		),
		'resources'          => array(
			'guide'   => array( 'enabled' => true, 'title' => __( 'The Ultimate Guide to Teacher Supervision, Coaching & Evaluation', 'rocketpd' ), 'meta' => __( 'Free guide - 20 pages', 'rocketpd' ), 'summary' => __( 'A practical playbook for replacing annual reviews with frequent classroom visits and useful feedback.', 'rocketpd' ), 'href' => home_url( '/k-12-guides/learning-meet-doing/' ) ),
			'podcast' => array( 'enabled' => true, 'title' => __( 'Rethinking Teacher Evaluation with Kim Marshall', 'rocketpd' ), 'meta' => __( 'Podcast - 46 min', 'rocketpd' ), 'summary' => __( 'Kim unpacks the shifts that reduce stress and build confidence.', 'rocketpd' ), 'href' => 'https://www.youtube.com/watch?v=AME1I5sUJFQ' ),
			'webinar' => array( 'enabled' => true, 'title' => __( 'Mini-Observations That Actually Move Teaching', 'rocketpd' ), 'meta' => __( 'Webinar - On demand', 'rocketpd' ), 'summary' => __( 'A working session on building a sustainable system of classroom visits.', 'rocketpd' ), 'href' => 'https://www.youtube.com/watch?v=wIV-j4nt_ms' ),
		),
		'testimonials'       => array(
			array( 'quote' => __( 'The sessions gave our leadership team the language and confidence to make evaluation feel less stressful and more useful.', 'rocketpd' ), 'name' => __( 'Dr. Denise Williams', 'rocketpd' ), 'role' => __( 'Assistant Superintendent', 'rocketpd' ), 'organization' => __( 'K-12 District', 'rocketpd' ) ),
			array( 'quote' => __( 'Kim made the work practical. I left with a system I could explain to teachers and actually sustain.', 'rocketpd' ), 'name' => __( 'Marcus Riley', 'rocketpd' ), 'role' => __( 'Principal', 'rocketpd' ), 'organization' => __( 'Middle School', 'rocketpd' ) ),
		),
		'faqs'               => array(
			array( 'question' => __( 'What is a live-virtual cohort?', 'rocketpd' ), 'answer' => __( 'A live-virtual cohort is a multi-session program delivered live on Zoom. You learn directly with the expert and a group of peers over several weeks.', 'rocketpd' ) ),
			array( 'question' => __( 'How long is this cohort?', 'rocketpd' ), 'answer' => __( 'This cohort includes eight 90-minute sessions, plus implementation work between sessions.', 'rocketpd' ) ),
			array( 'question' => __( 'Are sessions recorded?', 'rocketpd' ), 'answer' => __( 'Yes. Sessions are recorded and shared with registered participants.', 'rocketpd' ) ),
			array( 'question' => __( 'Can my district register a team?', 'rocketpd' ), 'answer' => __( 'Yes. Schools and districts can register teams and request invoicing support.', 'rocketpd' ) ),
			array( 'question' => __( 'What if I miss a session?', 'rocketpd' ), 'answer' => __( 'You can watch the recording and continue with the cohort materials before the next live session.', 'rocketpd' ) ),
			array( 'question' => __( 'Do I receive professional development credit?', 'rocketpd' ), 'answer' => __( 'RocketPD provides documentation and a certificate of completion that educators can submit according to local requirements.', 'rocketpd' ) ),
			array( 'question' => __( 'Can I pay by invoice?', 'rocketpd' ), 'answer' => __( 'Yes. Contact RocketPD before registering and we can help with invoicing or team registration.', 'rocketpd' ) ),
		),
		'primaryCta'         => array( 'label' => '', 'href' => '' ),
		'secondaryCta'       => array( 'label' => __( 'See Full Schedule', 'rocketpd' ), 'href' => '#cohort-schedule' ),
		'finalCta'           => array(
			'headline'       => __( 'Ready to Join the Cohort?', 'rocketpd' ),
			'body'           => __( 'Claim your seat and build a more practical, trust-centered evaluation system with Kim Marshall.', 'rocketpd' ),
			'primaryLabel'   => '',
			'primaryHref'    => '',
			'secondaryLabel' => __( 'Contact Us About Team Registration', 'rocketpd' ),
			'secondaryHref'  => home_url( '/contact/?source=cohort-team' ),
		),
	);
}

/**
 * Return instructor data from an ACF relationship post.
 *
 * @param mixed $post Instructor post object or ID.
 * @param array $fallback Fallback instructor data.
 * @return array
 */
function rocketpd_get_cohort_detail_instructor_from_post( $post, $fallback ) {
	$post_id = is_object( $post ) && isset( $post->ID ) ? (int) $post->ID : (int) $post;

	if ( ! $post_id ) {
		return $fallback;
	}

	$name     = get_the_title( $post_id );
	$headshot = rocketpd_get_field( 'rpd_instructor_headshot', '', $post_id );
	$bio      = rocketpd_get_field( 'rpd_instructor_authority', '', $post_id );

	return rocketpd_cohort_detail_merge(
		$fallback,
		array(
			'name'     => $name,
			'title'    => rocketpd_get_field( 'rpd_instructor_bio_heading', '', $post_id ),
			'headshot' => $headshot,
			'bio'      => $bio,
			'href'     => get_permalink( $post_id ),
		)
	);
}

/**
 * Return current cohort detail data.
 *
 * @return array
 */
function rocketpd_get_current_cohort_detail() {
	$fallback = rocketpd_get_cohort_detail_fallback();

	if ( ! function_exists( 'get_field' ) ) {
		return $fallback;
	}

	$instructor_post = rocketpd_get_field( 'rpd_cohort_instructor', 0 );
	$instructor      = rocketpd_get_cohort_detail_instructor_from_post( $instructor_post, $fallback['instructor'] );
	$sponsor         = rocketpd_get_field( 'rpd_cohort_sponsor', array() );
	$team_options    = rocketpd_get_field( 'rpd_cohort_team_options', array() );
	$resources       = rocketpd_get_field( 'rpd_cohort_resources', array() );

	$override = array(
		'title'               => rocketpd_get_field( 'rpd_cohort_title', get_the_title() ),
		'subtitle'            => rocketpd_get_field( 'rpd_cohort_subtitle', '' ),
		'shortDescription'    => rocketpd_get_field( 'rpd_cohort_short_description', '' ),
		'longDescription'     => rocketpd_get_field( 'rpd_cohort_long_description', '' ),
		'topic'               => rocketpd_get_field( 'rpd_cohort_topic', '' ),
		'category'            => rocketpd_get_field( 'rpd_cohort_category', '' ),
		'status'              => rocketpd_get_field( 'rpd_cohort_status', '' ),
		'featured'            => rocketpd_get_field( 'rpd_cohort_featured', null ),
		'startDate'           => rocketpd_get_field( 'rpd_cohort_start_date', '' ),
		'endDate'             => rocketpd_get_field( 'rpd_cohort_end_date', '' ),
		'sessionCountLabel'   => rocketpd_get_field( 'rpd_cohort_session_count_label', '' ),
		'totalHours'          => rocketpd_get_field( 'rpd_cohort_total_hours', '' ),
		'formatLabel'         => rocketpd_get_field( 'rpd_cohort_format_label', '' ),
		'cadenceLabel'        => rocketpd_get_field( 'rpd_cohort_cadence_label', '' ),
		'sessionLength'       => rocketpd_get_field( 'rpd_cohort_session_length', '' ),
		'cardImage'           => rocketpd_get_field( 'rpd_cohort_card_image', '' ),
		'priceType'           => rocketpd_get_field( 'rpd_cohort_price_type', '' ),
		'priceLabel'          => rocketpd_get_field( 'rpd_cohort_price_label', '' ),
		'priceAmount'         => rocketpd_get_field( 'rpd_cohort_price_amount', '' ),
		'priceMeta'           => rocketpd_get_field( 'rpd_cohort_price_meta', '' ),
		'registrationUrl'     => rocketpd_get_field( 'rpd_cohort_registration_url', '' ),
		'waitlistUrl'         => rocketpd_get_field( 'rpd_cohort_waitlist_url', '' ),
		'closedMessage'       => rocketpd_get_field( 'rpd_cohort_closed_message', '' ),
		'registrationFillsBy' => rocketpd_get_field( 'rpd_cohort_registration_fills_by', '' ),
		'invoiceNote'         => rocketpd_get_field( 'rpd_cohort_invoice_note', '' ),
		'instructor'          => $instructor,
		'schedule'            => rocketpd_get_repeater_rows( 'rpd_cohort_schedule', array(), array( 'session_title', 'session_date' ) ),
		'outcomes'            => rocketpd_get_repeater_rows( 'rpd_cohort_outcomes', array(), array( 'outcome_title' ) ),
		'audience'            => rocketpd_get_repeater_rows( 'rpd_cohort_audience_detail', array(), array( 'audience_label' ) ),
		'included'            => rocketpd_get_repeater_rows( 'rpd_cohort_included_items', array(), array( 'included_item_label' ) ),
		'faqs'                => rocketpd_get_repeater_rows( 'rpd_cohort_faqs', array(), array( 'question' ) ),
		'testimonials'        => rocketpd_get_repeater_rows( 'rpd_cohort_testimonials', array(), array( 'quote' ) ),
		'sponsor'             => is_array( $sponsor ) ? $sponsor : array(),
		'teamOptions'         => rocketpd_normalize_cohort_detail_team_options( $team_options ),
		'resources'           => rocketpd_normalize_cohort_detail_resources( $resources ),
		'primaryCta'          => array(
			'label' => rocketpd_get_field( 'rpd_cohort_primary_cta_label', '' ),
			'href'  => rocketpd_get_field( 'rpd_cohort_primary_cta_url', '' ),
		),
		'secondaryCta'        => array(
			'label' => rocketpd_get_field( 'rpd_cohort_secondary_cta_label', '' ),
			'href'  => rocketpd_get_field( 'rpd_cohort_secondary_cta_url', '' ),
		),
		'finalCta'            => array(
			'headline'       => rocketpd_get_field( 'rpd_cohort_final_headline', '' ),
			'body'           => rocketpd_get_field( 'rpd_cohort_final_body', '' ),
			'primaryLabel'   => rocketpd_get_field( 'rpd_cohort_final_primary_label', '' ),
			'primaryHref'    => rocketpd_get_field( 'rpd_cohort_final_primary_url', '' ),
			'secondaryLabel' => rocketpd_get_field( 'rpd_cohort_final_secondary_label', '' ),
			'secondaryHref'  => rocketpd_get_field( 'rpd_cohort_final_secondary_url', '' ),
		),
	);

	return rocketpd_cohort_detail_merge( $fallback, $override );
}
