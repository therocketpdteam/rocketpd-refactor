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
 * Return true on the Instructor Index or individual instructor pages.
 *
 * @return bool
 */
function rocketpd_is_instructors_context() {
	return is_page_template( 'page-templates/template-instructors.php' ) || is_singular( 'instructor' );
}

/**
 * Return true on the Course Index page.
 *
 * @return bool
 */
function rocketpd_is_courses_context() {
	return is_page_template( 'page-templates/template-courses.php' );
}

/**
 * Return true when a menu item points to the Instructor Index route.
 *
 * @param WP_Post $item Menu item.
 * @return bool
 */
function rocketpd_is_instructors_menu_item( $item ) {
	if ( empty( $item->url ) ) {
		return false;
	}

	$path = wp_parse_url( $item->url, PHP_URL_PATH );
	$path = $path ? untrailingslashit( $path ) : '';

	return in_array( $path, array( '/instructor', '/instructors' ), true );
}

/**
 * Return true when a menu item points to the Course Index route.
 *
 * @param WP_Post $item Menu item.
 * @return bool
 */
function rocketpd_is_courses_menu_item( $item ) {
	if ( empty( $item->url ) ) {
		return false;
	}

	$path = wp_parse_url( $item->url, PHP_URL_PATH );
	$path = $path ? untrailingslashit( $path ) : '';

	return '/launchpad/courses' === $path;
}

/**
 * Render a theme menu when assigned.
 *
 * @param string $location Menu location.
 */
function rocketpd_nav_menu( $location = 'primary' ) {
	if ( ! has_nav_menu( $location ) ) {
		if ( 'primary' === $location ) {
			$is_instructors = rocketpd_is_instructors_context();
			$is_courses     = rocketpd_is_courses_context();
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
					'label'   => __( 'Courses', 'rocketpd' ),
					'url'     => home_url( '/launchpad/courses/' ),
					'current' => $is_courses,
				),
				array(
					'label' => __( 'Solutions', 'rocketpd' ),
					'url'   => home_url( '/solutions/' ),
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

/**
 * Add current-menu-item to assigned menu items that point to Instructors.
 *
 * @param array   $classes Menu item classes.
 * @param WP_Post $item    Menu item.
 * @param object  $args    Menu args.
 * @return array
 */
function rocketpd_instructors_nav_classes( $classes, $item, $args ) {
	if ( isset( $args->theme_location ) && 'primary' === $args->theme_location && rocketpd_is_instructors_context() && rocketpd_is_instructors_menu_item( $item ) ) {
		$classes[] = 'current-menu-item';
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'rocketpd_instructors_nav_classes', 10, 3 );

/**
 * Add current-menu-item to assigned menu items that point to Courses.
 *
 * @param array   $classes Menu item classes.
 * @param WP_Post $item    Menu item.
 * @param object  $args    Menu args.
 * @return array
 */
function rocketpd_courses_nav_classes( $classes, $item, $args ) {
	if ( isset( $args->theme_location ) && 'primary' === $args->theme_location && rocketpd_is_courses_context() && rocketpd_is_courses_menu_item( $item ) ) {
		$classes[] = 'current-menu-item';
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'rocketpd_courses_nav_classes', 10, 3 );

/**
 * Add aria-current to assigned menu items that point to Instructors.
 *
 * @param array   $atts Link attributes.
 * @param WP_Post $item Menu item.
 * @param object  $args Menu args.
 * @return array
 */
function rocketpd_instructors_nav_link_attributes( $atts, $item, $args ) {
	if ( isset( $args->theme_location ) && 'primary' === $args->theme_location && rocketpd_is_instructors_context() && rocketpd_is_instructors_menu_item( $item ) ) {
		$atts['aria-current'] = 'page';
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'rocketpd_instructors_nav_link_attributes', 10, 3 );

/**
 * Add aria-current to assigned menu items that point to Courses.
 *
 * @param array   $atts Link attributes.
 * @param WP_Post $item Menu item.
 * @param object  $args Menu args.
 * @return array
 */
function rocketpd_courses_nav_link_attributes( $atts, $item, $args ) {
	if ( isset( $args->theme_location ) && 'primary' === $args->theme_location && rocketpd_is_courses_context() && rocketpd_is_courses_menu_item( $item ) ) {
		$atts['aria-current'] = 'page';
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'rocketpd_courses_nav_link_attributes', 10, 3 );
