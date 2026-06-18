<?php
/**
 * Post hero section.
 *
 * ACF fields used (Hero tab):
 *   rpd_post_hero_style              — 'default' | 'image-right' | 'no-image'
 *   rpd_post_hero_gradient_start     — hex color; Page Header Gradient Start
 *   rpd_post_hero_gradient_end       — hex color; Page Header Gradient End
 *   rpd_post_hero_gradient_opacity   — 0–100; overlay opacity when Featured Image is set
 *   rpd_post_dek                     — optional summary; falls back to post excerpt
 *   rpd_post_hero_image_override     — optional side image (ACF only — not featured image)
 *   rpd_post_reading_time_override   — optional string e.g. '5 min read'
 *   rpd_post_featured_instructor     — post object (instructor CPT)
 *
 * Background behavior (mirrors Salient's "Post Header Settings"):
 *   - Featured Image (set via Gutenberg) always fills the hero background when present.
 *     Equivalent to Salient's "Page Header Image" field.
 *   - The gradient overlays the featured image at the specified opacity, or fills the
 *     background directly when no featured image is set.
 *   - Falls back to the default navy gradient when no featured image and no custom
 *     gradient colors are configured.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// --- Data ---
$hero_style = rocketpd_get_field( 'rpd_post_hero_style', 'default' );
$dek        = rocketpd_get_field( 'rpd_post_dek', '' );
$reading_time = rocketpd_get_field( 'rpd_post_reading_time_override', '' );

if ( ! $dek ) {
	$dek = get_the_excerpt();
}

if ( ! $reading_time ) {
	$word_count   = str_word_count( wp_strip_all_tags( get_the_content() ) );
	$minutes      = max( 1, (int) round( $word_count / 200 ) );
	$reading_time = $minutes . ' min read';
}

// Featured image → always used as Page Header Image (Salient equivalent).
$bg_image_url = has_post_thumbnail()
	? get_the_post_thumbnail_url( get_the_ID(), 'full' )
	: '';

// Gradient fields (Page Header Gradient Start/End + Opacity).
$gradient_start   = rocketpd_get_field( 'rpd_post_hero_gradient_start', '' );
$gradient_end     = rocketpd_get_field( 'rpd_post_hero_gradient_end', '' );
$gradient_opacity = (int) rocketpd_get_field( 'rpd_post_hero_gradient_opacity', 80 );
$gradient_opacity = max( 0, min( 100, $gradient_opacity ) );
$has_gradient     = $gradient_start && $gradient_end;

// Side image: ACF override only — featured image is reserved for the background.
$side_image_id  = 0;
$side_image_url = '';
$image_override = rocketpd_get_field( 'rpd_post_hero_image_override', null );

if ( $image_override && is_array( $image_override ) && ! empty( $image_override['url'] ) ) {
	$side_image_url = $image_override['url'];
} elseif ( ! $bg_image_url && get_post_thumbnail_id() ) {
	// Only fall back to featured image for side slot when no bg image is in use.
	$side_image_id = get_post_thumbnail_id();
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

// Modifier classes.
$modifier = 'rpd-post-hero--' . sanitize_html_class( $hero_style ?: 'default' );
$has_side = ( $side_image_url || $side_image_id ) && 'no-image' !== $hero_style;

if ( $bg_image_url ) {
	$modifier .= ' rpd-post-hero--bg-image';
	$has_side  = false; // suppress side image when featured image fills the background
}

// Build inline styles for section and overlay.
$section_style = '';
if ( $bg_image_url ) {
	$section_style = ' style="background-image: url(\'' . esc_url( $bg_image_url ) . '\');"';
}

$overlay_style = '';
if ( $bg_image_url && $has_gradient ) {
	$opacity_decimal = round( $gradient_opacity / 100, 2 );
	$overlay_style   = ' style="background: linear-gradient(135deg, ' . esc_attr( $gradient_start ) . ', ' . esc_attr( $gradient_end ) . '); opacity: ' . $opacity_decimal . ';"';
} elseif ( $has_gradient && ! $bg_image_url ) {
	// No featured image: gradient is the section background itself.
	$section_style = ' style="background: linear-gradient(135deg, ' . esc_attr( $gradient_start ) . ', ' . esc_attr( $gradient_end ) . ');"';
}
?>

<section class="rpd-post-hero <?php echo esc_attr( $modifier ); ?>"<?php echo $section_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above ?> aria-label="<?php esc_attr_e( 'Article header', 'rocketpd' ); ?>">

	<?php if ( $bg_image_url ) : ?>
		<div class="rpd-post-hero__overlay"<?php echo $overlay_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above ?> aria-hidden="true"></div>
	<?php endif; ?>

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

		<?php if ( $has_side ) : ?>
			<div class="rpd-post-hero__image-wrap">
				<?php if ( $side_image_url ) : ?>
					<img class="rpd-post-hero__image" src="<?php echo esc_url( $side_image_url ); ?>" alt="<?php the_title_attribute(); ?>">
				<?php elseif ( $side_image_id ) : ?>
					<?php echo wp_get_attachment_image( $side_image_id, 'large', false, array( 'class' => 'rpd-post-hero__image', 'alt' => get_the_title() ) ); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>

	</div>
</section>
