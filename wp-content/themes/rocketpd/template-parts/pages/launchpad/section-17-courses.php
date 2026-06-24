<?php
/**
 * LaunchPad section 17 – course gallery with search + topic filter.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$courses = function_exists( 'rocketpd_get_courses_cpt' ) ? rocketpd_get_courses_cpt() : array();

if ( ! $courses ) {
	return;
}

// Build topic filter list from actual course data.
$topic_filters = array( 'all' => __( 'All Courses', 'rocketpd' ) );

foreach ( $courses as $course ) {
	$label = trim( $course['topic'] ?? '' );

	if ( $label && ! isset( $topic_filters[ sanitize_title( $label ) ] ) ) {
		$topic_filters[ sanitize_title( $label ) ] = $label;
	}
}
?>

<section class="rpd-lp-section rpd-lp-courses" id="courses" data-rpd-lp-courses>
	<div class="rpd-container">
		<header class="rpd-lp-instructors__header">
			<div>
				<p class="rpd-lp-eyebrow"><?php esc_html_e( 'Find the right course for your team.', 'rocketpd' ); ?></p>
				<h2><?php esc_html_e( 'Browse the Course Library.', 'rocketpd' ); ?></h2>
				<p><?php esc_html_e( 'Every course is led by a nationally recognized K–12 educator — available on demand, on your schedule.', 'rocketpd' ); ?></p>
			</div>
		</header>

		<div class="rpd-lp-courses-controls">
			<div class="rpd-lp-courses-search-row">
				<label class="screen-reader-text" for="rpd-lp-courses-search"><?php esc_html_e( 'Search courses', 'rocketpd' ); ?></label>
				<?php echo rocketpd_get_icon( 'search', 18, 'rpd-lp-courses-search-icon' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<input id="rpd-lp-courses-search" type="search" data-rpd-lp-courses-search placeholder="<?php esc_attr_e( 'Search topics, instructors, or descriptions...', 'rocketpd' ); ?>">
				<button type="button" data-rpd-lp-courses-clear data-rpd-lp-courses-clear-inline hidden><?php esc_html_e( 'Clear all', 'rocketpd' ); ?> <span data-rpd-lp-courses-active-count></span></button>
			</div>
			<div class="rpd-lp-courses-filter-row" aria-label="<?php esc_attr_e( 'Filter by topic', 'rocketpd' ); ?>">
				<span><?php esc_html_e( 'Topic', 'rocketpd' ); ?></span>
				<?php foreach ( $topic_filters as $key => $label ) : ?>
					<button
						class="<?php echo 'all' === $key ? 'is-active' : ''; ?>"
						type="button"
						data-rpd-lp-course-filter="<?php echo esc_attr( $key ); ?>"
						aria-pressed="<?php echo 'all' === $key ? 'true' : 'false'; ?>"
					><?php echo esc_html( $label ); ?></button>
				<?php endforeach; ?>
			</div>
		</div>

		<p class="rpd-lp-courses-status" aria-live="polite" data-rpd-lp-courses-status></p>

		<div class="rpd-lp-instructor-grid">
			<?php foreach ( $courses as $course ) : ?>
				<?php
				$format      = function_exists( 'rocketpd_get_course_format' ) ? rocketpd_get_course_format( $course['format'] ?? 'self-paced' ) : array();
				$topic_slug  = sanitize_title( $course['topic'] ?? '' );
				$search_text = strtolower( implode( ' ', array(
					$course['title'] ?? '',
					$course['topic'] ?? '',
					$course['instructor'] ?? '',
					$course['description'] ?? '',
					$format['label'] ?? '',
				) ) );
				?>
				<a
					href="<?php echo esc_url( $course['href'] ?? '#' ); ?>"
					class="rpd-lp-instructor-card"
					data-rpd-lp-course-card
					data-topic="<?php echo esc_attr( $topic_slug ); ?>"
					data-search="<?php echo esc_attr( $search_text ); ?>"
				>
					<div class="rpd-lp-instructor-card__image">
						<?php if ( ! empty( $course['image'] ) ) : ?>
							<img src="<?php echo esc_url( $course['image'] ); ?>" alt="">
						<?php endif; ?>
						<b>
							<?php rocketpd_lp_icon( $format['icon'] ?? 'play' ); ?>
							<?php echo esc_html( $format['cta'] ?? __( 'Open course', 'rocketpd' ) ); ?>
							<?php if ( ! empty( $course['meta'] ) ) : ?>
								<small><?php echo esc_html( $course['meta'] ); ?></small>
							<?php endif; ?>
						</b>
					</div>
					<p><?php echo esc_html( $course['topic'] ?? '' ); ?></p>
					<h3><?php echo esc_html( $course['title'] ?? '' ); ?></h3>
					<span><?php echo esc_html( $course['description'] ?? '' ); ?></span>
				</a>
			<?php endforeach; ?>
		</div>

		<div class="rpd-lp-courses__more" data-rpd-lp-courses-load-more hidden>
			<button class="rpd-lp-btn" type="button"><?php esc_html_e( 'Show more courses', 'rocketpd' ); ?></button>
		</div>

		<div class="rpd-lp-courses-empty" data-rpd-lp-courses-empty hidden>
			<h3><?php esc_html_e( 'No courses match your search.', 'rocketpd' ); ?></h3>
			<p><?php esc_html_e( 'Try a different keyword or clear the filters.', 'rocketpd' ); ?></p>
			<button class="rpd-lp-btn" type="button" data-rpd-lp-courses-clear><?php esc_html_e( 'Clear filters', 'rocketpd' ); ?></button>
		</div>
	</div>
</section>
