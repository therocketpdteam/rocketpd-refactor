<?php
/**
 * Global header shell.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<header class="rpd-site-header">
	<div class="rpd-container rpd-site-header__inner">
		<a class="rpd-site-header__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
		</a>

		<nav class="rpd-site-header__nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'rocketpd' ); ?>">
			<?php rocketpd_nav_menu( 'primary' ); ?>
		</nav>

		<button class="rpd-site-header__toggle" type="button" aria-expanded="false" data-rpd-menu-toggle>
			<?php esc_html_e( 'Menu', 'rocketpd' ); ?>
		</button>
	</div>

	<?php get_template_part( 'template-parts/global/mobile-menu' ); ?>
</header>
