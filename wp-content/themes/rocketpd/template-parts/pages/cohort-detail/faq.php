<?php
/**
 * Cohort FAQ.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohort = function_exists( 'rocketpd_get_current_cohort_detail' ) ? rocketpd_get_current_cohort_detail() : array();
$faqs   = $cohort['faqs'] ?? array();

if ( ! $faqs ) {
	return;
}
?>

<section class="rpd-cohort-faq">
	<div class="rpd-container">
		<header class="rpd-cohort-section-header rpd-cohort-section-header--center">
			<p class="rpd-cohort-kicker"><?php esc_html_e( 'FAQ', 'rocketpd' ); ?></p>
			<h2><?php esc_html_e( 'Common questions, clear answers.', 'rocketpd' ); ?></h2>
		</header>
		<div class="rpd-cohort-faq__list" data-rpd-cohort-faq>
			<?php foreach ( $faqs as $index => $faq ) : ?>
				<?php
				$button_id = 'rpd-cohort-detail-faq-button-' . ( $index + 1 );
				$panel_id  = 'rpd-cohort-detail-faq-panel-' . ( $index + 1 );
				$is_open   = 0 === $index;
				?>
				<div class="rpd-cohort-faq__item">
					<button id="<?php echo esc_attr( $button_id ); ?>" type="button" aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $panel_id ); ?>">
						<span><?php echo esc_html( $faq['question'] ?? '' ); ?></span>
						<i aria-hidden="true"></i>
					</button>
					<div id="<?php echo esc_attr( $panel_id ); ?>" role="region" aria-labelledby="<?php echo esc_attr( $button_id ); ?>"<?php echo $is_open ? '' : ' hidden'; ?>>
						<?php echo wp_kses_post( wpautop( $faq['answer'] ?? '' ) ); ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
