<?php
/**
 * Home stats bar.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$fallback_stats = array(
	array( 'icon' => 'people', 'value' => '40,000+', 'label' => __( 'educators', 'rocketpd' ) ),
	array( 'icon' => 'target', 'value' => '850+', 'label' => __( 'districts', 'rocketpd' ) ),
	array( 'icon' => 'spark', 'value' => '', 'label' => __( 'Nationally recognized experts', 'rocketpd' ) ),
);
$stats          = rocketpd_get_field( 'rpd_home_stats', $fallback_stats );
$stats = array_filter(
	is_array( $stats ) ? $stats : array(),
	function ( $item ) {
		return is_array( $item ) && ( ! empty( $item['value'] ) || ! empty( $item['label'] ) );
	}
);
$stats = $stats ? $stats : $fallback_stats;
?>

<?php if ( $stats ) : ?>
	<section class="rpd-home-stats" aria-label="<?php esc_attr_e( 'RocketPD reach', 'rocketpd' ); ?>">
		<div class="rpd-container rpd-home-stats__inner">
			<?php foreach ( $stats as $stat ) : ?>
				<div class="rpd-home-stat">
					<span class="rpd-home-stat__icon rpd-home-icon--<?php echo esc_attr( sanitize_html_class( $stat['icon'] ?? 'spark' ) ); ?>" aria-hidden="true"></span>
					<?php if ( ! empty( $stat['value'] ) ) : ?>
						<strong><?php echo esc_html( $stat['value'] ); ?></strong>
					<?php endif; ?>
					<span><?php echo esc_html( $stat['label'] ?? '' ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
<?php endif; ?>
