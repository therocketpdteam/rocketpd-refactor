<?php
/**
 * Announcement bar placeholder.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$announcement_text  = rocketpd_get_option( 'rpd_announcement_text' );
$announcement_url   = rocketpd_get_option( 'rpd_announcement_url' );
$announcement_label = rocketpd_get_option( 'rpd_announcement_link_label' );

if ( ! $announcement_text ) {
	return;
}
?>

<div class="rpd-announcement" role="region" aria-label="<?php esc_attr_e( 'Announcement', 'rocketpd' ); ?>">
	<div class="rpd-container rpd-announcement__inner">
		<p class="rpd-announcement__text"><?php echo esc_html( $announcement_text ); ?></p>

		<?php if ( $announcement_url && $announcement_label ) : ?>
			<a class="rpd-announcement__link" href="<?php echo esc_url( $announcement_url ); ?>">
				<?php echo esc_html( $announcement_label ); ?>
			</a>
		<?php endif; ?>
	</div>
</div>
