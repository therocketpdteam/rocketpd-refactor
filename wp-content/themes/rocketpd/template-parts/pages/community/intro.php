<?php
/**
 * Community intro section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow    = rocketpd_get_field( 'rpd_community_intro_eyebrow', __( 'A place to start', 'rocketpd' ) );
$headline   = rocketpd_get_field( 'rpd_community_intro_headline', __( 'Learning that actually supports your work.', 'rocketpd' ) );
$paragraphs = rocketpd_get_repeater_rows(
	'rpd_community_intro_paragraphs',
	array(
		array( 'text' => __( "Professional learning shouldn't be hard to access - or hard to use.", 'rocketpd' ) ),
		array( 'text' => __( 'The RocketPD Community brings together practical, high-quality resources and experiences designed for real classrooms, real schools, and real challenges.', 'rocketpd' ) ),
		array( 'text' => __( "Whether you're looking for quick ideas, deeper learning, or connection with other educators, the Community gives you a place to start - and a way to keep growing.", 'rocketpd' ) ),
	),
	array( 'text' )
);
?>

<section class="rpd-community-intro rpd-community-section">
	<div class="rpd-container rpd-community-narrow">
		<p class="rpd-community-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
		<h2><?php echo esc_html( $headline ); ?></h2>
		<?php foreach ( $paragraphs as $paragraph ) : ?>
			<?php if ( ! empty( $paragraph['text'] ) ) : ?>
				<p><?php echo esc_html( $paragraph['text'] ); ?></p>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</section>
