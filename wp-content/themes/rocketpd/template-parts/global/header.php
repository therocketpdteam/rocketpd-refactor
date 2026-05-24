<?php
/**
 * Global header shell.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$header_logo_url       = 'https://rocketgoeshigh.wpenginepowered.com/wp-content/uploads/2026/05/RocketPD_LOGO_blk.png';
$community_signup_url  = rocketpd_get_option( 'rpd_community_signup_url', home_url( '/community/' ) );
$nav_cta_label         = rocketpd_get_option( 'rpd_primary_nav_cta_label', __( 'Join the Community', 'rocketpd' ) );
$nav_cta_url           = rocketpd_get_option( 'rpd_primary_nav_cta_url', $community_signup_url );
$login_label           = rocketpd_get_option( 'rpd_login_label', __( 'Login', 'rocketpd' ) );
$login_url             = rocketpd_get_option( 'rpd_login_url', home_url( '/login/' ) );
$has_header_actions    = ( $nav_cta_label && $nav_cta_url ) || ( $login_label && $login_url );

?>
<?php get_template_part( 'template-parts/global/announcement-bar' ); ?>

<header class="rpd-site-header">
	<div class="rpd-container rpd-site-header__inner">
		<a class="rpd-site-header__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php // Temporary canonical theme logo until ACF global logo settings are finalized. ?>
			<img class="rpd-site-header__logo" src="<?php echo esc_url( $header_logo_url ); ?>" alt="<?php esc_attr_e( 'RocketPD', 'rocketpd' ); ?>">
		</a>

		<nav class="rpd-site-header__nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'rocketpd' ); ?>">
			<?php rocketpd_nav_menu( 'primary' ); ?>
		</nav>

		<div class="rpd-site-header__actions">
			<?php if ( $login_label && $login_url ) : ?>
				<a class="rpd-site-header__login" href="<?php echo esc_url( $login_url ); ?>">
					<?php echo esc_html( $login_label ); ?>
				</a>
			<?php endif; ?>

			<?php if ( $nav_cta_label && $nav_cta_url ) : ?>
				<a class="rpd-btn rpd-btn--gold rpd-site-header__cta" href="<?php echo esc_url( $nav_cta_url ); ?>">
					<?php echo esc_html( $nav_cta_label ); ?>
				</a>
			<?php endif; ?>

			<button
				class="rpd-site-header__toggle"
				type="button"
				aria-controls="rpd-mobile-menu"
				aria-expanded="false"
				data-rpd-menu-toggle
			>
				<span class="rpd-site-header__toggle-lines" aria-hidden="true"></span>
				<span class="rpd-site-header__toggle-text"><?php esc_html_e( 'Menu', 'rocketpd' ); ?></span>
			</button>
		</div>
	</div>

	<?php
	get_template_part(
		'template-parts/global/mobile-menu',
		null,
		array(
			'has_header_actions' => $has_header_actions,
			'login_label'        => $login_label,
			'login_url'          => $login_url,
			'nav_cta_label'      => $nav_cta_label,
			'nav_cta_url'        => $nav_cta_url,
		)
	);
	?>
</header>
