<?php
/**
 * Mobile menu shell.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="rpd-mobile-menu" data-rpd-mobile-menu hidden>
	<div class="rpd-container">
		<nav aria-label="<?php esc_attr_e( 'Mobile navigation', 'rocketpd' ); ?>">
			<?php rocketpd_nav_menu( 'primary' ); ?>
		</nav>
	</div>
</div>
