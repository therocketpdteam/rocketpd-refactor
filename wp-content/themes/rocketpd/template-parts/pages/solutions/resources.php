<?php
/**
 * Solutions — recent resources/blog posts.
 *
 * @package RocketPD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading = rocketpd_get_field( 'rpd_sol_resources_heading', __( 'Our universe is infinite — stick around, explore!', 'rocketpd' ) );

$recent_posts = new WP_Query(
	array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
		'post_status'    => 'publish',
		'no_found_rows'  => true,
	)
);
?>

<section class="rpd-sol-resources rpd-sol-section">
	<div class="rpd-sol-container">
		<?php if ( $heading ) : ?>
			<h2 class="rpd-sol-resources__heading"><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>

		<?php if ( $recent_posts->have_posts() ) : ?>
			<div class="rpd-sol-resources__grid">
				<?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
					<article class="rpd-sol-resource-card">
						<div class="rpd-sol-resource-card__meta">
							<?php
							$categories = get_the_category();
							if ( $categories ) :
								?>
								<span class="rpd-sol-resource-card__cat">
									<?php echo esc_html( $categories[0]->name ); ?>
								</span>
							<?php endif; ?>
						</div>
						<h3 class="rpd-sol-resource-card__title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						<div class="rpd-sol-resource-card__excerpt">
							<?php the_excerpt(); ?>
						</div>
						<span class="rpd-sol-resource-card__link" aria-hidden="true">
							<?php esc_html_e( 'Read more', 'rocketpd' ); ?> &rarr;
						</span>
					</article>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</div>
</section>
