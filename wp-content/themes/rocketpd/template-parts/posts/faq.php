<?php
/**
 * Post FAQ accordion.
 *
 * ACF fields used:
 *   rpd_post_faq_enabled — true/false toggle
 *   rpd_post_faq_items   — repeater: question (text), answer (wysiwyg)
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$enabled = rocketpd_get_field( 'rpd_post_faq_enabled', false );

if ( ! $enabled ) {
	return;
}

$items = rocketpd_get_repeater_rows( 'rpd_post_faq_items', array(), array( 'question' ) );

if ( empty( $items ) ) {
	return;
}
?>

<section class="rpd-post-faq" aria-label="<?php esc_attr_e( 'Frequently asked questions', 'rocketpd' ); ?>">
	<h2 class="rpd-post-faq__heading"><?php esc_html_e( 'Frequently asked questions', 'rocketpd' ); ?></h2>

	<dl class="rpd-post-faq__list">
		<?php foreach ( $items as $i => $item ) : ?>
			<?php
			$question = isset( $item['question'] ) ? $item['question'] : '';
			$answer   = isset( $item['answer'] ) ? $item['answer'] : '';

			if ( ! $question ) {
				continue;
			}

			$item_id = 'rpd-faq-' . get_the_ID() . '-' . $i;
			?>
			<div class="rpd-post-faq__item">
				<dt class="rpd-post-faq__question">
					<button
						class="rpd-post-faq__toggle"
						aria-expanded="false"
						aria-controls="<?php echo esc_attr( $item_id ); ?>"
					>
						<?php echo esc_html( $question ); ?>
						<span class="rpd-post-faq__icon" aria-hidden="true"></span>
					</button>
				</dt>
				<dd class="rpd-post-faq__answer" id="<?php echo esc_attr( $item_id ); ?>" hidden>
					<?php echo wp_kses_post( $answer ); ?>
				</dd>
			</div>
		<?php endforeach; ?>
	</dl>
</section>
