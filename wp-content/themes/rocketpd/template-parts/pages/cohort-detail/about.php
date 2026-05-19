<?php
/**
 * Cohort about section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohort      = function_exists( 'rocketpd_get_current_cohort_detail' ) ? rocketpd_get_current_cohort_detail() : array();
$description = $cohort['longDescription'] ?? array();
$audience    = $cohort['audience'] ?? array();
?>

<section class="rpd-cohort-about">
	<div class="rpd-container rpd-cohort-about__grid">
		<div>
			<p class="rpd-cohort-kicker"><?php esc_html_e( 'About this cohort', 'rocketpd' ); ?></p>
			<h2><?php echo esc_html( $cohort['subtitle'] ?? '' ); ?></h2>
		</div>
		<div class="rpd-cohort-about__copy">
			<?php if ( is_array( $description ) ) : ?>
				<?php foreach ( $description as $paragraph ) : ?>
					<p><?php echo esc_html( $paragraph ); ?></p>
				<?php endforeach; ?>
			<?php else : ?>
				<?php echo wp_kses_post( wpautop( $description ) ); ?>
			<?php endif; ?>
			<?php if ( $audience ) : ?>
				<div class="rpd-cohort-audience-pills">
					<?php foreach ( $audience as $item ) : ?>
						<span>
							<strong><?php echo esc_html( $item['label'] ?? $item['audience_label'] ?? '' ); ?></strong>
							<?php if ( ! empty( $item['description'] ) || ! empty( $item['audience_description'] ) ) : ?>
								<em><?php echo esc_html( $item['description'] ?? $item['audience_description'] ); ?></em>
							<?php endif; ?>
						</span>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
