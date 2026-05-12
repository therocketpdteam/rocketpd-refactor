<?php
/**
 * Global footer shell.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$footer_logo_id     = rocketpd_get_option( 'rpd_footer_logo' );
$footer_description = rocketpd_get_option( 'rpd_footer_description' );
$footer_columns     = rocketpd_get_option( 'rpd_footer_columns', array() );
$social_links       = rocketpd_get_option( 'rpd_footer_social_links', array() );
$copyright          = rocketpd_get_option(
	'rpd_footer_copyright',
	sprintf(
		/* translators: %s: current year. */
		__( 'Copyright %s RocketPD. All rights reserved.', 'rocketpd' ),
		gmdate( 'Y' )
	)
);

?>
<footer class="rpd-site-footer">
	<div class="rpd-container rpd-site-footer__inner">
		<div class="rpd-site-footer__brand">
			<a class="rpd-site-footer__brand-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php if ( $footer_logo_id ) : ?>
					<?php
					echo rocketpd_get_image_markup(
						$footer_logo_id,
						'rpd-site-footer__logo',
						get_bloginfo( 'name' )
					);
					?>
				<?php else : ?>
					<span class="rpd-site-footer__wordmark"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></span>
				<?php endif; ?>
			</a>

			<?php if ( $footer_description ) : ?>
				<p class="rpd-site-footer__description"><?php echo esc_html( $footer_description ); ?></p>
			<?php endif; ?>
		</div>

		<div class="rpd-site-footer__nav-area">
			<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<nav class="rpd-site-footer__nav" aria-label="<?php esc_attr_e( 'Footer navigation', 'rocketpd' ); ?>">
					<?php rocketpd_nav_menu( 'footer' ); ?>
				</nav>
			<?php endif; ?>

			<?php if ( is_array( $footer_columns ) && ! empty( $footer_columns ) ) : ?>
				<div class="rpd-site-footer__columns">
					<?php foreach ( $footer_columns as $column ) : ?>
						<?php
						$column_title = isset( $column['title'] ) ? $column['title'] : '';
						$column_links = isset( $column['links'] ) && is_array( $column['links'] ) ? $column['links'] : array();

						if ( ! $column_title && empty( $column_links ) ) {
							continue;
						}
						?>
						<div class="rpd-site-footer__column">
							<?php if ( $column_title ) : ?>
								<h2 class="rpd-site-footer__heading"><?php echo esc_html( $column_title ); ?></h2>
							<?php endif; ?>

							<?php if ( ! empty( $column_links ) ) : ?>
								<ul class="rpd-site-footer__list">
									<?php foreach ( $column_links as $link ) : ?>
										<?php
										$link_label = isset( $link['label'] ) ? $link['label'] : '';
										$link_url   = isset( $link['url'] ) ? $link['url'] : '';

										if ( ! $link_label || ! $link_url ) {
											continue;
										}
										?>
										<li>
											<a href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_label ); ?></a>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

		<div class="rpd-site-footer__bottom">
			<p class="rpd-site-footer__copyright"><?php echo esc_html( $copyright ); ?></p>

			<?php if ( is_array( $social_links ) && ! empty( $social_links ) ) : ?>
				<ul class="rpd-site-footer__social">
					<?php foreach ( $social_links as $social_link ) : ?>
						<?php
						$social_label = isset( $social_link['label'] ) ? $social_link['label'] : '';
						$social_url   = isset( $social_link['url'] ) ? $social_link['url'] : '';

						if ( ! $social_label || ! $social_url ) {
							continue;
						}
						?>
						<li>
							<a href="<?php echo esc_url( $social_url ); ?>" rel="noopener">
								<?php echo esc_html( $social_label ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</footer>
