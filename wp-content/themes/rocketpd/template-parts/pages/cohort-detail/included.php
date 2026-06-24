<?php
/**
 * Cohort included items.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cohort   = function_exists( 'rocketpd_get_current_cohort_detail' ) ? rocketpd_get_current_cohort_detail() : array();
$included = $cohort['included'] ?? array();

$included_icon_map = array(
	'recording'   => 'play',
	'video'       => 'play',
	'session'     => 'video',
	'live'        => 'video',
	'toolkit'     => 'clipboard-check',
	'template'    => 'clipboard-check',
	'script'      => 'clipboard-check',
	'workbook'    => 'file-text',
	'pdf'         => 'file-text',
	'discussion'  => 'users',
	'community'   => 'users',
	'group'       => 'users',
	'feedback'    => 'message-circle',
	'coaching'    => 'message-circle',
	'certificate' => 'award',
	'credit'      => 'award',
	'portal'      => 'monitor',
	'support'     => 'life-buoy',
	'priority'    => 'life-buoy',
);
?>

<section class="rpd-cohort-included">
	<div class="rpd-container">
		<p class="rpd-cohort-kicker"><?php esc_html_e( "What's included", 'rocketpd' ); ?></p>
		<h2><?php esc_html_e( 'Everything included with your cohort seat', 'rocketpd' ); ?></h2>
		<div class="rpd-cohort-included__items">
			<?php foreach ( $included as $item ) : ?>
				<?php
				$label      = $item['label'] ?? $item['included_item_label'] ?? '';
				$label_low  = strtolower( $label );
				$icon       = 'check';
				foreach ( $included_icon_map as $keyword => $icon_name ) {
					if ( false !== strpos( $label_low, $keyword ) ) {
						$icon = $icon_name;
						break;
					}
				}
				?>
				<div class="rpd-cohort-included__item">
					<span aria-hidden="true"><?php echo rocketpd_get_icon( $icon, 16 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					<p><?php echo esc_html( $label ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
