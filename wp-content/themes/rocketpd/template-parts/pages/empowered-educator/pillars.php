<?php
/**
 * Empowered Educator Experience — Empower / Immerse / Achieve pillars.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_ee_pillars_eyebrow', __( 'The Program', 'rocketpd' ) );
$title   = rocketpd_get_field( 'rpd_ee_pillars_title', __( 'Empowered Educator Experience', 'rocketpd' ) );

$fallback_pillars = array(
	array(
		'image_id' => 1643,
		'heading'  => __( 'Empower', 'rocketpd' ),
		'body'     => __( 'Create time and headspace for busy educators to think strategically.', 'rocketpd' ),
	),
	array(
		'image_id' => 1642,
		'heading'  => __( 'Immerse', 'rocketpd' ),
		'body'     => __( 'Support buy-in with opportunities for collaboration and practical application.', 'rocketpd' ),
	),
	array(
		'image_id' => 1641,
		'heading'  => __( 'Achieve', 'rocketpd' ),
		'body'     => __( 'Develop a custom plan to meet organizational goals and ensure progress.', 'rocketpd' ),
	),
);

$pillars = rocketpd_get_field( 'rpd_ee_pillars_items', $fallback_pillars );
$pillars = is_array( $pillars ) ? $pillars : $fallback_pillars;
?>

<section class="rpd-ee-pillars rpd-ee-section rpd-ee-dark">
	<div class="rpd-ee-container">
		<div class="rpd-ee-section-header rpd-ee-section-header--center">
			<?php if ( $eyebrow ) : ?>
				<p class="rpd-ee-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>
			<?php if ( $title ) : ?>
				<h2><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
		</div>

		<div class="rpd-ee-pillars__grid">
			<?php foreach ( $pillars as $pillar ) : ?>
				<?php
				$image_id = $pillar['image_id'] ?? 0;
				$heading  = $pillar['heading'] ?? '';
				$body     = $pillar['body'] ?? '';
				?>
				<div class="rpd-ee-glass-card">
					<?php if ( $image_id ) : ?>
						<div class="rpd-ee-glass-card__icon" aria-hidden="true">
							<?php echo wp_get_attachment_image( $image_id, array( 72, 72 ), false, array( 'alt' => '' ) ); ?>
						</div>
					<?php endif; ?>
					<?php if ( $heading ) : ?>
						<h3><?php echo esc_html( $heading ); ?></h3>
					<?php endif; ?>
					<?php if ( $body ) : ?>
						<p><?php echo esc_html( $body ); ?></p>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
