<?php
/**
 * Courses filterable gallery.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$courses     = function_exists( 'rocketpd_get_courses' ) ? rocketpd_get_courses() : array();
$groups      = function_exists( 'rocketpd_get_courses_by_format' ) ? rocketpd_get_courses_by_format() : array();
$formats     = function_exists( 'rocketpd_get_course_format_meta' ) ? rocketpd_get_course_format_meta() : array();
$topics      = function_exists( 'rocketpd_get_course_filter_values' ) ? rocketpd_get_course_filter_values( 'topic' ) : array();
$instructors = function_exists( 'rocketpd_get_course_filter_values' ) ? rocketpd_get_course_filter_values( 'instructor' ) : array();
$audiences   = function_exists( 'rocketpd_get_course_filter_values' ) ? rocketpd_get_course_filter_values( 'audiences' ) : array();
$eyebrow     = rocketpd_get_field( 'rpd_courses_gallery_eyebrow', __( 'Learning Gallery', 'rocketpd' ) );
$headline    = rocketpd_get_field( 'rpd_courses_gallery_headline', __( 'Find the right course for your team.', 'rocketpd' ) );
$body        = rocketpd_get_field( 'rpd_courses_gallery_body', __( 'Filter by format, topic, instructor, or audience. Every course is built and delivered by a nationally recognized K-12 thought leader.', 'rocketpd' ) );
$empty_title = rocketpd_get_field( 'rpd_courses_empty_title', __( 'No courses match these filters yet.', 'rocketpd' ) );
$empty_body  = rocketpd_get_field( 'rpd_courses_empty_body', __( 'Try clearing one or two filters to see more.', 'rocketpd' ) );

$render_course = function ( $course ) {
	$format      = rocketpd_get_course_format( $course['format'] ?? 'self-paced' );
	$audiences   = isset( $course['audiences'] ) && is_array( $course['audiences'] ) ? $course['audiences'] : array();
	$image       = $course['image'] ?? '';
	$headshot    = $course['headshot'] ?? '';
	$search_text = strtolower( implode( ' ', array_merge( array( $course['title'] ?? '', $course['instructor'] ?? '', $course['topic'] ?? '', $course['description'] ?? '', $format['label'] ?? '', $course['format'] ?? '' ), $audiences ) ) );
	?>
	<article
		class="rpd-course-card rpd-course-tone--<?php echo esc_attr( $format['tone'] ); ?>"
		data-rpd-course-card
		data-format="<?php echo esc_attr( $course['format'] ?? '' ); ?>"
		data-topic="<?php echo esc_attr( $course['topic'] ?? '' ); ?>"
		data-instructor="<?php echo esc_attr( $course['instructor'] ?? '' ); ?>"
		data-audiences="<?php echo esc_attr( implode( '|', $audiences ) ); ?>"
		data-search="<?php echo esc_attr( $search_text ); ?>"
	>
		<a class="rpd-course-card__link" href="<?php echo esc_url( $course['href'] ?? '#' ); ?>" aria-label="<?php echo esc_attr( sprintf( '%1$s: %2$s with %3$s', $format['label'], $course['title'] ?? '', $course['instructor'] ?? '' ) ); ?>">
			<div class="rpd-course-card__media">
				<?php if ( $image ) : ?>
					<img src="<?php echo esc_url( $image ); ?>" alt="">
				<?php else : ?>
					<span class="rpd-course-card__fallback"><?php echo esc_html( substr( $course['instructor'] ?? 'RPD', 0, 2 ) ); ?></span>
				<?php endif; ?>
				<span class="rpd-course-card__badge"><?php echo esc_html( $format['label'] ); ?></span>
				<span class="rpd-course-card__price"><?php echo esc_html( $course['price'] ?? '' ); ?></span>
				<span class="rpd-course-card__glyph" data-icon="<?php echo esc_attr( $format['icon'] ); ?>" aria-hidden="true"></span>
				<span class="rpd-course-card__meta"><?php echo esc_html( $course['meta'] ?? '' ); ?></span>
			</div>
			<div class="rpd-course-card__body">
				<p class="rpd-course-card__topic"><span aria-hidden="true"></span><?php echo esc_html( $course['topic'] ?? '' ); ?></p>
				<h3><?php echo esc_html( $course['title'] ?? '' ); ?></h3>
				<p class="rpd-course-card__instructor">
					<?php if ( $headshot ) : ?>
						<img src="<?php echo esc_url( $headshot ); ?>" alt="">
					<?php endif; ?>
					<?php
					printf(
						/* translators: %s: instructor name. */
						esc_html__( 'with %s', 'rocketpd' ),
						esc_html( $course['instructor'] ?? '' )
					);
					?>
				</p>
				<p class="rpd-course-card__description"><?php echo esc_html( $course['description'] ?? '' ); ?></p>
				<?php if ( $audiences ) : ?>
					<div class="rpd-course-card__audiences">
						<?php foreach ( array_slice( $audiences, 0, 2 ) as $audience ) : ?>
							<span><?php echo esc_html( $audience ); ?></span>
						<?php endforeach; ?>
						<?php if ( count( $audiences ) > 2 ) : ?>
							<span><?php echo esc_html( '+' . ( count( $audiences ) - 2 ) ); ?></span>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<footer>
					<span><i aria-hidden="true"></i><?php echo esc_html( $format['label'] ); ?></span>
					<strong><?php echo esc_html( $format['cta'] ); ?><span aria-hidden="true">-&gt;</span></strong>
				</footer>
			</div>
		</a>
	</article>
	<?php
};
?>

<section class="rpd-courses-gallery" id="course-gallery" data-rpd-courses>
	<span class="rpd-courses-gallery__anchor" id="gallery" aria-hidden="true"></span>
	<div class="rpd-container">
		<header class="rpd-courses-gallery__header">
			<div>
				<p><?php echo esc_html( $eyebrow ); ?></p>
				<h2><?php echo esc_html( $headline ); ?></h2>
			</div>
			<span><?php echo esc_html( $body ); ?></span>
		</header>

		<div class="rpd-courses-filter-card">
			<div class="rpd-courses-search">
				<label for="rpd-course-search"><?php esc_html_e( 'Search courses', 'rocketpd' ); ?></label>
				<input id="rpd-course-search" type="search" data-rpd-course-search placeholder="<?php esc_attr_e( 'Search by course, instructor, or topic...', 'rocketpd' ); ?>">
			</div>

			<div class="rpd-courses-format-filters" aria-label="<?php esc_attr_e( 'Filter by course format', 'rocketpd' ); ?>">
				<button class="is-active" type="button" data-rpd-format-filter="all" aria-pressed="true"><?php esc_html_e( 'All Formats', 'rocketpd' ); ?></button>
				<?php foreach ( $formats as $key => $format ) : ?>
					<button type="button" data-rpd-format-filter="<?php echo esc_attr( $key ); ?>" aria-pressed="false"><?php echo esc_html( $format['label'] ); ?></button>
				<?php endforeach; ?>
			</div>

			<div class="rpd-courses-select-grid">
				<label>
					<span><?php esc_html_e( 'Topic', 'rocketpd' ); ?></span>
					<select data-rpd-course-select="topic">
						<option value="all"><?php esc_html_e( 'All Topics', 'rocketpd' ); ?></option>
						<?php foreach ( $topics as $topic ) : ?>
							<option value="<?php echo esc_attr( $topic ); ?>"><?php echo esc_html( $topic ); ?></option>
						<?php endforeach; ?>
					</select>
				</label>
				<label>
					<span><?php esc_html_e( 'Instructor', 'rocketpd' ); ?></span>
					<select data-rpd-course-select="instructor">
						<option value="all"><?php esc_html_e( 'All Instructors', 'rocketpd' ); ?></option>
						<?php foreach ( $instructors as $instructor ) : ?>
							<option value="<?php echo esc_attr( $instructor ); ?>"><?php echo esc_html( $instructor ); ?></option>
						<?php endforeach; ?>
					</select>
				</label>
				<label>
					<span><?php esc_html_e( 'Audience', 'rocketpd' ); ?></span>
					<select data-rpd-course-select="audience">
						<option value="all"><?php esc_html_e( 'All Audiences', 'rocketpd' ); ?></option>
						<?php foreach ( $audiences as $audience ) : ?>
							<option value="<?php echo esc_attr( $audience ); ?>"><?php echo esc_html( $audience ); ?></option>
						<?php endforeach; ?>
					</select>
				</label>
			</div>
		</div>

		<div class="rpd-courses-filter-status" data-rpd-course-status hidden>
			<p aria-live="polite"><span data-rpd-course-status-text></span></p>
			<button type="button" data-rpd-course-clear><?php esc_html_e( 'Clear all', 'rocketpd' ); ?></button>
		</div>

		<div class="rpd-courses-groups" data-rpd-course-groups>
			<?php foreach ( $groups as $format_key => $group_courses ) : ?>
				<?php
				if ( empty( $group_courses ) ) {
					continue;
				}
				$format = rocketpd_get_course_format( $format_key );
				?>
				<section class="rpd-courses-group rpd-course-tone--<?php echo esc_attr( $format['tone'] ); ?>" data-rpd-course-group="<?php echo esc_attr( $format_key ); ?>">
					<header>
						<span data-icon="<?php echo esc_attr( $format['icon'] ); ?>" aria-hidden="true"></span>
						<div>
							<h3><?php echo esc_html( $format['group_label'] ); ?> · <span data-rpd-course-group-count><?php echo esc_html( count( $group_courses ) ); ?></span></h3>
							<p><?php echo esc_html( $format['group_subtitle'] ); ?></p>
						</div>
					</header>
					<div class="rpd-courses-grid">
						<?php foreach ( $group_courses as $course ) : ?>
							<?php $render_course( $course ); ?>
						<?php endforeach; ?>
					</div>
				</section>
			<?php endforeach; ?>
		</div>

		<div class="rpd-courses-flat-grid" data-rpd-course-flat-grid hidden>
			<?php foreach ( $courses as $course ) : ?>
				<?php $render_course( $course ); ?>
			<?php endforeach; ?>
		</div>

		<div class="rpd-courses-empty" data-rpd-course-empty hidden>
			<h3><?php echo esc_html( $empty_title ); ?></h3>
			<p><?php echo esc_html( $empty_body ); ?></p>
			<button class="rpd-btn rpd-btn--outline-purple" type="button" data-rpd-course-clear><?php esc_html_e( 'Clear all', 'rocketpd' ); ?></button>
		</div>
	</div>
</section>
