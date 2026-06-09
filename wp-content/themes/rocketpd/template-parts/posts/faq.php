<?php
/**
 * Optional single post FAQ.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_items = rocketpd_post_get_faq_items();

if ( empty( $faq_items ) ) {
	return;
}
?>

<section class="rpd-post-faq" aria-labelledby="rpd-post-faq-title">
	<div class="rpd-post-container rpd-post-container--narrow">
		<p class="rpd-post-eyebrow"><?php esc_html_e( 'FAQ', 'rocketpd' ); ?></p>
		<h2 id="rpd-post-faq-title"><?php esc_html_e( 'Common questions', 'rocketpd' ); ?></h2>
		<div class="rpd-post-faq__items">
			<?php foreach ( $faq_items as $index => $item ) : ?>
				<?php
				$panel_id = 'rpd-post-faq-' . (int) $index;
				?>
				<details class="rpd-post-faq__item">
					<summary aria-controls="<?php echo esc_attr( $panel_id ); ?>">
						<?php echo esc_html( $item['question'] ); ?>
					</summary>
					<div id="<?php echo esc_attr( $panel_id ); ?>" role="region">
						<?php echo wp_kses_post( wpautop( $item['answer'] ) ); ?>
					</div>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
