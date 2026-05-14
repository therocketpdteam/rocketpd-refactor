<?php
/**
 * Topic Index FAQ.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faqs = function_exists( 'rocketpd_get_topic_faqs' ) ? rocketpd_get_topic_faqs() : array();

if ( ! $faqs ) {
	return;
}
?>

<section class="rpd-topics-faq rpd-topics-section">
	<div class="rpd-container">
		<header class="rpd-topics-section__header rpd-topics-section__header--center">
			<p class="rpd-topics-kicker"><?php esc_html_e( 'Topics FAQ', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'Common questions about RocketPD topic hubs.', 'rocketpd' ); ?></h2>
		</header>
		<div class="rpd-topics-faq__list" data-rpd-topics-faq>
			<?php foreach ( $faqs as $index => $faq ) : ?>
				<?php
				$button_id = 'rpd-topics-faq-button-' . ( $index + 1 );
				$panel_id  = 'rpd-topics-faq-panel-' . ( $index + 1 );
				$is_open   = 0 === $index;
				?>
				<div class="rpd-topics-faq__item">
					<button id="<?php echo esc_attr( $button_id ); ?>" type="button" aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $panel_id ); ?>">
						<span><?php echo esc_html( $faq['question'] ); ?></span>
						<i aria-hidden="true"></i>
					</button>
					<div id="<?php echo esc_attr( $panel_id ); ?>" role="region" aria-labelledby="<?php echo esc_attr( $button_id ); ?>"<?php echo $is_open ? '' : ' hidden'; ?>>
						<p><?php echo esc_html( $faq['answer'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
