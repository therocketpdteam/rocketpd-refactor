<?php
/**
 * About model section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_about_model_eyebrow', __( 'What makes the model different', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_about_model_headline', __( 'Professional development that stays close to practice.', 'rocketpd' ) );
$body = rocketpd_get_field( 'rpd_about_model_body', __( 'RocketPD combines live virtual learning, practical implementation support, and a community where educators can keep learning from one another after the session ends.', 'rocketpd' ) );
$cards = rocketpd_get_field(
	'rpd_about_model_cards',
	array(
		array(
			'title' => __( 'Designed with practitioners', 'rocketpd' ),
			'body' => __( 'The work is shaped by educators who understand classroom, school, and district realities.', 'rocketpd' ),
		),
		array(
			'title' => __( 'Built for application', 'rocketpd' ),
			'body' => __( 'Sessions focus on decisions, examples, and moves educators can take into practice.', 'rocketpd' ),
		),
		array(
			'title' => __( 'Connected beyond the session', 'rocketpd' ),
			'body' => __( 'Resources, recordings, and community help ideas keep moving after the live event.', 'rocketpd' ),
		),
		array(
			'title' => __( 'Flexible for teams', 'rocketpd' ),
			'body' => __( 'Districts, schools, and individual educators can engage in ways that fit their goals.', 'rocketpd' ),
		),
	)
);
?>

<section class="rpd-about-model rpd-section">
	<div class="rpd-container">
		<header class="rpd-section-header rpd-section-header--center">
			<p class="rpd-section-header__eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2 class="rpd-section-header__title"><?php echo esc_html( $headline ); ?></h2>
			<p class="rpd-section-header__body"><?php echo esc_html( $body ); ?></p>
		</header>

		<?php if ( is_array( $cards ) && ! empty( $cards ) ) : ?>
			<div class="rpd-about-card-grid">
				<?php foreach ( $cards as $card ) : ?>
					<?php
					$title = isset( $card['title'] ) ? $card['title'] : '';
					$card_body = isset( $card['body'] ) ? $card['body'] : '';
					?>
					<?php if ( $title || $card_body ) : ?>
						<article class="rpd-card rpd-about-model-card">
							<span class="rpd-about-card-dot" aria-hidden="true"></span>
							<h3><?php echo esc_html( $title ); ?></h3>
							<p><?php echo esc_html( $card_body ); ?></p>
						</article>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
