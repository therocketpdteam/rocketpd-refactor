<?php
/**
 * About live virtual PD and implementation section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_about_implementation_eyebrow', __( 'How it works', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_about_implementation_headline', __( 'A professional learning model built for the full arc from idea to classroom practice.', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_about_implementation_body', __( 'RocketPD combines live virtual sessions with practical resources, recordings, and implementation support so professional learning can keep working after the calendar invite ends.', 'rocketpd' ) );
$steps = rocketpd_get_field(
	'rpd_about_implementation_steps',
	array(
		array(
			'title' => __( 'Learn from trusted experts', 'rocketpd' ),
			'body'  => __( 'Join sessions led by respected practitioners, authors, researchers, and school leaders.', 'rocketpd' ),
		),
		array(
			'title' => __( 'Practice through live virtual PD', 'rocketpd' ),
			'body'  => __( 'Bring questions, examples, and planning work into a format that fits busy teams.', 'rocketpd' ),
		),
		array(
			'title' => __( 'Implement with resources', 'rocketpd' ),
			'body'  => __( 'Use recordings, guides, and practical tools to turn the learning into action.', 'rocketpd' ),
		),
		array(
			'title' => __( 'Keep learning in community', 'rocketpd' ),
			'body'  => __( 'Stay connected to educators working through the same ideas in real settings.', 'rocketpd' ),
		),
	)
);
?>

<section class="rpd-about-implementation rpd-section">
	<div class="rpd-container">
		<header class="rpd-section-header">
			<p class="rpd-section-header__eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2 class="rpd-section-header__title"><?php echo esc_html( $headline ); ?></h2>
			<p class="rpd-section-header__body"><?php echo esc_html( $body ); ?></p>
		</header>

		<?php if ( is_array( $steps ) && ! empty( $steps ) ) : ?>
			<div class="rpd-about-timeline">
				<?php foreach ( $steps as $index => $step ) : ?>
					<?php
					$title = isset( $step['title'] ) ? $step['title'] : '';
					$step_body = isset( $step['body'] ) ? $step['body'] : '';
					?>
					<?php if ( $title || $step_body ) : ?>
						<article class="rpd-about-step">
							<span class="rpd-about-step__number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
							<h3><?php echo esc_html( $title ); ?></h3>
							<p><?php echo esc_html( $step_body ); ?></p>
						</article>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
