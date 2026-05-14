<?php
/**
 * Navigation helpers.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render a theme menu when assigned.
 *
 * @param string $location Menu location.
 */
function rocketpd_nav_menu( $location = 'primary' ) {
	if ( ! has_nav_menu( $location ) ) {
		if ( 'primary' === $location ) {
			$is_instructors = is_page_template( 'page-templates/template-instructors.php' ) || is_singular( 'instructor' );
			$items = array(
				array(
					'label' => __( 'Topics', 'rocketpd' ),
					'url'   => home_url( '/topics/' ),
				),
				array(
					'label'   => __( 'Instructors', 'rocketpd' ),
					'url'     => home_url( '/instructor/' ),
					'current' => $is_instructors,
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
			<ul class="rpd-menu rpd-menu--primary">
				<?php foreach ( $items as $item ) : ?>
					<?php $is_current = ! empty( $item['current'] ); ?>
					<li class="<?php echo $is_current ? 'current-menu-item' : ''; ?>">
						<a href="<?php echo esc_url( $item['url'] ); ?>"<?php echo $is_current ? ' aria-current="page"' : ''; ?>><?php echo esc_html( $item['label'] ); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php
		}

		return;
	}

	wp_nav_menu(
		array(
			'theme_location' => $location,
			'container'      => false,
			'menu_class'     => 'rpd-menu rpd-menu--' . sanitize_html_class( $location ),
			'fallback_cb'    => false,
			'depth'          => 2,
		)
	);
}
