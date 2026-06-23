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
$format_icon = sanitize_key( $format['icon'] ?? 'layers' );
$youtube_id  = $course['trailerYouTubeId'] ?? '1lOJDsHcCPQ';
$poster_url  = 'https://img.youtube.com/vi/' . rawurlencode( $youtube_id ) . '/hqdefault.jpg';
?>

<section class="rpd-course-hero rpd-course-tone--<?php echo esc_attr( $format['tone'] ?? 'gold' ); ?>">
	<span class="rpd-course-orb rpd-course-orb--blue" aria-hidden="true"></span>
	<span class="rpd-course-orb rpd-course-orb--magenta" aria-hidden="true"></span>
	<div class="rpd-container rpd-course-hero__inner">
		<div class="rpd-course-hero__content">
			<p class="rpd-course-format-badge">
				<span aria-hidden="true">
					<?php if ( in_array( $format_icon, array( 'play', 'video' ), true ) ) : ?>
						<svg viewBox="0 0 24 24" focusable="false"><rect x="4" y="6" width="13" height="12" rx="2"></rect><path d="m17 10 4-2v8l-4-2"></path><path d="m9 10 4 2-4 2Z"></path></svg>
					<?php elseif ( in_array( $format_icon, array( 'calendar', 'cohort' ), true ) ) : ?>
						<svg viewBox="0 0 24 24" focusable="false"><rect x="5" y="5" width="14" height="15" rx="2"></rect><path d="M8 3v4"></path><path d="M16 3v4"></path><path d="M5 10h14"></path></svg>
					<?php else : ?>
						<svg viewBox="0 0 24 24" focusable="false"><rect x="5" y="6" width="14" height="12" rx="2"></rect><path d="m10 10 5 2-5 2Z"></path></svg>
					<?php endif; ?>
				</span>
				<?php echo esc_html( ( $format['label'] ?? __( 'Self-Paced Course', 'rocketpd' ) ) . ' · ' . ( $course['topic'] ?? __( 'Teacher Evaluation', 'rocketpd' ) ) ); ?>
			</p>
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
					<?php
					$price_raw    = $course['price'] ?? '';
					$price_symbol = '';
					$price_number = $price_raw;
					if ( $price_raw && ! ctype_digit( substr( $price_raw, 0, 1 ) ) ) {
						$price_symbol = substr( $price_raw, 0, 1 );
						$price_number = substr( $price_raw, 1 );
					}
					$meta_parts = array_map( 'trim', explode( '·', $course['priceMeta'] ?? '' ) );
					?>
					<strong class="rpd-course-price-card__price">
						<?php if ( $price_symbol ) : ?>
							<span class="rpd-course-price-card__symbol"><?php echo esc_html( $price_symbol ); ?></span>
						<?php endif; ?>
						<span class="rpd-course-price-card__amount"><?php echo esc_html( $price_number ); ?></span>
					</strong>
					<div class="rpd-course-price-card__meta">
						<?php foreach ( $meta_parts as $i => $part ) : ?>
							<?php if ( trim( $part ) ) : ?>
								<span class="rpd-course-price-card__meta-<?php echo 0 === $i ? 'primary' : 'secondary'; ?>"><?php echo esc_html( trim( $part ) ); ?></span>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
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
						<?php
						$meta_label = is_array( $item ) ? ( $item['label'] ?? '' ) : $item;
						$meta_icon  = is_array( $item ) ? sanitize_key( $item['icon'] ?? '' ) : '';

						if ( '' === $meta_label ) {
							continue;
						}
						?>
						<li>
							<span class="rpd-course-meta-row__icon rpd-course-meta-row__icon--<?php echo esc_attr( $meta_icon ? $meta_icon : 'check' ); ?>" aria-hidden="true">
								<?php if ( 'clock' === $meta_icon ) : ?>
									<svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="8"></circle><path d="M12 7v5l3 2"></path></svg>
								<?php elseif ( 'video' === $meta_icon ) : ?>
									<svg viewBox="0 0 24 24" focusable="false"><rect x="4" y="6" width="13" height="12" rx="2"></rect><path d="m17 10 4-2v8l-4-2"></path><path d="m9 10 4 2-4 2Z"></path></svg>
								<?php elseif ( 'file' === $meta_icon || 'download' === $meta_icon ) : ?>
									<svg viewBox="0 0 24 24" focusable="false"><path d="M7 4h7l3 3v13H7Z"></path><path d="M14 4v4h3"></path><path d="M10 12h4"></path><path d="M10 15h5"></path></svg>
								<?php elseif ( 'award' === $meta_icon || 'certificate' === $meta_icon ) : ?>
									<svg viewBox="0 0 24 24" focusable="false"><rect x="6" y="4" width="12" height="16" rx="2"></rect><circle cx="12" cy="10" r="2.6"></circle><path d="m10 14 2 1.4 2-1.4"></path></svg>
								<?php else : ?>
									<svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="8"></circle><path d="m8.5 12 2.5 2.5 4.5-5"></path></svg>
								<?php endif; ?>
							</span>
							<span class="rpd-course-meta-row__label"><?php echo esc_html( $meta_label ); ?></span>
						</li>
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
