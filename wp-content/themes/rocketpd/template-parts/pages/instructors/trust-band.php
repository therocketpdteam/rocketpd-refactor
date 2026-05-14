<?php
/**
 * Instructor Index trust band.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$stats = rocketpd_get_repeater_rows(
	'rpd_instructors_trust_stats',
	array(
		array( 'icon' => 'people', 'value' => __( '40,000+', 'rocketpd' ), 'label' => __( 'educators', 'rocketpd' ) ),
		array( 'icon' => 'target', 'value' => __( '850+', 'rocketpd' ), 'label' => __( 'districts', 'rocketpd' ) ),
		array( 'icon' => 'spark', 'value' => __( '18+', 'rocketpd' ), 'label' => __( 'nationally recognized experts', 'rocketpd' ) ),
	),
	array( 'value', 'label' )
);
?>

<section class="rpd-instructors-trust" aria-label="<?php esc_attr_e( 'RocketPD instructor network stats', 'rocketpd' ); ?>">
	<div class="rpd-container rpd-instructors-trust__list">
		<?php foreach ( $stats as $stat ) : ?>
			<?php
			$value = $stat['value'] ?? '';
			$label = $stat['label'] ?? '';
			$icon  = $stat['icon'] ?? 'spark';
			?>
			<?php if ( $value && $label ) : ?>
				<div class="rpd-instructors-trust__item">
					<span class="rpd-instructors-mini-icon" data-icon="<?php echo esc_attr( $icon ); ?>" aria-hidden="true"></span>
					<strong><?php echo esc_html( $value ); ?></strong>
					<span><?php echo esc_html( $label ); ?></span>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</section>
