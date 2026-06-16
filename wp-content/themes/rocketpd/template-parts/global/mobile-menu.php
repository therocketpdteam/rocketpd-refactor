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
$nav_links          = isset( $args['nav_links'] ) && is_array( $args['nav_links'] ) ? $args['nav_links'] : array();

?>
<div class="rpd-mobile-menu" id="rpd-mobile-menu" data-rpd-mobile-menu hidden>
	<div class="rpd-container">
		<nav aria-label="<?php esc_attr_e( 'Mobile navigation', 'rocketpd' ); ?>">
			<?php if ( ! empty( $nav_links ) ) : ?>
				<ul class="rpd-menu rpd-menu--primary">
					<?php foreach ( $nav_links as $nav_link ) : ?>
						<?php
						$nav_label    = isset( $nav_link['label'] ) ? $nav_link['label'] : '';
						$nav_url      = isset( $nav_link['url'] ) ? $nav_link['url'] : '';
						$nav_children = isset( $nav_link['children'] ) ? $nav_link['children'] : array();

						if ( ! $nav_label || ! $nav_url ) {
							continue;
						}
						?>
						<li>
							<a href="<?php echo esc_url( $nav_url ); ?>"><?php echo esc_html( $nav_label ); ?></a>
							<?php if ( ! empty( $nav_children ) ) : ?>
								<button class="rpd-mobile-sub-toggle" aria-expanded="false">
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
								</button>
								<ul class="sub-menu">
									<?php foreach ( $nav_children as $child ) : ?>
										<li>
											<a href="<?php echo esc_url( $child['url'] ); ?>"><?php echo esc_html( $child['label'] ); ?></a>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
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
