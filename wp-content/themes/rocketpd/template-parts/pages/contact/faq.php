<?php
/**
 * Contact FAQ section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow  = rocketpd_get_field( 'rpd_contact_faq_eyebrow', __( 'Quick answers', 'rocketpd' ) );
$headline = rocketpd_get_field( 'rpd_contact_faq_headline', __( 'Before you reach out...', 'rocketpd' ) );
$body     = rocketpd_get_field( 'rpd_contact_faq_body', __( "We get these a lot. If your question's here, you might not even need to email.", 'rocketpd' ) );
$faqs     = rocketpd_get_field(
	'rpd_contact_faq_items',
	array(
		array(
			'question' => __( 'Can a single teacher use RocketPD?', 'rocketpd' ),
			'answer'   => __( 'Yes — the Community is free for any educator, no credit card required. LaunchPad is also available for individuals on a self-serve plan.', 'rocketpd' ),
		),
		array(
			'question' => __( 'Do you offer a free trial for schools?', 'rocketpd' ),
			'answer'   => __( "We don't run trials in the classic sense, but the Community is free to explore. For schools and districts, Jesse will walk you through pilot options on a 20-minute call.", 'rocketpd' ),
		),
		array(
			'question' => __( 'How do district-wide rollouts work?', 'rocketpd' ),
			'answer'   => __( "We've onboarded districts of every size — from 50 educators to 5,000+. Pricing scales by seat band, and we plan the rollout with your team.", 'rocketpd' ),
		),
		array(
			'question' => __( 'Is RocketPD related to In Demand Group (IDG)?', 'rocketpd' ),
			'answer'   => __( 'Yes — RocketPD is the educator-facing community we built. IDG is the parent strategy company that brings what we learned here to a small number of mission-aligned ed-tech partners.', 'rocketpd' ),
		),
		array(
			'question' => __( "What's your typical response time?", 'rocketpd' ),
			'answer'   => __( 'Within one business day for emails and form submissions. Booked calls happen at a time you pick.', 'rocketpd' ),
		),
		array(
			'question' => __( 'Can I speak at a RocketPD event?', 'rocketpd' ),
			'answer'   => __( "Yes — fill out the form above, choose 'Press, speaking, or media,' and we'll be in touch.", 'rocketpd' ),
		),
	)
);
?>

<section class="rpd-contact-faq rpd-contact-section">
	<div class="rpd-container">
		<header class="rpd-contact-section-header rpd-contact-section-header--center">
			<p class="rpd-contact-pill"><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $headline ); ?></h2>
			<p><?php echo esc_html( $body ); ?></p>
		</header>

		<?php if ( is_array( $faqs ) && ! empty( $faqs ) ) : ?>
			<div class="rpd-contact-faq__grid">
				<?php foreach ( $faqs as $faq ) : ?>
					<?php
					$question = isset( $faq['question'] ) ? $faq['question'] : '';
					$answer   = isset( $faq['answer'] ) ? $faq['answer'] : '';
					?>
					<?php if ( $question || $answer ) : ?>
						<article class="rpd-contact-faq-card">
							<?php if ( $question ) : ?>
								<h3><?php echo esc_html( $question ); ?></h3>
							<?php endif; ?>
							<?php if ( $answer ) : ?>
								<p><?php echo esc_html( $answer ); ?></p>
							<?php endif; ?>
						</article>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
