<?php
/**
 * Community practice section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$checks = rocketpd_community_get_rows(
	'rpd_community_learn_checks',
	array(
		array( 'text' => __( 'No filler', 'rocketpd' ) ),
		array( 'text' => __( 'No theory without practice', 'rocketpd' ) ),
		array( 'text' => __( 'No wasted time', 'rocketpd' ) ),
	),
	array( 'text' )
);
$steps  = rocketpd_community_get_rows(
	'rpd_community_learn_steps',
	array(
		array( 'num' => '1', 'icon' => 'book', 'accent' => 'magenta', 'label' => __( 'Learn', 'rocketpd' ), 'desc' => __( 'Read a guide. Join a webinar.', 'rocketpd' ) ),
		array( 'num' => '2', 'icon' => 'wrench', 'accent' => 'purple', 'label' => __( 'Apply', 'rocketpd' ), 'desc' => __( 'Try a strategy with your students this week.', 'rocketpd' ) ),
		array( 'num' => '3', 'icon' => 'message', 'accent' => 'gold', 'label' => __( 'Reflect', 'rocketpd' ), 'desc' => __( 'Share what worked with the community.', 'rocketpd' ) ),
	),
	array( 'label' )
);
?>

<section class="rpd-community-practice rpd-community-section">
	<div class="rpd-container rpd-community-practice__grid">
		<div class="rpd-community-practice__copy">
			<p class="rpd-community-eyebrow"><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_learn_eyebrow', __( 'Built for Practice', 'rocketpd' ) ) ); ?></p>
			<h2><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_learn_heading', __( 'Learning, meet doing.', 'rocketpd' ) ) ); ?></h2>
			<p><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_learn_intro', __( 'Everything in the RocketPD Community is designed with one goal:', 'rocketpd' ) ) ); ?></p>
			<p class="rpd-community-callout"><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_learn_pullquote', __( 'Help educators take what they learn and apply it immediately.', 'rocketpd' ) ) ); ?></p>
			<ul class="rpd-community-check-list">
				<?php foreach ( $checks as $item ) : ?>
					<li><?php rocketpd_community_icon( 'check' ); ?><?php echo esc_html( $item['text'] ?? '' ); ?></li>
				<?php endforeach; ?>
			</ul>
			<p><?php echo esc_html( rocketpd_community_get_field( 'rpd_community_learn_closing', __( 'Just practical ideas you can use in your classroom, your school, or your leadership role.', 'rocketpd' ) ) ); ?></p>
		</div>
		<div class="rpd-community-process-card">
			<?php foreach ( $steps as $index => $step ) : ?>
				<article class="rpd-community-step rpd-community-step--<?php echo esc_attr( sanitize_html_class( $step['accent'] ?? 'magenta' ) ); ?>">
					<span><?php echo esc_html( $step['num'] ?? '' ); ?></span>
					<div>
						<h3><?php rocketpd_community_icon( $step['icon'] ?? 'book' ); ?><?php echo esc_html( $step['label'] ?? '' ); ?></h3>
						<p><?php echo esc_html( $step['desc'] ?? '' ); ?></p>
					</div>
				</article>
				<?php if ( $index < count( $steps ) - 1 ) : ?>
					<div class="rpd-community-step-arrow" aria-hidden="true"><?php rocketpd_community_icon( 'arrow' ); ?></div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
