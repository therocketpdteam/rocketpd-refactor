<?php
/**
 * Mobile menu shell.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$has_header_actions = isset( $args['has_header_actions'] ) ? (bool) $args['has_header_actions'] : false;
$login_label        = isset( $args['login_label'] ) ? $args['login_label'] : '';
$login_url          = isset( $args['login_url'] ) ? $args['login_url'] : '';
$nav_cta_label      = isset( $args['nav_cta_label'] ) ? $args['nav_cta_label'] : '';
$nav_cta_url        = isset( $args['nav_cta_url'] ) ? $args['nav_cta_url'] : '';
$is_about_template  = isset( $args['is_about_template'] ) ? (bool) $args['is_about_template'] : false;

?>
<div class="rpd-mobile-menu" id="rpd-mobile-menu" data-rpd-mobile-menu hidden>
	<div class="rpd-container">
		<nav aria-label="<?php esc_attr_e( 'Mobile navigation', 'rocketpd' ); ?>">
			<?php if ( $is_about_template ) : ?>
				<?php rocketpd_nav_menu( 'about-primary' ); ?>
			<?php else : ?>
				<?php rocketpd_nav_menu( 'primary' ); ?>
			<?php endif; ?>
		</nav>

		<?php if ( $has_header_actions ) : ?>
			<div class="rpd-mobile-menu__actions">
				<?php if ( $login_label && $login_url ) : ?>
					<a class="rpd-site-header__login" href="<?php echo esc_url( $login_url ); ?>">
						<?php echo esc_html( $login_label ); ?>
					</a>
				<?php endif; ?>

				<?php if ( $nav_cta_label && $nav_cta_url ) : ?>
					<a class="rpd-btn rpd-btn--gold rpd-btn--full" href="<?php echo esc_url( $nav_cta_url ); ?>">
						<?php echo esc_html( $nav_cta_label ); ?>
					</a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</div>
