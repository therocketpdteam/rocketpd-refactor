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
			'title' => __( 'Live virtual learning', 'rocketpd' ),
			'body' => __( 'Accessible sessions with expert facilitators and space for real questions.', 'rocketpd' ),
		),
		array(
			'title' => __( 'Practical implementation', 'rocketpd' ),
			'body' => __( 'Frameworks, examples, and next steps that educators can use right away.', 'rocketpd' ),
		),
		array(
			'title' => __( 'Community-driven growth', 'rocketpd' ),
			'body' => __( 'A professional learning network that keeps the conversation moving.', 'rocketpd' ),
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
							<span class="rpd-icon-chip" aria-hidden="true"></span>
							<h3><?php echo esc_html( $title ); ?></h3>
							<p><?php echo esc_html( $card_body ); ?></p>
						</article>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
