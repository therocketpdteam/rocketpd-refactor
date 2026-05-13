<?php
/**
 * LaunchPad Plus implementation support.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = rocketpd_get_field(
	'rpd_lpp_implementation_cards',
	array(
		array( 'title' => __( 'Bring PL into one accessible platform', 'rocketpd' ) ),
		array( 'title' => __( 'Reduce fragmentation across tools and resources', 'rocketpd' ) ),
		array( 'title' => __( 'Support consistent learning experiences across teams', 'rocketpd' ) ),
		array( 'title' => __( 'Provide flexible access to training and materials', 'rocketpd' ) ),
		array( 'title' => __( 'Maintain and grow a reusable content library', 'rocketpd' ) ),
	)
);
?>

<section class="rpd-lpp-implementation rpd-lpp-section">
	<div class="rpd-container">
		<header class="rpd-lpp-section-header rpd-lpp-section-header--center">
			<p class="rpd-lpp-eyebrow"><?php echo esc_html( rocketpd_get_field( 'rpd_lpp_implementation_eyebrow', __( 'Why It Matters', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_get_field( 'rpd_lpp_implementation_headline', __( 'Designed to Support District Implementation.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_get_field( 'rpd_lpp_implementation_intro', __( 'LaunchPad+ helps districts build a more consistent approach to educator development - not just deliver another tool.', 'rocketpd' ) ) ); ?></p>
		</header>
		<div class="rpd-lpp-card-row rpd-lpp-card-row--five">
			<?php foreach ( $cards as $card ) : ?>
				<?php $title = isset( $card['title'] ) ? $card['title'] : ''; ?>
				<?php if ( $title ) : ?>
					<article class="rpd-lpp-light-card rpd-lpp-light-card--short"><span class="rpd-lpp-icon" aria-hidden="true"></span><h3><?php echo esc_html( $title ); ?></h3></article>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<p class="rpd-lpp-centered-note rpd-lpp-centered-note--italic"><?php echo esc_html( rocketpd_get_field( 'rpd_lpp_implementation_closing', __( 'Rather than relying on one-time sessions, districts can build a more consistent approach to educator development.', 'rocketpd' ) ) ); ?></p>
	</div>
</section>
