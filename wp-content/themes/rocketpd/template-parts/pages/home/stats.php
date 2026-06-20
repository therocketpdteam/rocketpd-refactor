<?php
/**
 * Home stats bar.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_home_stats_mode', 'defaults' );

if ( 'hidden' === $mode ) {
	return;
}

$default_stats = array(
	array( 'icon' => 'people', 'value' => '40,000+', 'label' => __( 'educators', 'rocketpd' ) ),
	array( 'icon' => 'target', 'value' => '850+', 'label' => __( 'districts', 'rocketpd' ) ),
	array( 'icon' => 'spark', 'value' => '', 'label' => __( 'Nationally recognized experts', 'rocketpd' ) ),
);

if ( 'custom' === $mode ) {
	$stats = rocketpd_get_field( 'rpd_home_stats', $default_stats );
	$stats = array_filter(
		is_array( $stats ) ? $stats : array(),
		function ( $item ) {
			return is_array( $item ) && ( ! empty( $item['value'] ) || ! empty( $item['label'] ) );
		}
	);
	$stats = $stats ? $stats : $default_stats;
} else {
	$stats = $default_stats;
}

$stat_icon_map = array(
	'people' => 'users',
	'target' => 'target',
	'spark'  => 'sparkles',
);
?>

<?php if ( $stats ) : ?>
	<section class="rpd-home-stats" aria-label="<?php esc_attr_e( 'RocketPD reach', 'rocketpd' ); ?>">
		<div class="rpd-container rpd-home-stats__inner">
			<?php foreach ( $stats as $stat ) : ?>
				<?php $stat_icon = $stat_icon_map[ $stat['icon'] ?? 'spark' ] ?? 'sparkles'; ?>
				<div class="rpd-home-stat">
					<span class="rpd-home-stat__icon" aria-hidden="true"><?php echo rocketpd_get_icon( $stat_icon, 20 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					<?php if ( ! empty( $stat['value'] ) ) : ?>
						<strong><?php echo esc_html( $stat['value'] ); ?></strong>
					<?php endif; ?>
					<span><?php echo esc_html( $stat['label'] ?? '' ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
<?php endif; ?>
