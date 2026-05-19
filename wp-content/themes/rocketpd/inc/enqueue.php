<?php
/**
 * Asset loading.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue global theme assets.
 */
function rocketpd_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );
	$css_files     = array(
		'00-tokens',
		'01-base',
		'02-typography',
		'03-layout',
		'04-components',
		'05-forms',
		'06-header',
		'07-footer',
	);

	wp_enqueue_style(
		'rocketpd-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@600;700;800;900&display=swap',
		array(),
		null
	);

	$dependency = array( 'rocketpd-fonts' );

	foreach ( $css_files as $css_file ) {
		$handle = 'rocketpd-' . $css_file;
		$path   = get_template_directory() . '/assets/css/' . $css_file . '.css';

		wp_enqueue_style(
			$handle,
			get_template_directory_uri() . '/assets/css/' . $css_file . '.css',
			$dependency,
			file_exists( $path ) ? filemtime( $path ) : $theme_version
		);

		$dependency = array( $handle );
	}

	$enqueue_page_style = function ( $handle, $relative_path, $dependencies = array( 'rocketpd-07-footer' ) ) use ( $theme_version ) {
		$asset_path = get_template_directory() . $relative_path;

		wp_enqueue_style(
			$handle,
			get_template_directory_uri() . $relative_path,
			$dependencies,
			file_exists( $asset_path ) ? filemtime( $asset_path ) : $theme_version
		);
	};

	wp_enqueue_script(
		'rocketpd-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		$theme_version,
		true
	);

	wp_enqueue_script(
		'rocketpd-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array( 'rocketpd-main' ),
		$theme_version,
		true
	);

	if ( is_page_template( 'page-templates/template-about.php' ) ) {
		$enqueue_page_style( 'rocketpd-about', '/assets/css/pages/about.css' );
	}

	if ( is_page_template( 'page-templates/template-community.php' ) ) {
		$enqueue_page_style( 'rocketpd-community', '/assets/css/pages/community.css' );
	}

	if ( is_page_template( 'page-templates/template-contact.php' ) ) {
		$enqueue_page_style( 'rocketpd-contact', '/assets/css/pages/contact.css' );
	}

	if ( function_exists( 'rocketpd_is_cohorts_context' ) && rocketpd_is_cohorts_context() ) {
		$enqueue_page_style( 'rocketpd-cohorts', '/assets/css/pages/cohorts.css' );

		$cohorts_script_path = get_template_directory() . '/assets/js/cohorts.js';

		wp_enqueue_script(
			'rocketpd-cohorts',
			get_template_directory_uri() . '/assets/js/cohorts.js',
			array( 'rocketpd-main' ),
			file_exists( $cohorts_script_path ) ? filemtime( $cohorts_script_path ) : $theme_version,
			true
		);
	}

	if ( function_exists( 'rocketpd_is_cohort_detail_context' ) && rocketpd_is_cohort_detail_context() ) {
		$enqueue_page_style( 'rocketpd-cohort-detail', '/assets/css/pages/cohort-detail.css' );

		$cohort_detail_script_path = get_template_directory() . '/assets/js/cohort-detail.js';

		wp_enqueue_script(
			'rocketpd-cohort-detail',
			get_template_directory_uri() . '/assets/js/cohort-detail.js',
			array( 'rocketpd-main' ),
			file_exists( $cohort_detail_script_path ) ? filemtime( $cohort_detail_script_path ) : $theme_version,
			true
		);
	}

	if ( is_page_template( 'page-templates/template-courses.php' ) ) {
		$enqueue_page_style( 'rocketpd-courses', '/assets/css/pages/courses.css' );

		$courses_script_path = get_template_directory() . '/assets/js/courses.js';

		wp_enqueue_script(
			'rocketpd-courses',
			get_template_directory_uri() . '/assets/js/courses.js',
			array( 'rocketpd-main' ),
			file_exists( $courses_script_path ) ? filemtime( $courses_script_path ) : $theme_version,
			true
		);
	}

	if ( function_exists( 'rocketpd_is_course_detail_context' ) && rocketpd_is_course_detail_context() ) {
		$enqueue_page_style( 'rocketpd-course-detail', '/assets/css/pages/course-detail.css' );

		$course_detail_script_path = get_template_directory() . '/assets/js/course-detail.js';

		wp_enqueue_script(
			'rocketpd-course-detail',
			get_template_directory_uri() . '/assets/js/course-detail.js',
			array( 'rocketpd-main' ),
			file_exists( $course_detail_script_path ) ? filemtime( $course_detail_script_path ) : $theme_version,
			true
		);
	}

	if ( is_page_template( 'page-templates/template-instructors.php' ) ) {
		$enqueue_page_style( 'rocketpd-instructors', '/assets/css/pages/instructors.css' );

		$instructors_script_path = get_template_directory() . '/assets/js/instructors.js';

		wp_enqueue_script(
			'rocketpd-instructors',
			get_template_directory_uri() . '/assets/js/instructors.js',
			array( 'rocketpd-main' ),
			file_exists( $instructors_script_path ) ? filemtime( $instructors_script_path ) : $theme_version,
			true
		);
	}

	if ( is_singular( 'instructor' ) ) {
		$enqueue_page_style( 'rocketpd-instructor-detail', '/assets/css/pages/instructor-detail.css' );

		$instructor_detail_script_path = get_template_directory() . '/assets/js/instructor-detail.js';

		wp_enqueue_script(
			'rocketpd-instructor-detail',
			get_template_directory_uri() . '/assets/js/instructor-detail.js',
			array( 'rocketpd-main' ),
			file_exists( $instructor_detail_script_path ) ? filemtime( $instructor_detail_script_path ) : $theme_version,
			true
		);
	}

	if ( is_page_template( 'page-templates/template-launchpad.php' ) ) {
		$enqueue_page_style( 'rocketpd-launchpad', '/assets/css/pages/launchpad.css' );
	}

	if ( is_page_template( 'page-templates/template-launchpad-plus.php' ) ) {
		$enqueue_page_style( 'rocketpd-launchpad-plus', '/assets/css/pages/launchpad-plus.css' );
	}

	if ( is_page_template( 'page-templates/template-lead-magnet.php' ) ) {
		$enqueue_page_style( 'rocketpd-lead-magnet', '/assets/css/pages/lead-magnet.css' );
	}

	if ( is_page_template( 'page-templates/template-lead-thank-you.php' ) ) {
		$enqueue_page_style( 'rocketpd-lead-thank-you', '/assets/css/pages/lead-thank-you.css' );
	}

	if ( function_exists( 'rocketpd_is_topics_context' ) && rocketpd_is_topics_context() ) {
		$enqueue_page_style( 'rocketpd-topics', '/assets/css/pages/topics.css' );

		$topics_script_path = get_template_directory() . '/assets/js/topics.js';

		wp_enqueue_script(
			'rocketpd-topics',
			get_template_directory_uri() . '/assets/js/topics.js',
			array( 'rocketpd-main' ),
			file_exists( $topics_script_path ) ? filemtime( $topics_script_path ) : $theme_version,
			true
		);
	}

	if ( function_exists( 'rocketpd_is_topic_detail_context' ) && rocketpd_is_topic_detail_context() ) {
		$enqueue_page_style( 'rocketpd-topic-detail', '/assets/css/pages/topic-detail.css' );

		$topic_detail_script_path = get_template_directory() . '/assets/js/topic-detail.js';

		wp_enqueue_script(
			'rocketpd-topic-detail',
			get_template_directory_uri() . '/assets/js/topic-detail.js',
			array( 'rocketpd-main' ),
			file_exists( $topic_detail_script_path ) ? filemtime( $topic_detail_script_path ) : $theme_version,
			true
		);
	}

	if ( is_page_template( 'page-templates/template-trust-cycle-guide.php' ) ) {
		$enqueue_page_style( 'rocketpd-trust-cycle-guide', '/assets/css/pages/trust-cycle-guide.css' );
	}

	if ( is_front_page() ) {
		$enqueue_page_style( 'rocketpd-home', '/assets/css/pages/home.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'rocketpd_enqueue_assets' );
