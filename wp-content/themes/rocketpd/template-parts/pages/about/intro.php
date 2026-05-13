<?php
/**
 * About intro section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$headline = rocketpd_get_field( 'rpd_about_intro_headline', __( "Some people say PD is dead. They're not wrong. Not exactly.", 'rocketpd' ) );
$body     = rocketpd_get_field(
	'rpd_about_intro_body',
	__(
		"Too often, professional learning experiences are disconnected from daily work, difficult to implement, or limited to one-time workshops that don't create lasting change.\n\nSchool leaders told us they wanted something different — professional learning that was flexible, practical, collaborative, and aligned to real challenges. In short: learning connected to doing.",
		'rocketpd'
	)
);
$emphasis = rocketpd_get_field( 'rpd_about_intro_emphasis', __( 'This is why RocketPD exists.', 'rocketpd' ) );
?>

<section class="rpd-about-intro rpd-about-section">
	<div class="rpd-container rpd-about-centered">
		<h2><?php echo esc_html( $headline ); ?></h2>

		<?php if ( $body ) : ?>
			<div class="rpd-about-copy">
				<?php echo wp_kses_post( wpautop( $body ) ); ?>
			</div>
		<?php endif; ?>

		<?php if ( $emphasis ) : ?>
			<p class="rpd-about-emphasis"><?php echo esc_html( $emphasis ); ?></p>
		<?php endif; ?>
	</div>
</section>
