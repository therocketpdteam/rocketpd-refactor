<?php
/**
 * Instructor Index seed data.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the Instructor Index topic labels.
 *
 * @return array
 */
function rocketpd_get_instructor_topics() {
	return array(
		__( 'All Experts', 'rocketpd' ),
		__( 'Instructional Leadership', 'rocketpd' ),
		__( 'Teacher Evaluation', 'rocketpd' ),
		__( 'Coaching', 'rocketpd' ),
		__( 'MTSS', 'rocketpd' ),
		__( 'AI in Education', 'rocketpd' ),
		__( 'Family Engagement', 'rocketpd' ),
		__( 'Project-Based Learning', 'rocketpd' ),
		__( 'Student Engagement', 'rocketpd' ),
		__( 'School Culture', 'rocketpd' ),
		__( 'Personalized Learning', 'rocketpd' ),
		__( 'Math Instruction', 'rocketpd' ),
		__( 'Literacy', 'rocketpd' ),
		__( 'Change Management', 'rocketpd' ),
	);
}

/**
 * Return display labels for instructor format keys.
 *
 * @return array
 */
function rocketpd_get_instructor_format_labels() {
	return array(
		'guide'     => __( 'Guide', 'rocketpd' ),
		'podcast'   => __( 'Podcast', 'rocketpd' ),
		'webinar'   => __( 'Webinar', 'rocketpd' ),
		'launchpad' => __( 'LaunchPad', 'rocketpd' ),
		'cohort'    => __( 'Cohort', 'rocketpd' ),
		'workshop'  => __( 'Workshop', 'rocketpd' ),
	);
}

/**
 * Return icon labels for instructor format keys.
 *
 * @return array
 */
function rocketpd_get_instructor_format_icons() {
	return array(
		'guide'     => 'book',
		'podcast'   => 'audio',
		'webinar'   => 'play',
		'launchpad' => 'video',
		'cohort'    => 'group',
		'workshop'  => 'board',
	);
}

/**
 * Return the Instructor Index data contract.
 *
 * @return array
 */
function rocketpd_get_instructors() {
	return array(
		array(
			'slug'           => 'kim-marshall',
			'name'           => __( 'Kim Marshall', 'rocketpd' ),
			'authority'      => __( 'Helping school leaders rethink supervision, coaching & teacher evaluation.', 'rocketpd' ),
			'transformation' => __( 'Reduce evaluation stress - build teacher trust', 'rocketpd' ),
			'tags'           => array( __( 'Teacher Evaluation', 'rocketpd' ), __( 'Coaching', 'rocketpd' ), __( 'Instructional Leadership', 'rocketpd' ) ),
			'formats'        => array( 'guide', 'podcast', 'webinar', 'launchpad', 'cohort' ),
			'headshot'       => 'https://rocketpd.com/wp-content/uploads/2022/02/MicrosoftTeams-image-21.png',
			'featured'       => true,
			'initials'       => 'KM',
		),
		array(
			'slug'           => 'dr-luvelle-brown',
			'name'           => __( 'Dr. Luvelle Brown', 'rocketpd' ),
			'authority'      => __( 'Designing schools where students and educators are seen, heard, and loved.', 'rocketpd' ),
			'transformation' => __( 'Build a culture of love & belonging', 'rocketpd' ),
			'tags'           => array( __( 'School Culture', 'rocketpd' ), __( 'Instructional Leadership', 'rocketpd' ) ),
			'formats'        => array( 'guide', 'cohort', 'workshop' ),
			'headshot'       => 'https://rocketpd.com/wp-content/uploads/2022/02/Dr.Luvelle.png',
			'featured'       => false,
			'initials'       => 'LB',
		),
		array(
			'slug'           => 'dr-catlin-tucker',
			'name'           => __( 'Dr. Catlin Tucker', 'rocketpd' ),
			'authority'      => __( 'Pioneering blended learning and Universal Design for Learning in K-12 classrooms.', 'rocketpd' ),
			'transformation' => __( 'Differentiate instruction at scale', 'rocketpd' ),
			'tags'           => array( __( 'Personalized Learning', 'rocketpd' ), __( 'Student Engagement', 'rocketpd' ) ),
			'formats'        => array( 'guide', 'launchpad', 'cohort' ),
			'headshot'       => 'https://rocketpd.com/wp-content/uploads/2024/03/catlin-tucker.jpg',
			'featured'       => false,
			'initials'       => 'CT',
		),
		array(
			'slug'           => 'eric-sheninger',
			'name'           => __( 'Eric Sheninger', 'rocketpd' ),
			'authority'      => __( 'Helping schools build ownership - not buy-in - for the hard work of change.', 'rocketpd' ),
			'transformation' => __( 'Move from buy-in to ownership', 'rocketpd' ),
			'tags'           => array( __( 'Instructional Leadership', 'rocketpd' ), __( 'Change Management', 'rocketpd' ) ),
			'formats'        => array( 'webinar', 'cohort', 'workshop' ),
			'headshot'       => 'https://rocketpd.com/wp-content/uploads/2024/03/eric-sheninger.jpg',
			'featured'       => false,
			'initials'       => 'ES',
		),
		array(
			'slug'           => 'dr-john-spencer',
			'name'           => __( 'Dr. John Spencer', 'rocketpd' ),
			'authority'      => __( 'Bringing real-world Project-Based Learning into every K-12 classroom.', 'rocketpd' ),
			'transformation' => __( 'Spark student creativity & ownership', 'rocketpd' ),
			'tags'           => array( __( 'Project-Based Learning', 'rocketpd' ), __( 'Student Engagement', 'rocketpd' ) ),
			'formats'        => array( 'guide', 'podcast', 'launchpad' ),
			'headshot'       => 'https://rocketpd.com/wp-content/uploads/2024/03/john-spencer.jpg',
			'featured'       => false,
			'initials'       => 'JS',
		),
		array(
			'slug'           => 'angela-watson',
			'name'           => __( 'Angela Watson', 'rocketpd' ),
			'authority'      => __( 'Time-management strategies that protect teacher energy and prevent burnout.', 'rocketpd' ),
			'transformation' => __( 'Reclaim 5 hours of your week', 'rocketpd' ),
			'tags'           => array( __( 'Teacher Productivity', 'rocketpd' ), __( 'School Culture', 'rocketpd' ) ),
			'formats'        => array( 'podcast', 'cohort' ),
			'headshot'       => 'https://rocketpd.com/wp-content/uploads/2024/03/angela-watson-1.jpg',
			'featured'       => false,
			'initials'       => 'AW',
		),
		array(
			'slug'           => 'matt-miller',
			'name'           => __( 'Matt Miller', 'rocketpd' ),
			'authority'      => __( 'Tech-powered classrooms that capture attention - and hold it.', 'rocketpd' ),
			'transformation' => __( 'Turn tech into student engagement', 'rocketpd' ),
			'tags'           => array( __( 'Student Engagement', 'rocketpd' ), __( 'AI in Education', 'rocketpd' ) ),
			'formats'        => array( 'webinar', 'cohort' ),
			'headshot'       => 'https://rocketpd.com/wp-content/uploads/2024/03/matt-miller.jpg',
			'featured'       => false,
			'initials'       => 'MM',
		),
		array(
			'slug'           => 'dr-ross-greene',
			'name'           => __( 'Dr. Ross Greene', 'rocketpd' ),
			'authority'      => __( 'Solving the problems that drive classroom behaviors - collaboratively.', 'rocketpd' ),
			'transformation' => __( 'Reduce disruptions, build trust', 'rocketpd' ),
			'tags'           => array( __( 'MTSS', 'rocketpd' ), __( 'Student Engagement', 'rocketpd' ) ),
			'formats'        => array( 'guide', 'cohort', 'workshop' ),
			'headshot'       => 'https://rocketpd.com/wp-content/uploads/2024/03/ross-greene.jpg',
			'featured'       => false,
			'initials'       => 'RG',
		),
		array(
			'slug'           => 'aj-juliani',
			'name'           => __( 'A.J. Juliani', 'rocketpd' ),
			'authority'      => __( 'Practical AI integration that protects student learning and teacher judgment.', 'rocketpd' ),
			'transformation' => __( 'Adopt AI without losing the craft', 'rocketpd' ),
			'tags'           => array( __( 'AI in Education', 'rocketpd' ), __( 'Instructional Leadership', 'rocketpd' ) ),
			'formats'        => array( 'guide', 'launchpad', 'workshop' ),
			'headshot'       => 'https://rocketpd.com/wp-content/uploads/2024/03/aj-juliani.jpg',
			'featured'       => false,
			'initials'       => 'AJ',
		),
	);
}
