<?php
/**
 * Community practice section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow   = rocketpd_get_field( 'rpd_community_practice_eyebrow', __( 'Built for practice', 'rocketpd' ) );
$headline  = rocketpd_get_field( 'rpd_community_practice_headline', __( 'Learning, meet doing.', 'rocketpd' ) );
$body      = rocketpd_get_field( 'rpd_community_practice_body', __( 'Everything in the RocketPD Community is designed with one goal:', 'rocketpd' ) );
$highlight = rocketpd_get_field( 'rpd_community_practice_highlight', __( 'Help educators take what they learn and apply it immediately.', 'rocketpd' ) );
$closing   = rocketpd_get_field( 'rpd_community_practice_closing', __( 'Just practical ideas you can use in your classroom, your school, or your leadership role.', 'rocketpd' ) );
$checklist = rocketpd_get_repeater_rows(
	'rpd_community_practice_checklist',
	array(
		array( 'text' => __( 'No filler', 'rocketpd' ) ),
		array( 'text' => __( 'No theory without practice', 'rocketpd' ) ),
		array( 'text' => __( 'No wasted time', 'rocketpd' ) ),
	),
	array( 'text' )
);
$steps     = rocketpd_get_repeater_rows(
	'rpd_community_practice_steps',
	array(
		array( 'number' => '1', 'title' => __( 'Learn', 'rocketpd' ), 'body' => __( 'Read a guide. Join a webinar.', 'rocketpd' ) ),
		array( 'number' => '2', 'title' => __( 'Apply', 'rocketpd' ), 'body' => __( 'Try a strategy with your students this week.', 'rocketpd' ) ),
		array( 'number' => '3', 'title' => __( 'Reflect', 'rocketpd' ), 'body' => __( 'Share what worked with the community.', 'rocketpd' ) ),
	),
	array( 'title' )
);
?>

<section class="rpd-community-practice rpd-community-section">
	<div class="rpd-container rpd-community-practice__grid">
		<div>
			<p class="rpd-community-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
			<p class="rpd-community-callout"><?php echo esc_html( $highlight ); ?></p>
			<ul class="rpd-community-check-list">
				<?php foreach ( $checklist as $item ) : ?>
					<?php if ( ! empty( $item['text'] ) ) : ?>
						<li><?php echo esc_html( $item['text'] ); ?></li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
			<p><?php echo esc_html( $closing ); ?></p>
		</div>
		<div class="rpd-community-process-card">
			<?php foreach ( $steps as $step ) : ?>
				<?php if ( empty( $step['title'] ) ) { continue; } ?>
				<article>
					<span><?php echo esc_html( $step['number'] ?? '' ); ?></span>
					<div>
						<h3><?php echo esc_html( $step['title'] ); ?></h3>
						<?php if ( ! empty( $step['body'] ) ) : ?>
							<p><?php echo esc_html( $step['body'] ); ?></p>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
