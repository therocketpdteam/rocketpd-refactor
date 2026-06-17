<?php
/**
 * Post hero section.
 *
 * ACF fields used:
 *   rpd_post_hero_style         — 'default' | 'image-right' | 'no-image'
 *   rpd_post_dek                — optional summary; falls back to post excerpt
 *   rpd_post_hero_image_override — optional image; falls back to featured image
 *   rpd_post_reading_time_override — optional string e.g. '5 min read'
 *   rpd_post_featured_instructor — post object (instructor CPT)
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// --- Data ---
$hero_style   = rocketpd_get_field( 'rpd_post_hero_style', 'default' );
$dek          = rocketpd_get_field( 'rpd_post_dek', '' );
$reading_time = rocketpd_get_field( 'rpd_post_reading_time_override', '' );

if ( ! $dek ) {
	$dek = get_the_excerpt();
}

if ( ! $reading_time ) {
	$word_count   = str_word_count( wp_strip_all_tags( get_the_content() ) );
	$minutes      = max( 1, (int) round( $word_count / 200 ) );
	$reading_time = $minutes . ' min read';
}

// Hero image: ACF override → featured image → none.
$hero_image_id  = 0;
$hero_image_url = '';
$image_override = rocketpd_get_field( 'rpd_post_hero_image_override', null );

if ( $image_override && is_array( $image_override ) && ! empty( $image_override['url'] ) ) {
	$hero_image_url = $image_override['url'];
} elseif ( has_post_thumbnail() ) {
	$hero_image_id = get_post_thumbnail_id();
}

// Featured instructor pull-through.
$instructor_obj  = rocketpd_get_field( 'rpd_post_featured_instructor', null );
$instructor_name = '';
$instructor_role = '';
$instructor_img  = '';

if ( $instructor_obj instanceof WP_Post ) {
	$instructor_name = get_the_title( $instructor_obj->ID );
	$instructor_role = get_field( 'rpd_instructor_role_line', $instructor_obj->ID ) ?: '';
	$headshot        = get_field( 'rpd_instructor_headshot', $instructor_obj->ID );
	if ( is_array( $headshot ) && ! empty( $headshot['url'] ) ) {
		$instructor_img = $headshot['url'];
	} elseif ( has_post_thumbnail( $instructor_obj->ID ) ) {
		$instructor_img = get_the_post_thumbnail_url( $instructor_obj->ID, 'thumbnail' );
	}
}

// Categories.
$categories = get_the_category();

// Modifier class.
$modifier = 'rpd-post-hero--' . sanitize_html_class( $hero_style ?: 'default' );
$has_img  = ( $hero_image_url || $hero_image_id ) && 'no-image' !== $hero_style;
?>

<section class="rpd-post-hero <?php echo esc_attr( $modifier ); ?>" aria-label="<?php esc_attr_e( 'Article header', 'rocketpd' ); ?>">
	<div class="rpd-container rpd-post-hero__inner">

		<div class="rpd-post-hero__content">

			<?php if ( ! empty( $categories ) ) : ?>
				<div class="rpd-post-hero__cats">
					<?php foreach ( $categories as $cat ) : ?>
						<a class="rpd-tag" href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>">
							<?php echo esc_html( $cat->name ); ?>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<h1 class="rpd-post-hero__title"><?php the_title(); ?></h1>

			<?php if ( $dek ) : ?>
				<p class="rpd-post-hero__dek"><?php echo esc_html( $dek ); ?></p>
			<?php endif; ?>

			<div class="rpd-post-hero__meta">
				<?php if ( $instructor_name ) : ?>
					<div class="rpd-post-hero__byline">
						<?php if ( $instructor_img ) : ?>
							<img class="rpd-post-hero__avatar" src="<?php echo esc_url( $instructor_img ); ?>" alt="<?php echo esc_attr( $instructor_name ); ?>" width="36" height="36">
						<?php endif; ?>
						<span class="rpd-post-hero__author">
							<?php echo esc_html( $instructor_name ); ?>
							<?php if ( $instructor_role ) : ?>
								<span class="rpd-post-hero__author-role"><?php echo esc_html( $instructor_role ); ?></span>
							<?php endif; ?>
						</span>
					</div>
				<?php else : ?>
					<span class="rpd-post-hero__author"><?php the_author(); ?></span>
				<?php endif; ?>

				<span class="rpd-post-hero__date"><?php echo esc_html( get_the_date() ); ?></span>
				<span class="rpd-post-hero__reading-time"><?php echo esc_html( $reading_time ); ?></span>
			</div>

		</div>

		<?php if ( $has_img ) : ?>
			<div class="rpd-post-hero__image-wrap">
				<?php if ( $hero_image_url ) : ?>
					<img class="rpd-post-hero__image" src="<?php echo esc_url( $hero_image_url ); ?>" alt="<?php the_title_attribute(); ?>">
				<?php elseif ( $hero_image_id ) : ?>
					<?php echo wp_get_attachment_image( $hero_image_id, 'large', false, array( 'class' => 'rpd-post-hero__image', 'alt' => get_the_title() ) ); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>

	</div>
</section>
