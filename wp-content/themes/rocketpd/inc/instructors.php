<?php
/**
 * Instructor Index seed data.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the Instructor Index topic labels.
 *
 * @return array
 */
function rocketpd_get_instructor_topics() {
	return array(
		__( 'All Experts', 'rocketpd' ),
		__( 'Instructional Leadership', 'rocketpd' ),
		__( 'Teacher Evaluation', 'rocketpd' ),
		__( 'Coaching', 'rocketpd' ),
		__( 'MTSS', 'rocketpd' ),
		__( 'AI in Education', 'rocketpd' ),
		__( 'Family Engagement', 'rocketpd' ),
		__( 'Project-Based Learning', 'rocketpd' ),
		__( 'Student Engagement', 'rocketpd' ),
		__( 'School Culture', 'rocketpd' ),
		__( 'Personalized Learning', 'rocketpd' ),
		__( 'Math Instruction', 'rocketpd' ),
		__( 'Literacy', 'rocketpd' ),
		__( 'Change Management', 'rocketpd' ),
	);
}

/**
 * Return display labels for instructor format keys.
 *
 * @return array
 */
function rocketpd_get_instructor_format_labels() {
	return array(
		'guide'     => __( 'Guide', 'rocketpd' ),
		'podcast'   => __( 'Podcast', 'rocketpd' ),
		'webinar'   => __( 'Webinar', 'rocketpd' ),
		'launchpad' => __( 'LaunchPad', 'rocketpd' ),
		'cohort'    => __( 'Cohort', 'rocketpd' ),
		'workshop'  => __( 'Workshop', 'rocketpd' ),
	);
}

/**
 * Return icon labels for instructor format keys.
 *
 * @return array
 */
function rocketpd_get_instructor_format_icons() {
	return array(
		'guide'     => 'book',
		'podcast'   => 'audio',
		'webinar'   => 'play',
		'launchpad' => 'video',
		'cohort'    => 'group',
		'workshop'  => 'board',
	);
}

/**
 * Return the Instructor Index data contract.
 *
 * @return array
 */
function rocketpd_get_instructors() {
	return array(
		array(
			'slug'           => 'kim-marshall',
			'name'           => __( 'Kim Marshall', 'rocketpd' ),
			'authority'      => __( 'Helping school leaders rethink supervision, coaching & teacher evaluation.', 'rocketpd' ),
			'transformation' => __( 'Reduce evaluation stress - build teacher trust', 'rocketpd' ),
			'tags'           => array( __( 'Teacher Evaluation', 'rocketpd' ), __( 'Coaching', 'rocketpd' ), __( 'Instructional Leadership', 'rocketpd' ) ),
			'formats'        => array( 'guide', 'podcast', 'webinar', 'launchpad', 'cohort' ),
			'headshot'       => '/wp-content/uploads/2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg',
			'featured'       => true,
			'initials'       => 'KM',
		),
		array(
			'slug'           => 'dr-luvelle-brown',
			'name'           => __( 'Dr. Luvelle Brown', 'rocketpd' ),
			'authority'      => __( 'Designing schools where students and educators are seen, heard, and loved.', 'rocketpd' ),
			'transformation' => __( 'Build a culture of love & belonging', 'rocketpd' ),
			'tags'           => array( __( 'School Culture', 'rocketpd' ), __( 'Instructional Leadership', 'rocketpd' ) ),
			'formats'        => array( 'guide', 'cohort', 'workshop' ),
			'headshot'       => '/wp-content/uploads/2024/04/dr-luvelle-brown-rocketpd-instructor.jpg',
			'featured'       => false,
			'initials'       => 'LB',
		),
		array(
			'slug'           => 'dr-catlin-tucker',
			'name'           => __( 'Dr. Catlin Tucker', 'rocketpd' ),
			'authority'      => __( 'Pioneering blended learning and Universal Design for Learning in K-12 classrooms.', 'rocketpd' ),
			'transformation' => __( 'Differentiate instruction at scale', 'rocketpd' ),
			'tags'           => array( __( 'Personalized Learning', 'rocketpd' ), __( 'Student Engagement', 'rocketpd' ) ),
			'formats'        => array( 'guide', 'launchpad', 'cohort' ),
			'headshot'       => '/wp-content/uploads/2024/04/dr-catlin-tucker-rocketpd-instructor-blended-learning.jpg',
			'featured'       => false,
			'initials'       => 'CT',
		),
		array(
			'slug'           => 'eric-sheninger',
			'name'           => __( 'Eric Sheninger', 'rocketpd' ),
			'authority'      => __( 'Helping schools build ownership - not buy-in - for the hard work of change.', 'rocketpd' ),
			'transformation' => __( 'Move from buy-in to ownership', 'rocketpd' ),
			'tags'           => array( __( 'Instructional Leadership', 'rocketpd' ), __( 'Change Management', 'rocketpd' ) ),
			'formats'        => array( 'webinar', 'cohort', 'workshop' ),
			'headshot'       => '/wp-content/uploads/2025/01/eric-sheninger.png',
			'featured'       => false,
			'initials'       => 'ES',
		),
		array(
			'slug'           => 'dr-john-spencer',
			'name'           => __( 'Dr. John Spencer', 'rocketpd' ),
			'authority'      => __( 'Bringing real-world Project-Based Learning into every K-12 classroom.', 'rocketpd' ),
			'transformation' => __( 'Spark student creativity & ownership', 'rocketpd' ),
			'tags'           => array( __( 'Project-Based Learning', 'rocketpd' ), __( 'Student Engagement', 'rocketpd' ) ),
			'formats'        => array( 'guide', 'podcast', 'launchpad' ),
			'headshot'       => '/wp-content/uploads/2023/05/dr-john-spencer.jpg',
			'featured'       => false,
			'initials'       => 'JS',
		),
		array(
			'slug'           => 'angela-watson',
			'name'           => __( 'Angela Watson', 'rocketpd' ),
			'authority'      => __( 'Time-management strategies that protect teacher energy and prevent burnout.', 'rocketpd' ),
			'transformation' => __( 'Reclaim 5 hours of your week', 'rocketpd' ),
			'tags'           => array( __( 'Teacher Productivity', 'rocketpd' ), __( 'School Culture', 'rocketpd' ) ),
			'formats'        => array( 'podcast', 'cohort' ),
			'headshot'       => '/wp-content/uploads/2025/01/angela-watson.jpg',
			'featured'       => false,
			'initials'       => 'AW',
		),
		array(
			'slug'           => 'matt-miller',
			'name'           => __( 'Matt Miller', 'rocketpd' ),
			'authority'      => __( 'Tech-powered classrooms that capture attention - and hold it.', 'rocketpd' ),
			'transformation' => __( 'Turn tech into student engagement', 'rocketpd' ),
			'tags'           => array( __( 'Student Engagement', 'rocketpd' ), __( 'AI in Education', 'rocketpd' ) ),
			'formats'        => array( 'webinar', 'cohort' ),
			'headshot'       => '/wp-content/uploads/2025/03/matt-square-headshot.jpeg',
			'featured'       => false,
			'initials'       => 'MM',
		),
		array(
			'slug'           => 'dr-ross-greene',
			'name'           => __( 'Dr. Ross Greene', 'rocketpd' ),
			'authority'      => __( 'Solving the problems that drive classroom behaviors - collaboratively.', 'rocketpd' ),
			'transformation' => __( 'Reduce disruptions, build trust', 'rocketpd' ),
			'tags'           => array( __( 'MTSS', 'rocketpd' ), __( 'Student Engagement', 'rocketpd' ) ),
			'formats'        => array( 'guide', 'cohort', 'workshop' ),
			'headshot'       => '/wp-content/uploads/2025/01/dr-ross-greene.jpg',
			'featured'       => false,
			'initials'       => 'RG',
		),
		array(
			'slug'           => 'aj-juliani',
			'name'           => __( 'A.J. Juliani', 'rocketpd' ),
			'authority'      => __( 'Practical AI integration that protects student learning and teacher judgment.', 'rocketpd' ),
			'transformation' => __( 'Adopt AI without losing the craft', 'rocketpd' ),
			'tags'           => array( __( 'AI in Education', 'rocketpd' ), __( 'Instructional Leadership', 'rocketpd' ) ),
			'formats'        => array( 'guide', 'launchpad', 'workshop' ),
			'headshot'       => '/wp-content/uploads/2024/02/aj-juliani-rocketpd-instructor.jpg',
			'featured'       => false,
			'initials'       => 'AJ',
		),
	);
}

/**
 * Return one Instructor Index record by slug.
 *
 * @param string $slug Instructor slug.
 * @return array
 */
function rocketpd_get_instructor_by_slug( $slug ) {
	$slug = sanitize_title( $slug );

	foreach ( rocketpd_get_instructors() as $instructor ) {
		if ( isset( $instructor['slug'] ) && $slug === $instructor['slug'] ) {
			return $instructor;
		}
	}

	return array();
}

/**
 * Normalize instructor comparison text.
 *
 * @param string $value Text to normalize.
 * @return string
 */
function rocketpd_normalize_instructor_match_value( $value ) {
	$value = strtolower( wp_strip_all_tags( html_entity_decode( (string) $value, ENT_QUOTES, 'UTF-8' ) ) );
	$value = preg_replace( '/[^a-z0-9]+/', ' ', $value );

	return trim( (string) $value );
}

/**
 * Return a plain image URL from an ACF image value.
 *
 * @param mixed $image Image ID, array, or URL.
 * @return string
 */
function rocketpd_get_instructor_image_url( $image ) {
	if ( is_numeric( $image ) ) {
		$url = wp_get_attachment_image_url( (int) $image, 'large' );

		return $url ? $url : '';
	}

	if ( is_array( $image ) && ! empty( $image['url'] ) ) {
		return $image['url'];
	}

	if ( is_string( $image ) ) {
		return $image;
	}

	return '';
}

/**
 * Convert an instructor post into a related expert card.
 *
 * @param int $post_id Instructor post ID.
 * @return array
 */
function rocketpd_get_related_expert_card_from_post( $post_id ) {
	$post_id = absint( $post_id );

	if ( ! $post_id ) {
		return array();
	}

	$slug             = get_post_field( 'post_name', $post_id );
	$directory_record = rocketpd_get_instructor_by_slug( $slug );
	$name             = function_exists( 'get_field' ) ? get_field( 'rpd_instructor_name', $post_id ) : '';
	$authority        = function_exists( 'get_field' ) ? get_field( 'rpd_instructor_authority', $post_id ) : '';
	$headshot         = function_exists( 'get_field' ) ? get_field( 'rpd_instructor_headshot', $post_id ) : '';

	if ( ! $name ) {
		$name = get_the_title( $post_id );
	}

	if ( ! $authority && ! empty( $directory_record['authority'] ) ) {
		$authority = $directory_record['authority'];
	}

	if ( ! $authority ) {
		$authority = get_the_excerpt( $post_id );
	}

	if ( ! $headshot && has_post_thumbnail( $post_id ) ) {
		$headshot = get_post_thumbnail_id( $post_id );
	}

	if ( ! $headshot && ! empty( $directory_record['headshot'] ) ) {
		$headshot = $directory_record['headshot'];
	}

	return array(
		'post_id'   => $post_id,
		'slug'      => $slug,
		'name'      => $name,
		'authority' => $authority,
		'headshot'  => rocketpd_get_instructor_image_url( $headshot ),
	);
}

/**
 * Convert a directory fallback record into a related expert card.
 *
 * @param array $record Instructor directory record.
 * @return array
 */
function rocketpd_get_related_expert_card_from_directory_record( $record ) {
	if ( empty( $record['slug'] ) || empty( $record['name'] ) ) {
		return array();
	}

	return array(
		'slug'      => $record['slug'],
		'name'      => $record['name'],
		'authority' => $record['authority'] ?? '',
		'headshot'  => $record['headshot'] ?? '',
	);
}

/**
 * Return normalized topic and tag tokens for an instructor.
 *
 * @param int   $post_id Instructor post ID.
 * @param array $data    Instructor data or fallback record.
 * @return array
 */
function rocketpd_get_instructor_match_tokens( $post_id = 0, $data = array() ) {
	$tokens = array();

	if ( $post_id && taxonomy_exists( 'learning_topic' ) ) {
		$terms = wp_get_post_terms( $post_id, 'learning_topic' );

		if ( ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				$tokens[] = 'term:' . (int) $term->term_id;
				$tokens[] = rocketpd_normalize_instructor_match_value( $term->name );
			}
		}
	}

	if ( ! empty( $data['tags'] ) && is_array( $data['tags'] ) ) {
		foreach ( $data['tags'] as $tag ) {
			$tokens[] = rocketpd_normalize_instructor_match_value( $tag );
		}
	}

	if ( $post_id && function_exists( 'get_field' ) ) {
		$tags = get_field( 'rpd_instructor_tags', $post_id );

		if ( is_string( $tags ) && trim( $tags ) ) {
			foreach ( preg_split( '/\r\n|\r|\n/', $tags ) as $tag ) {
				$tokens[] = rocketpd_normalize_instructor_match_value( $tag );
			}
		}
	}

	return array_values( array_filter( array_unique( $tokens ) ) );
}

/**
 * Add one related expert card if it is valid, unique, and not the current instructor.
 *
 * @param array  $cards        Related expert cards.
 * @param array  $seen         Seen lookup keys.
 * @param array  $expert       Candidate expert card.
 * @param int    $current_id   Current instructor post ID.
 * @param string $current_slug Current instructor slug.
 * @param string $current_name Current instructor display name.
 * @param int    $limit        Maximum card count.
 * @return bool
 */
function rocketpd_add_related_expert_card( &$cards, &$seen, $expert, $current_id, $current_slug, $current_name, $limit = 3 ) {
	if ( count( $cards ) >= $limit || ! is_array( $expert ) || empty( $expert['name'] ) ) {
		return false;
	}

	$expert_id     = absint( $expert['post_id'] ?? $expert['ID'] ?? $expert['id'] ?? 0 );
	$expert_slug   = ! empty( $expert['slug'] ) ? sanitize_title( $expert['slug'] ) : '';
	$expert_name   = rocketpd_normalize_instructor_match_value( $expert['name'] );
	$current_slug  = sanitize_title( $current_slug );
	$current_name  = rocketpd_normalize_instructor_match_value( $current_name );
	$expert_href   = ! empty( $expert['href'] ) ? (string) $expert['href'] : '';
	$current_id    = absint( $current_id );
	$is_current_id = $current_id && $expert_id && $current_id === $expert_id;

	if ( $is_current_id || ( $current_slug && $expert_slug === $current_slug ) || ( $current_name && $expert_name === $current_name ) ) {
		return false;
	}

	if ( $current_slug && $expert_href && false !== strpos( $expert_href, '/instructors/' . $current_slug . '/' ) ) {
		return false;
	}

	$key = $expert_id ? 'id:' . $expert_id : '';

	if ( ! $key && $expert_slug ) {
		$key = 'slug:' . $expert_slug;
	}

	if ( ! $key ) {
		$key = 'name:' . $expert_name;
	}

	if ( isset( $seen[ $key ] ) ) {
		return false;
	}

	$seen[ $key ] = true;
	$cards[]      = array(
		'post_id'   => $expert_id,
		'slug'      => $expert_slug,
		'name'      => $expert['name'],
		'authority' => $expert['authority'] ?? '',
		'headshot'  => rocketpd_get_instructor_image_url( $expert['headshot'] ?? '' ),
	);

	return true;
}

/**
 * Select related experts for an instructor detail page.
 *
 * Selection order:
 * 1. Manual ACF rows.
 * 2. Similar published instructor posts by shared topics/tags.
 * 3. Existing fallback rows.
 * 4. Deterministic published/directory instructor fill.
 *
 * @param int    $current_id       Current instructor post ID.
 * @param string $current_slug     Current instructor slug.
 * @param array  $current_data     Current instructor data.
 * @param array  $manual_experts   Manual related expert rows.
 * @param array  $fallback_experts Existing fallback related expert rows.
 * @param int    $limit            Maximum card count.
 * @return array
 */
function rocketpd_select_related_instructor_experts( $current_id, $current_slug, $current_data, $manual_experts = array(), $fallback_experts = array(), $limit = 3 ) {
	$cards        = array();
	$seen         = array();
	$current_name = $current_data['name'] ?? '';

	foreach ( (array) $manual_experts as $expert ) {
		rocketpd_add_related_expert_card( $cards, $seen, $expert, $current_id, $current_slug, $current_name, $limit );
	}

	$current_tokens = rocketpd_get_instructor_match_tokens( $current_id, $current_data );
	$post_cards     = array();

	if ( count( $cards ) < $limit && class_exists( 'WP_Query' ) ) {
		$instructor_posts = get_posts(
			array(
				'post_type'      => 'instructor',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
				'post__not_in'   => $current_id ? array( absint( $current_id ) ) : array(),
				'orderby'        => array(
					'menu_order' => 'ASC',
					'title'      => 'ASC',
				),
				'order'          => 'ASC',
			)
		);

		$scored_posts = array();

		foreach ( $instructor_posts as $post ) {
			$card   = rocketpd_get_related_expert_card_from_post( $post->ID );
			$tokens = rocketpd_get_instructor_match_tokens( $post->ID, rocketpd_get_instructor_by_slug( $card['slug'] ?? '' ) );
			$score  = count( array_intersect( $current_tokens, $tokens ) );

			$post_cards[] = $card;

			if ( $score > 0 ) {
				$scored_posts[] = array(
					'score'      => $score,
					'menu_order' => (int) $post->menu_order,
					'title'      => get_the_title( $post->ID ),
					'card'       => $card,
				);
			}
		}

		usort(
			$scored_posts,
			function ( $a, $b ) {
				if ( $a['score'] !== $b['score'] ) {
					return $b['score'] <=> $a['score'];
				}

				if ( $a['menu_order'] !== $b['menu_order'] ) {
					return $a['menu_order'] <=> $b['menu_order'];
				}

				return strcasecmp( $a['title'], $b['title'] );
			}
		);

		foreach ( $scored_posts as $candidate ) {
			rocketpd_add_related_expert_card( $cards, $seen, $candidate['card'], $current_id, $current_slug, $current_name, $limit );
		}
	}

	foreach ( (array) $fallback_experts as $expert ) {
		rocketpd_add_related_expert_card( $cards, $seen, $expert, $current_id, $current_slug, $current_name, $limit );
	}

	foreach ( $post_cards as $expert ) {
		rocketpd_add_related_expert_card( $cards, $seen, $expert, $current_id, $current_slug, $current_name, $limit );
	}

	$directory_records = rocketpd_get_instructors();
	usort(
		$directory_records,
		function ( $a, $b ) {
			return strcasecmp( $a['name'] ?? '', $b['name'] ?? '' );
		}
	);

	foreach ( $directory_records as $record ) {
		rocketpd_add_related_expert_card( $cards, $seen, rocketpd_get_related_expert_card_from_directory_record( $record ), $current_id, $current_slug, $current_name, $limit );
	}

	return array_slice( $cards, 0, $limit );
}

/**
 * Return the detailed fallback data for an instructor.
 *
 * Kim Marshall is the approved worked example for the first detail template.
 *
 * @param string $slug Instructor slug.
 * @return array
 */
function rocketpd_get_instructor_detail_defaults( $slug = 'kim-marshall' ) {
	$directory_record = rocketpd_get_instructor_by_slug( $slug );

	if ( ! $directory_record ) {
		$directory_record = rocketpd_get_instructor_by_slug( 'kim-marshall' );
	}

	$detail = array(
		'slug'             => $directory_record['slug'] ?? 'kim-marshall',
		'name'             => $directory_record['name'] ?? __( 'Kim Marshall', 'rocketpd' ),
		'authority'        => __( 'Rethinking teacher supervision, coaching, and evaluation so leaders can build trust and improve practice.', 'rocketpd' ),
		'tags'             => array(
			__( 'Teacher Evaluation', 'rocketpd' ),
			__( 'Instructional Leadership', 'rocketpd' ),
			__( 'Coaching', 'rocketpd' ),
			__( 'School Leadership', 'rocketpd' ),
		),
		'stats'            => array(
			array(
				'value' => __( '30+', 'rocketpd' ),
				'label' => __( 'Years in Education', 'rocketpd' ),
			),
			array(
				'value' => __( '10K+', 'rocketpd' ),
				'label' => __( 'Marshall Memo Readers', 'rocketpd' ),
			),
			array(
				'value' => __( '850+', 'rocketpd' ),
				'label' => __( 'Districts Reached', 'rocketpd' ),
			),
		),
		'headshot'         => $directory_record['headshot'] ?? '/wp-content/uploads/2024/04/kim-marshall-rocketpd-instructor-k12-pricipals-leadership.jpg',
		'follow'           => array(
			'linkedin' => 'https://www.linkedin.com/in/kim-marshall-733a631/',
			'twitter'  => 'https://twitter.com/KimMarshallMemo',
			'website'  => 'https://marshallmemo.com/',
		),
		'hero'             => array(
			'eyebrow'         => __( 'RocketPD Instructor · Featured Expert', 'rocketpd' ),
			'primary_label'   => __( 'Explore Free Resources', 'rocketpd' ),
			'primary_href'    => '#free-resources',
			'secondary_label' => __( 'View Professional Learning', 'rocketpd' ),
			'secondary_href'  => '#professional-learning',
			'award'           => __( '30+ years', 'rocketpd' ),
		),
		'bio'              => array(
			'eyebrow'       => __( 'Authority Positioning', 'rocketpd' ),
			'heading'       => __( 'Why educators learn from Kim', 'rocketpd' ),
			'paragraphs'    => array(
				__( 'Kim Marshall helps school leaders make teacher supervision more practical, human, and instructionally useful. His work moves evaluation away from compliance-driven checklists and toward short, frequent observations paired with thoughtful coaching conversations.', 'rocketpd' ),
				__( 'Through the Marshall Memo, books, guides, and live learning with RocketPD, Kim gives leaders concrete ways to reduce evaluation stress, strengthen feedback culture, and keep improvement focused on classroom practice.', 'rocketpd' ),
			),
			'focus_heading' => __( 'His work focuses on', 'rocketpd' ),
			'focus'         => array(
				__( 'Mini-observations that fit real school schedules', 'rocketpd' ),
				__( 'Feedback conversations teachers can actually use', 'rocketpd' ),
				__( 'Teacher evaluation systems that build trust', 'rocketpd' ),
				__( 'Instructional leadership routines for busy principals', 'rocketpd' ),
				__( 'Coaching cycles connected to classroom evidence', 'rocketpd' ),
				__( 'Practical tools for supervision and follow-through', 'rocketpd' ),
			),
		),
		'resources'        => array(
			'eyebrow' => __( 'Free Resources', 'rocketpd' ),
			'heading' => __( "Start exploring Kim's work — free.", 'rocketpd' ),
			'body'    => __( 'Read, watch, and listen. Every resource below is designed to help school leaders take a single concrete step this week.', 'rocketpd' ),
		),
		'guide'            => array(
			'enabled'         => true,
			'eyebrow'         => __( 'Featured Guide · Free', 'rocketpd' ),
			'title'           => __( 'Rethinking Teacher Supervision, Coaching & Evaluation', 'rocketpd' ),
			'summary'         => __( 'A practical guide for leaders who want teacher evaluation to feel less stressful, more useful, and more connected to the everyday work of improving instruction.', 'rocketpd' ),
			'meta'            => __( 'PDF guide - 20 minute read', 'rocketpd' ),
			'href'            => home_url( '/k-12-guides/learning-meet-doing/' ),
			'primary_label'   => __( 'Get the Free Guide', 'rocketpd' ),
			'secondary_label' => __( 'Preview a sample chapter', 'rocketpd' ),
			'deliverables'    => array(
				__( 'A supervision model built around frequent classroom visits', 'rocketpd' ),
				__( 'Conversation prompts for more useful feedback', 'rocketpd' ),
				__( 'Implementation moves principals can start this month', 'rocketpd' ),
			),
		),
		'podcast'          => array(
			'enabled'   => true,
			'title'     => __( 'Kim Marshall on rethinking teacher supervision', 'rocketpd' ),
			'summary'   => __( 'Listen to Kim unpack why observation, feedback, and trust belong together.', 'rocketpd' ),
			'meta'      => __( 'Podcast episode', 'rocketpd' ),
			'embed_id'  => 'AME1I5sUJFQ',
			'href'      => 'https://www.youtube.com/watch?v=AME1I5sUJFQ',
			'cta_label' => __( 'Listen on YouTube', 'rocketpd' ),
		),
		'webinar'          => array(
			'enabled'   => true,
			'title'     => __( 'From mini-observations to meaningful debriefs', 'rocketpd' ),
			'summary'   => __( 'A practical conversation on reducing stress and improving teacher feedback.', 'rocketpd' ),
			'meta'      => __( 'Recorded webinar', 'rocketpd' ),
			'embed_id'  => 'wIV-j4nt_ms',
			'href'      => 'https://www.youtube.com/watch?v=wIV-j4nt_ms',
			'cta_label' => __( 'Watch the webinar', 'rocketpd' ),
		),
		'blog'             => array(
			'enabled'   => true,
			'eyebrow'   => __( 'Latest from the blog', 'rocketpd' ),
			'heading'   => __( 'Recent articles featuring Kim', 'rocketpd' ),
			'cta_label' => __( 'See all articles', 'rocketpd' ),
			'cta_url'   => home_url( '/resources/' ),
			'posts'     => array(
				array(
					'title'   => __( 'Rethinking teacher evaluation: 3 keys to reduce stress, save time, & build confidence', 'rocketpd' ),
					'meta'    => __( 'Article', 'rocketpd' ),
					'excerpt' => __( 'Kim Marshall walks through the three shifts that turn annual evaluation from a compliance ritual into a growth engine for teachers.', 'rocketpd' ),
					'href'    => home_url( '/rethinking-teacher-evaluation-3-keys-to-reduce-stress-save-time-build-confidence-with-kim-marshall/' ),
				),
				array(
					'title'       => __( 'More articles coming soon', 'rocketpd' ),
					'meta'        => __( 'Coming soon', 'rocketpd' ),
					'excerpt'     => __( 'Subscribe to the Marshall Memo or join the RocketPD newsletter to be the first to read new pieces.', 'rocketpd' ),
					'href'        => '',
					'placeholder' => true,
				),
			),
		),
		'playbook'         => array(
			'enabled' => false,
		),
		'learning'         => array(
			'eyebrow' => __( 'Go Deeper', 'rocketpd' ),
			'heading' => __( 'Work with Kim through RocketPD.', 'rocketpd' ),
			'body'    => __( 'Three flexible ways to bring this work directly into your school or district.', 'rocketpd' ),
		),
		'offerings'        => array(
			'launchpad' => array(
				'enabled' => true,
				'type'    => __( 'Self-paced', 'rocketpd' ),
				'title'   => __( 'LaunchPad', 'rocketpd' ),
				'price'   => __( '$49', 'rocketpd' ),
				'bullets'  => array(
					__( 'Self-paced video course', 'rocketpd' ),
					__( 'Practical reflection tools', 'rocketpd' ),
					__( 'Certificate of completion', 'rocketpd' ),
				),
				'href'    => home_url( '/launchpad/rethinking-teacher-supervision-coaching-evaluation-self-paced-video-course/' ),
				'cta'     => __( 'Learn More', 'rocketpd' ),
			),
			'cohort'    => array(
				'enabled'  => true,
				'type'     => __( 'Live-virtual cohort', 'rocketpd' ),
				'title'    => __( 'Live-Virtual Cohort', 'rocketpd' ),
				'price'    => __( '$750', 'rocketpd' ),
				'badge'    => __( 'Most Popular', 'rocketpd' ),
				'bullets'   => array(
					__( 'Facilitated sessions with Kim', 'rocketpd' ),
					__( 'Implementation between sessions', 'rocketpd' ),
					__( 'Small-group leader discussion', 'rocketpd' ),
				),
				'href'     => home_url( '/contact/' ),
				'cta'      => __( 'Register for Cohort', 'rocketpd' ),
				'featured' => true,
			),
			'workshop' => array(
				'enabled' => true,
				'type'    => __( 'Custom district workshop', 'rocketpd' ),
				'title'   => __( 'Custom District Workshop', 'rocketpd' ),
				'price'   => __( 'Inquire', 'rocketpd' ),
				'bullets'  => array(
					__( 'Built around district priorities', 'rocketpd' ),
					__( 'Available live-virtual or onsite', 'rocketpd' ),
					__( 'Designed for leadership teams', 'rocketpd' ),
				),
				'href'    => home_url( '/contact/' ),
				'cta'     => __( 'Request a Quote', 'rocketpd' ),
			),
		),
		'trust'            => array(
			'quote'          => __( 'Kim gives leaders practical language and routines that make feedback feel less like an event and more like part of the work.', 'rocketpd' ),
			'person'         => __( 'Dave Baugh', 'rocketpd' ),
			'attribution'    => __( 'Superintendent and RocketPD district partner', 'rocketpd' ),
			'image'          => '',
			'impact_eyebrow' => __( 'Trusted by school leaders', 'rocketpd' ),
			'impact_heading' => __( 'Used in 850+ districts across 47 states.', 'rocketpd' ),
			'impact_body'    => __( 'School leaders nationwide use Kim’s frameworks to rebuild teacher trust, free up principal time, and turn evaluation into a real engine for instructional growth.', 'rocketpd' ),
			'stats'          => array(
				array(
					'value' => __( '12K+', 'rocketpd' ),
					'label' => __( 'educators trained', 'rocketpd' ),
				),
				array(
					'value' => __( '98%', 'rocketpd' ),
					'label' => __( 'would recommend', 'rocketpd' ),
				),
				array(
					'value' => __( '4.9', 'rocketpd' ),
					'label' => __( 'average rating', 'rocketpd' ),
				),
			),
		),
		'faqs'             => array(
			array(
				'question' => __( 'Who is Kim Marshall best suited for?', 'rocketpd' ),
				'answer'   => __( 'Kim is especially helpful for principals, assistant principals, instructional coaches, and district leaders who want supervision and evaluation to strengthen teaching instead of simply documenting performance.', 'rocketpd' ),
			),
			array(
				'question' => __( 'Can Kim work with an entire leadership team?', 'rocketpd' ),
				'answer'   => __( 'Yes. RocketPD can support individual educators, cohorts of leaders, or customized district workshops for full leadership teams.', 'rocketpd' ),
			),
			array(
				'question' => __( 'Where should I start if I am new to Kim Marshall?', 'rocketpd' ),
				'answer'   => __( 'Start with the free guide, then explore the LaunchPad course or a live-virtual cohort if your team wants a structured implementation path.', 'rocketpd' ),
			),
			array(
				'question' => __( 'Can RocketPD customize Kim Marshall learning for our district?', 'rocketpd' ),
				'answer'   => __( 'Yes. The RocketPD team can help map Kim’s work to your district priorities, calendar, and leadership goals.', 'rocketpd' ),
			),
		),
		'related_experts'  => array(
			array(
				'slug'      => 'dr-catlin-tucker',
				'name'      => __( 'Dr. Catlin Tucker', 'rocketpd' ),
				'authority' => __( 'Blended learning and student-centered instruction.', 'rocketpd' ),
				'headshot'  => '/wp-content/uploads/2024/04/dr-catlin-tucker-rocketpd-instructor-blended-learning.jpg',
			),
			array(
				'slug'      => 'eric-sheninger',
				'name'      => __( 'Eric Sheninger', 'rocketpd' ),
				'authority' => __( 'Leadership, change management, and school innovation.', 'rocketpd' ),
				'headshot'  => '/wp-content/uploads/2025/01/eric-sheninger.png',
			),
			array(
				'slug'      => 'george-couros',
				'name'      => __( 'George Couros', 'rocketpd' ),
				'authority' => __( 'Innovation, leadership, and staff engagement.', 'rocketpd' ),
				'headshot'  => '/wp-content/uploads/2024/03/George-Couros.jpg',
			),
		),
		'related'          => array(
			'eyebrow' => __( 'Explore related experts', 'rocketpd' ),
			'heading' => __( 'Related experts you might explore.', 'rocketpd' ),
		),
		'faq_intro'        => array(
			'heading'       => __( 'Questions leaders ask about learning with Kim.', 'rocketpd' ),
			'help_text'     => __( 'Need help deciding?', 'rocketpd' ),
			'contact_label' => __( 'Talk with the RocketPD team.', 'rocketpd' ),
			'contact_url'   => home_url( '/contact/' ),
		),
		'final_cta'        => array(
			'eyebrow'         => __( 'Bring this work to your team', 'rocketpd' ),
			'headline'        => __( "Bring Kim's work to your district.", 'rocketpd' ),
			'body'            => __( 'Explore Kim’s free resources, bring her work into a cohort, or talk with RocketPD about a custom district experience.', 'rocketpd' ),
			'primary_label'   => __( 'Explore Free Resources', 'rocketpd' ),
			'primary_href'    => '#free-resources',
			'secondary_label' => __( 'Talk with RocketPD', 'rocketpd' ),
			'secondary_href'  => home_url( '/contact/' ),
		),
	);

	return $detail;
}

/**
 * Return detailed instructor data for the current single instructor.
 *
 * @return array
 */
function rocketpd_get_current_instructor_detail() {
	$slug = is_singular( 'instructor' ) ? get_post_field( 'post_name', get_queried_object_id() ) : 'kim-marshall';
	$data = rocketpd_get_instructor_detail_defaults( $slug );
	$fallback_related_experts = isset( $data['related_experts'] ) && is_array( $data['related_experts'] ) ? $data['related_experts'] : array();

	if ( ! function_exists( 'get_field' ) || ! is_singular( 'instructor' ) ) {
		$data['related_experts'] = rocketpd_select_related_instructor_experts( 0, $slug, $data, array(), $fallback_related_experts );
		return $data;
	}

	$post_id = get_queried_object_id();
	$manual_related_experts = array();
	$overrides = array(
		'name'      => get_field( 'rpd_instructor_name', $post_id ),
		'authority' => get_field( 'rpd_instructor_authority', $post_id ),
		'headshot'  => get_field( 'rpd_instructor_headshot', $post_id ),
	);

	foreach ( $overrides as $key => $value ) {
		if ( null !== $value && '' !== $value && array() !== $value ) {
			$data[ $key ] = $value;
		}
	}

	$line_fields = array(
		'tags' => get_field( 'rpd_instructor_tags', $post_id ),
	);

	foreach ( $line_fields as $key => $value ) {
		if ( is_string( $value ) && trim( $value ) ) {
			$data[ $key ] = array_values( array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', $value ) ) ) );
		}
	}

	foreach ( array(
		'eyebrow'         => 'rpd_instructor_hero_eyebrow',
		'primary_label'   => 'rpd_instructor_hero_primary_label',
		'primary_href'    => 'rpd_instructor_hero_primary_href',
		'secondary_label' => 'rpd_instructor_hero_secondary_label',
		'secondary_href'  => 'rpd_instructor_hero_secondary_href',
		'award'           => 'rpd_instructor_hero_award',
	) as $key => $field_name ) {
		$value = get_field( $field_name, $post_id );

		if ( is_string( $value ) && $value ) {
			$data['hero'][ $key ] = $value;
		}
	}

	$stats = get_field( 'rpd_instructor_stats', $post_id );

	if ( is_array( $stats ) && $stats ) {
		$filtered_stats = array();

		foreach ( $stats as $stat ) {
			if ( ! empty( $stat['value'] ) && ! empty( $stat['label'] ) ) {
				$filtered_stats[] = $stat;
			}
		}

		if ( $filtered_stats ) {
			$data['stats'] = $filtered_stats;
		}
	}

	foreach ( array(
		'eyebrow'       => 'rpd_instructor_bio_eyebrow',
		'heading'       => 'rpd_instructor_bio_heading',
		'focus_heading' => 'rpd_instructor_authority_focus_heading',
	) as $key => $field_name ) {
		$value = get_field( $field_name, $post_id );

		if ( is_string( $value ) && $value ) {
			$data['bio'][ $key ] = $value;
		}
	}

	$bio_paragraphs = get_field( 'rpd_instructor_bio_paragraphs', $post_id );

	if ( is_string( $bio_paragraphs ) && trim( $bio_paragraphs ) ) {
		$data['bio']['paragraphs'] = array_values( array_filter( array_map( 'trim', preg_split( '/\n\s*\n|\r\n\s*\r\n/', $bio_paragraphs ) ) ) );
	}

	$focus_areas = get_field( 'rpd_instructor_focus_areas', $post_id );

	if ( is_string( $focus_areas ) && trim( $focus_areas ) ) {
		$data['bio']['focus'] = array_values( array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', $focus_areas ) ) ) );
	}

	foreach ( array( 'linkedin', 'twitter', 'website' ) as $network ) {
		$value = get_field( 'rpd_instructor_' . $network . '_url', $post_id );

		if ( is_string( $value ) && $value ) {
			$data['follow'][ $network ] = $value;
		}
	}

	foreach ( array(
		'eyebrow' => 'rpd_instructor_resources_eyebrow',
		'heading' => 'rpd_instructor_resources_heading',
		'body'    => 'rpd_instructor_resources_body',
	) as $key => $field_name ) {
		$value = get_field( $field_name, $post_id );

		if ( is_string( $value ) && $value ) {
			$data['resources'][ $key ] = $value;
		}
	}

	foreach ( array( 'guide', 'podcast', 'webinar', 'blog', 'playbook' ) as $resource_key ) {
		$enabled = get_field( 'rpd_instructor_' . $resource_key . '_enabled', $post_id );

		if ( null !== $enabled && '' !== $enabled ) {
			$data[ $resource_key ]['enabled'] = (bool) $enabled;
		}
	}

	foreach ( array( 'eyebrow', 'title', 'summary', 'meta', 'href', 'primary_label', 'secondary_label' ) as $key ) {
		$value = get_field( 'rpd_instructor_guide_' . $key, $post_id );

		if ( is_string( $value ) && $value ) {
			$data['guide'][ $key ] = $value;
		}
	}

	foreach ( array(
		'primary_label'   => 'rpd_instructor_guide_primary_cta_label',
		'secondary_label' => 'rpd_instructor_guide_secondary_cta_label',
	) as $key => $field_name ) {
		$value = get_field( $field_name, $post_id );

		if ( is_string( $value ) && $value ) {
			$data['guide'][ $key ] = $value;
		}
	}

	$deliverables = get_field( 'rpd_instructor_guide_deliverables', $post_id );

	if ( is_string( $deliverables ) && trim( $deliverables ) ) {
		$data['guide']['deliverables'] = array_values( array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', $deliverables ) ) ) );
	}

	foreach ( array( 'podcast', 'webinar' ) as $resource_key ) {
		foreach ( array( 'title', 'summary', 'meta', 'embed_id', 'href', 'cta_label' ) as $key ) {
			$value = get_field( 'rpd_instructor_' . $resource_key . '_' . $key, $post_id );

			if ( is_string( $value ) && $value ) {
				$data[ $resource_key ][ $key ] = $value;
			}
		}
	}

	foreach ( array(
		'eyebrow'   => 'rpd_instructor_blog_eyebrow',
		'heading'   => 'rpd_instructor_blog_heading',
		'cta_label' => 'rpd_instructor_blog_cta_label',
		'cta_url'   => 'rpd_instructor_blog_cta_url',
	) as $key => $field_name ) {
		$value = get_field( $field_name, $post_id );

		if ( is_string( $value ) && $value ) {
			$data['blog'][ $key ] = $value;
		}
	}

	$blog_posts = get_field( 'rpd_instructor_blog_posts', $post_id );

	if ( is_array( $blog_posts ) && $blog_posts ) {
		$filtered_posts = array();

		foreach ( $blog_posts as $post_card ) {
			if ( ! empty( $post_card['title'] ) ) {
				$filtered_posts[] = $post_card;
			}
		}

		if ( $filtered_posts ) {
			$data['blog']['posts'] = $filtered_posts;
		}
	}

	foreach ( array(
		'eyebrow' => 'rpd_instructor_learning_eyebrow',
		'heading' => 'rpd_instructor_learning_heading',
		'body'    => 'rpd_instructor_learning_body',
	) as $key => $field_name ) {
		$value = get_field( $field_name, $post_id );

		if ( is_string( $value ) && $value ) {
			$data['learning'][ $key ] = $value;
		}
	}

	foreach ( array( 'launchpad', 'cohort', 'workshop' ) as $offering_key ) {
		$enabled = get_field( 'rpd_instructor_' . $offering_key . '_enabled', $post_id );

		if ( null !== $enabled && '' !== $enabled ) {
			$data['offerings'][ $offering_key ]['enabled'] = (bool) $enabled;
		}

		foreach ( array( 'type', 'title', 'price', 'href', 'cta', 'badge' ) as $key ) {
			$value = get_field( 'rpd_instructor_' . $offering_key . '_' . $key, $post_id );

			if ( is_string( $value ) && $value ) {
				$data['offerings'][ $offering_key ][ $key ] = $value;
			}
		}

		$featured = get_field( 'rpd_instructor_' . $offering_key . '_featured', $post_id );

		if ( null !== $featured && '' !== $featured ) {
			$data['offerings'][ $offering_key ]['featured'] = (bool) $featured;
		}

		$bullets = get_field( 'rpd_instructor_' . $offering_key . '_bullets', $post_id );

		if ( is_string( $bullets ) && trim( $bullets ) ) {
			$data['offerings'][ $offering_key ]['bullets'] = array_values( array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', $bullets ) ) ) );
		}
	}

	foreach ( array(
		'quote'          => 'rpd_instructor_trust_quote',
		'person'         => 'rpd_instructor_trust_person',
		'attribution'    => 'rpd_instructor_trust_attribution',
		'image'          => 'rpd_instructor_trust_image',
		'impact_eyebrow' => 'rpd_instructor_trust_impact_eyebrow',
		'impact_heading' => 'rpd_instructor_trust_impact_heading',
		'impact_body'    => 'rpd_instructor_trust_impact_body',
	) as $key => $field_name ) {
		$value = get_field( $field_name, $post_id );

		if ( is_string( $value ) && $value ) {
			$data['trust'][ $key ] = $value;
		} elseif ( 'image' === $key && is_array( $value ) && ! empty( $value['url'] ) ) {
			$data['trust'][ $key ] = $value;
		}
	}

	$trust_stats = get_field( 'rpd_instructor_trust_stats', $post_id );

	if ( is_array( $trust_stats ) && $trust_stats ) {
		$filtered_trust_stats = array();

		foreach ( $trust_stats as $stat ) {
			if ( ! empty( $stat['value'] ) && ! empty( $stat['label'] ) ) {
				$filtered_trust_stats[] = $stat;
			}
		}

		if ( $filtered_trust_stats ) {
			$data['trust']['stats'] = $filtered_trust_stats;
		}
	}

	$related_experts = get_field( 'rpd_instructor_related_experts', $post_id );

	if ( is_array( $related_experts ) && $related_experts ) {
		$filtered_related = array();

		foreach ( $related_experts as $expert ) {
			if ( ! empty( $expert['name'] ) ) {
				$filtered_related[] = $expert;
			}
		}

		if ( $filtered_related ) {
			$manual_related_experts = $filtered_related;
		}
	}

	foreach ( array(
		'eyebrow' => 'rpd_instructor_related_eyebrow',
		'heading' => 'rpd_instructor_related_heading',
	) as $key => $field_name ) {
		$value = get_field( $field_name, $post_id );

		if ( is_string( $value ) && $value ) {
			$data['related'][ $key ] = $value;
		}
	}

	$data['related_experts'] = rocketpd_select_related_instructor_experts( $post_id, $slug, $data, $manual_related_experts, $fallback_related_experts );

	foreach ( array(
		'eyebrow'         => 'rpd_instructor_final_eyebrow',
		'headline'        => 'rpd_instructor_final_headline',
		'body'            => 'rpd_instructor_final_body',
		'primary_label'   => 'rpd_instructor_final_primary_label',
		'primary_href'    => 'rpd_instructor_final_primary_href',
		'secondary_label' => 'rpd_instructor_final_secondary_label',
		'secondary_href'  => 'rpd_instructor_final_secondary_href',
	) as $key => $field_name ) {
		$value = get_field( $field_name, $post_id );

		if ( is_string( $value ) && $value ) {
			$data['final_cta'][ $key ] = $value;
		}
	}

	foreach ( array(
		'heading'       => 'rpd_instructor_faq_heading',
		'help_text'     => 'rpd_instructor_faq_help_text',
		'contact_label' => 'rpd_instructor_faq_contact_label',
		'contact_url'   => 'rpd_instructor_faq_contact_url',
	) as $key => $field_name ) {
		$value = get_field( $field_name, $post_id );

		if ( is_string( $value ) && $value ) {
			$data['faq_intro'][ $key ] = $value;
		}
	}

	$faqs = get_field( 'rpd_instructor_faqs', $post_id );

	if ( is_array( $faqs ) && $faqs ) {
		$filtered_faqs = array();

		foreach ( $faqs as $faq ) {
			if ( ! empty( $faq['question'] ) && ! empty( $faq['answer'] ) ) {
				$filtered_faqs[] = $faq;
			}
		}

		if ( $filtered_faqs ) {
			$data['faqs'] = $filtered_faqs;
		}
	}

	return $data;
}

/**
 * Return the display first name for instructor section headings.
 *
 * @param string $name Instructor display name.
 * @return string
 */
function rocketpd_get_instructor_first_name( $name ) {
	$name = trim( (string) $name );

	if ( '' === $name ) {
		return '';
	}

	$name = preg_replace( '/^(Dr\.|Mr\.|Mrs\.|Ms\.)\s+/i', '', $name );
	$parts = preg_split( '/\s+/', trim( (string) $name ) );

	return $parts[0] ?? $name;
}

/**
 * Return true when a URL should open in a new tab.
 *
 * @param string $url URL.
 * @return bool
 */
function rocketpd_instructor_is_external_url( $url ) {
	if ( ! $url || 0 === strpos( $url, '#' ) || 0 === strpos( $url, '/' ) ) {
		return false;
	}

	$home_host = wp_parse_url( home_url(), PHP_URL_HOST );
	$url_host  = wp_parse_url( $url, PHP_URL_HOST );

	return $url_host && $home_host && $url_host !== $home_host;
}
