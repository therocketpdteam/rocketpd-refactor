<?php
/**
 * Global footer shell.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$footer_logo_url = 'https://rocketgoeshigh.wpenginepowered.com/wp-content/uploads/2026/05/RocketPD_LOGO_wht.png';

$fallback_footer_description = __( 'RocketPD helps educators keep learning practical, connected, and built for the real work of schools.', 'rocketpd' );
$footer_description          = rocketpd_get_option( 'rpd_footer_description', $fallback_footer_description );
$fallback_social_links       = array(
	array(
		'label' => __( 'LinkedIn', 'rocketpd' ),
		'url'   => 'https://www.linkedin.com/company/rocketpd/',
	),
	array(
		'label' => __( 'X', 'rocketpd' ),
		'url'   => 'https://twitter.com/rocketpd',
	),
	array(
		'label' => __( 'Facebook', 'rocketpd' ),
		'url'   => 'https://www.facebook.com/rocketpd',
	),
);
$fallback_legal_links        = array(
	array(
		'label' => __( 'Privacy Policy', 'rocketpd' ),
		'url'   => home_url( '/privacy-policy/' ),
	),
	array(
		'label' => __( 'Terms of Service', 'rocketpd' ),
		'url'   => home_url( '/terms-of-service/' ),
	),
);

$fallback_footer_columns = array(
	array(
		'title' => __( 'Professional Learning', 'rocketpd' ),
		'links' => array(
			array(
				'label' => __( 'LaunchPad', 'rocketpd' ),
				'url'   => home_url( '/launchpad/' ),
			),
			array(
				'label' => __( 'LaunchPad Plus', 'rocketpd' ),
				'url'   => home_url( '/launchpad-plus/' ),
			),
			array(
				'label' => __( 'Community', 'rocketpd' ),
				'url'   => home_url( '/community/' ),
			),
		),
	),
	array(
		'title' => __( 'Resources', 'rocketpd' ),
		'links' => array(
			array(
				'label' => __( 'Learning Meet Doing Guide', 'rocketpd' ),
				'url'   => home_url( '/k-12-guides/learning-meet-doing/' ),
			),
			array(
				'label' => __( 'Download Your Guide', 'rocketpd' ),
				'url'   => home_url( '/thank-you/download-learning-meet-doing/' ),
			),
		),
	),
	array(
		'title' => __( 'Company', 'rocketpd' ),
		'links' => array(
			array(
				'label' => __( 'About', 'rocketpd' ),
				'url'   => home_url( '/about/' ),
			),
			array(
				'label' => __( 'Contact', 'rocketpd' ),
				'url'   => home_url( '/contact/' ),
			),
		),
	),
	array(
		'title' => __( 'Contact', 'rocketpd' ),
		'links' => array(
			array(
				'label' => __( '(855) 757-6253', 'rocketpd' ),
				'url'   => 'tel:8557576253',
			),
			array(
				'label' => __( 'info@rocketpd.com', 'rocketpd' ),
				'url'   => 'mailto:info@rocketpd.com',
			),
			array(
				'label' => __( 'support@rocketpd.com', 'rocketpd' ),
				'url'   => 'mailto:support@rocketpd.com',
			),
			array(
				'label'  => __( 'Book with Jesse', 'rocketpd' ),
				'url'    => 'https://rocketpd.com/jesse-schedule/',
				'target' => '_blank',
			),
		),
	),
);

$footer_columns = rocketpd_get_option( 'rpd_footer_columns', array() );
$footer_columns = is_array( $footer_columns ) ? $footer_columns : array();
$footer_columns = array_values(
	array_filter(
		$footer_columns,
		function ( $column ) {
			if ( ! is_array( $column ) ) {
				return false;
			}

			$column_title = isset( $column['title'] ) ? trim( (string) $column['title'] ) : '';
			$column_links = isset( $column['links'] ) && is_array( $column['links'] ) ? $column['links'] : array();

			foreach ( $column_links as $link ) {
				if ( ! is_array( $link ) ) {
					continue;
				}

				$link_label = isset( $link['label'] ) ? trim( (string) $link['label'] ) : '';
				$link_url   = isset( $link['url'] ) ? trim( (string) $link['url'] ) : '';

				if ( $link_label && $link_url ) {
					return true;
				}
			}

			return (bool) $column_title;
		}
	)
);

if ( count( $footer_columns ) < 3 ) {
	$footer_columns = $fallback_footer_columns;
}

$social_links = rocketpd_get_option( 'rpd_footer_social_links', array() );
$social_links = is_array( $social_links ) ? $social_links : array();
$social_links = array_values(
	array_filter(
		$social_links,
		function ( $social_link ) {
			if ( ! is_array( $social_link ) ) {
				return false;
			}

			$social_label = isset( $social_link['label'] ) ? trim( (string) $social_link['label'] ) : '';
			$social_url   = isset( $social_link['url'] ) ? trim( (string) $social_link['url'] ) : '';

			return $social_label && $social_url;
		}
	)
);

if ( empty( $social_links ) ) {
	$social_links = $fallback_social_links;
}

$legal_links = rocketpd_get_option( 'rpd_footer_legal_links', array() );
$legal_links = is_array( $legal_links ) ? $legal_links : array();
$legal_links = array_values(
	array_filter(
		$legal_links,
		function ( $legal_link ) {
			if ( ! is_array( $legal_link ) ) {
				return false;
			}

			$legal_label = isset( $legal_link['label'] ) ? trim( (string) $legal_link['label'] ) : '';
			$legal_url   = isset( $legal_link['url'] ) ? trim( (string) $legal_link['url'] ) : '';

			return $legal_label && $legal_url;
		}
	)
);

if ( empty( $legal_links ) ) {
	$legal_links = $fallback_legal_links;
}

$copyright = rocketpd_get_option(
	'rpd_footer_copyright',
	sprintf(
		/* translators: %s: current year. */
		__( 'Copyright %s RocketPD. 1055 Howell Mill Rd. 8th Floor, Atlanta, GA 30318. All rights reserved.', 'rocketpd' ),
		gmdate( 'Y' )
	)
);

?>
<footer class="rpd-site-footer">
	<div class="rpd-container rpd-site-footer__inner">
		<div class="rpd-site-footer__brand">
			<a class="rpd-site-footer__brand-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php // Temporary canonical theme logo until ACF global logo settings are finalized. ?>
				<img class="rpd-site-footer__logo" src="<?php echo esc_url( $footer_logo_url ); ?>" alt="<?php esc_attr_e( 'RocketPD', 'rocketpd' ); ?>">
			</a>

			<?php if ( $footer_description ) : ?>
				<p class="rpd-site-footer__description"><?php echo esc_html( $footer_description ); ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $social_links ) ) : ?>
				<ul class="rpd-site-footer__social" aria-label="<?php esc_attr_e( 'Social links', 'rocketpd' ); ?>">
					<?php foreach ( $social_links as $social_link ) : ?>
						<?php
						$social_label = isset( $social_link['label'] ) ? $social_link['label'] : '';
						$social_url   = isset( $social_link['url'] ) ? $social_link['url'] : '';

						if ( ! $social_label || ! $social_url ) {
							continue;
						}
						?>
						<li>
							<a href="<?php echo esc_url( $social_url ); ?>" rel="noopener" aria-label="<?php echo esc_attr( $social_label ); ?>">
								<?php echo esc_html( substr( $social_label, 0, 1 ) ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
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
										$link_label  = isset( $link['label'] ) ? $link['label'] : '';
										$link_url    = isset( $link['url'] ) ? $link['url'] : '';
										$link_target = isset( $link['target'] ) ? $link['target'] : '';

										if ( ! $link_label || ! $link_url ) {
											continue;
										}
										?>
										<li>
											<a href="<?php echo esc_url( $link_url ); ?>"<?php echo '_blank' === $link_target ? ' target="_blank" rel="noopener"' : ''; ?>><?php echo esc_html( $link_label ); ?></a>
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

			<?php if ( ! empty( $legal_links ) ) : ?>
				<ul class="rpd-site-footer__legal">
					<?php foreach ( $legal_links as $legal_link ) : ?>
						<?php
						$legal_label = isset( $legal_link['label'] ) ? $legal_link['label'] : '';
						$legal_url   = isset( $legal_link['url'] ) ? $legal_link['url'] : '';

						if ( ! $legal_label || ! $legal_url ) {
							continue;
						}
						?>
						<li>
							<a href="<?php echo esc_url( $legal_url ); ?>"><?php echo esc_html( $legal_label ); ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</footer>
