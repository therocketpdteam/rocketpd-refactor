<?php
/**
 * LaunchPad instructors.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_lp_get_field( 'lp_instructors_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_eyebrow      = __( 'Meet Your Instructors', 'rocketpd' );
$default_h2           = __( "Learn from K–12's Most Trusted Voices.", 'rocketpd' );
$default_intro        = __( 'Every LaunchPad course is led by a nationally recognized educator, author, or K–12 leader — so your team learns from the voices already shaping the field.', 'rocketpd' );
$default_all          = array( 'title' => __( 'See all instructors', 'rocketpd' ), 'url' => home_url( '/instructors/' ) );
$fallback_instructors = array(
	array( 'image' => 'inst-barnett.png',   'focus' => 'Individualized Instruction',      'name' => 'Robert Barnett',          'desc' => "Redesigning instruction to meet every learner's needs (with Modern Classrooms Project)." ),
	array( 'image' => 'inst-brown.png',     'focus' => 'School Culture & Engagement',     'name' => 'Dr. Luvelle Brown',       'desc' => "Create a 'Culture of Love' that supports the needs of every learner." ),
	array( 'image' => 'inst-constantino.png', 'focus' => 'Family Engagement',             'name' => 'Dr. Steve Constantino',   'desc' => '5 Simple Principles to engage parents in the academic lives of their children.' ),
	array( 'image' => 'inst-estill.png',    'focus' => 'Reading Instruction',              'name' => 'Beth P. Estill',          'desc' => 'Identify and address learning gaps with personalized reading instruction.' ),
	array( 'image' => 'inst-gonzalez.jpeg', 'focus' => 'Teaching Efficacy',               'name' => 'Jennifer Gonzalez',       'desc' => 'Fine-tune your lessons with the fundamentals.', 'is_new' => true ),
	array( 'image' => 'inst-hinojosa.png',  'focus' => 'School Leadership',               'name' => 'Dr. Michael Hinojosa',    'desc' => 'Identify and manage talent while navigating school politics.' ),
	array( 'image' => 'inst-juliani.png',   'focus' => 'AI & Technology',                 'name' => 'A.J. Juliani',            'desc' => 'Use A.I. to make learning real and relevant for students now and in the future.', 'url' => '/instructors/aj-juliani/' ),
	array( 'image' => 'inst-marshall.png',  'focus' => 'Teacher Evaluation',              'name' => 'Kim Marshall',            'desc' => "Drive efficiencies and staff engagement through 'mini-observations.'" ),
	array( 'image' => 'inst-philibert.png', 'focus' => 'Adult Well-Being & Retention',   'name' => 'Carla Tantillo Philibert', 'desc' => 'Empower teachers and staff to advocate for their personal and professional needs.' ),
	array( 'image' => 'inst-sopher.png',    'focus' => 'School Communications',           'name' => 'Veronica V. Sopher',      'desc' => 'Build trust and address sensitive topics with parents and community members.' ),
	array( 'image' => 'inst-tucker.png',    'focus' => 'UDL & Blended Learning',          'name' => 'Dr. Catlin Tucker',       'desc' => 'Use blended-learning models to put students at the center of their academic journey.' ),
);

if ( 'custom' === $mode ) {
	$eyebrow      = rocketpd_lp_get_field( 'instructors_eyebrow', $default_eyebrow );
	$h2           = rocketpd_lp_get_field( 'instructors_h2', $default_h2 );
	$intro        = rocketpd_lp_get_field( 'instructors_intro', $default_intro );
	$all          = rocketpd_lp_get_field( 'instructors_all_link', $default_all );
	$acf_instr    = rocketpd_lp_get_field( 'instructors', null );
	$has_name     = false;
	if ( is_array( $acf_instr ) ) {
		foreach ( $acf_instr as $row ) {
			if ( is_array( $row ) && ! empty( $row['name'] ) ) {
				$has_name = true;
				break;
			}
		}
	}
	$instructors = $has_name ? $acf_instr : $fallback_instructors;
} else {
	$eyebrow     = $default_eyebrow;
	$h2          = $default_h2;
	$intro       = $default_intro;
	$all         = $default_all;
	$instructors = $fallback_instructors;
}
?>
<section class="rpd-lp-section rpd-lp-instructors">
	<div class="rpd-container">
		<header class="rpd-lp-instructors__header"><div><p class="rpd-lp-eyebrow"><?php echo esc_html( $eyebrow ); ?></p><h2><?php echo esc_html( $h2 ); ?></h2><p><?php echo esc_html( $intro ); ?></p></div><a href="<?php echo esc_url( $all['url'] ?? home_url( '/instructors/' ) ); ?>"><?php echo esc_html( $all['title'] ?? __( 'See all instructors', 'rocketpd' ) ); ?> →</a></header>
		<div class="rpd-lp-instructor-grid">
			<?php foreach ( $instructors as $instructor ) : ?>
				<a href="<?php echo esc_url( $instructor['url'] ?? home_url( '/instructors/' . sanitize_title( $instructor['name'] ?? '' ) . '/' ) ); ?>" class="rpd-lp-instructor-card">
					<div class="rpd-lp-instructor-card__image"><img src="<?php echo esc_url( rocketpd_lp_image_url( $instructor['image'] ?? '', rocketpd_lp_asset( $instructor['image'] ?? 'inst-barnett.png' ) ) ); ?>" alt="<?php echo esc_attr( $instructor['name'] ?? '' ); ?>"><?php if ( ! empty( $instructor['is_new'] ) ) : ?><span><?php esc_html_e( 'New', 'rocketpd' ); ?></span><?php endif; ?><b><?php rocketpd_lp_icon( 'play' ); ?><?php esc_html_e( 'Watch trailer', 'rocketpd' ); ?><small><?php echo esc_html( $instructor['meta'] ?? '5 modules · 1 hr' ); ?></small></b></div>
					<p><?php echo esc_html( $instructor['focus'] ?? '' ); ?></p><h3><?php echo esc_html( $instructor['name'] ?? '' ); ?></h3><span><?php echo esc_html( $instructor['desc'] ?? '' ); ?></span>
				</a>
			<?php endforeach; ?>
			<article class="rpd-lp-instructor-more"><h3><?php esc_html_e( '+ More courses coming soon', 'rocketpd' ); ?></h3><p><?php esc_html_e( 'Explore the full library of nationally recognized instructors', 'rocketpd' ); ?></p><a class="rpd-lp-btn rpd-lp-btn--gold" href="<?php echo esc_url( $all['url'] ?? home_url( '/instructors/' ) ); ?>"><?php esc_html_e( 'See all instructors', 'rocketpd' ); ?></a></article>
		</div>
	</div>
</section>
