<?php
/**
 * LaunchPad district product cards.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_launchpad_districts_eyebrow', __( "What's Inside", 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_launchpad_districts_headline', __( 'What Districts Get with LaunchPad.', 'rocketpd' ) );
$cards = rocketpd_get_field(
	'rpd_launchpad_district_cards',
	array(
		array( 'title' => __( 'Expert-Led Video Courses', 'rocketpd' ), 'body' => __( 'Short, practical courses led by nationally recognized K–12 thought leaders — focused on real classroom and leadership application.', 'rocketpd' ), 'bullets' => array( array( 'text' => __( 'Self-paced video modules', 'rocketpd' ) ), array( 'text' => __( 'Practical, immediate application', 'rocketpd' ) ), array( 'text' => __( 'Taught by leaders you know & respect', 'rocketpd' ) ) ) ),
		array( 'title' => __( 'Mastery-Based Credit Pathways', 'rocketpd' ), 'body' => __( 'Educators demonstrate learning through structured reflection and application — earning professional credit without unnecessary paperwork.', 'rocketpd' ), 'bullets' => array( array( 'text' => __( 'Downloadable course workbooks', 'rocketpd' ) ), array( 'text' => __( 'Mastery-Based PDP worksheets', 'rocketpd' ) ), array( 'text' => __( 'Up to 3 credits per course', 'rocketpd' ) ) ) ),
		array( 'title' => __( 'Flexible Team-Based Learning', 'rocketpd' ), 'body' => __( 'Use LaunchPad across onboarding, PLCs, PD days, and individual growth plans without disrupting schedules.', 'rocketpd' ), 'bullets' => array( array( 'text' => __( 'Use in PLCs and PD days', 'rocketpd' ) ), array( 'text' => __( 'Onboarding-ready content', 'rocketpd' ) ), array( 'text' => __( 'Individual growth pathways', 'rocketpd' ) ) ) ),
	)
);
?>

<section class="rpd-lp-districts rpd-lp-section">
	<div class="rpd-container">
		<header class="rpd-lp-section-header rpd-lp-section-header--center">
			<p class="rpd-lp-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
		</header>
		<div class="rpd-lp-districts__grid">
			<?php foreach ( $cards as $index => $card ) : ?>
				<?php
				$title = isset( $card['title'] ) ? $card['title'] : '';
				$body = isset( $card['body'] ) ? $card['body'] : '';
				$bullets = isset( $card['bullets'] ) && is_array( $card['bullets'] ) ? $card['bullets'] : array();
				?>
				<article class="rpd-lp-district-card">
					<div class="rpd-lp-district-card__visual rpd-lp-district-card__visual--<?php echo esc_attr( (string) ( $index + 1 ) ); ?>"></div>
					<span class="rpd-lp-icon-tile" aria-hidden="true"></span>
					<h3><?php echo esc_html( $title ); ?></h3>
					<p><?php echo esc_html( $body ); ?></p>
					<ul class="rpd-lp-checks">
						<?php foreach ( $bullets as $bullet ) : ?>
							<?php $text = isset( $bullet['text'] ) ? $bullet['text'] : ''; ?>
							<?php if ( $text ) : ?>
								<li><?php echo esc_html( $text ); ?></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
