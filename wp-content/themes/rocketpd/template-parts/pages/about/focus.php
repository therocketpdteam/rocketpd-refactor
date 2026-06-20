<?php
/**
 * About three-card focus section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$focus_icon_map   = array(
	'community' => 'users',
	'learning'  => 'book-open',
	'outcomes'  => 'target',
);
$default_headline = __( 'At RocketPD, we focus on three things:', 'rocketpd' );
$default_cards    = array(
	array(
		'icon'  => 'community',
		'title' => __( 'Building an engaged professional learning community', 'rocketpd' ),
		'body'  => __( 'Connecting educators, leaders, and experts in a shared space for growth and collaboration.', 'rocketpd' ),
	),
	array(
		'icon'  => 'learning',
		'title' => __( 'Delivering practical learning on strategic topics', 'rocketpd' ),
		'body'  => __( 'Providing expert-led courses, cohorts, and resources aligned to real district priorities.', 'rocketpd' ),
	),
	array(
		'icon'  => 'outcomes',
		'title' => __( 'Helping schools turn learning into outcomes', 'rocketpd' ),
		'body'  => __( 'Supporting implementation so professional learning improves practice, retention, and student success.', 'rocketpd' ),
	),
);

$mode = rocketpd_get_field( 'rpd_about_focus_mode', 'defaults' );

if ( 'hidden' === $mode ) {
	return;
}

if ( 'custom' === $mode ) {
	$headline = rocketpd_get_field( 'rpd_about_focus_headline', $default_headline );
	$cards    = rocketpd_get_field( 'rpd_about_focus_cards', $default_cards );
} else {
	$headline = $default_headline;
	$cards    = $default_cards;
}
?>

<section class="rpd-about-focus rpd-about-section rpd-about-band">
	<div class="rpd-container">
		<h2><?php echo esc_html( $headline ); ?></h2>

		<?php if ( is_array( $cards ) && ! empty( $cards ) ) : ?>
			<div class="rpd-about-focus__grid">
				<?php foreach ( $cards as $card ) : ?>
					<?php
					$icon      = isset( $card['icon'] ) ? $card['icon'] : 'community';
					$icon_name = $focus_icon_map[ $icon ] ?? 'users';
					$title     = isset( $card['title'] ) ? $card['title'] : '';
					$body      = isset( $card['body'] ) ? $card['body'] : '';
					?>
					<?php if ( $title || $body ) : ?>
						<article class="rpd-about-focus-card">
							<span class="rpd-about-icon rpd-about-icon--<?php echo esc_attr( sanitize_html_class( $icon ) ); ?>" aria-hidden="true"><?php echo rocketpd_get_icon( $icon_name, 24 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
							<?php if ( $title ) : ?>
								<h3><?php echo esc_html( $title ); ?></h3>
							<?php endif; ?>
							<?php if ( $body ) : ?>
								<p><?php echo esc_html( $body ); ?></p>
							<?php endif; ?>
						</article>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
