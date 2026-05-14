<?php
/**
 * Course detail hero.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course     = function_exists( 'rocketpd_get_current_course_detail' ) ? rocketpd_get_current_course_detail() : array();
$format     = function_exists( 'rocketpd_get_course_format' ) ? rocketpd_get_course_format( $course['format'] ?? 'self-paced' ) : array( 'label' => __( 'Self-Paced Course', 'rocketpd' ), 'tone' => 'gold' );
$instructor = $course['instructor'] ?? array();
$primary    = $course['primaryCta'] ?? array();
$secondary  = $course['secondaryCta'] ?? array();
$meta       = isset( $course['meta'] ) && is_array( $course['meta'] ) ? $course['meta'] : array();
$youtube_id  = $course['trailerYouTubeId'] ?? '1lOJDsHcCPQ';
$poster_url  = 'https://img.youtube.com/vi/' . rawurlencode( $youtube_id ) . '/hqdefault.jpg';
?>

<section class="rpd-course-hero rpd-course-tone--<?php echo esc_attr( $format['tone'] ?? 'gold' ); ?>">
	<span class="rpd-course-orb rpd-course-orb--blue" aria-hidden="true"></span>
	<span class="rpd-course-orb rpd-course-orb--magenta" aria-hidden="true"></span>
	<div class="rpd-container rpd-course-hero__inner">
		<div class="rpd-course-hero__content">
			<p class="rpd-course-format-badge"><?php echo esc_html( ( $format['label'] ?? __( 'Self-Paced Course', 'rocketpd' ) ) . ' · ' . ( $course['topic'] ?? __( 'Teacher Evaluation', 'rocketpd' ) ) ); ?></p>
			<h1><?php echo esc_html( $course['title'] ?? '' ); ?></h1>
			<div class="rpd-course-instructor-row">
				<?php if ( ! empty( $instructor['headshot'] ) ) : ?>
					<img src="<?php echo esc_url( $instructor['headshot'] ); ?>" alt="<?php echo esc_attr( $instructor['name'] ?? '' ); ?>">
				<?php endif; ?>
				<div>
					<strong>
						<?php
						printf(
							/* translators: %s: instructor name. */
							esc_html__( 'with %s', 'rocketpd' ),
							esc_html( $instructor['name'] ?? '' )
						);
						?>
					</strong>
					<span><?php echo esc_html( $instructor['roleLine'] ?? $instructor['title'] ?? '' ); ?></span>
				</div>
			</div>
			<p class="rpd-course-hero__promise"><?php echo esc_html( $course['promise'] ?? '' ); ?></p>
			<div class="rpd-course-hero__commerce">
				<div class="rpd-course-price-card">
					<strong><?php echo esc_html( $course['price'] ?? '' ); ?></strong>
					<span><?php echo esc_html( $course['priceMeta'] ?? '' ); ?></span>
				</div>
				<div class="rpd-course-hero__actions">
					<?php if ( ! empty( $primary['label'] ) && ! empty( $primary['href'] ) ) : ?>
						<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary['href'] ); ?>"><?php echo esc_html( $primary['label'] ); ?><span aria-hidden="true">-&gt;</span></a>
					<?php endif; ?>
					<?php if ( ! empty( $secondary['label'] ) && ! empty( $secondary['href'] ) ) : ?>
						<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $secondary['href'] ); ?>"><?php echo esc_html( $secondary['label'] ); ?></a>
					<?php endif; ?>
				</div>
			</div>
			<?php if ( $meta ) : ?>
				<ul class="rpd-course-meta-row" aria-label="<?php esc_attr_e( 'Course details', 'rocketpd' ); ?>">
					<?php foreach ( $meta as $item ) : ?>
						<li><span aria-hidden="true"></span><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
		<div class="rpd-course-hero__video" id="course-trailer">
			<span><?php esc_html_e( 'Official Trailer', 'rocketpd' ); ?></span>
			<div class="rpd-course-video-frame" style="--rpd-course-video-poster: url('<?php echo esc_url( $poster_url ); ?>');">
				<iframe loading="lazy" title="<?php echo esc_attr( ( $course['title'] ?? __( 'Course', 'rocketpd' ) ) . ' official trailer' ); ?>" src="<?php echo esc_url( 'https://www.youtube-nocookie.com/embed/' . rawurlencode( $youtube_id ) ); ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</section>
