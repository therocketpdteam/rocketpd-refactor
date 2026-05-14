<?php
/**
 * Contact FAQ section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$fallback_faqs = array(
	array(
		'question' => __( 'Can a single teacher use RocketPD?', 'rocketpd' ),
		'answer'   => __( 'Yes - the Community is free for any educator, no credit card required. LaunchPad is also available for individuals on a self-serve plan.', 'rocketpd' ),
	),
	array(
		'question' => __( 'Do you offer a free trial for schools?', 'rocketpd' ),
		'answer'   => __( "We don't run trials in the classic sense, but the Community is free to explore. For schools and districts, Jesse will walk you through pilot options on a 20-minute call.", 'rocketpd' ),
	),
	array(
		'question' => __( 'How do district-wide rollouts work?', 'rocketpd' ),
		'answer'   => __( "We've onboarded districts of every size - from 50 educators to 5,000+. Pricing scales by seat band, and we plan the rollout with your team.", 'rocketpd' ),
	),
	array(
		'question' => __( 'Is RocketPD related to In Demand Group (IDG)?', 'rocketpd' ),
		'answer'   => __( 'Yes - RocketPD is the educator-facing community we built. IDG is the parent strategy company that brings what we learned here to mission-aligned ed-tech partners.', 'rocketpd' ),
	),
	array(
		'question' => __( "What's your typical response time?", 'rocketpd' ),
		'answer'   => __( 'Within one business day for emails and form submissions. Booked calls happen at a time you pick.', 'rocketpd' ),
	),
	array(
		'question' => __( 'Can I speak at a RocketPD event?', 'rocketpd' ),
		'answer'   => __( "Yes - fill out the form above, choose 'Press, speaking, or media,' and we'll be in touch.", 'rocketpd' ),
	),
);

$faqs = rocketpd_get_repeater_rows( 'rpd_contact_faq_items', $fallback_faqs, array( 'question', 'answer' ) );

if ( count( $faqs ) < 6 ) {
	$faqs = $fallback_faqs;
}
?>

<section class="rpd-contact-faq rpd-section">
	<div class="rpd-container">
		<header class="rpd-section-header rpd-section-header--center">
			<p class="rpd-section-header__eyebrow"><?php esc_html_e( 'Quick answers', 'rocketpd' ); ?></p>
			<h2 class="rpd-section-header__title"><?php esc_html_e( 'Before you reach out...', 'rocketpd' ); ?></h2>
			<p class="rpd-section-header__body"><?php esc_html_e( "We get these a lot. If your question is here, you might not even need to email.", 'rocketpd' ); ?></p>
		</header>

		<?php if ( is_array( $faqs ) && ! empty( $faqs ) ) : ?>
			<div class="rpd-contact-faq__grid">
				<?php foreach ( $faqs as $faq ) : ?>
					<?php
					$question = isset( $faq['question'] ) ? $faq['question'] : '';
					$answer   = isset( $faq['answer'] ) ? $faq['answer'] : '';
					?>
					<?php if ( $question && $answer ) : ?>
						<article class="rpd-card rpd-contact-faq__item">
							<h3><?php echo esc_html( $question ); ?></h3>
							<p><?php echo esc_html( $answer ); ?></p>
						</article>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
