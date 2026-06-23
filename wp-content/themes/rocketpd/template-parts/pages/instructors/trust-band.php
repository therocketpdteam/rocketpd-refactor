<?php
/**
 * Instructor Index trust band.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_instructors_trust_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_stats = array(
	array( 'icon' => 'people', 'value' => __( '40,000+', 'rocketpd' ), 'label' => __( 'educators', 'rocketpd' ) ),
	array( 'icon' => 'target', 'value' => __( '850+', 'rocketpd' ), 'label' => __( 'districts', 'rocketpd' ) ),
	array( 'icon' => 'spark', 'value' => __( '18+', 'rocketpd' ), 'label' => __( 'nationally recognized experts', 'rocketpd' ) ),
);

if ( 'custom' === $mode ) {
	$stats = rocketpd_get_repeater_rows( 'rpd_instructors_trust_stats', $default_stats, array( 'value', 'label' ) );
} else {
	$stats = $default_stats;
}
?>

<section class="rpd-instructors-trust" aria-label="<?php esc_attr_e( 'RocketPD instructor network stats', 'rocketpd' ); ?>">
	<div class="rpd-container rpd-instructors-trust__list">
		<?php
		$icon_aliases = array(
			'people' => 'users',
			'spark'  => 'sparkles',
		);
		?>
		<?php foreach ( $stats as $stat ) : ?>
			<?php
			$value    = $stat['value'] ?? '';
			$label    = $stat['label'] ?? '';
			$icon_key = $icon_aliases[ $stat['icon'] ?? '' ] ?? ( $stat['icon'] ?? 'sparkles' );
			?>
			<?php if ( $value && $label ) : ?>
				<div class="rpd-instructors-trust__item">
					<span class="rpd-instructors-mini-icon"><?php echo rocketpd_get_icon( $icon_key, 18 ); ?></span>
					<strong><?php echo esc_html( $value ); ?></strong>
					<span><?php echo esc_html( $label ); ?></span>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</section>
