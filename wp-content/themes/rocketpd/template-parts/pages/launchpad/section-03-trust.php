<?php
/**
 * LaunchPad trust band.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_lp_get_field( 'lp_trust_mode', 'defaults' );
if ( 'hidden' === $mode ) {
	return;
}

$default_stats = array(
	array( 'icon' => 'users',    'label' => __( '40,000+ educators', 'rocketpd' ) ),
	array( 'icon' => 'target',   'label' => __( '850+ districts', 'rocketpd' ) ),
	array( 'icon' => 'sparkles', 'label' => __( 'Nationally recognized instructors', 'rocketpd' ) ),
);

if ( 'custom' === $mode ) {
	$acf_stats = rocketpd_lp_get_field( 'trust_stats', null );
	$stats     = is_array( $acf_stats ) && ! empty( $acf_stats ) ? $acf_stats : $default_stats;
} else {
	$stats = $default_stats;
}
?>
<section class="rpd-lp-trust" aria-label="<?php esc_attr_e( 'LaunchPad trust stats', 'rocketpd' ); ?>">
	<div class="rpd-container rpd-lp-trust__items">
		<?php foreach ( $stats as $index => $stat ) : ?>
			<div class="rpd-lp-trust__item">
				<?php rocketpd_lp_icon( $stat['icon'] ?? 'sparkles' ); ?>
				<strong><?php echo esc_html( $stat['label'] ?? '' ); ?></strong>
			</div>
			<?php if ( $index < count( $stats ) - 1 ) : ?><span class="rpd-lp-dot" aria-hidden="true">•</span><?php endif; ?>
		<?php endforeach; ?>
	</div>
</section>
