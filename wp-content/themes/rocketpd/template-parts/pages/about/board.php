<?php
/**
 * About board section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_about_board_mode', 'defaults' );

if ( 'hidden' === $mode ) {
	return;
}

$people = function_exists( 'rocketpd_get_members_by_type' ) ? rocketpd_get_members_by_type( 'board' ) : array();

if ( ! $people ) {
	return;
}

$default_eyebrow  = __( 'OUR BOARD', 'rocketpd' );
$default_headline = __( 'Guided by the people who have done the work.', 'rocketpd' );
$default_body     = __( 'Our board brings deep operating experience from public school districts and higher-education research institutions across the country.', 'rocketpd' );

if ( 'custom' === $mode ) {
	$eyebrow  = rocketpd_get_field( 'rpd_about_board_eyebrow', $default_eyebrow );
	$headline = rocketpd_get_field( 'rpd_about_board_headline', $default_headline );
	$body     = rocketpd_get_field( 'rpd_about_board_body', $default_body );
} else {
	$eyebrow  = $default_eyebrow;
	$headline = $default_headline;
	$body     = $default_body;
}
?>

<section class="rpd-about-board rpd-about-section">
	<div class="rpd-container">
		<header class="rpd-about-section-header">
			<p class="rpd-about-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<?php if ( $body ) : ?>
				<p><?php echo esc_html( $body ); ?></p>
			<?php endif; ?>
		</header>

		<?php if ( is_array( $people ) && ! empty( $people ) ) : ?>
			<div class="rpd-about-people-grid rpd-about-people-grid--board">
				<?php foreach ( $people as $person ) : ?>
					<?php get_template_part( 'template-parts/components/member-card', null, array( 'member' => $person ) ); ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
