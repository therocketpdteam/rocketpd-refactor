<?php
/**
 * Blog archive card.
 *
 * Uses the current post in the loop. Call inside a WP_Query while loop.
 *
 * Card background priority:
 *   1. Featured image
 *   2. Geometric brand image (/wp-content/uploads/2023/05/RPD-geometric_HEADER3_noperson.jpg)
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_id    = get_the_ID();
$permalink  = get_permalink();
$title      = get_the_title();
$excerpt    = get_the_excerpt();
$date       = get_the_date();
$author     = get_the_author();
$categories = get_the_category();
$cat_name   = ! empty( $categories ) ? $categories[0]->name : '';
$cat_url    = ! empty( $categories ) ? get_category_link( $categories[0]->term_id ) : '';

$thumb_url = get_the_post_thumbnail_url( $post_id, 'large' );
if ( ! $thumb_url ) {
	$thumb_url = home_url( '/wp-content/uploads/2023/05/RPD-geometric_HEADER3_noperson.jpg' );
}

$word_count   = str_word_count( wp_strip_all_tags( get_the_content( null, false, $post_id ) ) );
$reading_time = max( 1, (int) round( $word_count / 200 ) ) . ' min read';
?>

<article class="rpd-blog-card">
	<a class="rpd-blog-card__link" href="<?php echo esc_url( $permalink ); ?>" aria-label="<?php echo esc_attr( $title ); ?>"></a>
	<div class="rpd-blog-card__thumb" style="background-image: url('<?php echo esc_url( $thumb_url ); ?>');">
		<div class="rpd-blog-card__thumb-overlay"></div>
		<?php if ( $cat_name ) : ?>
			<span class="rpd-tag rpd-blog-card__tag"><?php echo esc_html( $cat_name ); ?></span>
		<?php endif; ?>
	</div>
	<div class="rpd-blog-card__body">
		<p class="rpd-blog-card__meta">
			<span class="rpd-blog-card__author"><?php echo esc_html( $author ); ?></span>
			<span class="rpd-blog-card__sep" aria-hidden="true">·</span>
			<time class="rpd-blog-card__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( $date ); ?></time>
		</p>
		<h3 class="rpd-blog-card__title"><?php echo esc_html( $title ); ?></h3>
		<?php if ( $excerpt ) : ?>
			<p class="rpd-blog-card__excerpt"><?php echo esc_html( $excerpt ); ?></p>
		<?php endif; ?>
		<div class="rpd-blog-card__footer">
			<span class="rpd-blog-card__read-time"><?php echo esc_html( $reading_time ); ?></span>
			<span class="rpd-blog-card__arrow" aria-hidden="true">→</span>
		</div>
	</div>
</article>
