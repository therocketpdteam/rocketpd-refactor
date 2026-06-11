<?php
/**
 * Instructor FAQ.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$instructor = function_exists( 'rocketpd_get_current_instructor_detail' ) ? rocketpd_get_current_instructor_detail() : array();
$name       = $instructor['name'] ?? __( 'Kim Marshall', 'rocketpd' );
$first_name = function_exists( 'rocketpd_get_instructor_first_name' ) ? rocketpd_get_instructor_first_name( $name ) : trim( strtok( $name, ' ' ) );
$faqs       = isset( $instructor['faqs'] ) && is_array( $instructor['faqs'] ) ? $instructor['faqs'] : array();
$faq_intro  = isset( $instructor['faq_intro'] ) && is_array( $instructor['faq_intro'] ) ? $instructor['faq_intro'] : array();

if ( ! $faqs ) {
	return;
}
?>

<section class="rpd-instructor-faq">
	<div class="rpd-container rpd-instructor-split">
		<div class="rpd-instructor-split__intro">
			<p class="rpd-instructor-section-kicker"><?php esc_html_e( 'FAQ', 'rocketpd' ); ?></p>
			<h2>
				<?php
				echo esc_html(
					$faq_intro['heading'] ?? sprintf(
						/* translators: %s: instructor first name. */
						__( 'Questions leaders ask about learning with %s.', 'rocketpd' ),
						$first_name
					)
				);
				?>
			</h2>
			<p>
				<?php echo esc_html( $faq_intro['help_text'] ?? __( 'Need help deciding?', 'rocketpd' ) ); ?>
				<?php if ( ! empty( $faq_intro['contact_url'] ) && ! empty( $faq_intro['contact_label'] ) ) : ?>
					<a href="<?php echo esc_url( $faq_intro['contact_url'] ); ?>"><?php echo esc_html( $faq_intro['contact_label'] ); ?></a>
				<?php endif; ?>
			</p>
		</div>
		<div class="rpd-instructor-faq__list" data-rpd-instructor-faq>
			<?php foreach ( $faqs as $index => $faq ) : ?>
				<?php
				$button_id = 'rpd-instructor-faq-button-' . ( $index + 1 );
				$panel_id  = 'rpd-instructor-faq-panel-' . ( $index + 1 );
				$is_open   = 0 === $index;
				?>
				<div class="rpd-instructor-faq__item">
					<button id="<?php echo esc_attr( $button_id ); ?>" type="button" aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $panel_id ); ?>">
						<span><?php echo esc_html( $faq['question'] ?? '' ); ?></span>
						<i aria-hidden="true"></i>
					</button>
					<div id="<?php echo esc_attr( $panel_id ); ?>" role="region" aria-labelledby="<?php echo esc_attr( $button_id ); ?>"<?php echo $is_open ? '' : ' hidden'; ?>>
						<p><?php echo esc_html( $faq['answer'] ?? '' ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
