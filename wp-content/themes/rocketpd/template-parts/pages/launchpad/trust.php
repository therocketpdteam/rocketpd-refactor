<?php
/**
 * LaunchPad trust band.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$stats = rocketpd_get_field(
	'rpd_launchpad_trust_stats',
	array(
		array( 'text' => __( '40,000+ educators', 'rocketpd' ) ),
		array( 'text' => __( '850+ districts', 'rocketpd' ) ),
		array( 'text' => __( 'Nationally recognized instructors', 'rocketpd' ) ),
	)
);
?>

<?php if ( is_array( $stats ) && ! empty( $stats ) ) : ?>
	<section class="rpd-lp-trust" aria-label="<?php esc_attr_e( 'LaunchPad trust statistics', 'rocketpd' ); ?>">
		<div class="rpd-container">
			<ul>
				<?php foreach ( $stats as $stat ) : ?>
					<?php $text = isset( $stat['text'] ) ? $stat['text'] : ''; ?>
					<?php if ( $text ) : ?>
						<li><span aria-hidden="true">✦</span><?php echo esc_html( $text ); ?></li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
<?php endif; ?>
