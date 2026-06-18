<?php
/**
 * Post related learning section.
 *
 * ACF fields used:
 *   rpd_post_related_mode      — 'hidden' | 'auto' | 'custom'
 *   rpd_post_related_resources — relationship field; only used when mode = 'custom'
 *
 * Card background priority per item:
 *   1. Featured image
 *   2. Instructor headshot (cohort: rpd_cohort_instructor → rpd_instructor_headshot;
 *                           course:  rpd_course_instructor_headshot)
 *   3. Brand gradient fallback (CSS)
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mode = rocketpd_get_field( 'rpd_post_related_mode', 'auto' );

if ( 'hidden' === $mode ) {
	return;
}

$related = array();

if ( 'custom' === $mode ) {
	$related = rocketpd_get_field( 'rpd_post_related_resources', array() ) ?: array();
} else {
	// Auto: query same-category posts.
	$cats = wp_get_post_categories( get_the_ID(), array( 'fields' => 'ids' ) );

	if ( ! empty( $cats ) ) {
		$query = new WP_Query(
			array(
				'post_type'           => 'post',
				'posts_per_page'      => 3,
				'post__not_in'        => array( get_the_ID() ),
				'category__in'        => $cats,
				'no_found_rows'       => true,
				'ignore_sticky_posts' => true,
			)
		);
		$related = $query->posts;
	}
}

if ( empty( $related ) ) {
	return;
}

// Cap at 3 cards.
$related = array_slice( $related, 0, 3 );
?>

<section class="rpd-post-related" aria-label="<?php esc_attr_e( 'Related learning', 'rocketpd' ); ?>">
	<div class="rpd-container">
		<h2 class="rpd-post-related__heading"><?php esc_html_e( 'You might also like', 'rocketpd' ); ?></h2>

		<div class="rpd-post-related__grid">
			<?php foreach ( $related as $item ) : ?>
				<?php
				$item_id    = is_object( $item ) ? $item->ID : (int) $item;
				$item_title = get_the_title( $item_id );
				$item_url   = get_permalink( $item_id );
				$item_type  = get_post_type( $item_id );
				$item_date  = get_the_date( '', $item_id );
				$cats       = get_the_category( $item_id );
				$cat_name   = ! empty( $cats ) ? $cats[0]->name : ucfirst( str_replace( '_', ' ', $item_type ) );

				// Resolve card background: featured image → instructor headshot → gradient (CSS).
				$card_bg_url = get_the_post_thumbnail_url( $item_id, 'large' );

				if ( ! $card_bg_url ) {
					if ( 'cohort' === $item_type ) {
						$instructor_obj = get_field( 'rpd_cohort_instructor', $item_id );
						$instructor_id  = is_object( $instructor_obj ) ? $instructor_obj->ID : (int) $instructor_obj;
						if ( $instructor_id ) {
							$headshot    = get_field( 'rpd_instructor_headshot', $instructor_id );
							$card_bg_url = is_array( $headshot ) ? ( $headshot['url'] ?? '' ) : (string) $headshot;
						}
					} elseif ( 'course' === $item_type ) {
						$headshot    = get_field( 'rpd_course_instructor_headshot', $item_id );
						$card_bg_url = is_array( $headshot ) ? ( $headshot['url'] ?? '' ) : (string) $headshot;
					}
				}

				$card_style = $card_bg_url
					? ' style="background-image: url(\'' . esc_url( $card_bg_url ) . '\');"'
					: '';
				?>
				<a class="rpd-post-related__card" href="<?php echo esc_url( $item_url ); ?>"<?php echo $card_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above ?>>
					<?php if ( $card_bg_url ) : ?>
						<div class="rpd-post-related__card-overlay" aria-hidden="true"></div>
					<?php endif; ?>
					<div class="rpd-post-related__card-body">
						<span class="rpd-tag"><?php echo esc_html( $cat_name ); ?></span>
						<h3 class="rpd-post-related__card-title"><?php echo esc_html( $item_title ); ?></h3>
						<?php if ( $item_date ) : ?>
							<span class="rpd-post-related__card-date"><?php echo esc_html( $item_date ); ?></span>
						<?php endif; ?>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
