<?php
/**
 * Flexible page builder — randomizer and admin metabox.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* ============================================================
   SECTION HELPERS — shared across all template parts
   ============================================================ */

function rpd_hex_to_rgba( $hex, $opacity ) {
	$hex = ltrim( $hex, '#' );
	if ( 3 === strlen( $hex ) ) {
		$hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
	}
	list( $r, $g, $b ) = sscanf( $hex, '%02x%02x%02x' );
	return "rgba($r,$g,$b,$opacity)";
}

function rpd_flex_render_overlay( $args ) {
	if ( empty( $args['overlay_enabled'] ) ) {
		return;
	}

	$start   = $args['overlay_start'] ?? '#231f58';
	$end     = $args['overlay_end'] ?? '#5552b1';
	$opacity = floatval( $args['overlay_opacity'] ?? 0.25 );

	$gradient = 'linear-gradient(135deg,' . rpd_hex_to_rgba( $start, $opacity ) . ',' . rpd_hex_to_rgba( $end, $opacity ) . ')';
	echo '<span class="rpd-flex-overlay" aria-hidden="true" style="background:' . esc_attr( $gradient ) . '"></span>';
}

function rpd_flex_section_open( $layout_name, $args ) {
	$bg       = $args['bg'] ?? 'white';
	$padding  = $args['padding'] ?? 'normal';
	$is_image = ( 'image' === $bg );

	$classes = array(
		'rpd-flex-section',
		'rpd-flex-section--' . $layout_name,
		'rpd-flex-pad--' . $padding,
	);

	if ( ! $is_image ) {
		$classes[] = 'rpd-flex-bg--' . $bg;
	}

	$style = '';

	if ( $is_image ) {
		$bg_image_id = intval( $args['bg_image'] ?? 0 );
		if ( $bg_image_id ) {
			$bg_image_url = wp_get_attachment_image_url( $bg_image_id, 'full' );
			if ( $bg_image_url ) {
				$classes[] = 'rpd-flex-section--has-bg-image';
				if ( 'repeat' === ( $args['bg_image_size'] ?? 'cover' ) ) {
					$classes[] = 'rpd-flex-section--bg-repeat';
				}
				$style = ' style="background-image:url(\'' . esc_url( $bg_image_url ) . '\')"';
			}
		}
	}

	$scheme = $args['text_scheme'] ?? '';
	if ( 'light' === $scheme || 'dark' === $scheme ) {
		$classes[] = 'rpd-flex-scheme--' . $scheme;
	}

	$class_str = implode( ' ', array_map( 'sanitize_html_class', $classes ) );
	echo '<section class="' . $class_str . '"' . $style . '>';
	rpd_flex_render_overlay( $args );
}

function rpd_flex_section_close() {
	echo '</section>';
}

/* ============================================================
   CONTENT POOLS
   ============================================================ */

function rpd_flex_pools() {
	return array(

		'eyebrows' => array(
			'Professional Learning',
			'The RocketPD Difference',
			'Our Impact',
			'Why RocketPD',
			'Built for K–12',
			'Real Results',
			'What We Offer',
			'The Program',
			'By the Numbers',
			'Who We Serve',
		),

		'hero' => array(
			array( 'headline' => 'Great PD starts here.', 'highlight' => 'Great PD' ),
			array( 'headline' => 'Meet educators where they are.', 'highlight' => 'educators' ),
			array( 'headline' => 'Professional learning that actually works.', 'highlight' => 'actually works' ),
			array( 'headline' => 'Transform how your district does PD.', 'highlight' => 'Transform' ),
			array( 'headline' => "Stop wasting time on PD that doesn't stick.", 'highlight' => "doesn't stick" ),
			array( 'headline' => 'Better professional development starts with RocketPD.', 'highlight' => 'Better professional development' ),
			array( 'headline' => "PD that respects educators' time and expertise.", 'highlight' => "respects educators' time" ),
		),

		'hero_sub' => array(
			'A practical, research-backed experience designed for busy K–12 educators.',
			'Flexible, affordable professional development for teachers and staff.',
			'RocketPD helps schools and districts build lasting educator capacity.',
			'Live cohorts and on-demand courses built around how educators actually learn.',
			'Because great teachers deserve great professional development.',
		),

		'hero_cta' => array(
			array( 'text' => 'Explore Our Solutions', 'url' => '/solutions' ),
			array( 'text' => 'Book a Listening Session', 'url' => '/contact' ),
			array( 'text' => 'See What We Offer', 'url' => '/solutions' ),
			array( 'text' => 'Get Started', 'url' => '/contact' ),
			array( 'text' => 'Learn More', 'url' => '/solutions' ),
		),

		'stats' => array(
			array( 'value' => '94%', 'label' => 'of participants reported growth in instructional practice', 'source' => 'RocketPD Impact Report, 2024', 'source_url' => '' ),
			array( 'value' => '3×', 'label' => 'more cost-effective than traditional in-person PD', 'source' => '', 'source_url' => '' ),
			array( 'value' => '<$100', 'label' => 'per contact hour — a fraction of the industry average', 'source' => '', 'source_url' => '' ),
			array( 'value' => '200+', 'label' => 'educators served across the United States', 'source' => '', 'source_url' => '' ),
			array( 'value' => '98%', 'label' => 'satisfaction rate among school and district partners', 'source' => 'RocketPD Participant Survey', 'source_url' => '' ),
			array( 'value' => '40+', 'label' => 'hours of professional learning available on demand', 'source' => '', 'source_url' => '' ),
			array( 'value' => '12', 'label' => 'live cohort sessions per program cycle', 'source' => '', 'source_url' => '' ),
		),

		'cards' => array(
			array( 'icon' => 'rocket', 'heading' => 'Research-Backed', 'body' => 'Every experience is grounded in adult learning theory and classroom-tested strategies.' ),
			array( 'icon' => 'target', 'heading' => 'Practical Application', 'body' => 'Real tools and techniques educators can use the very next day.' ),
			array( 'icon' => 'lightbulb', 'heading' => 'Flexible Delivery', 'body' => 'Live virtual cohorts and on-demand video courses fit any schedule.' ),
			array( 'icon' => 'graduation-cap', 'heading' => 'Built for K–12', 'body' => 'Designed specifically for teachers, instructional coaches, and district leaders.' ),
			array( 'icon' => 'dollar-sign', 'heading' => 'Affordable Access', 'body' => 'Less than $100 per contact hour — savings you can pass on to students.' ),
			array( 'icon' => 'users', 'heading' => 'Ongoing Support', 'body' => 'Dedicated support from our team throughout the entire learning journey.' ),
			array( 'icon' => 'layers', 'heading' => 'Custom Fit', 'body' => "Tailored to your school or district's specific goals and improvement priorities." ),
			array( 'icon' => 'trending-up', 'heading' => 'Immediate Impact', 'body' => 'See results in teacher practice and student outcomes from day one.' ),
			array( 'icon' => 'compass', 'heading' => 'Evidence-Based', 'body' => 'Informed by the latest research in professional learning and instructional design.' ),
			array( 'icon' => 'globe', 'heading' => 'Fully Virtual', 'body' => 'No travel required. Connect with educators nationwide from anywhere.' ),
			array( 'icon' => 'clock', 'heading' => 'Time-Efficient', 'body' => 'Structured for busy schedules — no wasted hours, no filler sessions.' ),
			array( 'icon' => 'award', 'heading' => 'Expert Facilitators', 'body' => 'Led by experienced educators who understand the real demands of K–12 classrooms.' ),
		),

		'card_grid_headings' => array(
			'What makes RocketPD different',
			'Everything educators need to grow',
			'Why schools choose RocketPD',
			'Built for real learning',
			'The RocketPD experience',
		),

		'card_grid_layouts' => array(
			array( 'columns' => '3', 'count' => 3 ),
			array( 'columns' => '3', 'count' => 6 ),
			array( 'columns' => '2', 'count' => 4 ),
		),

		'text_image' => array(
			array( 'heading' => 'Why educators love RocketPD', 'body' => 'Our cohorts and courses are designed around how educators actually learn — collaboratively, practically, and on their own schedule.' ),
			array( 'heading' => 'Learning that fits your life', 'body' => "We know teachers are busy. RocketPD offers flexible learning experiences that fit into any workday without adding to the load." ),
			array( 'heading' => 'Built for the real classroom', 'body' => 'Every RocketPD experience translates directly into classroom practice. No fluff, no theory-without-application.' ),
			array( 'heading' => 'PD that pays for itself', 'body' => 'At less than $100 per contact hour, RocketPD is one of the most cost-effective professional development options available to K–12 schools.' ),
			array( 'heading' => 'Professional learning with purpose', 'body' => "We start by listening. Every program is shaped by your school or district's specific goals, challenges, and educator needs." ),
		),

		'text_image_cta' => array(
			array( 'text' => 'Learn More', 'url' => '/solutions' ),
			array( 'text' => 'See the Program', 'url' => '/empowered-educator' ),
			array( 'text' => 'Get in Touch', 'url' => '/contact' ),
			array( 'text' => '', 'url' => '' ),
		),

		'cta' => array(
			array( 'heading' => 'Ready to transform PD at your school or district?', 'subtext' => 'Schedule your 30-min. listening session today.' ),
			array( 'heading' => 'Want a better way to do professional development?', 'subtext' => "Let's talk about what RocketPD can do for your educators." ),
			array( 'heading' => "Let's build something great together.", 'subtext' => "Join educators across the country who've made the switch to RocketPD." ),
			array( 'heading' => 'Great PD is one conversation away.', 'subtext' => 'Book a free listening session with our team.' ),
		),

		'cta_primary' => array(
			array( 'text' => 'Book a Session', 'url' => '/contact' ),
			array( 'text' => 'Get Started', 'url' => '/solutions' ),
			array( 'text' => 'Schedule a Call', 'url' => '/contact' ),
		),

		'cta_secondary' => array(
			array( 'text' => 'Explore Solutions', 'url' => '/solutions' ),
			array( 'text' => 'View Our Programs', 'url' => '/solutions' ),
			array( 'text' => 'Learn More', 'url' => '/solutions' ),
		),

		'rich_text' => array(
			'<p>RocketPD offers professional learning experiences that are <strong>practical, research-backed, and designed for the real demands of K–12 education</strong>. From live virtual cohorts to on-demand video courses, we meet educators where they are.</p><ul><li>Grounded in adult learning theory</li><li>Facilitated by experienced K–12 educators</li><li>Flexible formats for any schedule and budget</li><li>Focused on transferable classroom strategies</li></ul>',
			"<p>The best professional development respects educators' time, expertise, and context. That's the standard RocketPD holds itself to with every program we design.</p><p><strong>Our programs are built around three core principles:</strong></p><ul><li><strong>Empower</strong> — Create time and headspace for strategic thinking</li><li><strong>Immerse</strong> — Foster collaboration and practical application</li><li><strong>Achieve</strong> — Develop a custom plan tied to real organizational goals</li></ul>",
			'<p>Professional development doesn\'t have to be expensive or exhausting. With RocketPD, school and district leaders get <strong>high-quality learning experiences at a fraction of the cost</strong> of traditional in-person PD — without sacrificing depth, rigor, or results.</p>',
		),

	);
}

/* ============================================================
   HELPERS
   ============================================================ */

function rpd_flex_pick( $arr ) {
	return $arr[ array_rand( $arr ) ];
}

function rpd_flex_pick_n( $arr, $n ) {
	$keys = array_rand( $arr, min( $n, count( $arr ) ) );
	if ( ! is_array( $keys ) ) {
		$keys = array( $keys );
	}
	return array_values( array_intersect_key( $arr, array_flip( $keys ) ) );
}

/* ============================================================
   SECTION BUILDERS
   ============================================================ */

function rpd_flex_build_hero( $p ) {
	$pair = rpd_flex_pick( $p['hero'] );
	$cta  = rpd_flex_pick( $p['hero_cta'] );

	return array(
		'acf_fc_layout' => 'hero',
		'bg'            => 'navy',
		'padding'       => 'large',
		'eyebrow'       => rpd_flex_pick( $p['eyebrows'] ),
		'headline'      => $pair['headline'],
		'highlight'     => $pair['highlight'],
		'subtext'       => rpd_flex_pick( $p['hero_sub'] ),
		'cta_text'      => $cta['text'],
		'cta_url'       => $cta['url'],
	);
}

function rpd_flex_build_card_grid( $bg, $p ) {
	$option = rpd_flex_pick( $p['card_grid_layouts'] );
	$cards  = rpd_flex_pick_n( $p['cards'], $option['count'] );

	return array(
		'acf_fc_layout' => 'card-grid',
		'bg'            => $bg,
		'padding'       => 'normal',
		'eyebrow'       => rpd_flex_pick( $p['eyebrows'] ),
		'heading'       => rpd_flex_pick( $p['card_grid_headings'] ),
		'columns'       => $option['columns'],
		'cards'         => $cards,
	);
}

function rpd_flex_build_stats_strip( $bg, $p ) {
	$stats = rpd_flex_pick_n( $p['stats'], rand( 2, 3 ) );

	return array(
		'acf_fc_layout' => 'stats-strip',
		'bg'            => $bg,
		'padding'       => 'normal',
		'eyebrow'       => rpd_flex_pick( array( 'Our Impact', 'Real Results', 'By the Numbers', 'The Difference We Make' ) ),
		'heading'       => '',
		'stats'         => $stats,
	);
}

function rpd_flex_build_text_image( $bg, $p ) {
	$pair = rpd_flex_pick( $p['text_image'] );
	$cta  = rpd_flex_pick( $p['text_image_cta'] );

	return array(
		'acf_fc_layout'  => 'text-image',
		'bg'             => $bg,
		'padding'        => 'normal',
		'image_position' => rpd_flex_pick( array( 'left', 'right' ) ),
		'heading'        => $pair['heading'],
		'body'           => $pair['body'],
		'cta_text'       => $cta['text'],
		'cta_url'        => $cta['url'],
		'image'          => 0,
	);
}

function rpd_flex_build_rich_text( $bg, $p ) {
	return array(
		'acf_fc_layout' => 'rich-text',
		'bg'            => $bg,
		'padding'       => 'normal',
		'content'       => rpd_flex_pick( $p['rich_text'] ),
	);
}

function rpd_flex_build_cta( $p ) {
	$pair      = rpd_flex_pick( $p['cta'] );
	$primary   = rpd_flex_pick( $p['cta_primary'] );
	$secondary = rpd_flex_pick( $p['cta_secondary'] );

	return array(
		'acf_fc_layout'    => 'cta-band',
		'bg'               => rpd_flex_pick( array( 'navy', 'purple' ) ),
		'padding'          => 'normal',
		'eyebrow'          => rpd_flex_pick( array( 'Get Started', 'Ready?', 'Let\'s Talk' ) ),
		'heading'          => $pair['heading'],
		'subtext'          => $pair['subtext'],
		'primary_cta_text' => $primary['text'],
		'primary_cta_url'  => $primary['url'],
		'secondary_cta_text' => $secondary['text'],
		'secondary_cta_url'  => $secondary['url'],
	);
}

/* ============================================================
   MAIN RANDOMIZER
   ============================================================ */

function rpd_flex_build_random_sections() {
	$p = rpd_flex_pools();

	$dark_bgs  = array( 'navy', 'purple' );
	$light_bgs = array( 'white', 'soft' );

	// Middle section pool — shuffle, pick 2–4
	$middle_pool = array( 'card-grid', 'stats-strip', 'text-image', 'rich-text' );
	shuffle( $middle_pool );
	$middle_layouts = array_slice( $middle_pool, 0, rand( 2, 4 ) );

	// Build sections: hero always first, CTA always last, middles alternate dark/light
	$sections  = array();
	$sections[] = rpd_flex_build_hero( $p );

	$last_dark = true; // hero is dark
	foreach ( $middle_layouts as $layout ) {
		$is_dark = ! $last_dark;
		$bg      = $is_dark ? rpd_flex_pick( $dark_bgs ) : rpd_flex_pick( $light_bgs );

		switch ( $layout ) {
			case 'card-grid':
				$sections[] = rpd_flex_build_card_grid( $bg, $p );
				break;
			case 'stats-strip':
				$sections[] = rpd_flex_build_stats_strip( $bg, $p );
				break;
			case 'text-image':
				$sections[] = rpd_flex_build_text_image( $bg, $p );
				break;
			case 'rich-text':
				$sections[] = rpd_flex_build_rich_text( $bg, $p );
				break;
		}

		$last_dark = $is_dark;
	}

	$sections[] = rpd_flex_build_cta( $p );

	return $sections;
}

/* ============================================================
   AJAX HANDLER
   ============================================================ */

function rpd_flex_randomize_ajax() {
	check_ajax_referer( 'rpd_flex_randomize', 'nonce' );

	if ( ! current_user_can( 'edit_posts' ) ) {
		wp_send_json_error( 'Unauthorized' );
	}

	$post_id = intval( $_POST['post_id'] ?? 0 );

	if ( ! $post_id || 'page' !== get_post_type( $post_id ) ) {
		wp_send_json_error( 'Invalid post' );
	}

	$sections = rpd_flex_build_random_sections();
	update_field( 'rpd_flex_sections', $sections, $post_id );

	wp_send_json_success( array(
		'redirect' => get_edit_post_link( $post_id, 'url' ),
	) );
}
add_action( 'wp_ajax_rpd_flex_randomize', 'rpd_flex_randomize_ajax' );

/* ============================================================
   METABOX
   ============================================================ */

function rpd_flex_register_metabox() {
	add_meta_box(
		'rpd-flex-randomizer',
		'Page Builder',
		'rpd_flex_render_metabox',
		'page',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'rpd_flex_register_metabox' );

function rpd_flex_render_metabox( $post ) {
	$is_flex = 'page-templates/template-flexible.php' === get_post_meta( $post->ID, '_wp_page_template', true );

	if ( ! $is_flex ) {
		echo '<p style="color:#666;font-size:0.82em;margin:0">Select the <strong>RocketPD Flexible Page</strong> template to use the page builder tools.</p>';
		return;
	}
	?>
	<p style="margin:0 0 0.6rem;color:#666;font-size:0.82em;line-height:1.5">Fills this page with a random set of sections and RocketPD placeholder content. <strong>Existing sections will be replaced.</strong></p>
	<button type="button" id="rpd-flex-randomize-btn" class="button button-primary" style="width:100%">
		Generate Randomized Page
	</button>
	<?php
}

/* ============================================================
   ADMIN SCRIPT
   ============================================================ */

function rpd_flex_admin_enqueue( $hook ) {
	if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
		return;
	}

	$post_id = intval( $_GET['post'] ?? 0 );

	if ( ! $post_id ) {
		return;
	}

	if ( 'page-templates/template-flexible.php' !== get_post_meta( $post_id, '_wp_page_template', true ) ) {
		return;
	}

	$js_path = get_template_directory() . '/assets/js/flexible-admin.js';

	wp_enqueue_script(
		'rpd-flex-admin',
		get_template_directory_uri() . '/assets/js/flexible-admin.js',
		array( 'jquery' ),
		file_exists( $js_path ) ? filemtime( $js_path ) : null,
		true
	);

	wp_localize_script(
		'rpd-flex-admin',
		'rpd_flex_admin',
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce'    => wp_create_nonce( 'rpd_flex_randomize' ),
			'post_id'  => $post_id,
		)
	);
}
add_action( 'admin_enqueue_scripts', 'rpd_flex_admin_enqueue' );
