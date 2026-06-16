<?php
/**
 * Global header shell.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$is_about_template  = is_page_template( 'page-templates/template-about.php' );
$header_logo_id     = rocketpd_get_option( 'rpd_logo', '/wp-content/uploads/2026/05/RocketPD_LOGO_blk.png' );
$header_logo_alt    = rocketpd_get_option( 'rpd_logo_alt', get_bloginfo( 'name' ) );
$nav_cta_label      = rocketpd_get_option( 'rpd_primary_nav_cta_label', $is_about_template ? __( 'Join the Community', 'rocketpd' ) : '' );
$nav_cta_url        = rocketpd_get_option( 'rpd_primary_nav_cta_url', $is_about_template ? home_url( '/' ) : '' );
$login_label        = rocketpd_get_option( 'rpd_login_label', $is_about_template ? __( 'Login', 'rocketpd' ) : '' );
$login_url          = rocketpd_get_option( 'rpd_login_url', $is_about_template ? home_url( '/login/' ) : '' );
$has_header_actions = ( $nav_cta_label && $nav_cta_url ) || ( $login_label && $login_url );
$about_nav_links    = array(
	array(
		'label'    => __( 'Topics', 'rocketpd' ),
		'url'      => home_url( '/topics/' ),
		'children' => array_map(
			function( $topic ) {
				return array( 'label' => $topic['title'], 'url' => $topic['href'] );
			},
			rocketpd_get_topics()
		),
	),
	array(
		'label'    => __( 'Instructors', 'rocketpd' ),
		'url'      => home_url( '/instructors/' ),
		'children' => array_map(
			function( $post ) {
				return array( 'label' => $post->post_title, 'url' => get_permalink( $post->ID ) );
			},
			get_posts( array(
				'post_type'      => 'instructor',
				'posts_per_page' => -1,
				'orderby'        => 'title',
				'order'          => 'ASC',
				'post_status'    => 'publish',
			) )
		),
	),
	array(
		'label' => __( 'Solutions', 'rocketpd' ),
		'url'   => home_url( '/solutions/' ),
	),
	array(
		'label' => __( 'Resources', 'rocketpd' ),
		'url'   => home_url( '/resources/' ),
	),
	array(
		'label' => __( 'About', 'rocketpd' ),
		'url'   => home_url( '/about/' ),
	),
);

?>
<?php get_template_part( 'template-parts/global/announcement-bar' ); ?>

<header class="rpd-site-header">
	<div class="rpd-container rpd-site-header__inner">
		<a class="rpd-site-header__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php if ( $header_logo_id ) : ?>
				<?php
				echo rocketpd_get_image_markup(
					$header_logo_id,
					'rpd-site-header__logo',
					$header_logo_alt
				);
				?>
			<?php else : ?>
				<span class="rpd-site-header__wordmark rpd-brand-wordmark" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
					<span class="rpd-brand-wordmark__rocket" aria-hidden="true"><?php esc_html_e( 'Rocket', 'rocketpd' ); ?></span>
					<span class="rpd-brand-wordmark__pd" aria-hidden="true"><?php esc_html_e( 'PD', 'rocketpd' ); ?></span>
				</span>
			<?php endif; ?>
		</a>

		<nav class="rpd-site-header__nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'rocketpd' ); ?>">
			<?php if ( $is_about_template ) : ?>
				<ul class="rpd-menu rpd-menu--primary">
					<?php foreach ( $about_nav_links as $nav_link ) : ?>
						<?php $has_children = ! empty( $nav_link['children'] ); ?>
						<li<?php echo $has_children ? ' class="menu-item-has-children"' : ''; ?>>
							<a href="<?php echo esc_url( $nav_link['url'] ); ?>"><?php echo esc_html( $nav_link['label'] ); ?></a>
							<?php if ( $has_children ) : ?>
								<ul class="sub-menu">
									<?php foreach ( $nav_link['children'] as $child ) : ?>
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
			'nav_links'          => $is_about_template ? $about_nav_links : array(),
		)
	);
	?>
</header>
