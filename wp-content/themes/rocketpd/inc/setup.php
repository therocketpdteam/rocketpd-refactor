<?php
/**
 * Theme setup.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Configure core theme support.
 */
function rocketpd_setup() {
	load_theme_textdomain( 'rocketpd', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form', 'script', 'style' ) );

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'rocketpd' ),
			'footer'  => esc_html__( 'Footer Menu', 'rocketpd' ),
		)
	);
}
add_action( 'after_setup_theme', 'rocketpd_setup' );

/**
 * Register the instructor seeding admin action.
 * Adds a 'Seed Instructors' button to the Instructors list table.
 */
function rocketpd_register_instructor_seed_action() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// Handle the seed action.
	if (
		isset( $_GET['action'] ) &&
		'rocketpd_seed_instructors' === $_GET['action'] &&
		check_admin_referer( 'rocketpd_seed_instructors' )
	) {
		rocketpd_seed_instructor_posts();
		wp_redirect( add_query_arg(
			array(
				'post_type' => 'instructor',
				'seeded'    => '1',
			),
			admin_url( 'edit.php' )
		) );
		exit;
	}
}
add_action( 'admin_init', 'rocketpd_register_instructor_seed_action' );

/**
 * Add 'Seed Instructors' button above the Instructors list table.
 */
function rocketpd_instructor_seed_button() {
	$screen = get_current_screen();

	if ( ! $screen || 'edit-instructor' !== $screen->id ) {
		return;
	}

	$url = wp_nonce_url(
		add_query_arg(
			array(
				'post_type' => 'instructor',
				'action'    => 'rocketpd_seed_instructors',
			),
			admin_url( 'edit.php' )
		),
		'rocketpd_seed_instructors'
	);

	$seeded = isset( $_GET['seeded'] ) && '1' === $_GET['seeded'];

	?>
	<div class="wrap" style="margin-bottom: -10px;">
		<?php if ( $seeded ) : ?>
			<div class="notice notice-success is-dismissible"><p><?php esc_html_e( 'Instructors seeded successfully.', 'rocketpd' ); ?></p></div>
		<?php endif; ?>
		<a href="<?php echo esc_url( $url ); ?>" class="button button-primary" style="margin: 10px 0;">
			<?php esc_html_e( 'Initialize Instructor Posts', 'rocketpd' ); ?>
		</a>
	</div>
	<?php
}
// add_action( 'all_admin_notices', 'rocketpd_instructor_seed_button' );

/**
 * Seed instructor posts from the roster.
 * Only creates posts that don't already exist.
 * Does not recreate trashed or deleted posts.
 */
function rocketpd_seed_instructor_posts() {
	if ( ! function_exists( 'rocketpd_get_instructors' ) ) {
		return;
	}

	$instructors = rocketpd_get_instructors();

	foreach ( $instructors as $instructor ) {
		$slug = isset( $instructor['slug'] ) ? sanitize_title( $instructor['slug'] ) : '';

		if ( ! $slug ) {
			continue;
		}

		// Only seed instructors flagged for seeding.
		if ( empty( $instructor['seeded'] ) ) {
			continue;
		}

		// Check if a post with this slug already exists (including trashed).
		// WordPress appends __trashed to post_name on trash, so check both.
		$existing = get_posts( array(
			'name'             => $slug,
			'post_type'        => 'instructor',
			'post_status'      => array( 'publish', 'draft', 'pending', 'private' ),
			'numberposts'      => 1,
			'suppress_filters' => true,
		) );

		if ( ! $existing ) {
			$existing = get_posts( array(
				'name'             => $slug . '__trashed',
				'post_type'        => 'instructor',
				'post_status'      => array( 'trash' ),
				'numberposts'      => 1,
				'suppress_filters' => true,
			) );
		}

		if ( $existing ) {
			// If resync is flagged, re-populate ACF fields for this post.
			if ( ! empty( $instructor['resync'] ) ) {
				rocketpd_seed_instructor_acf_fields( $existing[0]->ID, $slug );
			}
			continue;
		}

		$post_id = wp_insert_post(
			array(
				'post_title'  => $instructor['name'] ?? $slug,
				'post_name'   => $slug,
				'post_type'   => 'instructor',
				'post_status' => 'publish',
			)
		);

		if ( $post_id && ! is_wp_error( $post_id ) ) {
			rocketpd_seed_instructor_acf_fields( $post_id, $slug );
		}
	}
}

/**
 * Populate ACF fields for an instructor post from seed data.
 *
 * @param int    $post_id WordPress post ID.
 * @param string $slug    Instructor slug.
 */
/**
 * Seed ACF fields for a new topic_hub post with the default fallback data.
 * Fires on first save only — skips if fields are already populated.
 *
 * @param int $post_id Post ID.
 */
function rocketpd_seed_topic_acf_fields( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( 'topic_hub' !== get_post_type( $post_id ) ) {
		return;
	}

	if ( ! function_exists( 'update_field' ) || ! function_exists( 'get_field' ) ) {
		return;
	}

	if ( ! function_exists( 'rocketpd_get_topic_detail_fallback' ) ) {
		return;
	}

	// Only seed if the title field is empty — proxy for "never been populated".
	if ( get_field( 'rpd_topic_detail_title', $post_id ) ) {
		return;
	}

	$d = rocketpd_get_topic_detail_fallback();

	if ( empty( $d ) ) {
		return;
	}

	// Hero.
	update_field( 'rpd_topic_detail_title', $d['title'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_badge', $d['badge'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_category', $d['category'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_subtitle', $d['subtitle'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_primary_cta_label', $d['primaryCta']['label'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_primary_cta_url', $d['primaryCta']['href'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_secondary_cta_label', $d['secondaryCta']['label'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_secondary_cta_url', $d['secondaryCta']['href'] ?? '', $post_id );

	// Overview.
	$overview = $d['overview'] ?? array();
	update_field( 'rpd_topic_detail_overview_headline', $overview['headline'] ?? '', $post_id );

	if ( ! empty( $overview['intro'] ) ) {
		$intro_rows = array_map( function( $p ) { return array( 'paragraph' => $p ); }, $overview['intro'] );
		update_field( 'rpd_topic_detail_overview_intro', $intro_rows, $post_id );
	}

	if ( ! empty( $overview['takeaways'] ) ) {
		$takeaway_rows = array_map( function( $t ) { return array( 'text' => $t ); }, $overview['takeaways'] );
		update_field( 'rpd_topic_detail_key_takeaways', $takeaway_rows, $post_id );
	}

	if ( ! empty( $overview['sideStats'] ) ) {
		update_field( 'rpd_topic_detail_side_stats', $overview['sideStats'], $post_id );
	}

	// Why This Matters.
	if ( ! empty( $d['whyMatters'] ) ) {
		update_field( 'rpd_topic_detail_why_matters', $d['whyMatters'], $post_id );
	}

	// Resources.
	if ( ! empty( $d['resources'] ) ) {
		update_field( 'rpd_topic_detail_resources', $d['resources'], $post_id );
	}

	// Opportunities.
	if ( ! empty( $d['opportunities'] ) ) {
		update_field( 'rpd_topic_detail_opportunities', $d['opportunities'], $post_id );
	}

	// Frameworks.
	if ( ! empty( $d['frameworks'] ) ) {
		update_field( 'rpd_topic_detail_frameworks', $d['frameworks'], $post_id );
	}

	// FAQs.
	if ( ! empty( $d['faqs'] ) ) {
		update_field( 'rpd_topic_detail_faqs', $d['faqs'], $post_id );
	}

	// Featured Expert.
	$expert = $d['featuredExpert'] ?? array();
	update_field( 'rpd_topic_detail_expert_name', $expert['name'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_expert_title', $expert['title'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_expert_image', $expert['image'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_expert_quote', $expert['quote'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_expert_bio', $expert['bio'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_expert_linkedin', $expert['linkedin'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_expert_website', $expert['website'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_expert_profile_href', $expert['profileHref'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_expert_cohort_href', $expert['cohortHref'] ?? '', $post_id );

	if ( ! empty( $overview['sections'] ) ) {
		$section_rows = array_map( function( $s ) {
			$body = is_array( $s['body'] ?? null ) ? implode( "\n\n", $s['body'] ) : ( $s['body'] ?? '' );
			return array(
				'heading'           => $s['heading'] ?? '',
				'body'              => $body,
				'callout_title'     => $s['callout']['title'] ?? '',
				'callout_body'      => $s['callout']['body'] ?? '',
				'callout_icon'      => $s['callout']['icon'] ?? '',
				'quote_text'        => $s['quote']['text'] ?? '',
				'quote_attribution' => $s['quote']['attribution'] ?? '',
			);
		}, $overview['sections'] );
		update_field( 'rpd_topic_detail_overview_sections', $section_rows, $post_id );
	}

	// Final CTA.
	$cta = $d['finalCta'] ?? array();
	update_field( 'rpd_topic_detail_final_headline', $cta['headline'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_final_body', $cta['body'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_final_primary_label', $cta['primaryLabel'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_final_primary_url', $cta['primaryHref'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_final_secondary_label', $cta['secondaryLabel'] ?? '', $post_id );
	update_field( 'rpd_topic_detail_final_secondary_url', $cta['secondaryHref'] ?? '', $post_id );
}
add_action( 'save_post', 'rocketpd_seed_topic_acf_fields' );

/**
 * Populate ACF fields for an instructor post from seed data.
 *
 * @param int    $post_id WordPress post ID.
 * @param string $slug    Instructor slug.
 */
function rocketpd_seed_instructor_acf_fields( $post_id, $slug ) {
	if ( ! function_exists( 'update_field' ) || ! function_exists( 'rocketpd_get_instructor_detail_defaults' ) ) {
		return;
	}

	$detail = rocketpd_get_instructor_detail_defaults( $slug );

	if ( empty( $detail ) ) {
		return;
	}

	// Identity.
	update_field( 'rpd_instructor_name', $detail['name'] ?? '', $post_id );
	update_field( 'rpd_instructor_authority', $detail['authority'] ?? '', $post_id );
	update_field( 'rpd_instructor_tags', implode( "\n", (array) ( $detail['tags'] ?? array() ) ), $post_id );

	// Hero.
	$hero = $detail['hero'] ?? array();
	update_field( 'rpd_instructor_hero_eyebrow', $hero['eyebrow'] ?? '', $post_id );
	update_field( 'rpd_instructor_hero_primary_label', $hero['primary_label'] ?? '', $post_id );
	update_field( 'rpd_instructor_hero_primary_href', $hero['primary_href'] ?? '', $post_id );
	update_field( 'rpd_instructor_hero_secondary_label', $hero['secondary_label'] ?? '', $post_id );
	update_field( 'rpd_instructor_hero_secondary_href', $hero['secondary_href'] ?? '', $post_id );
	update_field( 'rpd_instructor_hero_award', $hero['award'] ?? '', $post_id );

	// Stats.
	if ( ! empty( $detail['stats'] ) && is_array( $detail['stats'] ) ) {
		update_field( 'rpd_instructor_stats', $detail['stats'], $post_id );
	}

	// Follow links.
	$follow = $detail['follow'] ?? array();
	update_field( 'rpd_instructor_linkedin_url', $follow['linkedin'] ?? '', $post_id );
	update_field( 'rpd_instructor_twitter_url', $follow['twitter'] ?? '', $post_id );
	update_field( 'rpd_instructor_website_url', $follow['website'] ?? '', $post_id );

	// Bio / Authority.
	$bio = $detail['bio'] ?? array();
	update_field( 'rpd_instructor_bio_eyebrow', $bio['eyebrow'] ?? '', $post_id );
	update_field( 'rpd_instructor_bio_heading', $bio['heading'] ?? '', $post_id );
	update_field( 'rpd_instructor_bio_paragraphs', implode( "\n\n", (array) ( $bio['paragraphs'] ?? array() ) ), $post_id );
	update_field( 'rpd_instructor_focus_areas', implode( "\n", (array) ( $bio['focus'] ?? array() ) ), $post_id );

	// Guide.
	$guide = $detail['guide'] ?? array();
	update_field( 'rpd_instructor_guide_enabled', ! empty( $guide['enabled'] ) ? 1 : 0, $post_id );
	update_field( 'rpd_instructor_guide_title', $guide['title'] ?? '', $post_id );
	update_field( 'rpd_instructor_guide_summary', $guide['summary'] ?? '', $post_id );
	update_field( 'rpd_instructor_guide_meta', $guide['meta'] ?? '', $post_id );
	update_field( 'rpd_instructor_guide_href', $guide['href'] ?? '', $post_id );
	update_field( 'rpd_instructor_guide_deliverables', implode( "\n", (array) ( $guide['deliverables'] ?? array() ) ), $post_id );

	// Podcast.
	$podcast = $detail['podcast'] ?? array();
	update_field( 'rpd_instructor_podcast_enabled', ! empty( $podcast['enabled'] ) ? 1 : 0, $post_id );
	update_field( 'rpd_instructor_podcast_title', $podcast['title'] ?? '', $post_id );
	update_field( 'rpd_instructor_podcast_summary', $podcast['summary'] ?? '', $post_id );
	update_field( 'rpd_instructor_podcast_meta', $podcast['meta'] ?? '', $post_id );
	update_field( 'rpd_instructor_podcast_embed_id', $podcast['embed_id'] ?? '', $post_id );
	update_field( 'rpd_instructor_podcast_href', $podcast['href'] ?? '', $post_id );

	// Webinar.
	$webinar = $detail['webinar'] ?? array();
	update_field( 'rpd_instructor_webinar_enabled', ! empty( $webinar['enabled'] ) ? 1 : 0, $post_id );
	update_field( 'rpd_instructor_webinar_title', $webinar['title'] ?? '', $post_id );
	update_field( 'rpd_instructor_webinar_summary', $webinar['summary'] ?? '', $post_id );
	update_field( 'rpd_instructor_webinar_meta', $webinar['meta'] ?? '', $post_id );
	update_field( 'rpd_instructor_webinar_embed_id', $webinar['embed_id'] ?? '', $post_id );
	update_field( 'rpd_instructor_webinar_href', $webinar['href'] ?? '', $post_id );

	// Offerings — LaunchPad.
	$lp = $detail['offerings']['launchpad'] ?? array();
	update_field( 'rpd_instructor_launchpad_enabled', ! empty( $lp['enabled'] ) ? 1 : 0, $post_id );
	update_field( 'rpd_instructor_launchpad_title', $lp['title'] ?? '', $post_id );
	update_field( 'rpd_instructor_launchpad_price', $lp['price'] ?? '', $post_id );
	update_field( 'rpd_instructor_launchpad_bullets', implode( "\n", (array) ( $lp['bullets'] ?? array() ) ), $post_id );
	update_field( 'rpd_instructor_launchpad_href', $lp['href'] ?? '', $post_id );
	update_field( 'rpd_instructor_launchpad_cta', $lp['cta'] ?? '', $post_id );

	// Offerings — Cohort.
	$cohort = $detail['offerings']['cohort'] ?? array();
	update_field( 'rpd_instructor_cohort_enabled', ! empty( $cohort['enabled'] ) ? 1 : 0, $post_id );
	update_field( 'rpd_instructor_cohort_title', $cohort['title'] ?? '', $post_id );
	update_field( 'rpd_instructor_cohort_price', $cohort['price'] ?? '', $post_id );
	update_field( 'rpd_instructor_cohort_bullets', implode( "\n", (array) ( $cohort['bullets'] ?? array() ) ), $post_id );
	update_field( 'rpd_instructor_cohort_href', $cohort['href'] ?? '', $post_id );
	update_field( 'rpd_instructor_cohort_cta', $cohort['cta'] ?? '', $post_id );

	// Offerings — Workshop.
	$workshop = $detail['offerings']['workshop'] ?? array();
	update_field( 'rpd_instructor_workshop_enabled', ! empty( $workshop['enabled'] ) ? 1 : 0, $post_id );
	update_field( 'rpd_instructor_workshop_title', $workshop['title'] ?? '', $post_id );
	update_field( 'rpd_instructor_workshop_price', $workshop['price'] ?? '', $post_id );
	update_field( 'rpd_instructor_workshop_bullets', implode( "\n", (array) ( $workshop['bullets'] ?? array() ) ), $post_id );
	update_field( 'rpd_instructor_workshop_href', $workshop['href'] ?? '', $post_id );
	update_field( 'rpd_instructor_workshop_cta', $workshop['cta'] ?? '', $post_id );

	// Trust.
	$trust = $detail['trust'] ?? array();
	update_field( 'rpd_instructor_trust_quote', $trust['quote'] ?? '', $post_id );
	update_field( 'rpd_instructor_trust_person', $trust['person'] ?? '', $post_id );
	update_field( 'rpd_instructor_trust_attribution', $trust['attribution'] ?? '', $post_id );
	update_field( 'rpd_instructor_trust_headline', $trust['headline'] ?? '', $post_id );
	update_field( 'rpd_instructor_trust_body', $trust['body'] ?? '', $post_id );
	if ( ! empty( $trust['stats'] ) && is_array( $trust['stats'] ) ) {
		update_field( 'rpd_instructor_trust_stats', $trust['stats'], $post_id );
	}

	// Final CTA.
	$cta = $detail['final_cta'] ?? array();
	update_field( 'rpd_instructor_final_eyebrow', $cta['eyebrow'] ?? '', $post_id );
	update_field( 'rpd_instructor_final_headline', $cta['headline'] ?? '', $post_id );
	update_field( 'rpd_instructor_final_body', $cta['body'] ?? '', $post_id );
	update_field( 'rpd_instructor_final_primary_label', $cta['primary_label'] ?? '', $post_id );
	update_field( 'rpd_instructor_final_primary_href', $cta['primary_href'] ?? '', $post_id );
	update_field( 'rpd_instructor_final_secondary_label', $cta['secondary_label'] ?? '', $post_id );
	update_field( 'rpd_instructor_final_secondary_href', $cta['secondary_href'] ?? '', $post_id );

	// FAQs.
	if ( ! empty( $detail['faqs'] ) && is_array( $detail['faqs'] ) ) {
		update_field( 'rpd_instructor_faqs', $detail['faqs'], $post_id );
	}
}
