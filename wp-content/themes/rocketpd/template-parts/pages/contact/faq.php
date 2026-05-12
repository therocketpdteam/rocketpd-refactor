<?php
/**
 * Contact FAQ section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faqs = rocketpd_get_field(
	'rpd_contact_faq_items',
	array(
		array(
			'question' => __( 'Can a single teacher use RocketPD?', 'rocketpd' ),
			'answer'   => __( 'Yes. The Community is free for any educator, no credit card required.', 'rocketpd' ),
		),
		array(
			'question' => __( 'Is RocketPD related to In Demand Group?', 'rocketpd' ),
			'answer'   => __( 'Yes. RocketPD is the educator-facing community we built; IDG is the parent strategy company.', 'rocketpd' ),
		),
	)
);
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
