<?php
/**
 * About story section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_about_story_eyebrow', __( 'Why RocketPD exists', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_about_story_headline', __( 'A simpler way to make professional learning feel useful again.', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_about_story_body', __( 'RocketPD grew from a simple belief: educators deserve professional learning that respects their time, connects them to people who understand the work, and helps them leave with something they can actually use.', 'rocketpd' ) );
$values = rocketpd_get_field(
	'rpd_about_values',
	array(
		array(
			'title' => __( 'Warm over corporate', 'rocketpd' ),
			'body' => __( 'Human language, real relationships, and less jargon.', 'rocketpd' ),
		),
		array(
			'title' => __( 'Useful over flashy', 'rocketpd' ),
			'body' => __( 'Every learning experience should create a next step.', 'rocketpd' ),
		),
		array(
			'title' => __( 'Together over alone', 'rocketpd' ),
			'body' => __( 'Community helps ideas survive contact with real classrooms.', 'rocketpd' ),
		),
	)
);
?>

<section class="rpd-about-story rpd-section">
	<div class="rpd-container rpd-about-story__grid">
		<div>
			<p class="rpd-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p class="rpd-lede"><?php echo esc_html( $body ); ?></p>
		</div>

		<?php if ( is_array( $values ) && ! empty( $values ) ) : ?>
			<div class="rpd-about-values">
				<?php foreach ( $values as $value ) : ?>
					<?php
					$title = isset( $value['title'] ) ? $value['title'] : '';
					$value_body = isset( $value['body'] ) ? $value['body'] : '';
					?>
					<?php if ( $title || $value_body ) : ?>
						<article class="rpd-about-value">
							<h3><?php echo esc_html( $title ); ?></h3>
							<p><?php echo esc_html( $value_body ); ?></p>
						</article>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
