<?php
/**
 * Courses hero.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$courses       = function_exists( 'rocketpd_get_courses' ) ? rocketpd_get_courses() : array();
$floating_keys = array(
	'rethinking-teacher-supervision-coaching-evaluation',
	'build-ownership-not-buy-in-live-cohort',
	'mini-observations-that-actually-move-teaching',
);
$floating      = array();

foreach ( $floating_keys as $key ) {
	foreach ( $courses as $course ) {
		if ( isset( $course['slug'] ) && $key === $course['slug'] ) {
			$floating[] = $course;
			break;
		}
	}
}

$eyebrow         = rocketpd_get_field( 'rpd_courses_hero_eyebrow', __( 'Courses & Learning Experiences', 'rocketpd' ) );
$default_headline = __( 'Expert-Led K-12 Professional Learning, Built Around the Way Educators Actually Learn.', 'rocketpd' );
$headline         = rocketpd_get_field( 'rpd_courses_hero_headline', $default_headline );
$body            = rocketpd_get_field( 'rpd_courses_hero_body', __( 'Browse free webinars, self-paced video courses, and live-virtual cohorts led by nationally recognized K-12 experts. Choose the format that fits your team - or blend all three.', 'rocketpd' ) );
$primary_label   = rocketpd_get_field( 'rpd_courses_hero_primary_label', __( 'Browse Courses', 'rocketpd' ) );
$primary_url     = rocketpd_get_field( 'rpd_courses_hero_primary_url', '#course-gallery' );
$secondary_label = rocketpd_get_field( 'rpd_courses_hero_secondary_label', __( 'Explore Free Webinars', 'rocketpd' ) );
$secondary_url   = rocketpd_get_field( 'rpd_courses_hero_secondary_url', '#course-gallery' );
$trust_items     = rocketpd_get_repeater_rows(
	'rpd_courses_hero_trust_items',
	array(
		array( 'text' => __( '18+ Instructors', 'rocketpd' ) ),
		array( 'text' => __( '40K+ Educators Served', 'rocketpd' ) ),
		array( 'text' => __( '850+ Districts', 'rocketpd' ) ),
	),
	array( 'text' )
);
$headline_parts  = explode( ',', $headline, 2 );
$is_default_headline = trim( $headline ) === $default_headline;
?>

<section class="rpd-courses-hero">
	<span class="rpd-courses-orb rpd-courses-orb--blue" aria-hidden="true"></span>
	<span class="rpd-courses-orb rpd-courses-orb--magenta" aria-hidden="true"></span>
	<div class="rpd-container rpd-courses-hero__inner">
		<div class="rpd-courses-hero__content">
			<p class="rpd-courses-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<h1>
				<?php if ( $is_default_headline ) : ?>
					<span class="rpd-courses-hero__headline-nowrap"><?php esc_html_e( 'Expert-Led K-12', 'rocketpd' ); ?></span><br>
					<?php esc_html_e( 'Professional Learning,', 'rocketpd' ); ?>
					<span class="rpd-courses-hero__headline-accent"><?php esc_html_e( 'Built Around the Way Educators Actually Learn.', 'rocketpd' ); ?></span>
				<?php else : ?>
					<?php echo esc_html( $headline_parts[0] ); ?><?php echo isset( $headline_parts[1] ) ? ',' : ''; ?>
					<?php if ( isset( $headline_parts[1] ) ) : ?>
						<span class="rpd-courses-hero__headline-accent"><?php echo esc_html( trim( $headline_parts[1] ) ); ?></span>
					<?php endif; ?>
				<?php endif; ?>
			</h1>
			<p><?php echo esc_html( $body ); ?></p>
			<div class="rpd-courses-hero__actions">
				<?php if ( $primary_label && $primary_url ) : ?>
					<a class="rpd-btn rpd-btn--gold" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?><span aria-hidden="true">-&gt;</span></a>
				<?php endif; ?>
				<?php if ( $secondary_label && $secondary_url ) : ?>
					<a class="rpd-btn rpd-btn--outline-purple" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
				<?php endif; ?>
			</div>
			<?php if ( $trust_items ) : ?>
				<ul class="rpd-courses-hero__trust" aria-label="<?php esc_attr_e( 'RocketPD course trust highlights', 'rocketpd' ); ?>">
					<?php foreach ( $trust_items as $item ) : ?>
						<?php if ( ! empty( $item['text'] ) ) : ?>
							<li><span aria-hidden="true"></span><?php echo esc_html( $item['text'] ); ?></li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>

		<div class="rpd-courses-hero__visual" aria-hidden="true">
			<div class="rpd-courses-dot-grid"></div>
			<?php foreach ( $floating as $index => $course ) : ?>
				<?php
				$format = rocketpd_get_course_format( $course['format'] ?? 'self-paced' );
				$image  = $course['image'] ?? '';
				?>
				<article class="rpd-course-float-card rpd-course-float-card--<?php echo esc_attr( $index + 1 ); ?> rpd-course-tone--<?php echo esc_attr( $format['tone'] ); ?>">
					<div class="rpd-course-float-card__media">
						<?php if ( $image ) : ?>
							<img src="<?php echo esc_url( $image ); ?>" alt="">
						<?php else : ?>
							<span><?php echo esc_html( substr( $course['instructor'] ?? 'RPD', 0, 2 ) ); ?></span>
						<?php endif; ?>
					</div>
					<div class="rpd-course-float-card__body">
						<span><?php echo esc_html( $format['label'] ); ?></span>
						<strong><?php echo esc_html( $course['title'] ?? '' ); ?></strong>
						<small><?php echo esc_html( $course['instructor'] ?? '' ); ?></small>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
