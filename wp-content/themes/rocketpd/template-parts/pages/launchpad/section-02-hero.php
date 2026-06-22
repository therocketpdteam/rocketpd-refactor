<?php
/**
 * LaunchPad hero.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_lp_get_field( 'lp_hero_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_primary   = array( 'title' => __( 'Explore LaunchPad', 'rocketpd' ), 'url' => '#explore' );
$default_secondary = array( 'title' => __( 'See It In Action', 'rocketpd' ), 'url' => '#launchpad-demo' );
$default_eyebrow   = __( 'RocketPD LaunchPad', 'rocketpd' );
$default_h1        = __( 'LaunchPad', 'rocketpd' );
$default_subhead   = __( 'The Professional Learning System for Educator Growth', 'rocketpd' );
$default_body      = __( 'LaunchPad helps districts move beyond disconnected professional development — giving teams one place to access high-quality learning, support educator growth, and turn professional learning into meaningful outcomes.', 'rocketpd' );
$default_url_chip  = 'app.rocketpd.com/dashboard';
$default_image     = rocketpd_lp_asset( 'teacher-1.jpg' );

if ( 'custom' === $mode ) {
	$primary   = rocketpd_lp_get_field( 'hero_cta_primary', $default_primary );
	$secondary = rocketpd_lp_get_field( 'hero_cta_secondary', $default_secondary );
	$eyebrow   = rocketpd_lp_get_field( 'hero_eyebrow', $default_eyebrow );
	$h1        = rocketpd_lp_get_field( 'hero_h1', $default_h1 );
	$subhead   = rocketpd_lp_get_field( 'hero_subhead', $default_subhead );
	$body      = rocketpd_lp_get_field( 'hero_body', $default_body );
	$url_chip  = rocketpd_lp_get_field( 'hero_url_chip', $default_url_chip );
	$image     = rocketpd_lp_image_url( rocketpd_lp_get_field( 'hero_image', '' ), $default_image );
} else {
	$primary   = $default_primary;
	$secondary = $default_secondary;
	$eyebrow   = $default_eyebrow;
	$h1        = $default_h1;
	$subhead   = $default_subhead;
	$body      = $default_body;
	$url_chip  = $default_url_chip;
	$image     = $default_image;
}
?>

<section class="rpd-lp-hero">
	<div class="rpd-lp-orb rpd-lp-orb--one"></div>
	<div class="rpd-lp-orb rpd-lp-orb--two"></div>
	<div class="rpd-container rpd-lp-hero__grid">
		<div class="rpd-lp-hero__copy">
			<p class="rpd-lp-pill rpd-lp-pill--gold"><?php rocketpd_lp_icon( 'zap' ); ?><?php echo esc_html( $eyebrow ); ?></p>
			<h1><?php echo esc_html( $h1 ); ?></h1>
			<p class="rpd-lp-hero__subhead"><?php echo esc_html( $subhead ); ?></p>
			<p class="rpd-lp-hero__body"><?php echo esc_html( $body ); ?></p>
			<div class="rpd-lp-actions">
				<a class="rpd-lp-btn rpd-lp-btn--gold" href="<?php echo esc_url( $primary['url'] ?? '#explore' ); ?>"><?php echo esc_html( $primary['title'] ?? __( 'Explore LaunchPad', 'rocketpd' ) ); ?><?php rocketpd_lp_icon( 'arrow' ); ?></a>
				<a class="rpd-lp-btn rpd-lp-btn--outline" href="<?php echo esc_url( $secondary['url'] ?? '#launchpad-demo' ); ?>"><?php rocketpd_lp_icon( 'play' ); ?><?php echo esc_html( $secondary['title'] ?? __( 'See It In Action', 'rocketpd' ) ); ?></a>
			</div>
		</div>
		<div class="rpd-lp-hero__visual" aria-label="<?php esc_attr_e( 'LaunchPad dashboard preview', 'rocketpd' ); ?>">
			<div class="rpd-lp-diamond" aria-hidden="true"></div>
			<div class="rpd-lp-browser">
				<div class="rpd-lp-browser__bar"><span></span><span></span><span></span><b><?php echo esc_html( $url_chip ); ?></b></div>
				<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr_e( 'LaunchPad course library and progress dashboard', 'rocketpd' ); ?>">
			</div>
			<div class="rpd-lp-float rpd-lp-float--cert"><?php rocketpd_lp_icon( 'award' ); ?><span><small><?php esc_html_e( 'Certificate', 'rocketpd' ); ?></small><strong><?php esc_html_e( '3 earned this term', 'rocketpd' ); ?></strong></span></div>
			<div class="rpd-lp-float rpd-lp-float--progress"><span><small><?php esc_html_e( 'In progress', 'rocketpd' ); ?></small><strong><?php esc_html_e( '78%', 'rocketpd' ); ?></strong><em><?php esc_html_e( 'Closing Learning Gaps Through Reading', 'rocketpd' ); ?></em><i></i></span></div>
			<div class="rpd-lp-float rpd-lp-float--course"><?php rocketpd_lp_icon( 'book' ); ?><span><small><?php esc_html_e( 'New course this month', 'rocketpd' ); ?></small><strong><?php esc_html_e( 'School Culture &amp; Engagement', 'rocketpd' ); ?></strong></span></div>
		</div>
	</div>
</section>
