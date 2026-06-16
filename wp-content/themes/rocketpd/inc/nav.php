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
	return is_page_template( 'page-templates/template-instructors.php' ) || is_post_type_archive( 'instructor' ) || is_singular( 'instructor' );
}

/**
 * Return true on the Course Index page.
 *
 * @return bool
 */
function rocketpd_is_courses_context() {
	return is_page_template( 'page-templates/template-courses.php' ) || ( function_exists( 'rocketpd_is_course_detail_context' ) && rocketpd_is_course_detail_context() );
}

/**
 * Return true on the Cohorts Index page.
 *
 * @return bool
 */
function rocketpd_nav_is_cohorts_context() {
	return ( function_exists( 'rocketpd_is_cohorts_context' ) && rocketpd_is_cohorts_context() )
		|| ( function_exists( 'rocketpd_is_cohort_detail_context' ) && rocketpd_is_cohort_detail_context() );
}

/**
 * Return true on the Topic Index page.
 *
 * @return bool
 */
function rocketpd_nav_is_topics_context() {
	return ( function_exists( 'rocketpd_is_topics_context' ) && rocketpd_is_topics_context() )
		|| ( function_exists( 'rocketpd_is_topic_detail_context' ) && rocketpd_is_topic_detail_context() );
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
	$title = ! empty( $item->title ) ? sanitize_title( $item->title ) : '';

	return in_array( $path, array( '/launchpad/courses', '/launchpad' ), true ) || in_array( $title, array( 'courses', 'video-courses' ), true );
}

/**
 * Return true when a menu item points to the Cohorts Index route.
 *
 * @param WP_Post $item Menu item.
 * @return bool
 */
function rocketpd_is_cohorts_menu_item( $item ) {
	if ( empty( $item->url ) ) {
		return false;
	}

	$path  = wp_parse_url( $item->url, PHP_URL_PATH );
	$path  = $path ? untrailingslashit( $path ) : '';
	$title = ! empty( $item->title ) ? sanitize_title( $item->title ) : '';

	return '/cohorts' === $path || 'cohorts' === $title;
}

/**
 * Return true when a menu item points to the Topic Index route.
 *
 * @param WP_Post $item Menu item.
 * @return bool
 */
function rocketpd_is_topics_menu_item( $item ) {
	if ( empty( $item->url ) ) {
		return false;
	}

	$path  = wp_parse_url( $item->url, PHP_URL_PATH );
	$path  = $path ? untrailingslashit( $path ) : '';
	$title = ! empty( $item->title ) ? sanitize_title( $item->title ) : '';

	return in_array( $path, array( '/topic', '/topics' ), true ) || 'topics' === $title;
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
			$is_cohorts     = rocketpd_nav_is_cohorts_context();
			$is_topics      = rocketpd_nav_is_topics_context();
			$items = array(
				array(
					'label'   => __( 'Topics', 'rocketpd' ),
					'url'     => home_url( '/topic/' ),
					'current' => $is_topics,
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
					'label'   => __( 'Cohorts', 'rocketpd' ),
					'url'     => home_url( '/cohorts/' ),
					'current' => $is_cohorts,
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
 * Add current-menu-item to assigned menu items that point to Cohorts.
 *
 * @param array   $classes Menu item classes.
 * @param WP_Post $item    Menu item.
 * @param object  $args    Menu args.
 * @return array
 */
function rocketpd_cohorts_nav_classes( $classes, $item, $args ) {
	if ( isset( $args->theme_location ) && 'primary' === $args->theme_location && rocketpd_nav_is_cohorts_context() && rocketpd_is_cohorts_menu_item( $item ) ) {
		$classes[] = 'current-menu-item';
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'rocketpd_cohorts_nav_classes', 10, 3 );

/**
 * Add current-menu-item to assigned menu items that point to Topics.
 *
 * @param array   $classes Menu item classes.
 * @param WP_Post $item    Menu item.
 * @param object  $args    Menu args.
 * @return array
 */
function rocketpd_topics_nav_classes( $classes, $item, $args ) {
	if ( isset( $args->theme_location ) && 'primary' === $args->theme_location && rocketpd_nav_is_topics_context() && rocketpd_is_topics_menu_item( $item ) ) {
		$classes[] = 'current-menu-item';
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'rocketpd_topics_nav_classes', 10, 3 );

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

/**
 * Add aria-current to assigned menu items that point to Cohorts.
 *
 * @param array   $atts Link attributes.
 * @param WP_Post $item Menu item.
 * @param object  $args Menu args.
 * @return array
 */
function rocketpd_cohorts_nav_link_attributes( $atts, $item, $args ) {
	if ( isset( $args->theme_location ) && 'primary' === $args->theme_location && rocketpd_nav_is_cohorts_context() && rocketpd_is_cohorts_menu_item( $item ) ) {
		$atts['aria-current'] = 'page';
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'rocketpd_cohorts_nav_link_attributes', 10, 3 );

/**
 * Add aria-current to assigned menu items that point to Topics.
 *
 * @param array   $atts Link attributes.
 * @param WP_Post $item Menu item.
 * @param object  $args Menu args.
 * @return array
 */
function rocketpd_topics_nav_link_attributes( $atts, $item, $args ) {
	if ( isset( $args->theme_location ) && 'primary' === $args->theme_location && rocketpd_nav_is_topics_context() && rocketpd_is_topics_menu_item( $item ) ) {
		$atts['aria-current'] = 'page';
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'rocketpd_topics_nav_link_attributes', 10, 3 );

/**
 * Dynamically inject Topics and Instructors sub-items into the primary nav menu,
 * replacing any manually-added sub-items with live data.
 *
 * Fires on the primary location only. Safe to disable by removing the filter.
 *
 * @param array    $items Menu item objects.
 * @param stdClass $args  wp_nav_menu() args.
 * @return array
 */
function rocketpd_inject_dynamic_nav_subitems( $items, $args ) {
	if ( ! isset( $args->theme_location ) || 'primary' !== $args->theme_location ) {
		return $items;
	}

	// Find top-level Topics and Instructors items; strip their existing children.
	$parent_ids  = array();
	$clean_items = array();

	foreach ( $items as $item ) {
		$path = wp_parse_url( $item->url, PHP_URL_PATH );
		$path = $path ? untrailingslashit( $path ) : '';

		$is_topics      = in_array( $path, array( '/topic', '/topics' ), true );
		$is_instructors = in_array( $path, array( '/instructor', '/instructors' ), true );

		if ( ( $is_topics || $is_instructors ) && 0 === (int) $item->menu_item_parent ) {
			$parent_ids[ $item->ID ] = $is_topics ? 'topics' : 'instructors';
			$clean_items[] = $item;
			continue;
		}

		// Drop manually-added children of Topics or Instructors.
		if ( isset( $parent_ids[ (int) $item->menu_item_parent ] ) ) {
			continue;
		}

		$clean_items[] = $item;
	}

	// Build dynamic children and inject after their parent.
	$result   = array();
	$order    = 1;

	foreach ( $clean_items as $item ) {
		$item->menu_order = $order++;
		$result[]         = $item;

		if ( ! isset( $parent_ids[ $item->ID ] ) ) {
			continue;
		}

		$type     = $parent_ids[ $item->ID ];
		$children = array();

		if ( 'topics' === $type && function_exists( 'rocketpd_get_topics' ) ) {
			foreach ( rocketpd_get_topics() as $topic ) {
				$children[] = array( 'title' => $topic['title'], 'url' => $topic['href'] );
			}
		} elseif ( 'instructors' === $type ) {
			$posts = get_posts( array(
				'post_type'      => 'instructor',
				'posts_per_page' => -1,
				'orderby'        => 'title',
				'order'          => 'ASC',
				'post_status'    => 'publish',
			) );
			foreach ( $posts as $post ) {
				$children[] = array( 'title' => $post->post_title, 'url' => get_permalink( $post->ID ) );
			}
		}

		foreach ( $children as $child ) {
			$child_item                   = new stdClass();
			$child_item->ID               = 0;
			$child_item->db_id            = 0;
			$child_item->menu_item_parent = $item->ID;
			$child_item->object_id        = 0;
			$child_item->object           = 'custom';
			$child_item->type             = 'custom';
			$child_item->type_label       = 'Custom Link';
			$child_item->title            = $child['title'];
			$child_item->url              = $child['url'];
			$child_item->target           = '';
			$child_item->attr_title       = '';
			$child_item->description      = '';
			$child_item->classes          = array( '' );
			$child_item->xfn              = '';
			$child_item->menu_order       = $order++;
			$child_item->post_parent      = 0;
			$child_item->current          = false;
			$child_item->current_item_ancestor = false;
			$child_item->current_item_parent   = false;
			$result[] = $child_item;
		}
	}

	return $result;
}
add_filter( 'wp_nav_menu_objects', 'rocketpd_inject_dynamic_nav_subitems', 10, 2 );
