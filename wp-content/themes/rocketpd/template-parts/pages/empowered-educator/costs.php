<?php
/**
 * Empowered Educator Experience — comparing costs section.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow    = rocketpd_get_field( 'rpd_ee_costs_eyebrow', __( 'By the numbers', 'rocketpd' ) );
$intro_heading = rocketpd_get_field( 'rpd_ee_costs_heading', __( 'Comparing costs', 'rocketpd' ) );
$intro_body    = rocketpd_get_field( 'rpd_ee_costs_body', __( 'What schools pay for professional development.', 'rocketpd' ) );

$fallback_stats = array(
	array(
		'value'  => '$18K',
		'label'  => __( 'Per teacher, annually', 'rocketpd' ),
		'source' => __( 'National Council on Teacher Quality, 2015', 'rocketpd' ),
		'url'    => 'https://www.nctq.org/policy-area/Professional-Development',
	),
	array(
		'value'  => '+$160/hr.',
		'label'  => __( 'Per contact/workshop hour', 'rocketpd' ),
		'source' => __( 'Prevention Science, 2020', 'rocketpd' ),
		'url'    => 'https://www.researchgate.net/publication/340739938_A_Cost_Analysis_of_Traditional_Professional_Development_and_Coaching_Structures_in_Schools',
	),
);

$stats = rocketpd_get_field( 'rpd_ee_costs_stats', $fallback_stats );
$stats = is_array( $stats ) ? $stats : $fallback_stats;
?>

<section class="rpd-ee-costs rpd-ee-section rpd-ee-dark">
	<div class="rpd-ee-container">
		<div class="rpd-ee-costs__inner">
			<div class="rpd-ee-costs__intro">
				<?php if ( $eyebrow ) : ?>
					<p class="rpd-ee-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
				<?php endif; ?>
				<?php if ( $intro_heading ) : ?>
					<h2><?php echo esc_html( $intro_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( $intro_body ) : ?>
					<p><?php echo esc_html( $intro_body ); ?></p>
				<?php endif; ?>
			</div>

			<?php foreach ( $stats as $stat ) : ?>
				<?php
				$value  = $stat['value'] ?? '';
				$label  = $stat['label'] ?? '';
				$source = $stat['source'] ?? '';
				$url    = $stat['url'] ?? '';
				?>
				<div class="rpd-ee-stat">
					<?php if ( $value ) : ?>
						<p class="rpd-ee-stat__value"><?php echo esc_html( $value ); ?></p>
					<?php endif; ?>
					<?php if ( $label ) : ?>
						<p class="rpd-ee-stat__label"><?php echo esc_html( $label ); ?></p>
					<?php endif; ?>
					<?php if ( $source && $url ) : ?>
						<a class="rpd-ee-stat__source" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener">
							<?php echo esc_html( $source ); ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
