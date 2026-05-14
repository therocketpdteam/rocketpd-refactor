<?php
/**
 * Courses format cards.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = rocketpd_get_field( 'rpd_courses_formats_eyebrow', __( 'Three Ways to Learn', 'rocketpd' ) );
$heading = rocketpd_get_field( 'rpd_courses_formats_headline', __( 'Choose your learning format.', 'rocketpd' ) );
$body    = rocketpd_get_field( 'rpd_courses_formats_body', __( 'Every RocketPD experience is built for working educators. Pick the depth and pace that fits your week.', 'rocketpd' ) );
$cards   = rocketpd_get_repeater_rows(
	'rpd_courses_format_cards',
	array(
		array( 'format' => 'webinar', 'badge' => __( 'Free', 'rocketpd' ), 'title' => __( 'Free Webinars', 'rocketpd' ), 'body' => __( 'Explore timely conversations and practical strategies from nationally recognized K-12 experts.', 'rocketpd' ), 'cta_label' => __( 'Watch Free Webinars', 'rocketpd' ), 'cta_url' => '#course-gallery', 'featured' => 0 ),
		array( 'format' => 'self-paced', 'badge' => __( '$49 / Course', 'rocketpd' ), 'title' => __( 'Self-Paced Courses', 'rocketpd' ), 'body' => __( 'Learn on your schedule with expert-led video lessons, downloadable workbooks, and certificates of completion.', 'rocketpd' ), 'cta_label' => __( 'Browse Self-Paced Courses', 'rocketpd' ), 'cta_url' => '#course-gallery', 'featured' => 1 ),
		array( 'format' => 'cohort', 'badge' => __( 'Starting At $295 / Person', 'rocketpd' ), 'title' => __( 'Live-Virtual Cohorts', 'rocketpd' ), 'body' => __( 'Join interactive, multi-session learning experiences with direct expert guidance and practical implementation support.', 'rocketpd' ), 'cta_label' => __( 'View Live Cohorts', 'rocketpd' ), 'cta_url' => '#course-gallery', 'featured' => 0 ),
	),
	array( 'title', 'body' )
);
?>

<section class="rpd-courses-formats" id="course-formats">
	<div class="rpd-container">
		<header class="rpd-courses-section-header rpd-courses-section-header--center">
			<p><?php echo esc_html( $eyebrow ); ?></p>
			<h2><?php echo esc_html( $heading ); ?></h2>
			<span><?php echo esc_html( $body ); ?></span>
		</header>

		<div class="rpd-courses-format-grid">
			<?php foreach ( $cards as $card ) : ?>
				<?php
				$format_key = $card['format'] ?? 'self-paced';
				$format     = rocketpd_get_course_format( $format_key );
				$featured   = ! empty( $card['featured'] );
				?>
				<article class="rpd-courses-format-card rpd-course-tone--<?php echo esc_attr( $format['tone'] ); ?><?php echo $featured ? ' is-featured' : ''; ?>">
					<?php if ( $featured ) : ?>
						<div class="rpd-courses-format-card__ribbon"><?php esc_html_e( 'Most Popular', 'rocketpd' ); ?></div>
					<?php endif; ?>
					<div class="rpd-courses-format-card__icon" data-icon="<?php echo esc_attr( $format['icon'] ); ?>" aria-hidden="true"></div>
					<?php if ( ! empty( $card['badge'] ) ) : ?>
						<span class="rpd-courses-format-card__badge"><?php echo esc_html( $card['badge'] ); ?></span>
					<?php endif; ?>
					<h3><?php echo esc_html( $card['title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $card['body'] ?? '' ); ?></p>
					<?php if ( ! empty( $card['cta_label'] ) && ! empty( $card['cta_url'] ) ) : ?>
						<a href="<?php echo esc_url( $card['cta_url'] ); ?>"><?php echo esc_html( $card['cta_label'] ); ?><span aria-hidden="true">-&gt;</span></a>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
